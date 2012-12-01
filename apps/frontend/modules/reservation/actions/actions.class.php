<?php

/**
 * reservation actions.
 *
 * @package    courtreservationonline
 * @subpackage reservation
 * @author     Emerson Barrion
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class reservationActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CroReservationsForm();
    $this->processForm($request, $this->form);
  }

  public function executeEdit(sfWebRequest $request)
  {
    $crouser = Doctrine::getTable('CroReservations')->find(array($request->getParameter('id')));
    $this->form = new CroReservationsForm($crouser);
    $form_vals = $this->form->getValues();
    $this->processForm($request, $this->form);
  }

  public function executeEvents(sfWebRequest $request)
  {
		$reservations = Doctrine_Core::getTable('CroReservations')->getUserReservations($this->getUser()->getAttribute('id'));

		echo json_encode($reservations);

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
