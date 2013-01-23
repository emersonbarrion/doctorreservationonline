<?php

/**
 * reservation actions.
 *
 * @package    courtreservationonline
 * @subpackage reservation
 * @author     Author
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class reservationActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  }

  public function executeAll(sfWebRequest $request)
  {
    $this->setTemplate('index');
  }

  public function executeNew(sfWebRequest $request)
  {
      $this->form = new CroReservationsForm();
      $this->processForm($request, $this->form);
  }

  public function executeEdit(sfWebRequest $request)
  {
    $crouser = Doctrine::getTable('CroReservations')->find(array($request->getParameter('id')));
    $cropayments = Doctrine::getTable('CroPayments')->getPayment(array($request->getParameter('id')));

    if($crouser->getUserid() != $this->getUser()->getAttribute('id')) {
      echo 'Please select your reservation';
      return sfView::NONE;
    }

    $this->payment_status = 'Pending';
    if($cropayments[0]['paymentstatus'] == 'Completed'){
      $this->payment_status = 'Paid';
    }

    
    $this->form = new CroReservationsForm($crouser);
    $this->processForm($request, $this->form);
  }

  public function executeDelete(sfWebRequest $request)
  {
    $crouser = Doctrine::getTable('CroReservations')->find(array($request->getParameter('id')));
    $crouser->delete();
    $this->redirect('reservation/index');
  }

  public function executeEvents(sfWebRequest $request)
  {
    $reserve = NULL;
    if($request->getParameter('reserve') != 'all') {
      $reserve = $this->getUser()->getAttribute('id');
    }

		$reservations = Doctrine_Core::getTable('CroReservations')->getUserReservations($reserve);

		echo json_encode($reservations);

		return sfView::NONE;
  }

  public function executeCourtavailable(sfWebRequest $request)
  {    
    $available = Doctrine_Core::getTable('CroCourts')->getTimeAvailable($request->getParameter('courtid'), $request->getParameter('date'));

    echo json_encode($available);

    return sfView::NONE;
  }

  public function executeReservationavailable(sfWebRequest $request)
  {
    $start = strtotime($request->getParameter('start'), $request->getParameter('date'));
    $end = strtotime($request->getParameter('end'), $request->getParameter('date'));

    $totalTime = $end - $start;
    if($totalTime < 1800) {
      echo 'error';
      return sfView::NONE;
    }

    $start = date('H:i:s', $start);
    $end = date('H:i:s', $end);
    $start =  $request->getParameter('date') . ' ' . $start;
    $end   = $request->getParameter('date') . ' ' . $end;


    $available = Doctrine_Core::getTable('CroReservations')
                    ->checkReservations($request->getParameter('courtid'), 
                                        $request->getParameter('date'),
                                        $start, $end);

    echo $available;

    return sfView::NONE;
  }

  public function executeEditreservationavailable(sfWebRequest $request)
  {
    $start = strtotime($request->getParameter('start'), $request->getParameter('date'));
    $end = strtotime($request->getParameter('end'), $request->getParameter('date'));

    $totalTime = $end - $start;
    if($totalTime < 1800) {
      echo 'error';
      return sfView::NONE;
    }
    
    $start = date('H:i:s', $start);
    $end = date('H:i:s', $end);
    $start =  $request->getParameter('date') . ' ' . $start;
    $end   = $request->getParameter('date') . ' ' . $end;

    $available = Doctrine_Core::getTable('CroReservations')
                    ->checkEditReservations($request->getParameter('courtid'), 
                                            $request->getParameter('date'),
                                            $start, $end, $request->getParameter('reservationid'));

    echo $available;

    return sfView::NONE;
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    if ($request->isMethod('post')) {

      $data = $request->getParameter($form->getName());

      $data['start'] = strtotime($data['start'], $data['selected_date']);
      $data['end'] = strtotime($data['end'], $data['selected_date']);
      $data['start'] = date('H:i:s', $data['start']);
      $data['end'] = date('H:i:s', $data['end']);
      $data['start'] =  $data['selected_date'] . ' ' . $data['start'];
      $data['end']   = $data['selected_date'] . ' ' . $data['end'];

      $diff = $this->timeDiff(strtotime($data['start']), strtotime($data['end']));

      $data['hours'] = $diff['hours'];
      if($diff['minutes']){
        $data['hours'] = $data['hours'] + 1;
      }

      $court = Doctrine_Core::getTable('CroCourts')->getTimeAvailable($data['courtid']);

      $data['amount'] = $court[0]['rate'] * $data['hours'];

      $form->bind($data);

      if ($form->isValid()){
        $obj = $form->save();
        if($data['process'] == 'pay'){
          $this->redirect('payment/index?resid=' . $obj->getId() . '&amount='. $data['amount'] . '&rate=' . $court[0]['rate']);
        } else {
          $this->redirect('reservation/index');
        }
      }
    }
  }

  public function timeDiff($t1, $t2)
  {
     $diff = array(
        'years' => 0,
        'months' => 0,
        'weeks' => 0,
        'days' => 0,
        'hours' => 0,
        'minutes' => 0,
        'seconds' =>0
     );

     if($t1 > $t2) {
        $time1 = $t2;
        $time2 = $t1;
     } else {
        $time1 = $t1;
        $time2 = $t2;
     }

     foreach(array('years','months','weeks','days','hours','minutes','seconds') as $unit)
     {
        while(TRUE) {
           $next = strtotime("+1 $unit", $time1);
           if($next < $time2) {
              $time1 = $next;
              $diff[$unit]++;
           } else {
              break;
           }
        }
     }

     return($diff);
  }
}
