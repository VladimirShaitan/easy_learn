<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends CI_Controller
{
	function  __construct() {
		parent::__construct();
		$this->load->library('paypal_lib');
		$this->load->model('Siteconfigs_model');
		$this->load->model('product');

	}
	
	function index(){
		$data = array();
		//get products data from database
        $data['products'] = $this->product->getRows();
		//pass the products data to view
		$this->load->view('products/index', $data);
	}
	
	function buy($orderid){
		//Set variables for paypal form
		$returnURL = base_url().'paypal/success'; //payment success url
		$cancelURL = base_url().'paypal/cancel'; //payment cancel url
		$notifyURL = base_url().'paypal/ipn'; //ipn url
		//get particular product data
		$product = $this->product->getRows($orderid);
		//$userID = 4; //current user id
		$logo = base_url().'assets/images/codexworld-logo.png';
		

		$data['configs'] = $this->Siteconfigs_model->get_configs(1);
        $paypal         = $data['configs']['paypal'];
		 

		$this->paypal_lib->add_field('return', $returnURL);
		$this->paypal_lib->add_field('cancel_return', $cancelURL);
		$this->paypal_lib->add_field('notify_url', $notifyURL);
		$this->paypal_lib->add_field('item_name', $product['topic']);
		$this->paypal_lib->add_field('custom', $product['customer']);
		$this->paypal_lib->add_field('item_number',  $product['orderid']);
		$this->paypal_lib->add_field('amount',  $product['amount']);
		$this->paypal_lib->add_field('currency_code', $product['currency']);	
		$this->paypal_lib->add_field('business', $paypal);	

		$this->paypal_lib->image($logo);
		
		$this->paypal_lib->paypal_auto_form();
	}


}