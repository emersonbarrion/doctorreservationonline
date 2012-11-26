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

  public function executeEvents(sfWebRequest $request)
  {
		$reservations = Doctrine_Core::getTable('CroReservations')
						->getUserReservations($this->getUser()->getAttribute('id'));

		echo json_encode($reservations);

		return sfView::NONE;
  }
}
