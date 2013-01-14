<?php

/**
 * payment actions.
 *
 * @package    courtreservationonline
 * @subpackage payment
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */


require_once sfConfig::get('sf_lib_dir').'/vendor/paypal/paypal.php';
require_once sfConfig::get('sf_lib_dir').'/vendor/paypal/httprequest.php';

class paymentActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {

	//Use this form for production server 
	//$r = new PayPal(true);

	//Use this form for sandbox tests
	$r = new PayPal();

	$ret = ($r->doExpressCheckout(10, 'Access to source code library'));

	//An error occured. The auxiliary information is in the $ret array

	print_r($ret);
  }


  public function executePpreturn(sfWebRequest $request)
  {
  	$r = new PayPal();

	
	$token = $_GET['token'];
	$d = $r->getCheckoutDetails($token);
	echo '<pre>';
	print_r($d);
	echo '</pre>';

	

	$final = $r->doPayment();

	if ($final['ACK'] == 'Success') {
		echo 'Succeed!';
	} else {
		print_r($final);
	}

	die();
  }
}
