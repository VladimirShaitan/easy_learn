<?php defined('BASEPATH') OR exit('No direct script access allowed');
 require_once("Pre_loader.php");
class Order extends  Pre_loader
{
        
        public function __construct()
        {
                @parent::__construct();
                $this->load->model('Orders_model');
                $this->load->model('Ordersed_model');
                $this->load->model('Upsells_model');
                $this->load->model('Adminorders_model');
                $this->load->model('Adminusers_model');
                $this->load->model('User_model');
                $this->load->model('Messages_model');
                $this->load->model('Siteconfigs_model');
                $this->load->library('paypal_lib');
                $this->load->model('product');
                $this->load->helper('url_helper');
                $this->load->helper('url');
                $this->load->library(array(
                        'form_validation',
                        'session'
                ));
                $this->load->helper('directory');
                $this->load->library('upload');
                 $this->load->library('pagination');


                if (!$this->session->userdata('writer_id')) {
                        redirect('/user/index');
                };
               

        }
                public function do_ajax()
        {
                $name=$this->input->post("name"); //get posted data
                echo '10'; //return response
        }

        public function search1()
        {
                $this->load->view('orders/search');
        }
        
        function search()
        {
                $data['query'] = $this->Orders_model->get_search();
                $this->load->view('orders/books', $data);
        }
        
        
        
        public function index()
        {
               redirect('order/create');

        }
        
        
        //this is the method for rendering the view of any individual order
        
        public function buy($orderid)
        {
                //Set variables for paypal form
                $returnURL = base_url() . 'paypal/success'; //payment success url
                $cancelURL = base_url() . 'paypal/cancel'; //payment cancel url
                $notifyURL = base_url() . 'paypal/ipn'; //ipn url
                //get particular product data
                $product   = $this->product->getRows($orderid);
                $userID    = 1; //current user id
                $logo      = base_url() . 'assets/images/codexworld-logo.png';
                
                $this->paypal_lib->add_field('return', $returnURL);
                $this->paypal_lib->add_field('cancel_return', $cancelURL);
                $this->paypal_lib->add_field('notify_url', $notifyURL);
                $this->paypal_lib->add_field('item_name', $product['name']);
                $this->paypal_lib->add_field('custom', $userID);
                $this->paypal_lib->add_field('item_number', $product['orderiid']);
                $this->paypal_lib->add_field('amount', $product['price']);
                $this->paypal_lib->image($logo);
                
                $this->paypal_lib->paypal_auto_form();
        }
        



public function view($orderid = NULL) {
    $is_ajax = $this->input->is_ajax_request();
    $dif                    = $this->config->item('uploads').'/' . $orderid;
    $data['news_item']      = $this->Orders_model->get_orders($orderid);
    $data['uploaded_files'] = directory_map($dif);
          
    $data['auction']          = $this->Orders_model->auct($orderid);         
    $data['orderid']          = $data['news_item']['orderid'];
    // $data['plan_status']      = $data['news_item']['yesno'];
    $data['pref_writer']      = $data['news_item']['preferred_writer'];
    $data['fine']             = $data['news_item']['fine'];
    $data['topic']            = $data['news_item']['topic'];
    $data['words']            = $data['news_item']['words'];
    $data['urgency']          = $data['news_item']['urgency'];
    $data['writerpay']        = $data['news_item']['writerpay'];
    $data['amount']           = $data['news_item']['amount'];
    $data['instructions']     = $data['news_item']['instructions'];
    $data['typeofservice']    = $data['news_item']['typeofservice'];
    $data['deadline_writers'] = $data['news_item']['deadline_writers'];
    $data['order_period']     = $data['news_item']['order_period'];
    $data['referencing_style']= $data['news_item']['referencing_style'];
    $data['alias']            = $data['news_item']['alias'];
    $data['currency']         = $data['news_item']['currency'];
    $data['academic_level']   = $data['news_item']['academic_level'];
    $data['order_status']     = $data['news_item']['order_status'];
    $data['date_posted']      = $data['news_item']['date_posted'];
    $data['customer_name']    = $data['news_item']['customer_name'];
    $data['subject']          = $data['news_item']['subject'];
    $data['preferred_writer'] = $data['news_item']['preferred_writer'];
    $data['customer']         = $data['news_item']['customer'];
    $data['customer_email']   = $data['news_item']['customer_email'];
    $data['client_paid']      = $data['news_item']['client_paid'];
    $data['sources']          = $data['news_item']['sources'];
    $data['sources']          = $data['news_item']['sources'];
    $data['deadline']         = $data['news_item']['deadline'];
    $data['writerpay']        = $data['news_item']['writerpay'];
    $data['amount']           = $data['news_item']['amount'];
    $data['accepted']         = $data['news_item']['writer_accept_order'];
    $data['notification_sent'] = $data['news_item']['notification_sent'];
    $data['pages']            = $data['words'];
    $data['half_work']        = $data['news_item']['half_work'];
    $data['all_work']         = $data['news_item']['all_work'];
    $data['plan_age']         = $data['news_item']['plan'];
    $data['oplata']           = $data['news_item']['oplata'];
    $data['doplata']          = $data['news_item']['doplata'];
    $data['doplata_status']   = $data['news_item']['doplata_status'];
    $data['plan']             = $data['news_item']['yesno'];
    $data['dorabotka']        = $data['news_item']['dorabotka'];
    $data['manager_id']       = $data['news_item']['manager_id'];
    $data['ses']              = $this->session;
    $customer                 = $data['news_item']['customer'];
    $data['avtor_doplata']    = $data['news_item']['avtor_doplata'];

    $loggedin         = $this->session->userdata('writer_id');
    $preferred_writer = $data['news_item']['preferred_writer'];
    // This laods the header of the page
    $this->load->view('template/header');
    $this->load->view('template/sidebar-user');
                
    // this is the view that the user is not logged in. This is for public view on the front end. 
    if (!$this->session->userdata('writer_id')) {
            $this->load->view('orders/openorder', $data);
    }
                
    // DO dome work, only load necessary on necessary pages, and slit it up for easy understanding
    // This area will be furthered down to incorprate assigned order to allow users uplaod file for assigned only, compepleted, revision,
    $data['data']         = $this->Adminorders_model->getwriter_requests($orderid);
    // $data['messages']     = $this->Messages_model->get_messages($orderid);
    $data['mes_cl_wr']     = $this->Messages_model->get_mes_cl_wr($orderid, 999999, 'manager');
    $data['mes_manager_wr']     = $this->Messages_model->get_mes_cl_wr($orderid, 999999, 'zakaz');
    $data['mes_manager_client']     = $this->Messages_model->get_mes_cl_wr($orderid, 999999, 'avtor');
    $data['order_files']  = $this->Orders_model->order_materials($orderid);
    $data['order_plan']  = $this->Orders_model->order_plan($orderid);
    $data['order_essays']  = $this->Orders_model->order_essays($orderid);
    $data['order_second']  = $this->Orders_model->order_second($orderid);
    $data['order_check']  = $this->Orders_model->order_check($orderid);
    $data['order_unic']  = $this->Orders_model->order_unic($orderid);
    $data['upsell_activated']  = $this->Upsells_model->upsell_activated($orderid);
    $data['countedupsells']  = count($data['upsell_activated']);

    $data['upsells']  = $this->Orders_model->upsells();
    $data['order_rating'] = $this->Messages_model->get_ratings($orderid);

    //This is suppose user is logged in can view this. then it will check .
    if ($this->session->userdata('writer_id')) {
            
        // suppose the user is logged in, and this order was made by the logged in user, s/he will be able to edit, view bids, approve a bid, add files, message admin, cannot apply for this order. The variables customer and loggedin are defined above in this method. 
        if ($customer == $loggedin) {
                $this->load->view('customer/client-viewmyorder', $data);
        }
        
        // this check if the user is logged in and views an order that he did not make, we render this. The logged in user can bid for these orders. 
        if ($customer !== $loggedin) {
  
            // suppose the logged in is assigned this task, load this. the writer can uplaod files, write messages. 
            if ($preferred_writer == $loggedin && $this->config->item('opskill')) {
                    $this->load->view('freelancer/writer-viewmyorder', $data);
            }
            
            //suppose the logged in is not assigned this, we assume the order is in open projects. The user can only bid, cannot uplaod files, cannot write messages. 
            if ($preferred_writer !== $loggedin) {
                    
                // checking if writer's account is active or not. suppose the writer's account is not active, he will not be able to apply for the order. will see the order as unlogged in sees it. 
                
                if ($this->session->userdata('writer_status') !== 'Active') {
                   
                        $this->load->view('pages/view-order-notwriter', $data);
                } else {
                        
                    // check is the user is not writer, s/he cannot apply for orders. other user levesl are administrator and clients, and editors maybe in future. 
                    if ($this->session->userdata('user_level') !== 'writer') {
                            // тут менял
                            // $this->load->view('orders/openorder', $data);
                        $this->load->view('customer/client-viewmyorder', $data);

                            
                    } else {
                            // this means suppose the user is logged in, order not made by him/her, accoutn activated, 
                            $this->load->view('freelancer/writer-viewopenorder', $data);
                    }
                        
                }
                    
                    
            }
                
                
        }
            
    }
                


    //$this->load->view('template/orders-sidebar', $data);
    
    // THis laods the footer of the site. You cna pass data to it if there is something that such data will achive
    $this->load->view('template/footer');


    // start the email notification suppose this is the first time view of this order
if(!$is_ajax){
    if($data['notification_sent'] == 0) {
        // section to send email
    $siteurl             = base_url();
    $orderdirectlink     = base_url() . 'order/view/' . $data['orderid'] ;
    $ordertopic          = $data['topic'];
    $orderclient         = $data['customer'];
    $orderorderid        = $data['orderid'];
    $ordersubject        = $data['subject'];
    $orderwords          = $data['words'];
    $orderinstructions   = $data['instructions'];
    $orderurgency        = $data['urgency'];
    $orderamount         = $data['amount'];
    $orderorder_status   = $data['order_status'];
    $orderreferencing    = $data['referencing_style'];
    $ordercustomer_email = $data['customer_email'];
    $orderacademic_level = $data['academic_level'];
    $ordersources        = $data['sources'];
    $orderclient_paid    = $data['client_paid'];
    $orderwriterpay      = $data['writerpay'];
    $orderdeadline       = $data['deadline'];
    $ordercustomer_name  = $data['customer_name'];

    
    // get the email details here and eval so that the codes can be read. 
    $data['msg']     = $this->Siteconfigs_model->msg_config('new_order_placed');
    $msg_body_admin  = $data['msg']['msg_body_admin'];
    $msg_body_client = $data['msg']['msg_body_client'];
    $msg_body_writer = $data['msg']['msg_body_writer'];
    
    
    
    //this replaces all the double quotes with single quotes since when double quotes are left, they give an error. 
    $msg_body_admin  = str_replace('"', "'", $msg_body_admin);
    $msg_body_client = str_replace('"', "'", $msg_body_client);
    $msg_body_writer = str_replace('"', "'", $msg_body_writer);
    
    
    // This evals so that the variables in the codes are read
    eval("\$str1 = \"$msg_body_admin\";");
    //echo $str1; 
    
    
    // This evals so that the variables in the codes are read
    eval("\$str2 = \"$msg_body_client\";");
    //echo $str2; 
    
    
    // This evals so that the variables in the codes are read
    eval("\$str3 = \"$msg_body_writer\";");
    //echo $str3; 
                    
                                
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
            
            $this->email->newSubject("Новый заказ #" .  $data['orderid'] . ' был успешно размещен');
            $this->email->message($str1);
            
            if ($this->email->send()) {
                    //Success email Sent
                    //echo $this->email->print_debugger();
            } else {
                    //Email Failed To Send
                    // echo $this->email->print_debugger();
            }
            
            
            // send message to client
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

            $this->email->from($smtp_user, $smtp_name);
            $this->email->to($data['customer_email']);
            
            $this->email->newSubject("Ваш заказ №" .  $data['orderid'] . ' был успешно принят');
            $this->email->message($str2);
            if(!empty($data['customer_email'])){
                if ($this->email->send()) {
                        //Success email Sent
                        //echo $this->email->print_debugger();
                } else {
                        //Email Failed To Send
                        // echo $this->email->print_debugger();
                }
            }                               


                                //send email to admin
  $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('writeemail'));
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
        //notify all other writers of a new order


        $get_writers= $this->Adminusers_model->my_subj_get_writers($ordersubject);
        if(!empty($get_writers)){
        foreach ($get_writers as $writers){


        $this->email->from($smtp_user, $smtp_name);
        $this->email->to($writers['email']);
        
        $this->email->newSubject("Поступил новый заказ на оценку");
        $this->email->message($str3);
        if(!empty($writers['email'])){
            if ($this->email->send()) {
                    //Success email Sent
                    //echo $this->email->print_debugger();
            } else {
                    //Email Failed To Send
                    // echo $this->email->print_debugger();
            }
        }    

     }
    }
        //end send email
}

        // update the database to note its viewed

    $orderid = $data['orderid'];

        $data = array(
        'notification_sent'=> 1,
        );

       $this->Ordersed_model->order_update($orderid,$data);
    }

    // end email send
}
                
       
 
        public function cview($orderid = NULL)
        {

            

                $dif                    = $this->config->item('uploads').'/' . $orderid;
                $data['news_item']      = $this->Orders_model->get_orders($orderid);
                $data['uploaded_files'] = directory_map($dif);
                
                
                if (empty($data['news_item'])) {
                        $this->index();
                }


                
                $data['orderid']          = $data['news_item']['orderid'];
                $data['topic']            = $data['news_item']['topic'];
                $data['words']            = $data['news_item']['words'];
                $data['urgency']          = $data['news_item']['urgency'];
                $data['writerpay']        = $data['news_item']['writerpay'];
                $data['amount']           = $data['news_item']['amount'];
                $data['instructions']     = $data['news_item']['instructions'];
                $data['typeofservice']    = $data['news_item']['typeofservice'];
                $data['order_period']     = $data['news_item']['order_period'];
                $data['referencing_style']= $data['news_item']['referencing_style'];
                $data['doplata_status']   = $data['news_item']['doplata_status'];
                $data['alias']            = $data['news_item']['alias'];
                $data['currency']         = $data['news_item']['currency'];
                $data['academic_level']   = $data['news_item']['academic_level'];
                $data['order_status']     = $data['news_item']['order_status'];
                $data['date_posted']      = $data['news_item']['date_posted'];
                $data['customer_name']    = $data['news_item']['customer_name'];
                $data['subject']          = $data['news_item']['subject'];
                $data['preferred_writer'] = $data['news_item']['preferred_writer'];
                $data['customer']         = $data['news_item']['customer'];
                $data['customer_email']   = $data['news_item']['customer_email'];
                $data['client_paid']      = $data['news_item']['client_paid'];
              $data['sources']          = $data['news_item']['sources'];
                $data['deadline']         = $data['news_item']['deadline'];
                $data['writerpay']        = $data['news_item']['writerpay'];
                $data['amount']           = $data['news_item']['amount'];
                $data['notification_sent']= $data['news_item']['notification_sent'];
                $data['pages']            = $data['words'];
                $data['half_work']        = $data['news_item']['half_work'];
                $data['all_work']        = $data['news_item']['all_work'];
                $data['plan']        = $data['news_item']['plan'];
                $data['dorabotka']        = $data['news_item']['dorabotka'];
               

                $this->load->view('template/header', $data);  
                $this->load->view('template/sidebar-user');
             

                $data['data']         = $this->Adminorders_model->get_requests($orderid);
                $data['messages']     = $this->Messages_model->get_messages($orderid);
                $data['order_files']  = $this->Orders_model->order_materials($orderid);
                $data['order_essays']  = $this->Orders_model->order_essays($orderid);
                $data['order_second']  = $this->Orders_model->order_second($orderid);
                $data['upsell_activated']  = $this->Upsells_model->upsell_activated($orderid);
                $data['countedupsells']  = count($data['upsell_activated']);

                $data['upsells']  = $this->Orders_model->upsells();
                $data['order_rating'] = $this->Messages_model->get_ratings($orderid);
                $this->load->view('customer/client-viewmyorder', $data);
                $this->load->view('template/footer');

                                // start the email notification suppose this is the first time view of this order
                                if($data['notification_sent'] == 0){

                    // section to send email

                                $siteurl             = base_url();
                                $orderdirectlink     = base_url() . 'order/view/' . $data['orderid'] ;
                                $ordertopic          = $data['topic'];
                                $orderclient         = $data['customer'];
                                $orderorderid        = $data['orderid'];
                                $ordersubject        = $data['subject'];
                                $orderwords          = $data['words'];
                                $orderinstructions   = $data['instructions'];
                                $orderurgency        = $data['urgency'];
                                $orderamount         = $data['amount'];
                                $orderorder_status   = $data['order_status'];
                                $orderreferencing    = $data['referencing_style'];
                                $ordercustomer_email = $data['customer_email'];
                                $orderacademic_level = $data['academic_level'];
                                $ordersources        = $data['sources'];
                                $orderclient_paid    = $data['client_paid'];
                                $orderwriterpay      = $data['writerpay'];
                                $orderdeadline       = $data['deadline'];
                                $ordercustomer_name  = $data['customer_name'];
                                
                                // get the email details here and eval so that the codes can be read. 
                                $data['msg']     = $this->Siteconfigs_model->msg_config('new_order_placed');
                                $msg_body_admin  = $data['msg']['msg_body_admin'];
                                $msg_body_client = $data['msg']['msg_body_client'];
                                $msg_body_writer = $data['msg']['msg_body_writer'];
                                
                                
                                
                                //this replaces all the double quotes with single quotes since when double quotes are left, they give an error. 
                                $msg_body_admin  = str_replace('"', "'", $msg_body_admin);
                                $msg_body_client = str_replace('"', "'", $msg_body_client);
                                $msg_body_writer = str_replace('"', "'", $msg_body_writer);
                                
                                
                                // This evals so that the variables in the codes are read
                                eval("\$str1 = \"$msg_body_admin\";");
                                //echo $str1; 
                                
                                
                                // This evals so that the variables in the codes are read
                                eval("\$str2 = \"$msg_body_client\";");
                                //echo $str2; 
                                
                                
                                // This evals so that the variables in the codes are read
                                eval("\$str3 = \"$msg_body_writer\";");
                                //echo $str3; 
                                
                                
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
                                
                                $this->email->newSubject("Новый заказ №" .  $data['orderid'] . ' был успешно размещен');
                                $this->email->message($str1);
                                
                                if ($this->email->send()) {
                                        //Success email Sent
                                        //echo $this->email->print_debugger();
                                } else {
                                        //Email Failed To Send
                                        // echo $this->email->print_debugger();
                                }
                                
                                
                                // send message to client

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


                                $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($data['customer_email']);
                                
                                $this->email->newSubject("Ваш заказ №" .  $data['orderid']. ' был успешно принят');
                                $this->email->message($str2);
                                
                                if ($this->email->send()) {
                                        //Success email Sent
                                        //echo $this->email->print_debugger();
                                } else {
                                        //Email Failed To Send
                                        // echo $this->email->print_debugger();
                                }
                               


                                //send email to writer
                             $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('writer_email'));
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


                                //notify all other writers of a new order
                                                

                                $get_writers= $this->Adminusers_model->active_writers();

                                foreach ($get_writers as $writers){


                                 $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($writers['email']);
                                
                                $this->email->newSubject("Новый заказ №" . $data['orderid'] . ' был успешно размещен!');
                                $this->email->message($str3);
                                
                                if ($this->email->send()) {
                                        //Success email Sent
                                        //echo $this->email->print_debugger();
                                } else {
                                        //Email Failed To Send
                                        // echo $this->email->print_debugger();
                                }

                             }
                    //end send email


                    // update the database to note its viewed

                $orderid = $data['orderid'];

                    $data = array(
                    'notification_sent'=> 1,
                    );

                   $this->Ordersed_model->order_update($orderid,$data);
                }
                // end email send
        }
                
       
 
        public function subject($subject = NULL)
        {
                $subject['subject'] = $this->Orders_model->get_subject($subject);
                
                if (empty($subject['subject'])) {
                        $this->index();
                }
                
                $subject['subject'] = $subject['subject']['subject'];
        }
        
        public function create()
        {


               $writerid = $this->session->userdata('writer_id');
                $data['profile']        = $this->User_model->my_profile($writerid);
                $data['writer_id']      = $data['profile']['writer_id'];
                $data['email']          = $data['profile']['email'];
                $data['primaryphone']   = $data['profile']['primaryphone'];
                $data['firstname']   = $data['profile']['firstname'];
                $data['lastname']   = $data['profile']['lastname'];

               if ($this->input->post('writer_id') && $this->data['ausite']) {
                    $data['order_status']     = 'Assigned';
                    $preferred_writer = $this->input->post('writer_id');
                    $data['preferred_writer'] = $this->input->post('writer_id');
                        
                }
                
                if (!$this->input->post('writer_id')) {
                        
                        $data['preferred_writer'] = '';
                        $data['order_status']     = 'Openproject';
                }

                     $data['max_orderid']       = $this->Orders_model->max_orderid();
                       $max_orderid = $data['max_orderid']['orderid']+1;
                

                if ($this->session->userdata('writer_id')) {
                        $this->load->helper('form');
                        $this->load->library('form_validation');
                        $data['subject']           = $this->Orders_model->get_subject();
                        // $data['pages'] = $this->Orders_model->get_pages(); we replaced the pages by foreach, php
                        $data['urgency']           = $this->Orders_model->get_urgency();
                        $data['ops_coupon']        = $this->Orders_model->ops_coupon();
                        $data['configs']           = $this->Siteconfigs_model->configs();
                        $data['academic_level']    = $this->Siteconfigs_model->academic_level();
                        $data['referencing_style'] = $this->Siteconfigs_model->referencing_style();
                        $data['currency']          = $this->Siteconfigs_model->get_accepted_currency();
                        $data['type_service']      = $this->Siteconfigs_model->type_service();
                        $data['profile']           = $this->User_model->get_profile();
                        $data['title']             = 'Create Order';
                        $name_type                 = 'material';

                        $this->form_validation->set_rules('topic', 'topic', 'required');
                        $this->form_validation->set_rules('subject', 'subject', 'required');
                        $this->form_validation->set_rules('words', 'words', 'required');
                        $this->form_validation->set_rules('referencing_style', 'referencing_style', 'required');
                        $this->form_validation->set_rules('urgency', 'urgency', 'required');
                        $this->form_validation->set_rules('amount', 'amount', '');
                       // $this->form_validation->set_rules('customer_email', 'customer_email', 'required');
                                 $data['coupon'] = $this->Siteconfigs_model->coupon(1);
                                $data['coupon_value'] = $data['coupon']['coupon_value'];
                                $data['coupon_name'] = $data['coupon']['coupon_name'];
                        
                        if (!$this->input->post('words') || $this->form_validation->run() === FALSE) {
                                $this->load->view('template/header', $data);
                                
                                
                                $data['customer_price'] = $this->Siteconfigs_model->customer_own_price(1);
                                $customer_price         = $data['customer_price']['client_own_price'];
                          $this->load->view('template/sidebar-user');
                                if ($customer_price == 'YES') {
                                        $this->load->view('pages/unpriced-loggedin');
                                
                                }
                                if ($customer_price == 'NO') {
                                        $this->load->view('pages/create-priced-order-loggedin');
                                         
                                }
                                $this->load->view('template/orders-sidebar');
                                $this->load->view('template/footer');
                                
                        } else {
                                
                                
                                
                                $inputpage            = $this->input->post('words');
                                $data['select_words'] = $this->Siteconfigs_model->select_words(1);
                                $wordsperpage         = $data['select_words']['wordsperpage'];
                                $time_difference      = $data['select_words']['time_difference'];
                                $words                =  $this->input->post('words');
                                                     
                                $pvalue         = $this->input->post('urgency');
                                $date_posted     = date('Y-m-d H:i:s');
                                $data['urgency'] = $this->Siteconfigs_model->geturgency($pvalue);
                                $urgency         = $data['urgency']['urgency'];
                                $urgency_writers = $data['urgency']['urgency']*$time_difference;
                                $duration        = $data['urgency']['duration'];
                               // $time1           = $urgency. " ". $duration;
                                $time1 = $pvalue;
                                $time_writer     = round($urgency_writers). " ". $duration;
                                
                                $deadline     = date('Y-m-d H:i:s', strtotime($time1, strtotime($date_posted)));
                                $deadline_writers     = date('Y-m-d H:i:s', strtotime($time_writer, strtotime($date_posted)));
                                $title        = $this->input->post('topic');
                                $alias        = preg_replace("/[^\w]/", "-", $title);
                                $alias        = str_replace('----', '-', $alias); // Replaces all spaces with hyphens.
                                $alias        = str_replace('---', '-', $alias); // Replaces all spaces with hyphens.
                                $alias        = str_replace('--', '-', $alias); // Replaces all spaces with hyphens.
                                $alias        = $max_orderid.'-'.$alias . '.html'; // Replaces all spaces with hyphens.
                                $instructions = $this->input->post('instructions');
                                $clean_instruction = strip_tags($instructions,'<p><div><h1><h2><h3><ul><ol><li><h4><h5><h6><em><strong><table><tr><tbody><td><i>');
                                //making field pick proper values from pvalues
                                $order_period = $this->config->item('order_period');
                                if (1) {
                                        $data = array(
                                                'topic' => $this->input->post('topic'),
                                                'customer' => $this->session->userdata('writer_id'),
                                                'subject' => preg_replace("/[0-9]/", "", $this->input->post('subject')),
                                                 'academic_level' => preg_replace("/[^\\/\-a-z\s]/i", "", $this->input->post('academic_level')),
                                                'currency' => preg_replace("/[^a-z-]/i", "", $this->input->post('currency')),
                                                'words' => $words,
                                                'instructions' => $clean_instruction,
                                                'amount' => $this->input->post('amount'),
                                                'date_posted' => date('Y-m-d H:i:s'),
                                                'urgency' => $time1,
                                                'order_status' => $this->input->post('order_status'),
                                                'referencing_style' => $this->input->post('referencing_style'),
                                                'customer_email' => $data['email'],
                                                'sources' => $this->input->post('sources'),
                                                'client_paid' => 'unpaid',
                                                'writerpaid' => 'unpaid',
                                                'writerpay' => $this->input->post('usdamount')*$this->input->post('writeramount'),
                                                'deadline' => $deadline,
                                                'deadline_writers' => $deadline_writers,
                                                'order_period' => $order_period,
                                                'project_type' => 'project',
                                                'alias' => $alias,
                                                'preferred_writer' => $this->input->post('preferred_writer'),
                                                'customer_name' => $this->input->post('customer_name'),
                                                'viewed' => 'false',
                                                'yesno' => 'need_to_choose'
                                                
                                        );
                                        
                                        $this->Orders_model->create_order($data);
                                        
                                }
                                

                                
                        if ($this->input->post('submit') && !empty($_FILES['multipleFiles']['name'][0]) ) {
                                        
                                        // count the number of files uploades
                                        $number_of_files = count($_FILES['multipleFiles']['name']);
                                        
                                        //store global files to local variable
                                        
                                        $files        = $_FILES;
                                        $orderfile    = $max_orderid;
                                        $order_period = $this->config->item('order_period');

                                        $dif          = $this->config->item('uploads').'/' . $order_period . '/' . $orderfile;
                                        // make sure the folder exists else create 
                                        if (!is_dir($dif)) {
                                                mkdir($dif, 0777, true);
                                        }
                                        
                                        // upload files one by one
                                        
                    for ($i = 0; $i < $number_of_files; $i++) {
                            $_FILES['multipleFiles']['name']     = $files['multipleFiles']['name'][$i];
                            $_FILES['multipleFiles']['type']     = $files['multipleFiles']['type'][$i];
                            $_FILES['multipleFiles']['tmp_name'] = $files['multipleFiles']['tmp_name'][$i];
                            $_FILES['multipleFiles']['error']    = $files['multipleFiles']['error'][$i];
                            $_FILES['multipleFiles']['size']     = $files['multipleFiles']['size'][$i];

                                 $fname         = $files['multipleFiles']['name'][$i];
                                $file_name = pathinfo($fname, PATHINFO_FILENAME);
                                $ext = pathinfo($fname, PATHINFO_EXTENSION);
                                             // $newfile_name=   $fname; 
                                $newfile_name[$i] =   $name_type.'_'.rand(0, 100).'_'.$i.'.'.$ext;
                                //$newfile_name= preg_replace('/[^\w]/', '_', $file_name);
                                                
                                    $config['upload_path']   = $dif;
                                    $config['allowed_types'] = 'pdf|doc|dot|docx|docm|dotx|dotm|docb|xls|xlsx|xlt|xlm|xlsm|xltx|xltm|csv|txt|rtf|htm|html|zip|mp3|mp4|wma|mpg|flv|avi|jpg|jpeg|png|gif|pptx|pptm|ppt|pot|potx|potm|ppam|ppsx|ppsm|sldx|sldm|accdb|accde|accdt|accdr|csv|rar|';
                                    $config['max_size']      = '233232';
                                    $config['max_width']     = '233232';
                                    $config['max_height']    = '233232';
                                    $config['file_name']    = $newfile_name[$i]; 
                                    $config['overwrite']     = TRUE;
                                    $config['remove_spaces'] = TRUE;
                                    
                                    // $this->load-library('upload', $config);
                                    $this->upload->initialize($config);
                                    
                                    if (!$this->upload->do_upload('multipleFiles')) {
                                            $error = array(
                                                    'error' => $this->upload->display_errors()
                                            );
                                    } else {
                                            $data = array(
                                                    'upload_data' => $this->upload->data()
                                            );
                                            //  $this->Orders_model->order_files($data);
                                    }
                                    
                                    //print_r($this->upload->data());
                                }
                                        
                                        
                                        
                        for ($i = 0; $i < $number_of_files; $i++) {
                            
                            // echo "<pre>";
                            // print_r($files['multipleFiles']['name'][$i]);
                            // if(empty($files['multipleFiles']['name'][$i])){
                            //     echo '13123';
                            // }
                            // echo "<pre>";

                            if(!empty($files['multipleFiles']['name'][$i])) {

                                $fname         = $files['multipleFiles']['name'][$i];
                                $file_name     = str_replace(' ', '_', $fname);
                                $uploader_name = $this->session->userdata('firstname').' '.$this->session->userdata('lastname');
                                
                                //////////// do some work here to enter content into database for materials and essays. stopepd here
                                
                                $orderfile    = $max_orderid;
                                $order_period = $this->config->item('order_period');
                                //$filename = base_url().''.$dif.'/'.$file_name;// or /var/www/html/file.docx
                                $filename     = $this->config->item('uploads').'/' . $order_period . '/' . $orderfile . '/' . $file_name; // or /var/www/html/file.docx


                                $fname         = $files['multipleFiles']['name'][$i];
                                $file_name = pathinfo($fname, PATHINFO_FILENAME);
                                $ext = pathinfo($fname, PATHINFO_EXTENSION);

                                //$newfile_name= preg_replace('/[^\w]/', '_', $file_name);
                                // $newfile_name=    $fname ;  
                                            
                                $dbfile_name  = $newfile_name[$i];


                                        $data = array(
                                                'file_name' => $files['multipleFiles']['name'][$i],
                                                'file_size' => $files['multipleFiles']['size'][$i],
                                                'tmp_name' => $dbfile_name,
                                                'file_type' => $files['multipleFiles']['type'][$i],
                                                'upload_date' => date('d.m.Y H:i:s'),
                                                'order_id' => $max_orderid,
                                                'upload_type' => $this->input->post('upload_type'),
                                                'alias' => $alias,
                                                'uploader_name' => $uploader_name,
                                                'uploaded_by' => $this->session->userdata('writer_id')
                                                
                                        );
                                        $this->Orders_model->order_files($data);

                                        }
                                    }
                                }
                                      
                     $data['max_orderid']       = $this->Orders_model->max_orderid();
                       $max_orderid = $data['max_orderid']['orderid'];
                                redirect('order/view/' . $max_orderid . '#neworder');
                                
                        }
                }
                
                else {
                        $this->load->view('template/header');
                        $this->load->view('login');
                        $this->load->view('template/footer');
                }
        }
        


        
        public function edit($orderid = NULL)
        {
                $data['news_item'] = $this->Orders_model->get_orders($orderid);
                $data['profile']   = $this->User_model->get_profile();
                if (empty($data['news_item'])) {
                        $this->clientmyorders();
                }
                
                $data['orderid']       = $data['news_item']['orderid'];
                $data['topic']         = $data['news_item']['topic'];
                $data['words']         = $data['news_item']['words'];
                $data['urgency']       = $data['news_item']['urgency'];
                $data['amount']        = $data['news_item']['amount'];
                $data['instructions']  = $data['news_item']['instructions'];
                $data['typeofservice'] = $data['news_item']['typeofservice'];
                $data['order_status']  = $data['news_item']['order_status'];
                $data['date_posted']   = $data['news_item']['date_posted'];
                $data['subject']       = $data['news_item']['subject'];
                $data['pages']         = $data['words'];
                $data['half_work']       = $data['news_item']['half_work'];

                
                $this->load->view('templates/header', $data);
                $this->load->view('orders/edit', $data);
                $this->load->view('templates/right_sidebar', $data);
                $this->load->view('templates/footer');
                
                
                //get data from myview
                $sno  = $this->input->post('orderid');
                $data = array('instructions' => $this->input->post('instructions')
                );
                
                //call model and mode function 
                $this->Ordersed_model->student_update($sno, $data);
                
                //send message 
                $orders['orders'] = $this->Orders_model->myorders();
                $data['message']  = 'Data Updated Successfully';
        }
        
        public function clientmyorders()
        
        {
                $writer_id = $this->session->userdata('writer_id');
                $orders['orders']   = $this->Orders_model->clientmyorders();
                $this->load->view('template/header', $orders);
                $this->load->view('template/sidebar-user',  $orders);
                $this->load->view('customer/orders');
                $this->load->view('template/footer');
        }
        
        
        // these are the order made by client and not yet paid for. They cannot be assigned to writers, they are not in open projects, they are not listed till they are paid for. 
        
        public function client_unpaid()
        {

                $orders['orders']        = $this->Orders_model->client_unpaid();
                $this->load->view('template/header');
                $this->load->view('template/sidebar-user');
                $this->load->view('customer/orders', $orders);
                $this->load->view('template/footer');
        }
        
        
        public function client_paid()
        {
                

                $orders['orders']         = $this->Orders_model->client_paid();
                $this->load->view('template/header');
                $this->load->view('template/sidebar-user');
                $this->load->view('customer/orders', $orders);
                $this->load->view('template/footer');
        }
        
        
        // These are orders that have been paid by the client and have bee assigend to a writer
        public function client_assigned()
        {
                
               
                $orders['orders'] = $this->Orders_model->client_assigned();             
                $this->load->view('template/header');
                $this->load->view('template/sidebar-user');
                $this->load->view('customer/orders', $orders);
                $this->load->view('template/footer');
        }
        
        // These are orders that have not been assigned to the writer. They cna be paid or not paid. 
        public function client_unassigned()
        {
                

                $orders['orders']      = $this->Orders_model->client_paid();
                $this->load->view('template/header');
                $this->load->view('template/sidebar-user');
                $this->load->view('customer/orders', $orders);
                $this->load->view('template/footer');
        }
        
        // Orders that are marked as completed by either admin or client. 
        public function client_completed()
        {
                
                $orders['orders']   = $this->Orders_model->client_completed();
                $this->load->view('template/header');
                $this->load->view('template/sidebar-user');
                $this->load->view('customer/orders', $orders);
                $this->load->view('template/footer');
        }

        
        // orders just uplaoded by a writer and waiting admin approval so they are eitehr completed, re-assigned or sent for revision
        public function client_pending()
        {
                
                $orders['orders']         = $this->Orders_model->client_pending();
                $this->load->view('template/header');
                $this->load->view('template/sidebar-user');
                $this->load->view('customer/orders', $orders);
                $this->load->view('template/footer');
        }
        
        
        public function client_revision()
        {
                
              
                $orders['orders']          = $this->Orders_model->client_revision();
                $this->load->view('template/header');
                $this->load->view('template/sidebar-user');
                $this->load->view('customer/orders', $orders);
                $this->load->view('template/footer');
        }
        
        
        
        public function client_cancelled()
        {

                $orders['orders']  = $this->Orders_model->client_cancelled();
                $this->load->view('template/header');
                $this->load->view('template/sidebar-user');
                $this->load->view('customer/orders', $orders);
                $this->load->view('template/footer');
        }
        
        

       public function writer_assigned()
        {
                $config                = array();
                $config["base_url"]    = base_url() . "order/writer_assigned";
                $config["total_rows"]  = $this->Orders_model->count_writerassigned();
                $config["per_page"]    = 20;
                $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $orders['profile'] = $this->User_model->get_profile();
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["orders"] = $this->Orders_model->writer_assigned($config["per_page"], $page);
                $orders["links"]   = $this->pagination->create_links();
                
                $this->load->view('template/header');
                $this->load->view('template/sidebar-user');
                $this->load->view('freelancer/order_in_progress.php', $orders);
                $this->load->view('template/footer');

        }




       public function writer_grafik()
        {
                $config                = array();
                $config["base_url"]    = base_url() . "order/writer_grafik";
                $config["total_rows"]  = $this->Orders_model->count_writerassigned();
                // $config["per_page"]    = 20;
                // $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $orders['profile'] = $this->User_model->get_profile();
                // $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["orders"] = $this->Orders_model->writer_grafik();//$config["per_page"], $page
                // $orders["links"]   = $this->pagination->create_links();
                
                $this->load->view('template/header');
                $this->load->view('template/sidebar-user');
                $this->load->view('freelancer/wr_grafik', $orders);
                $this->load->view('template/footer');

        }




        // оцененные заказы
         public function writer_requests() {
                $config                = array();
                $config["base_url"]    = base_url() . "order/writer_requests";
                $config["total_rows"]  = $this->Orders_model->count_writerrequests();
                $config["per_page"]    = 20;
                $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $orders['profile'] = $this->User_model->get_profile();
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["orders"] = $this->Orders_model->writer_requests($config["per_page"], $page);
                $orders["links"]   = $this->pagination->create_links();
                
                $this->load->view('template/header');
                $this->load->view('template/sidebar-user');
                $this->load->view('freelancer/wr_orders', $orders);
                $this->load->view('template/footer');

        }

//





        
       public function writer_pending()
        {
                $config                = array();
                $config["base_url"]    = base_url() . "order/writer_assigned";
                $config["total_rows"]  = $this->Orders_model->count_writerpending();
                $config["per_page"]    = 20;
                $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $orders['profile'] = $this->User_model->get_profile();
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
               // $orders["orders"] = $this->Orders_model->writer_assigned($config["per_page"], $page);
                $orders["orders"] = $this->Orders_model->writer_paidord($config["per_page"], $page);
                
                $orders["links"]   = $this->pagination->create_links();
                
                $this->load->view('template/header');
                $this->load->view('template/sidebar-user');
                $this->load->view('freelancer/orders', $orders);
                $this->load->view('template/footer');

        }
    
               
       public function writer_completed()
        {
                $config                = array();
                $config["base_url"]    = base_url() . "order/writer_assigned";
                $config["total_rows"]  = $this->Orders_model->count_writercompleted();
                $config["per_page"]    = 20;
                $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $orders['profile'] = $this->User_model->get_profile();
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
               // $orders["orders"] = $this->Orders_model->writer_assigned($config["per_page"], $page);
                $orders["orders"] = $this->Orders_model->unpaid_completed($config["per_page"], $page);
                $orders["links"]   = $this->pagination->create_links();
                
                $this->load->view('template/header');
                $this->load->view('template/sidebar-user');
                $this->load->view('freelancer/orders', $orders);
                $this->load->view('template/footer');

        }
    
               
       public function writer_revision()
        {
                $config                = array();
                $config["base_url"]    = base_url() . "order/writer_assigned";
                $config["total_rows"]  = $this->Orders_model->count_writerrevision();
                $config["per_page"]    = 20;
                $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $orders['profile'] = $this->User_model->get_profile();
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["orders"] = $this->Orders_model->writer_revision($config["per_page"], $page);
                $orders["links"]   = $this->pagination->create_links();
                
                $this->load->view('template/header');
                $this->load->view('template/sidebar-user');
                $this->load->view('freelancer/orders', $orders);
                $this->load->view('template/footer');

        }    
               
       public function writer_profile()
        {
                $config                = array();
                $config["base_url"]    = base_url() . "order/writer_assigned";
                $config["total_rows"]  = $this->Orders_model->count_writerprofile();
                $config["per_page"]    = 20;
                $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $orders['profile'] = $this->User_model->get_profile();
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["orders"] = $this->Orders_model->writer_profile($config["per_page"], $page);
                $orders["links"]   = $this->pagination->create_links();
                
                $this->load->view('template/header');
                $this->load->view('template/sidebar-user');
                $this->load->view('freelancer/orders', $orders);
                $this->load->view('template/footer');

        }


      
        
        public function writer_paid()
        {

                $orders['orders']  = $this->Orders_model->writer_paid();
                $this->load->view('templates/header', $orders);
                $this->load->view('orders/writer_assigned', $orders);
                $this->load->view('templates/right_sidebar', $orders);
                $this->load->view('templates/footer');
        }
        

        
        
        public function writer_balance()
        {
                $orders['profile'] = $this->User_model->get_profile();
                $orders['results'] = $this->Orders_model->writer_balance();
                $orders['amount']  = $this->Orders_model->unpaid_sum();
                $orders['numrows'] = count($orders['results']);
                $this->load->view('templates/header');
                $this->load->view('orders/writer_unpaid', $orders);
                $this->load->view('templates/right_sidebar', $orders);
                $this->load->view('templates/footer');
        }
        
       public function openorders()
        {
                $config                = array();
                $config["base_url"]    = base_url() . "order/openorders";
                $config["total_rows"]  = $this->Orders_model->record_count();
                // $config["per_page"]    = 100;
                // $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $orders['profile'] = $this->User_model->get_profile();
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
               // $orders["orders"] = $this->Orders_model->openorders($config["per_page"], $page);
                $orders["orders"] = $this->Orders_model->all_openorders($page);
                $orders["links"]   = $this->pagination->create_links();
                
                $this->load->view('template/header');
                $this->load->view('template/sidebar-user');
                $this->load->view('freelancer/orders', $orders);
                $this->load->view('template/footer');

        }

 
        
        
        
        public function SumOrders()
        {
                $orders['profile'] = $this->User_model->get_profile();
                $total['total']    = $this->Orders_model->SumOrders();
                $this->load->view('templates/header');
                $this->load->view('orders/myorders1', $total);
                $this->load->view('templates/right_sidebar', $total);
                $this->load->view('templates/footer');
        }

        private function read_file_doc($filename)
        {
                $fileHandle = fopen($filename, "r");
                $line       = @fread($fileHandle, filesize($filename));
                $lines      = explode(chr(0x0D), $line);
                $outtext    = "";
                foreach ($lines as $thisline) {
                        $pos = strpos($thisline, chr(0x00));
                        if (($pos !== FALSE) || (strlen($thisline) == 0)) {
                        } else {
                                $outtext .= $thisline . " ";
                        }
                }
                $outtext = preg_replace("/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/", "", $outtext);
                return $outtext;
        }
        
        public function read_file_docx($filename)
        {
                
                
                $striped_content = '';
                $content         = '';
                if (!$filename || !file_exists($filename))
                        return false;
                
                $zip = zip_open($filename);
                
                if (!$zip || is_numeric($zip))
                        return false;
                
                while ($zip_entry = zip_read($zip)) {
                        
                        if (zip_entry_open($zip, $zip_entry) == FALSE)
                                continue;
                        
                        if (zip_entry_name($zip_entry) != "word/document.xml")
                                continue;
                        
                        $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
                        
                        zip_entry_close($zip_entry);
                } // end while
                
                zip_close($zip);
                
                //echo $content;
                //echo "<hr>";
                //file_put_contents('1.xml', $content);
                
                $content         = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
                $content         = str_replace('</w:r></w:p>', "\r\n", $content);
                $striped_content = strip_tags($content);
                
                return $striped_content;
                
        }
        public function upload_file()
        {

                $orderid = $this->input->post('orderid');
                $name_type = $this->input->post('name_type');
                $data['title']          = '';
                $data['uploaded_files'] = directory_map('uploads/');

                if ($this->input->post('submit') && !empty($_FILES['multipleFiles']['name'][0])) {
                        
                        // count the number of files uploades

                        $number_of_files = count($_FILES['multipleFiles']['name']);
                        
                        $files        = $_FILES; 
                        $orderfile    = $this->input->post('orderid');
                        $order_period    = $this->input->post('order_period');
                        $dif          = $this->config->item('uploads').'/' . $order_period . '/' . $orderfile;
                        // make sure the folder exists else create 
                        if (!is_dir($dif)) {
                                mkdir($dif, 0777, true);
                        }
                        
                        // upload files one by one
                        if($number_of_files < 1 ){
                            redirect('order/create');
                        }
                        for ($i = 0; $i < $number_of_files; $i++) {

                                $files['multipleFiles']['name'][$i] =  preg_replace('/ /', '_', $files['multipleFiles']['name'][$i]);

                                $_FILES['multipleFiles']['name']     = $files['multipleFiles']['name'][$i];

                                $fname         = $files['multipleFiles']['name'][$i];
                                $file_name = pathinfo($fname, PATHINFO_FILENAME);
                                $ext = pathinfo($fname, PATHINFO_EXTENSION);

                                $newfile_name[$i] =   $orderid.'_'.$name_type.'_'.rand(0, 100).'_'.$i.'.'.$ext;

                                // $newfile_name= preg_replace('/[^\w]/', '_', $file_name);

                                $_FILES['multipleFiles']['type']     = $files['multipleFiles']['type'][$i];
                                $_FILES['multipleFiles']['tmp_name'] = mb_convert_encoding($files['multipleFiles']['tmp_name'][$i], 'UTF-8');;
                                $_FILES['multipleFiles']['error']    = $files['multipleFiles']['error'][$i];
                                $_FILES['multipleFiles']['size']     = $files['multipleFiles']['size'][$i];
                                
                                $config['upload_path']   = $dif;
                                $config['allowed_types'] = 'pdf|doc|dot|docx|docm|dotx|dotm|docb|xls|xlsx|xlt|xlm|xlsm|xltx|xltm|csv|txt|rtf|htm|html|zip|mp3|mp4|wma|mpg|flv|avi|jpg|jpeg|png|gif|pptx|pptm|ppt|pot|potx|potm|ppam|ppsx|ppsm|sldx|sldm|accdb|accde|accdt|accdr|rar|';
                                $config['max_size']      = '233232';
                                $config['max_width']     = '232323';
                                $config['max_height']    = '243233';
                                $config['file_name']    = $newfile_name[$i];
                                $config['eoverwrite']     = TRUE;
                                $config['remove_spaces'] = TRUE;
                                
                                // $this->load-library('upload', $config);
                                $this->upload->initialize($config);
                                // echo '<pre> Нормальное имя <br>';
                                // print_r($files['multipleFiles']['name'][$i]);
                                // echo '</pre>';

                                // echo '<pre> --------- <br>';
                                // print_r($fname);
                                // echo '</pre>';

                                // echo '<pre> --------- <br>';
                                // print_r($file_name);
                                // echo '</pre>';

                                if (!$this->upload->do_upload('multipleFiles')) {
                                        $error = array(
                                                'error' => $this->upload->display_errors()
                                        );
                                } else {
                                        $data = array(
                                                'upload_data' => $this->upload->data()
                                        );
                                        //  $this->Orders_model->order_files($data);
                                }
                                
                                // print_r($this->upload->data());
                                // print_r($data['upload_data']);

                        }
                        
                        //
                        for ($i = 0; $i < $number_of_files; $i++) {
                        $_FILES['multipleFiles']['name']     = $files['multipleFiles']['name'][$i];
                        // echo "<pre>";
                        // print_r($_FILES['multipleFiles']['name']);
                        // if(empty($_FILES['multipleFiles']['name'])){
                        //     print_r('123');
                        // }
                        // echo "</pre>";

                        // Проверка
                        if(!empty($files['multipleFiles']['name'][$i])) {

                                $fname         = $files['multipleFiles']['name'][$i];
                                $file_name = pathinfo($fname, PATHINFO_FILENAME);
                                $ext = pathinfo($fname, PATHINFO_EXTENSION);

                               // $file_name_next = mb_convert_encoding($file_name, 'UTF-8');
                                
                                // unset($newfile_name);

                                // $newfile_name[$i] = $orderid.'_'.$name_type.'_'.rand(0, 100).'_'.$i.'.'.$ext;


                                $dbfile_name  = $newfile_name[$i];


                                $uploader_name = $this->session->userdata('firstname');
                                $this->session->userdata('lastname');
                                
                                //////////// do some work here to enter content into database for materials and essays. stopepd here
                                $order_period = $this->config->item('order_period');
                                $orderfile    = $this->input->post('orderid');
                                $dif          = $this->config->item('uploads').'/' . $order_period . '/' . $orderfile;
                                //$filename = base_url().''.$dif.'/'.$file_name;// or /var/www/html/file.docx
                                $filename     = $this->config->item('uploads').'/' . $order_period . '/' . $orderfile . '/' .  $fname ; // or /var/www/html/file.docx
                                
                                $ext = pathinfo($filename, PATHINFO_EXTENSION);

                                $submited = '';
                                if($this->session->userdata('user_level') === 'client'){
                                    $submited = 'true';
                                }
                                
                                $data = array(
                                        'file_name' => $files['multipleFiles']['name'][$i],
                                        'file_size' => $files['multipleFiles']['size'][$i],
                                        'tmp_name' => $dbfile_name,
                                        'file_type' => $files['multipleFiles']['type'][$i],
                                        'upload_date' => date('d.m.Y H:i:s'),
                                        'order_id' => $this->input->post('orderid'),
                                        'upload_type' => $this->input->post('upload_type'),
                                        'alias' => $this->input->post('alias'),
                                        'viewed' => 'false',
                                        'viewed_client' => 'false',
                                        'uploader_name' => $uploader_name,
                                        'uploaded_by' => $this->session->userdata('writer_id'),
                                        'submited' => $submited
                                        
                                );
                                $this->Orders_model->order_files($data);
                                $data1 = array(
                                    'wr_files_notice' => $this->input->post('orderid')
                                );
                                $this->Orders_model->order_file_wr_notice($data1);
                           }     
                        }
                        
                        for ($i = 0; $i < $number_of_files; $i++) {

                        // echo "<pre>";
                        // print_r($files['multipleFiles']['name'][$i]);
                        // if( empty($files['multipleFiles']['name'][$i])) {
                        //     print_r('123');
                        // }
                        // echo "</pre>";
                        if(!empty($files['multipleFiles']['name'][$i])) {
                            
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
                                
                                
                                $orderid          = $this->input->post('orderid');
                                $preferred_writer = $this->input->post('preferred_writer');
                                $filename         = $files['multipleFiles']['name'][$i];
                                $uploader_name    = $this->session->userdata('firstname');
                                
                                // get the email details here and eval so that the codes can be read. 
                                $data['msg']     = $this->Siteconfigs_model->msg_config('file_uploaded');
                                $msg_body_admin  = $data['msg']['msg_body_admin'];
                                $msg_body_client = $data['msg']['msg_body_client'];
                                $msg_body_writer = $data['msg']['msg_body_writer'];
                                
                                //this replaces all the double quotes with single quotes since when double quotes are left, they give an error. 
                                $msg_body_admin  = str_replace('"', "'", $msg_body_admin);
                                $msg_body_client = str_replace('"', "'", $msg_body_client);
                                $msg_body_writer = str_replace('"', "'", $msg_body_writer);
                                
                                // This evals so that the variables in the codes are read
                                eval("\$str1 = \"$msg_body_admin\";");
                                //echo $str1; 
                                
                                
                                // This evals so that the variables in the codes are read
                                eval("\$str2 = \"$msg_body_client\";");
                                //echo $str2;                       
                                
                                // This evals so that the variables in the codes are read
                                eval("\$str3 = \"$msg_body_writer\";");
                                //echo $str3;    



                                //send email to admin
                                $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($admin_email);
                                
                                $this->email->newSubject('По заказу №' . $orderid  .' была прикреплена часть работы.');
                                $this->email->message($str1);
                                if(!empty($admin_email)){
                                    if ($this->email->send()) {
                                            //Success email Sent
                                            //echo $this->email->print_debugger();
                                    } else {
                                            //Email Failed To Send
                                            // echo $this->email->print_debugger();
                                    }
                                }
                                
                                //send email to writer
                               $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('writeemail'));
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
                                
                                // get the email of a given username from database
                                $data['get_writer_email'] = $this->Siteconfigs_model->get_writer_email($this->input->post('preferred_writer'));
                                $writer_email             = $data['get_writer_email']['email'];
                                
                                $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($writer_email);
                                
                                $this->email->newSubject("Новый файл, загруженный для заказа №" . $this->input->post('orderid') . '[' . $files['multipleFiles']['name'][$i] . ']');
                                $this->email->message($str3);
                                if(!empty($writer_email)){
                                    if ($this->email->send()) {
                                            //Success email Sent
                                            //echo $this->email->print_debugger();
                                    } else {
                                            //Email Failed To Send
                                            // echo $this->email->print_debugger();
                                    }
                                }    

                           }     


                        }
                        
                        $error = array(
                                'error' => $this->upload->display_errors()
                        );
                        if ($error) {
                                $url = $_SERVER['HTTP_REFERER'];
                                redirect($url);
                        }
                        
                        
                } else {
                       // redirect('order/view/'.$this->input->post('orderid'));
                    // redirect('Adminorders/view_order/'.$this->input->post('orderid'));

                    if($this->session->userdata('writer_level') != 'admin'){
                       redirect('order/view/'.$this->input->post('orderid'));
                    } else {
                        redirect('Adminorders/view_order/'.$this->input->post('orderid'));
                    }
                }
                  

        }
        
        public function currenturl()
        {
                return 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        }
        // ===
        public function del_prof_ord(){ 
            $orderid = $this->input->post('orderid');
            $this->Orders_model->del_prof_ord($orderid);
        } 
        public function del_bid_ord(){ 
            $orderid = $this->input->post('orderid');
            print_r($this->Orders_model->del_bid_ord($orderid));
        } 
        public function del_writer_new_message(){ 
            $orderid = $this->input->post('orderid');
            $this->Orders_model->del_writer_new_message($orderid);
        } 
       public function del_client_new_message(){ 
            $orderid = $this->input->post('orderid');
            $this->Orders_model->del_client_new_message($orderid);
        } 
               public function del_client_file_message(){ 
            $orderid = $this->input->post('orderid');
            $this->Orders_model->del_client_file_message($orderid);
        } 
        public function del_viev_rev_ord_massage(){ 
            $orderid = $this->input->post('orderid');
            print_r($this->Orders_model->del_viev_rev_ord_massage($orderid));
            // print_r('123123');

        } 
        public function del_viev_todo_ord_massage(){ 
            $orderid = $this->input->post('orderid');
            print_r($this->Orders_model->del_viev_todo_ord_massage($orderid));

        } 
        public function del_viev_plan_massage(){ 
            $orderid = $this->input->post('orderid');
            print_r($this->Orders_model->del_viev_plan_massage($orderid));

        } 
        public function del_writer_paid_mes(){ 
            $orderid = $this->input->post('orderid');
            print_r($this->Orders_model->del_writer_paid_mes($orderid));

        } 
       public function del_writer_fine_mes(){ 
            $orderid = $this->input->post('orderid');
            print_r($this->Orders_model->del_writer_fine_mes($orderid));

        } 

        public function del_writer_file_mes(){ 
            $orderid = $this->input->post('orderid');
            print_r($this->Orders_model->del_wr_files_notice($orderid));
        } 
        // ===

        public function payMe(){
            $writer_id = $this->session->userdata('writer_id');
            $is_ajax = $this->input->is_ajax_request();
            $orderid = $this->input->post('liq_orderid');
            $sum = $this->input->post('amount');
            $sum_part = $this->input->post('sum_part');
            $time_f = (int)time();
            $data = array(
                'order_id'  => $orderid,
                'user_id'   => $writer_id,
                'sum'       => $sum,
                'sum_part'  => $sum_part,
                'encoded_id' => sha1($orderid+$time_f)
            );
            $this->Orders_model->setPayment($data);

            if($is_ajax) {
                // $post = $this->input->post();
                $order_id_gen = 'order_'.$orderid . rand(10000, 99999);
                require("payment/LiqPay.php");
     
                $liqpay = new LiqPay('i37168373386', '083tSpAB1jRoSF1n1wRNy0eNQtqMQikAanLBa5NJ');

                $data['form'] = $liqpay->cnb_form(array(
                    'version'        => '3',
                    'action'        => 'pay',
                    'public_key'    => 'i37168373386',
                    'amount'         => (float)$sum,
                    'currency'       => 'UAH',
                    'description'    => 'Оплата заказа '.$orderid,
                    'order_id'       => $order_id_gen,
                    'language'      => 'ru',
                    // 'sandbox'       => '1',
                    'result_url'    => ci_site_url() . 'order/paymentSuccess/?lq='.base64_encode(sha1($orderid+$time_f)),
                    'server_url'    => ci_site_url() . 'order/liq_callback',
                    // 'email'         => 'youvovas@gmail.com'
                ));
                    print_r($data['form']);
            }

        }

        public function paymentSuccess($orderid = NULL){
            $order_id = base64_decode($this->input->get('lq'));
            $data['arr'] = $this->Orders_model->paymentSuccess($order_id);
            if(empty($data['arr']) || empty($order_id)){
                redirect(ci_site_url().'/user/myaccount');
            }


            if(!empty($data['arr'][0]['email'])){

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
                $this->email->from($smtp_user, $smtp_name);
                $this->email->to($data['arr'][0]['email']);

                 if($data['arr'][0]['sum_part'] === 'full' || $data['arr'][0]['sum_part'] === 'rest'){
                    //send email to client all work
                    $data['msg']     = $this->Siteconfigs_model->msg_config('order_marked_aspaid');
                    $msg_body_client = $data['msg']['msg_body_client'];
                    $str2 = $msg_body_client;
                    $this->email->newSubject("Спасибо за оплату. Заказ №".$data['arr'][0]['order_id']);
                    $this->email->message($str2);
                    $this->email->send();

                } elseif($data['arr'][0]['sum_part'] === 'half') {
                     //send email to client half work
                    $data['msg']     = $this->Siteconfigs_model->msg_config('order_marked_aspaid');
                    $msg_body_client = $data['msg']['msg_body_client'];
                    $str2 = $msg_body_client;
                    $this->email->newSubject("Спасибо за оплату. Заказ №".$data['arr'][0]['order_id']);
                    $this->email->message($str2);
                    $this->email->send();


                } elseif ($data['arr'][0]['sum_part'] === 'doplata'){
                    //send email to client dorabotka
                        $data['msg'] = $this->Siteconfigs_model->msg_config('order_rated_byclient');
                        $msg_body_writer  = $data['msg']['msg_body_writer'];
                        $str2 = $msg_body_writer;
                        $this->email->newSubject("Доплата по заказу №" . $data['arr'][0]['order_id'] . ' получена' );
                        $this->email->message($str2);
                        $this->email->send();
                    
                    }

            }

            $this->load->view('template/header', $data);
            $this->load->view('customer/paymentSuccess', $data);
            $this->load->view('template/footer');
        }

}