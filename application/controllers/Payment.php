<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . 'libraries/Stripe/lib/Stripe.php');

class Payment extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->model('Paymentmodel');
        $this->load->model('Orders_model');
        $this->load->model('Siteconfigs_model');
        $this->load->model('Product');
        $this->load->library('Stripe.php');
    }
	
	public function index(){
		$this->load->view('stripe/index');
	}
	
	public function process($orderid){

            $data['news_item']      = $this->Orders_model->get_orders($orderid);
                $data['orderid']          = $data['news_item']['orderid'];
                $data['topic']            = $data['news_item']['topic'];
                $data['words']            = $data['news_item']['words'];
                $data['urgency']          = $data['news_item']['urgency'];
                $data['writerpay']        = $data['news_item']['writerpay'];
                $amount   = $data['news_item']['amount'];
                $data['instructions']     = $data['news_item']['instructions'];
                $data['typeofservice']    = $data['news_item']['typeofservice'];
                $data['order_period']     = $data['news_item']['order_period'];
                $data['alias']            = $data['news_item']['alias'];
                $data['currency']            = $data['news_item']['currency'];
                $data['order_status']     = $data['news_item']['order_status'];
                $data['date_posted']      = $data['news_item']['date_posted'];
                $data['customer_name']    = $data['news_item']['customer_name'];
                $data['subject']          = $data['news_item']['subject'];
                $data['preferred_writer'] = $data['news_item']['preferred_writer'];
                $data['customer']         = $data['news_item']['customer'];
                $data['customer_email']   = $data['news_item']['customer_email'];
                $data['client_paid']      = $data['news_item']['client_paid'];
                $data['deadline']         = $data['news_item']['deadline'];
                $data['pages']            = $data['words'] / 250;
                //echo $data['news_item']['currency'];

		try {
            Stripe::setApiKey('sk_test_GUGTYo5Kq7CJJC5oFJhHMn5s');
            $charge = Stripe_Charge::create(array(
                        "amount" => $data['news_item']['orderid'],
                        "currency" => $data['news_item']['currency'],
                        "card" => $this->input->post('access_token'),
                        "description" => $data['news_item']['orderid'],
            ));
            // this line will be reached if no error was thrown above

            if(10){
        $orderid = $data['news_item']['orderid'];
        $data    = array(
                                'client_paid' => "paid"
                        );    
        $this->Product->update_order($data, $orderid);
            }


            $data = array(
                'payment_id' => $charge->id,
                'payment_status' => 'success',
                'total' =>  $amount,
                'currency' => $data['news_item']['currency'],
                'topic' => $data['news_item']['topic'],
                'payer_name' => $data['news_item']['customer_name'],
                'payeremail' => $data['news_item']['customer_email'],
                'orderid' => $data['news_item']['orderid'],
                'writer_id' => $data['news_item']['customer'],
                'city' => 'New York',
                'created_on' => date('Y-m-d H:i:s'),
                'updated_on' => date('Y-m-d H:i:s')
            );
            $response = $this->Paymentmodel->insert($data);

            if ($response) {
                echo json_encode(array('status' => 200, 'success' => 'Payment successfully completed.'));
                exit();
            } else {
                echo json_encode(array('status' => 500, 'error' => 'Something went wrong. Try after some time.'));
                exit();
            }

        }



         catch (Stripe_CardError $e) {
            echo json_encode(array('status' => 500, 'error' => STRIPE_FAILED));
            exit();
        } catch (Stripe_InvalidRequestError $e) {
            // Invalid parameters were supplied to Stripe's API
            echo json_encode(array('status' => 500, 'error' => $e->getMessage()));
            exit();
        } catch (Stripe_AuthenticationError $e) {
            // Authentication with Stripe's API failed
            echo json_encode(array('status' => 500, 'error' => AUTHENTICATION_STRIPE_FAILED));
            exit();
        } catch (Stripe_ApiConnectionError $e) {
            // Network communication with Stripe failed
            echo json_encode(array('status' => 500, 'error' => NETWORK_STRIPE_FAILED));
            exit();
        } catch (Stripe_Error $e) {
            // Display a very generic error to the user, and maybe send
            echo json_encode(array('status' => 500, 'error' => STRIPE_FAILED));
            exit();
        } catch (Exception $e) {
            // Something else happened, completely unrelated to Stripe
            echo json_encode(array('status' => 500, 'error' => STRIPE_FAILED));
            exit();
        } 


                        //send email to admin
                $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('adminemail'));
                $smtp_port               = $configs['smtp_configs']['smtp_port'];
                $smtp_host               = $configs['smtp_configs']['smtp_host'];
                $smtp_user               = $configs['smtp_configs']['smtp_user'];
                $smtp_name               = $configs['smtp_configs']['smtp_name'];
                $smtp_pass               = $configs['smtp_configs']['smtp_pass'];
                $admin_email             = $configs['smtp_configs']['admin_email'];
                $protocol                = $configs['smtp_configs']['protocol'];
                $config                  = Array(
                        'protocol' => $protocol,
                        'smtp_host' => $smtp_host,
                        'smtp_port' => $smtp_port,
                        'smtp_user' => $smtp_user,
                        'smtp_pass' => $smtp_pass,
                        'mailtype' => 'html'
                );
                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                
                //Add file directory if you need to attach a file
                //$this->email->attach($file_dir_name);
                
                //send email to admin to notify of new project
                $this->email->from($smtp_user, $smtp_name);
                $this->email->to($admin_email);
                
                $this->email->subject("Congratulations Payment receive for order №" . $data['product_id']);
                $this->email->message($str1);
                
                if ($this->email->send()) {
                        //Success email Sent
                        //echo $this->email->print_debugger();
                } else {
                        //Email Failed To Send
                        // echo $this->email->print_debugger();
                }
                
                //send email to user to confirm posted sucessfully 
                
                                $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('custemail'));
                $smtp_port               = $configs['smtp_configs']['smtp_port'];
                $smtp_host               = $configs['smtp_configs']['smtp_host'];
                $smtp_user               = $configs['smtp_configs']['smtp_user'];
                $smtp_name               = $configs['smtp_configs']['smtp_name'];
                $smtp_pass               = $configs['smtp_configs']['smtp_pass'];
                $admin_email             = $configs['smtp_configs']['admin_email'];
                $protocol                = $configs['smtp_configs']['protocol'];
                $config                  = Array(
                        'protocol' => $protocol,
                        'smtp_host' => $smtp_host,
                        'smtp_port' => $smtp_port,
                        'smtp_user' => $smtp_user,
                        'smtp_pass' => $smtp_pass,
                        'mailtype' => 'html'
                );
                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");


                $user_email = $this->session->userdata('email');
                $this->email->from($smtp_user, $smtp_name);
                $this->email->to($user_email);
                
                $this->email->subject("Payment for Order №" . $this->input->post('orderid') . ' was sucessful');
                $this->email->message($str2);
                
                if ($this->email->send()) {
                        //Success email Sent
                        //echo $this->email->print_debugger();
                } else {
                        //Email Failed To Send
                        // echo $this->email->print_debugger();
                }

	}
	public function success(){
		$this->load->view('stripe/success');
	}
}
