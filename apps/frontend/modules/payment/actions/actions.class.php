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

	$ret = $r->doExpressCheckout($request->getParameter('amount'), $request->getParameter('resid'), $request->getParameter('rate'));
  }

  public function executeSuccess(sfWebRequest $request)
  {
  	
  }

  public function executeFail(sfWebRequest $request)
  {
  }

  public function executePpreturn(sfWebRequest $request)
  {
  	$r = new PayPal();

	
	$token = $_GET['token'];
	$d = $r->getCheckoutDetails($token);
	
	$final = $r->doPayment();

	if($d['TOKEN'] == $final['TOKEN']){
		$payment = new CroPayments();
		$payment->setReservationid($request->getParameter('resid'));
		$payment->setToken($final['TOKEN']);
		$payment->setAmount($final['AMT']);
		$payment->setTransactionid($final['TRANSACTIONID']);
		$payment->setTransactiontype($final['TRANSACTIONTYPE']);
		$payment->setfirstname($d['FIRSTNAME']);
		$payment->setlastname($d['LASTNAME']);
		$payment->setCountrycode($d['COUNTRYCODE']);
		$payment->setEmail($d['EMAIL']);
		$payment->setPayerid($d['PAYERID']);
		$payment->setRate($request->getParameter('rate'));
		$payment->setOrdertime($final['ORDERTIME']);
		$payment->setFeeamount($final['FEEAMT']);
		$payment->setTaxamount($final['TAXAMT']);
		$payment->setPaymenttype($final['PAYMENTTYPE']);
		$payment->setPaymentstatus($final['PAYMENTSTATUS']);
		$payment->setCurrencycode($final['CURRENCYCODE']);
		$payment->setAck($final['ACK']);
		$payment->save();
	}

	if ($final['ACK'] == 'Success') {
		$this->redirect('payment/success');
	} else {
		$this->redirect('payment/fail');
	}

	die();
  }
}
