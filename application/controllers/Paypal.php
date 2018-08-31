<?php
if (!defined('BASEPATH'))
        exit('No direct script access allowed');

class Paypal extends CI_Controller
{
        function __construct()
        {
                parent::__construct();
                $this->load->library('paypal_lib');
                 $this->load->model('Siteconfigs_model');
                $this->load->model('product');
        }
        
        function success()
        {
                //get the transaction data
                $paypalInfo = $this->input->get();
                
                $data['item_number']   = $paypalInfo['item_number'];
                $data['txn_id']        = $paypalInfo["tx"];
                $data['payment_amt']   = $paypalInfo["amt"];
                $data['currency_code'] = $paypalInfo["cc"];
                $data['status']        = $paypalInfo["st"];
                
                //pass the transaction data to view
                redirect('project/view/' . $paypalInfo['item_number']);
                //$this->load->view('paypal/success', $data);
        }
        
        function cancel()
        {
                $this->load->view('paypal/cancel');
        }
        
        function ipn()
        {
                //paypal return transaction details array
                $paypalInfo = $this->input->post();
                
                $data['user_id']        = $paypalInfo['custom'];
                $data['product_id']     = $paypalInfo["item_number"];
                $data['txn_id']         = $paypalInfo["txn_id"];
                $data['payment_gross']  = $paypalInfo["payment_gross"];
                $data['currency_code']  = $paypalInfo["mc_currency"];
                $data['payer_email']    = $paypalInfo["payer_email"];
                $data['payment_status'] = $paypalInfo["payment_status"];
                
                $paypalURL = $this->paypal_lib->paypal_url;
                $result    = $this->paypal_lib->curlPost($paypalURL, $paypalInfo);
                
                //check whether the payment is verified
                if (preg_match("/VERIFIED/i", $result)) {
                        //insert the transaction data into the database
                        $this->product->insertTransaction($data);
                        
                        $orderid = $paypalInfo["item_number"];
                        $data    = array(
                                'client_paid' => "paid"
                        );
                        
                        $this->product->update_order($data, $orderid);
                }
                // define the fields to be passed
                $orderuser_id        = $paypalInfo['custom'];
                $orderproduct_id    = $paypalInfo["item_number"];
                $Ordertxn_id         = $paypalInfo["txn_id"];
                $orderpayment_gross  = $paypalInfo["payment_gross"];
                $ordercurrency_code  = $paypalInfo["mc_currency"];
                $orderpayer_email    = $paypalInfo["payer_email"];
                        $orderid = $paypalInfo["item_number"];
// get the email details here and eval so that the codes can be read. 
 $data['msg'] = $this->Siteconfigs_model->msg_config('new_order_paid');
 $msg_body_admin = $data['msg']['msg_body_admin'];
 $msg_body_client = $data['msg']['msg_body_client'];

//this replaces all the double quotes with single quotes since when double quotes are left, they give an error. 
$msg_body_admin = str_replace('"', "'", $msg_body_admin);
$msg_body_client = str_replace('"', "'", $msg_body_client);

// This evals so that the variables in the codes are read
eval("\$str1 = \"$msg_body_admin\";");
//echo $str1; 


// This evals so that the variables in the codes are read
eval("\$str2 = \"$msg_body_client\";");
//echo $str2; 

    
                
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
}