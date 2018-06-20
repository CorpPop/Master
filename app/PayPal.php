<?php
namespace App;
class Paypal 
{
	private $_apiContext;
	private $shopping_cart;
	private $_ClientId = 'AYwtQUVK8xRSsX3czA96D1SieNrPt94lCr1BfwegdVFWO8lTLEAWPgUb6-_OoVnkKcjOP0_66ahY1DqS';
	private $_ClientSecret = 'EI3SLsg5WPMswQ8UqPVls2PAr-3rqchh4EJ9pAXV8zRitry2mfdk7ZOTrkDUJkI0uhUxi3b0jMjLbwae';

	public function __construct($shopping_cart){
		$this->_apiContext = \PaypalPayment::ApiContext($this->_ClientId, $this->_ClientSecret);
		$config = config("paypal_payment");
		$flatConfig = array_dot($config);

		$this->_apiContext->setConfig($flatConfig);
		$this->shopping_cart = $shopping_cart;

	}
	public function generate(){
		$payment = \PaypalPayment::payment()->setIntent("sale")
											->setPayer($this->payer())
											->setTransactions([$this->transaction()])
											->setRedirectUrls($this->redirectURLs());
        //dd("ok2");

		try{
			$payment->create($this->_apiContext);
		} catch(\Exception $ex){
			dd($ex);
			exit(1);
		}
		return $payment;
	}
	public function payer(){
		// Retorna payment´s informacion
		return \PaypalPayment::payer()
							->setPaymentMethod("paypal");
	}
	public function transaction(){
		// Retorna infotmacion de transaciones
		return \PaypalPayment::transaction()
							->setAmount($this->amount())
							->setItemList($this->items())
							->setDescription('Gracias por Comprar en AmericanBoats')
							->setInvoiceNumber(uniqid());
	}
	public function redirectURLs(){
		// Retorna
		$baseURL = url('/');

		return \PaypalPayment::redirectUrls()
							 ->setReturnUrl($baseURL.'/payments/store')
							 ->setCancelUrl($baseURL.'/carrito');
	}
	public function items(){
		$items = [];
		$products = $this->shopping_cart->products()->get();

		foreach ($products as $product ) {
			array_push($items, $product->paypalItem());
		}
		return \PaypalPayment::itemList()->setItems($items);
	}
	public function amount(){
		return \PaypalPayment::amount()->setCurrency('USD')
							->setTotal($this->shopping_cart->totalUSD());
	}
	public function execute($paymentId,$payerID){
		$payment = \PaypalPayment::getById($paymentId,$this->_apiContext);
		$execution = \PaypalPayment::PaymentExecution()->setPayerId($payerID);
		$payment->execute($execution,$this->_apiContext);
		return $payment->execute($execution,$this->_apiContext);
	}

}
