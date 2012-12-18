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
    
    if($crouser->getUserid() != $this->getUser()->getAttribute('id')) {
      echo 'Please select your reservation';
      return sfView::NONE;
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
                                        $start, $end,
                                        $this->getUser()->getAttribute('id'));

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
                                            $start, $end,
                                            $this->getUser()->getAttribute('id'), $request->getParameter('reservationid'));

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
      
      $form->bind($data);

      if ($form->isValid()){
        $form->save();
        $this->redirect('reservation/index');
      }
    }
  }
}
