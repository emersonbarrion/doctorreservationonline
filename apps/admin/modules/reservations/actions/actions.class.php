<?php

require_once dirname(__FILE__).'/../lib/reservationsGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/reservationsGeneratorHelper.class.php';

/**
 * reservations actions.
 *
 * @package    courtreservationonline
 * @subpackage reservations
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class reservationsActions extends autoReservationsActions
{
	public function executeCourtavailable(sfWebRequest $request)
	{    
		$available = Doctrine_Core::getTable('CroCourts')->getTimeAvailable($request->getParameter('courtid'), $request->getParameter('date'));

		echo json_encode($available);

		return sfView::NONE;
	}

	public function executeEdit(sfWebRequest $request)
	{
		$this->cro_reservations = $this->getRoute()->getObject();
		$this->form = $this->configuration->getForm($this->cro_reservations);

		$reservation = Doctrine::getTable('CroReservations')->find(array($request->getParameter('id')));
		$this->selectedDate = date('Y-m-d', strtotime($reservation->getStart()));
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
		$data = $request->getParameter($form->getName());

		$reservation = Doctrine::getTable('CroReservations')->find(array($request->getParameter('id')));
		$data['selected_date'] = date('Y-m-d', strtotime($reservation->getStart()));

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

		$form->bind($data, $request->getFiles($form->getName()));
		if ($form->isValid())
		{
			$notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

			try {				
				$cro_reservations = $form->save();
			} catch (Doctrine_Validator_Exception $e) {

				$errorStack = $form->getObject()->getErrorStack();

				$message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ?  's' : null) . " with validation errors: ";
				foreach ($errorStack as $field => $errors) {
				    $message .= "$field (" . implode(", ", $errors) . "), ";
				}
				$message = trim($message, ', ');

				$this->getUser()->setFlash('error', $message);
				return sfView::SUCCESS;
			}

			$this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $cro_reservations)));

			if ($request->hasParameter('_save_and_add')) {
				$this->getUser()->setFlash('notice', $notice.' You can add another one below.');
				$this->redirect('@cro_reservations_new');
			} else {
				$this->getUser()->setFlash('notice', $notice);
				$this->redirect(array('sf_route' => 'cro_reservations_edit', 'sf_subject' => $cro_reservations));
			}
		} else {
			$this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
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

	public function executeFilter(sfWebRequest $request)
	{		
		$data = $request->getParameter('cro_reservations_filters');

		$users = Doctrine::getTable('CroUsers')->getUserIdForFilter($data['userid']);
		
		$data['userid'] = $users['id'];

		$this->setPage(1);

		if ($request->hasParameter('_reset'))
		{
		  $this->setFilters($this->configuration->getFilterDefaults());

		  $this->redirect('@cro_reservations');
		}

		$this->filters = $this->configuration->getFilterForm($this->getFilters());

		$this->filters->bind($data);
		if ($this->filters->isValid())
		{
		  $this->setFilters($this->filters->getValues());

		  $this->redirect('@cro_reservations');
		}

		$this->pager = $this->getPager();
		$this->sort = $this->getSort();

		$this->setTemplate('index');
	}
}
