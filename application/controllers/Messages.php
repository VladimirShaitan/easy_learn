<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 require_once("Pre_loader.php");

 class Messages extends Pre_loader {

//class Messages extends CI_Controller
//{
        
        public function __construct()
        {
                parent::__construct();
                $this->load->model('students_model');
                $this->load->model('Messages_model');
                $this->load->model('Siteconfigs_model');
                $this->load->model('Msgconfig_model');
                $this->load->model('Users_model');
                $this->load->model('Ordersed_model');
                $this->load->model('Orders_model');
                                
                $this->load->library(array(
                        'form_validation',
                        'session'
                ));
                $this->load->helper(array(
                        'url',
                        'html',
                        'form'
                ));
                
        }
        
        public function index()
        {
                // This is the inbox
                
                $data['messages'] = $this->Messages_model->get_msg_inbox();
               // $data['newmes'] = $this->Messages_model->get_msg_inbox();
                $this->load->view('template/header');
                // $this->load->view('messages/messages', $data);
                                
                
                                
    // ************************************************************
    $sessionUserID = $this->session->userdata('writer_id');         
    if(isset($sessionUserID)) {
    $usersAlldata  = $this->Users_model->getUsers(); 
    //$this->outputData['users_all'] = $usersAlldata;
                                                        
    $fields='';
    $userdata  = $this->Users_model->getUser(array('writer_id'=>$sessionUserID),$fields); 
    //$this->outputData['user_status'] = $userdata;
    $data['friends_list'] = $userdata;
                                                        
    $outputData = array(
                'users_all' => $usersAlldata,
                'user_status' => $userdata
                       );
    }
    // ************************************************************
                                                
    $this->load->view('messages/inbox', $outputData);
    $this->load->view('template/footer');
                                                
    if( ($this->session->userdata('writer_id')) ) {
    $this->load->view('chat/commonchat',  $outputData);
                                                 }
                
        }
        
        
        public function messages()
        {
                   
                $data['messages'] = $this->Messages_model->getSupportMessages();
                $data['admins'] = $this->students_model->get_admins();
                // $data['newmessages'] = $this->Messages_model->get_msg_newinbox();
                $this->load->view('template/header');
                $this->load->view('template/sidebar-user');
                $this->load->view('messages/messages_new', $data);
                $this->load->view('template/footer');
                
        }
        
            
        public function compose()
        {
                $data['admins'] = $this->students_model->get_admins();
                $this->load->view('template/header');
                $this->load->view('template/sidebar-user');
                $this->load->view('messages/compose', $data);
                $this->load->view('template/footer');
        }
        
        public function outbox()
        {
                $data['messages'] = $this->Messages_model->get_msg_outbox();
                $this->load->view('template/header');
                $this->load->view('template/sidebar-user');
                $this->load->view('messages/outbox', $data);
                $this->load->view('template/footer');
        }
        
        
        public function form()
        {
                $this->load->view('master/template/header');
                $this->load->view('master/template/left_sidebar');
                $this->load->view('form');
                $this->load->view('master/template/footer');
                
        }
        
        public function submission($orderid = NULL)
        {
                $this->form_validation->set_rules('order_status', 'order_status', 'required');
                if ($this->form_validation->run() === TRUE) {
                        $orderid      = $this->input->post('orderid');
                        $order_status = $this->input->post('order_status');
                        
                        $data = array(
                                'order_status' => $this->input->post('order_status')
                        );
                        
                        $this->Ordersed_model->order_update($orderid, $data);
                        echo "Статус заказа изменен на " . $order_status;
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }
        

// Закачик утвердил план 
        public function clientPlanSubmit($orderid = NULL) {

                $orderid  = $this->input->post('orderid');
                $plan =    'false';
                $client_name = $this->input->post('client_name');
                $writer_id = $this->input->post('writer_id');
                if(!empty($writer_id)){
                    $writer_name = implode(' ', $this->Siteconfigs_model->get_writer_name_new($writer_id));
                    $writer_email = $this->Siteconfigs_model->get_writer_email_new($writer_id);
                }
                $data = array(
                    'yesno' => $plan
                );
                $this->Ordersed_model->order_update($orderid, $data);
                if(!empty($writer_id)){
                // get the email details here and eval so that the codes can be read. 
                        $data['msg']     = $this->Siteconfigs_model->msg_config('message_plan');
                        $msg_body_admin  = $data['msg']['msg_body_admin'];
                        $msg_body_writer = $data['msg']['msg_body_writer'];
                        
                        //this replaces all the double quotes with single quotes since when double quotes are left, they give an error. 
                        $msg_body_admin  = str_replace('"', "'", $msg_body_admin);
                        $msg_body_writer = str_replace('"', "'", $msg_body_writer);
                        
                        // This evals so that the variables in the codes are read
                        eval("\$str1 = \"$msg_body_admin\";");
                        //echo $str1; 
                        
                        // This evals so that the variables in the codes are read
                        eval("\$str3 = \"$msg_body_writer\";");

                 //send email to writer
            
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
                        $this->email->to($writer_email);

                        $this->email->newSubject("Утверждение плана по заказу номер №" . $orderid);
                        $this->email->message($str3);

                        if ($this->email->send()) {
                                //Success email Sent
                                //echo $this->email->print_debugger();
                        } else {
                                //Email Failed To Send
                                // echo $this->email->print_debugger();
                        }
                    }

                            redirect('order/view/' . $this->input->post('orderid'));
                        }


        public function clientPlanDontNeedToSubmit($orderid = NULL) {

                $orderid  = $this->input->post('orderid');
                $plan =    'dont_need';
                $client_name = $this->input->post('client_name');
                $data = array(
                    'yesno' => $plan,
                    'wr_view_plan' => 'false'
                );
                $this->Ordersed_model->order_update($orderid, $data);
                redirect('order/view/' . $this->input->post('orderid'));
            }
//письмо оплата

public function oplata_zakaza($orderid = NULL)
        {
                $this->form_validation->set_rules('oplata', 'oplata', 'required');
                if ($this->form_validation->run() === TRUE) {
                        $orderid      = $this->input->post('orderid');
                        $oplata       = $this->input->post('oplata');
                        
                        $data = array(
                                'oplata' => $this->input->post('oplata')
                        );
                        
                        $this->Ordersed_model->oplata_update($orderid, $data);
                        echo "Согласованная цена за заказ";
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }

// Уведомление о доплате Заказчик

public function customerDoplataNotice(){
    $orderid = $this->input->post('orderid');
    $clientEmail = $this->input->post('clientEmail');
    $doplataCus = $this->input->post('sum');
    $clientName = $this->input->post('cl_name');
    $trig = $this->input->post('trig');

    // Подключение тела письма   
    $data['msg'] = $this->Siteconfigs_model->msg_config('order_rated_byclient');
    $msg_body_writer  = $data['msg']['msg_body_writer'];
    $msg_body_client = $data['msg']['msg_body_client'];


    if($trig === 'congrats'){
        $this->Messages_model->suc_dop_customer($orderid);
    }
    //this replaces all the double quotes with single quotes since when double quotes are left, they give an error. 
    $msg_body_writer = str_replace('"', "'", $msg_body_writer);
    $msg_body_client  = str_replace('"', "'", $msg_body_client);
    
    // This evals so that the variables in the codes are read
    eval("\$str1 = \"$msg_body_client\";");
    //echo $str1; 
    
    // This evals so that the variables in the codes are read
    eval("\$str2 = \"$msg_body_writer\";");

//send email to writer

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
    $this->email->to($clientEmail);

    if($trig === 'notice'){
        $this->email->newSubject("Доплата по заказу №" . $orderid);
        $this->email->message($str1);
    } elseif($trig === 'congrats'){
        $this->email->newSubject("Доплата по заказу №" . $orderid . ' получена' );
        $this->email->message($str2);
    }
    if(!empty($clientEmail)){
        if ($this->email->send()) {
                //Success email Sent
                //echo $this->email->print_debugger();
        } else {
                //Email Failed To Send
                // echo $this->email->print_debugger();
        }
    }    
}

public function writerDoplataNotice(){
    $orderid = $this->input->post('orderid');
    $prefWriter = $this->input->post('prefWriter');
    $doplataWr = $this->input->post('sum');
    $trig = $this->input->post('trig');
    $writer_data = $this->Ordersed_model->getWrData($prefWriter);
    $writer_name = $writer_data['firstname'].' '.$writer_data['lastname'];


    // Подключение тела письма   
    $data['msg'] = $this->Siteconfigs_model->msg_config('message_toall_writers');
    $msg_body_writer  = $data['msg']['msg_body_writer'];
    $msg_body_client  = $data['msg']['msg_body_client'];
    
    //this replaces all the double quotes with single quotes since when double quotes are left, they give an error. 
    $msg_body_writer = str_replace('"', "'", $msg_body_writer);
    $msg_body_client  = str_replace('"', "'", $msg_body_client);
    
    // This evals so that the variables in the codes are read
    eval("\$str1 = \"$msg_body_client\";");
    //echo $str1; 
    
    // This evals so that the variables in the codes are read
    eval("\$str2 = \"$msg_body_writer\";");

//send email to writer

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
    $this->email->to($writer_data['email']);

    if($trig === 'notice'){
        $this->email->newSubject("Вам было начислено доплату по заказу №" . $orderid);
        $this->email->message($str1);
    } elseif($trig === 'congrats'){
        $this->email->newSubject("Вам был оплачен заказ №" . $orderid );
        $this->email->message($str2);
    }
    if(!empty($writer_data['email'])){
        if ($this->email->send()) {
                //Success email Sent
                //echo $this->email->print_debugger();
        } else {
                //Email Failed To Send
                // echo $this->email->print_debugger();
        }
    }

}



//письмо оплата
public function mes_cl_wr_history(){
    $history = $this->input->post('chatHistory');
    $notHisHistory = 'manager';
    // if($history === 'client'){
    //     $notHisHistory = 'manager';
    // } elseif($history === 'zakaz') {
    //     $notHisHistory = 'avtor';
    // } else {
    //     $notHisHistory = 'zakaz';
    // }

    $messages = $this->Messages_model->get_mes_cl_wr($this->input->post('orderid'), false, $notHisHistory);
    $messages = array_reverse($messages);
    print_r(json_encode($messages));
}
// ajax messages autor-client

public function post_message_ajax() {

            $orderid      = $this->input->post('orderid');
            $order_status = $this->input->post('order_status');
            $request_date = date('Y/m/d H:i:s');
            $writerid     = $this->session->userdata('writer_id');
            $date_posted  = date('Y/m/d H:i:s');
            $date_mes     = date('d.m.Y H:i:s');  
            $who_send = 'заказчика';
            $preferred_writer = $this->input->post('preferred_writer');
            // $writer_name = implode(" ", $this->Siteconfigs_model->get_writer_name_new($preferred_writer));
            $user_level = $this->input->post('user_level');
            $mes = $this->input->post('message_body');
            $limit = 10;
            $ch_res = $this->input->post('ch_reciever');
            $file = $this->input->post('file_template');
            $online = '';
            // $from_who = $this->input->post('from_who');
            $viewed_mngr = 'true';
            $viewed_wr = 'true';
            $viewed_cl = 'true';
            $from_who = $this->input->post('from_who');
            if($ch_res === 'zakaz') {
                $viewed_cl = 'false';
            } elseif($ch_res === 'avtor') {
                $viewed_wr = 'false';
            } elseif($ch_res === 'manager') {
                $viewed_mngr = 'false';
            }

            if(!empty($mes)){
                $data = array(
                        'orderid' => $orderid,
                        'senderid' => $this->input->post('senderid'),
                        'date_posted' => $date_posted,
                        'sender_name' => $this->input->post('sender_name'),
                        'message_body' => $mes . $file,
                        'whom' => $ch_res,
                        'from_who' => $from_who,
                        'receiverid' => $this->input->post('receiverid'),
                        'viewed' => $viewed_mngr,
                        'viewed_writer' => $viewed_wr,
                        'viewed_client' => $viewed_cl,
                        'approval'      => $date_mes,
                        'msg_read'      => 0
                        );
                $putMessage = $this->Messages_model->post_message_ajax($data, $limit);
                $mgr_id = $this->Messages_model->getOrderMngrjustId($orderid);
                // print_r();
                if(!empty($mgr_id['manager_id'])){

                    if($from_who === 'admin' && ($ch_res === 'zakaz' || $ch_res === 'avtor') ){
                       $a = $this->Orders_model->mngrNewNoticeMes('mngr_new_order_mes', $orderid.'#'.$from_who, 1);
                    }

                    // print_r($a);

                    if( ($from_who != 'manager' && $from_who != 'admin') && $ch_res === 'manager'){
                        $this->Orders_model->mngrNewNoticeMes('mngr_new_order_mes', $orderid.'#'.$from_who, 1);
                    }


                    if($from_who === 'avtor' && $ch_res === 'zakaz'){
                        $this->Orders_model->mngrNewNoticeMes('mngr_new_order_mes', $orderid.'#'.substr($from_who, 0, 1).'_'.substr($ch_res, 0, 1), 1);
                    }

                    if($from_who === 'zakaz' && $ch_res === 'avtor'){
                        $this->Orders_model->mngrNewNoticeMes('mngr_new_order_mes', $orderid.'#'.substr($ch_res, 0, 1).'_'.substr($from_who, 0, 1), 1);
                    }


                } else {
                    if($from_who != 'manager' && $from_who != 'admin'){
                        $this->Orders_model->mngrNewNoticeMes('mngr_new_order_mes', $orderid.'#'.$from_who);
                    }
                }

                $arrResp = array($putMessage[0], $date_mes, $putMessage[1], $putMessage);
                print_r(json_encode($arrResp));

                        $orderid          = $this->input->post('orderid');
                        $senderid         = $this->input->post('senderid');
                        $preferred_writer = $this->input->post('preferred_writer');
                        $sender_name      = $this->input->post('sender_name');
                        $message_body     = $this->input->post('message_body');
                        
                        $siteurl         = base_url();
                        // get the email details here and eval so that the codes can be read. 
                        $data['msg']     = $this->Siteconfigs_model->msg_config('message_under_order');
                        // $msg_body_admin  = $data['msg']['msg_body_admin'];
                        $msg_body_client = $data['msg']['msg_body_client'];
                        $msg_body_writer = $data['msg']['msg_body_writer'];
                        
                        //this replaces all the double quotes with single quotes since when double quotes are left, they give an error. 
                        // $msg_body_admin  = str_replace('"', "'", $msg_body_admin);
                        $msg_body_client = str_replace('"', "'", $msg_body_client);
                        $msg_body_writer = str_replace('"', "'", $msg_body_writer);      

                        // if($ch_res === 'manager'){
                        //     // $mgr_id = $this->Messages_model->getOrderMngrjustId($orderid);
                        //     // print_r($mgr_email['email']);
                        //         //send email to admin
                        //     if(!empty($mgr_id)){
                        //     $mgr_email = $this->Messages_model->getOrderMngrJustEmail($mgr_id['manager_id']);
                        //    eval("\$str1 = \"$msg_body_admin\";");
                        //    $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('adminemail'));
                        //     $smtp_port               = $configs['smtp_configs']['smtp_port'];
                        //     $smtp_host               = $configs['smtp_configs']['smtp_host'];
                        //     $smtp_user               = $configs['smtp_configs']['smtp_user'];
                        //     $smtp_name               = $configs['smtp_configs']['smtp_name'];
                        //     $smtp_pass               = $configs['smtp_configs']['smtp_pass'];
                        //     $admin_email             = $configs['smtp_configs']['admin_email'];
                        //     $protocol                = $configs['smtp_configs']['protocol'];
                        //     $config                  = Array(
                        //             'protocol' => $protocol,
                        //             'smtp_host' => $smtp_host,
                        //             'smtp_port' => $smtp_port,
                        //             'smtp_user' => $smtp_user,
                        //             'smtp_pass' => $smtp_pass,
                        //             'mailtype' => 'html'
                        //     );
                        //     $this->load->library('email', $config);
                        //     $this->email->set_newline("\r\n");

                            
                        //     //Add file directory if you need to attach a file
                        //     //$this->email->attach($file_dir_name);
                            
                        //     //send email to admin
                        //     $this->email->from($smtp_user, $smtp_name);
                        //     $this->email->to($mgr_email['email']);
                            
                        //     $this->email->newSubject('Вам сообщение от '. $user_level .' по заказу #' . $orderid);
                        //     $this->email->message($str1);
                        //     if(!empty($mgr_email['email'])){
                        //         if ($this->email->send()) {
                        //                 //Success email Sent
                        //                 //echo $this->email->print_debugger();
                        //         } else {
                        //                 //Email Failed To Send
                        //                 // echo $this->email->print_debugger();
                        //         }
                        //     }
                                
                        //     }
                        // }

                        //send email to customer
                        if($ch_res == 'zakaz'){
                            $cl_id = $this->input->post('clientid');
                            $online = $this->Messages_model->getOnlineUser($cl_id);
                            if(time() - $online['online'] > 10) {

                            $client_name = implode(" ", $this->Siteconfigs_model->get_writer_name_new($cl_id));
                            eval("\$str2 = \"$msg_body_client\";");

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
                            $this->email->to($this->input->post('customer_email'));
                            
                            $this->email->newSubject("Новое сообщение по заказу №" . $orderid);
                            $this->email->message($str2);
                            if(!empty($this->input->post('customer_email'))){
                                if ($this->email->send()) {
                                        //Success email Sent
                                        //echo $this->email->print_debugger();
                                } else {
                                        //Email Failed To Send
                                        // echo $this->email->print_debugger();
                                }
                            }    

                             }
                        } elseif ($ch_res == 'avtor') {
                            $online = $this->Messages_model->getOnlineUser($preferred_writer);
                            // print_r(time() - $online['online']);
                            // if(time() - $online['online'] < 10) {
                            //     print_r('online');    
                            // } else {print_r('offline');}
                            if(time() - $online['online'] > 10) {
                                // print_r('ss');
                            $writer_name = implode(" ", $this->Siteconfigs_model->get_writer_name_new($preferred_writer));
                            eval("\$str3 = \"$msg_body_writer\";");
                            if ($preferred_writer !== 0) {

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
                                    //send email to writer
                                    // get the email of a given username from database
                                    $data['get_writer_email'] = $this->Siteconfigs_model->get_writer_email($this->input->post('preferred_writer'));
                                    $writer_email             = $data['get_writer_email']['email'];
                                    
                                    $this->email->from($smtp_user, $smtp_name);
                                    $this->email->to($writer_email);
                                    
                                    $this->email->newSubject("Новое сообщение по заказу №" . $orderid);
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
                        // redirect('order/view/' . $orderid);
                        }
            } else {
                print_r('false');
            }

}


// ajax messages autor-client
        // this is the method that helps in requesting orders from the writer's end. only a writer can request an order        
    public function post_message()
        {
                
                $this->form_validation->set_rules('orderid', 'orderid', 'required');
                if ($this->form_validation->run() === TRUE) {
                        $orderid      = $this->input->post('orderid');
                        // $receiverid     = $this->input->post('receiverid');
                        $order_status = $this->input->post('order_status');
                        $request_date = date('Y/m/d H:i:s');
                        $writerid     = $this->session->userdata('writer_id');
                        $date_posted  = date('Y/m/d H:i:s');
                        $who_send = 'заказчика';
                        $preferred_writer = $this->input->post('preferred_writer');
                        $writer_name = implode(" ", $this->Siteconfigs_model->get_writer_name_new($preferred_writer));
                        $user_level = $this->input->post('user_level');


                        $ch_res = $this->input->post('ch_reciever');
                        
                        $data = array(
                                'orderid' => $orderid,
                                'senderid' => $this->input->post('senderid'),
                                'date_posted' => $date_posted,
                                'sender_name' => $this->input->post('sender_name'),
                                'message_body' => $this->input->post('message_body'),
                                'whom' => $ch_res,
                                'from_who' => $this->input->post('from_who'),
                                'receiverid' => $this->input->post('receiverid'),
                                'viewed' => 'false'                             
                        );
                        
                        $this->Messages_model->post_message($data);
                        
                        //$mesArray = this->Messages_model->getZakAvt();
                        
                        $orderid          = $this->input->post('orderid');
                        $senderid         = $this->input->post('senderid');
                        $preferred_writer = $this->input->post('preferred_writer');
                        $sender_name      = $this->input->post('sender_name');
                        $message_body     = $this->input->post('message_body');
                        
                        $siteurl         = base_url();
                        // get the email details here and eval so that the codes can be read. 
                        $data['msg']     = $this->Siteconfigs_model->msg_config('message_under_order');
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

                        if($ch_res === 'manager'){
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
                                
                                //send email to admin
                                $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($admin_email);
                                
                                $this->email->newSubject('Вам сообщение от '. $user_level .' по заказу #' . $orderid);
                                $this->email->message($str1);
                                
                                if ($this->email->send()) {
                                        //Success email Sent
                                        //echo $this->email->print_debugger();
                                } else {
                                        //Email Failed To Send
                                        // echo $this->email->print_debugger();
                                }
                        
                        }

                        //send email to customer
                        if($ch_res == 'zakaz'){
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
                            $this->email->to($this->input->post('customer_email'));
                            
                            $this->email->subject("Новое сообщение, отправленное по заказу №" . $orderid);
                            $this->email->message($str2);
                            
                            if ($this->email->send()) {
                                    //Success email Sent
                                    //echo $this->email->print_debugger();
                            } else {
                                    //Email Failed To Send
                                    // echo $this->email->print_debugger();
                            }
                        } elseif ($ch_res == 'avtor') {
                            if ($preferred_writer !== 0) {

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
                                    //send email to writer
                                    // get the email of a given username from database
                                    $data['get_writer_email'] = $this->Siteconfigs_model->get_writer_email($this->input->post('preferred_writer'));
                                    $writer_email             = $data['get_writer_email']['email'];
                                    
                                    $this->email->from($smtp_user, $smtp_name);
                                    $this->email->to($writer_email);
                                    
                                    $this->email->subject("Новое сообщение, отправленное по заказу №" . $orderid);
                                    $this->email->message($str3);
                                    if ($this->email->send()) {
                                            //Success email Sent
                                            //echo $this->email->print_debugger();
                                    } else {
                                            //Email Failed To Send
                                            // echo $this->email->print_debugger();
                                    }
                            }
                        }
                        redirect('order/view/' . $orderid);
                        
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }        
        // this is the method that helps in requesting orders from the writer's end. only a writer can request an order        
        public function post_message_admin()
        {
                
                $this->form_validation->set_rules('orderid', 'orderid', 'required');
                if ($this->form_validation->run() === TRUE) {
                        $orderid      = $this->input->post('orderid');
                        $order_status = $this->input->post('order_status');
                        $request_date = date('Y/m/d H:i:s');
                        $writerid     = $this->session->userdata('writer_id');
                        $date_posted  = date('Y/m/d H:i:s');
                        $receiverid = $this->input->post('receiverid');
                        $writer_name = $this->input->post('writer_name');
                        $who_send = 'Менеджера';
                        $ch_res = $this->input->post('ch_reciever');
                        $data = array(
                                'orderid' => $orderid,
                                'senderid' => $this->input->post('senderid'),
                                'date_posted' => $date_posted,
                                'sender_name' => $this->input->post('sender_name'),
                                'message_body' => $this->input->post('message_body'),
                                'whom' => $this->input->post('ch_reciever'),
                                'from_who' => $this->input->post('from_who'),
                                'receiverid' => $receiverid,
                                'viewed_writer' => 'false',
                                'viewed_client' => 'false'
                        );
                        $user_level = $this->input->post('user_level');
                        $this->Messages_model->post_message($data);
                        
                        
                        $orderid          = $this->input->post('orderid');
                        $senderid         = $this->input->post('senderid');
                        $preferred_writer = $this->input->post('preferred_writer');
                        $sender_name      = $this->input->post('sender_name');
                        $message_body     = $this->input->post('message_body');
                        
                        $siteurl         = base_url();
                        // get the email details here and eval so that the codes can be read. 
                        $data['msg']     = $this->Siteconfigs_model->msg_config('message_under_order');
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
                        
                        //send email to admin
                        $this->email->from($smtp_user, $smtp_name);
                        $this->email->to($admin_email);
                        
                        $this->email->newSubject("Новое сообщение, отправленное по заказу №" . $orderid);
                        $this->email->message($str1);
                        
                        if ($this->email->send()) {
                                //Success email Sent
                                //echo $this->email->print_debugger();
                        } else {
                                //Email Failed To Send
                                // echo $this->email->print_debugger();
                        }
                        
                        //send email to customer
                        if($ch_res == 'zakaz'){
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
                        $this->email->to($this->input->post('customer_email'));
                        
                        $this->email->newSubject("Новое сообщение по вашему заказу №" . $orderid);
                        $this->email->message($str2);
                        
                        if ($this->email->send()) {
                                //Success email Sent
                                //echo $this->email->print_debugger();
                        } else {
                                //Email Failed To Send
                                // echo $this->email->print_debugger();
                        }
                } elseif ($ch_res == 'avtor') {
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

                        
                        if (!$preferred_writer == 0) {

                                //send email to writer
                                // get the email of a given username from database
                                $data['get_writer_email'] = $this->Siteconfigs_model->get_writer_email($this->input->post('preferred_writer'));
                                $writer_email             = $data['get_writer_email']['email'];
                                
                                $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($writer_email);
                                
                                $this->email->newSubject("Новое сообщение, отправленное по заказу №" . $orderid);
                                $this->email->message($str3);
                                if ($this->email->send()) {
                                        //Success email Sent
                                        //echo $this->email->print_debugger();
                                } else {
                                        //Email Failed To Send
                                        // echo $this->email->print_debugger();
                                }
                        }
                        }
                        redirect('Adminorders/view_order/' . $orderid . '#messages');
                        
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }
        

        public function delete_message($id = NULL){
            $id = $this->input->post('id');
            $this->Messages_model->delete_message($id);
            print_r(json_encode('ok'));
        }        

        public function deleteTechMessage(){
            $id = $this->input->post('id');
            $this->Messages_model->deleteTechMessage($id);
            print_r(json_encode('ok'));
        }

        public function delete_order_rating($id = NULL){

           $this->form_validation->set_rules('id', 'id', 'required');
            if($this->form_validation->run() === TRUE){

                   $this->Messages_model->delete_order_rating($id);
                redirect('Adminorders/view_order/'.$this->input->post('orderid'));
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }
        // this is rating for particular order        
        public function order_rating()
        {
                
                $this->form_validation->set_rules('orderid', 'orderid', 'required');
                if ($this->form_validation->run() === TRUE) {
                        $date        = date('Y/m/d H:i:s');
                        $date_posted = date('Y/m/d H:i:s');
                        
                        $data = array(
                                'orderid' => $this->input->post('orderid'),
                                'clientid' => $this->input->post('clientid'),
                                'date' => $date_posted,
                                'customer_name' => $this->input->post('customer_name'),
                                'rating' => $this->input->post('rating'),
                                'comment' => $this->input->post('comment'),
                                'amount' => $this->input->post('amount'),
                                'topic' => $this->input->post('topic'),
                                'writerid' => $this->input->post('writerid'),
                                'subject' => $this->input->post('subject')
                        );
                        
                        $this->Messages_model->order_rating($data);
                        redirect('order/view/'.$this->input->post('orderid').'#rateorder');
                        
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }

        
        // This is the method reposible for assigning orders to writers. it is accessed from 1) when customer assigns an order to writer or order/view/orderid (only for customers' my orders). IT is accessed when admin assign an order from Master/order_requests and also from  master/view_order/orderid. This method is called three times. 
        public function assign_writer($orderid = NULL)
        {
                
                $this->form_validation->set_rules('preferred_writer', 'preferred_writer', 'required');
                if ($this->form_validation->run() === TRUE) {
                        $orderid          = $this->input->post('orderid');
                        $preferred_writer = $this->input->post('preferred_writer');
                        $order_status     = 'Assigned';
                        
                        $data = array(
                                'preferred_writer' => $this->input->post('preferred_writer'),
                                'writer_name' => $this->input->post('writer_name'),
                                'order_status' => $order_status
                        );
                        
                        $this->Ordersed_model->order_update($orderid, $data);
                        echo "Вы успешно присвоили этот заказ " . $preferred_writer;
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }
        
        // This method is being used twice, by editing customer's details and also editing writer's details.        
        public function orderadminedit($orderid = NULL)
        {
                $this->form_validation->set_rules('subject', 'subject', 'required');
                $this->form_validation->set_rules('topic', 'topic', 'required');
                $this->form_validation->set_rules('words', 'words', 'required');
                $this->form_validation->set_rules('instructions', 'instructions', '');
                $this->form_validation->set_rules('urgency', 'urgency', 'required');
                $this->form_validation->set_rules('amount', 'amount', '');
                if ($this->form_validation->run() === TRUE) {
                        $orderid       = $this->input->post('orderid');
                        $writer_status = $this->input->post('writer_status');
                        
                        $data = array(
                                'subject' => $this->input->post('subject'),
                                'topic' => $this->input->post('topic'),
                                'words' => $this->input->post('words'),
                                'instructions' => $this->input->post('instructions'),
                                'urgency' => $this->input->post('urgency'),
                                'amount' => $this->input->post('amount')
                        );
                        
                        $this->Ordersed_model->order_update($orderid, $data);
                        echo "Статус заказа обновлен";
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }
        
        // --------------

        public function message_submit_new(){

                $msg_date = date('d.m.Y H:i:s');
                $msg_type = 'message';
                $msg_id = random_string('numeric', 9);
                $receiverid = array();
                if(!empty($this->Messages_model->getSupManagerId($this->input->post('senderid')))) {
                    $receiverid = $this->Messages_model->getSupManagerId($this->input->post('senderid'));
                } else {
                    $receiverid = 0;
                } ;

                // return print_r(json_encode($receiverid));
                $data['receivername'] = $this->Messages_model->get_user_name($this->input->post('receiverid'));
                $data['firstname'] = $data['receivername']['firstname'];
                $data['lastname'] = $data['receivername']['lastname'];

                // print_r($data['firstname']);
                // print_r( $data['receivername']['firstname'].' '.$data['receivername']['lastname']);
                 $receiver_name        = $data['firstname'].' '.$data['lastname'];
                        $data = array(
                                'senderid' => $this->input->post('senderid'),
                                'sender_name' => $this->input->post('sender_name'),
                                'receiverid' => $receiverid['sup_manager'],
                                'msg_title' => $this->input->post('msg_title'),
                                'msg_body' => $this->input->post('msg_body'),
                                'msg_date' => $msg_date,
                                'msg_type' => $msg_type,
                                'msg_id' => $msg_id,
                                'msg_read' => 0,
                                'from_who' => $this->input->post('from-who') 
                        );
                        
                        $queryId = $this->Messages_model->message_submit($data);


                $data_w = array(
                    'last_tech_message' => $msg_date
                 );

                if($this->session->userdata('writer_level') === 'admin'){
                    $this->Ordersed_model->writer_update($msg_receiverid, $data_w);
                } else {
                    $this->Ordersed_model->writer_update($this->session->userdata('writer_id'), $data_w);
                }
               


                  $msg_id    = $msg_id;
                  $ordernow     = base_url() . 'project/create/';
                  $loginurl     = base_url() . 'user/login/';
                  $sitename     = $this->config->item('sitename');


                    $data['msg']     = $this->Siteconfigs_model->msg_config('new_message_received');
                     $msg_body_admin = $data['msg']['msg_body_admin'];


                      //this replaces all the double quotes with single quotes since when double quotes are left, they give an error. 
                                $msg_body_admin = str_replace('"', "'", $msg_body_admin);


                                // This evals so that the variables in the codes are read
                                eval("\$str2 = \"$msg_body_admin\";");
                                //echo $str2; 
                                

                                   //send email to admin
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
            
                                // send message to client
                                $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($this->input->post('email'));
                                
                                $this->email->subject('Новое сообщение №'.  $msg_id . 'получено');
                                $this->email->message($str2);
                                if(!empty($this->input->post('email'))){                            
                                    if ($this->email->send()) {
                                            //Success email Sent
                                            //echo $this->email->print_debugger();
                                    } else {
                                            //Email Failed To Send
                                            // echo $this->email->print_debugger();
                                    } 
                                }    

                                 $message['id'] = $queryId;
                                 $message['date'] = $msg_date;
                                echo json_encode($message);
                                die();

        }
        // --------------





        // this is the method that helps in requesting orders from the writer's end. only a writer can request an order        
        public function message_submit()
        {
                
                $this->form_validation->set_rules('senderid', 'senderid', 'required');
                $this->form_validation->set_rules('msg_title', 'msg_title', 'required');
                $this->form_validation->set_rules('sender_name', 'sender_name', 'required');
                $this->form_validation->set_rules('msg_body', 'msg_body', 'required');
                $this->form_validation->set_rules('receiverid', 'receiverid', 'required');
                if ($this->form_validation->run() === TRUE) {
                        $msg_date = date('d.m.Y H:i:s');
                        $msg_type = 'message';
                        $msg_id = random_string('numeric', 9);
                
                $data['receivername'] = $this->Messages_model->get_user_name($this->input->post('receiverid'));
                $data['firstname'] = $data['receivername']['firstname'];
                $data['lastname'] = $data['receivername']['lastname'];
                // print_r($data['firstname']);
                // print_r( $data['receivername']['firstname'].' '.$data['receivername']['lastname']);
                 $receiver_name        = $data['firstname'].' '.$data['lastname'];
                        $data = array(
                                'senderid' => $this->input->post('senderid'),
                                'sender_name' => $this->input->post('sender_name'),
                                'receiverid' => $this->input->post('receiverid'),
                                'receiver_name'=> $data['receivername']['firstname'].' '.$data['receivername']['lastname'],
                                'msg_title' => $this->input->post('msg_title'),
                                'msg_body' => $this->input->post('msg_body'),
                                'msg_date' => $msg_date,
                                'msg_type' => $msg_type,
                                'msg_id' => $msg_id,
                                'msg_read' => 0,
                                
                        );
                        
                        $this->Messages_model->message_submit($data);


                
               


                $msg_id    = $msg_id;
                  $ordernow     = base_url() . 'project/create/';
                  $loginurl     = base_url() . 'user/login/';
                  $sitename     = $this->config->item('sitename');


                    $data['msg']     = $this->Siteconfigs_model->msg_config('new_message_received');
                     $msg_body_admin = $data['msg']['msg_body_admin'];


                      //this replaces all the double quotes with single quotes since when double quotes are left, they give an error. 
                                $msg_body_admin = str_replace('"', "'", $msg_body_admin);


                                // This evals so that the variables in the codes are read
                                eval("\$str2 = \"$msg_body_admin\";");
                                //echo $str2; 
                                

                                   //send email to admin
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
            
                                // send message to client
                                $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($this->input->post('email'));
                                
                                $this->email->subject($receiver_name.', '.'Новое сообщение №'.  $msg_id . 'получено');
                                $this->email->message($str2);
                                
                                if ($this->email->send()) {
                                        //Success email Sent
                                        //echo $this->email->print_debugger();
                                } else {
                                        //Email Failed To Send
                                        // echo $this->email->print_debugger();
                                } 


                       redirect('messages/read/'.$msg_id);
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }
        
      
        public function message_reply_new()  {
                $msg_date = date('d.m.Y H:i:s');
                $msg_type = 'reply';
                // $data['msgdtls'] = $this->Messages_model->check_receiver_new($this->input->post('receiverid'));
                $msg_receiverid = $this->input->post('receiver_id');
                $msg_receiver_name = $this->input->post('receiver_name'); 
                //$data['msgdtls']['receiver_name'];
                $msg_senderid = $this->input->post('sender_id');
                $msg_sender_name = $this->input->post('sender_name');
                $senderid = $this->session->userdata('writer_id');



            // $a = $this->session->userdata();
            // $a['last_tech_mes'] = array(
            //     $msg_receiverid => $msg_date
            // );
            // $this->session->set_userdata($a);
            // unset($a);

            //if the person replying is not the receiver, then its its outbox
                
            if($msg_senderid == $senderid){

                $data = array(
                    'senderid' => $msg_senderid,
                    'sender_name' => $msg_sender_name,
                    'receiverid' => $msg_receiverid,
                    'receiver_name' => $msg_receiver_name,
                    'msg_title' => $this->input->post('msg_title'),
                    'msg_body' => $this->input->post('msg_body'),
                    'msg_date' => $msg_date,
                    'msg_type' => $msg_type,
                    'msg_id' => $msg_id = random_string('numeric', 9),                         
                );
                $this->Messages_model->mes_sup_submit($data);
                
                $data_w = array(
                    'last_tech_message' => $msg_date
                 );

                if($this->session->userdata('writer_level') === 'admin'){
                    $this->Ordersed_model->writer_update($msg_receiverid, $data_w);
                } else {
                    $this->Ordersed_model->writer_update($this->session->userdata('writer_id'), $data_w);
                }


            }

            // this means the message is in inbox
            if($msg_senderid != $senderid){

            $data = array(
                    'senderid' => $senderid,
                    'sender_name' => $msg_receiver_name,
                    'receiverid' => $msg_senderid,
                    'receiver_name' =>  $msg_sender_name,
                    'msg_title' => $this->input->post('msg_title'),
                    'msg_body' => $this->input->post('msg_body'),
                    'msg_date' => $msg_date,
                    'msg_type' => $msg_type,
                    'msg_id'  => $msg_id = random_string('numeric', 9),                    
                );
           $this->Messages_model->mes_sup_submit($data);







        }

        echo json_encode($msg_date); 
}

        public function message_reply()
        {
                
                $this->form_validation->set_rules('senderid', 'senderid', 'required');
                $this->form_validation->set_rules('msg_title', 'msg_title', 'required');
                $this->form_validation->set_rules('sender_name', 'sender_name', 'required');
                $this->form_validation->set_rules('msg_body', 'Message body', 'required');
                $this->form_validation->set_rules('msg_id', 'msg_id', 'required');
                if ($this->form_validation->run() === TRUE) {
                        $msg_date = date('d.m.Y H:i:s');
                        $msg_type = 'reply';
                
                $data['msgdtls'] = $this->Messages_model->check_receiver($this->input->post('msg_id'));
                $msg_receiverid = $data['msgdtls']['receiverid'];
                $msg_receiver_name = $data['msgdtls']['receiver_name'];
                $msg_senderid = $data['msgdtls']['senderid'];
                $msg_sender_name = $data['msgdtls']['sender_name'];
                $senderid = $this->session->userdata('writer_id');

            //if the person replying is not the receiver, then its its outbox
                
            if($msg_senderid == $senderid){

                    $data = array(
                    'senderid' => $msg_senderid,
                    'sender_name' => $msg_sender_name,
                    'receiverid' => $msg_receiverid,
                    'receiver_name' => $msg_receiver_name,
                    'msg_title' => $this->input->post('msg_title'),
                    'msg_body' => $this->input->post('msg_body'),
                    'msg_date' => $msg_date,
                    'msg_type' => $msg_type,
                    'msg_id' => $this->input->post('msg_id'),                         
                );
           $this->Messages_model->message_submit($data);


                  $receiver_name  = $data['msgdtls']['receiver_name'];
                  $msg_id         = $this->input->post('msg_id');
                  $ordernow       = base_url() . 'project/create/';
                  $loginurl       = base_url() . 'user/login/';
                  $sitename       = $this->config->item('sitename');


                    $data['msg']     = $this->Siteconfigs_model->msg_config('new_message_received');
                     $msg_body_admin = $data['msg']['msg_body_admin'];


                      //this replaces all the double quotes with single quotes since when double quotes are left, they give an error. 
                                $msg_body_admin = str_replace('"', "'", $msg_body_admin);


                                // This evals so that the variables in the codes are read
                                eval("\$str1 = \"$msg_body_admin\";");
                                //echo $str2; 
                                

                                   //send email to admin
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
            
                                // send message to client
                                $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($this->input->post('emailee'));
                                
                                $this->email->subject($receiver_name.', '.'Новое сообщение №'.  $msg_id . 'получено');
                                $this->email->message($str1);
                                if(!empty($this->input->post('emailee'))){

                                    if ($this->email->send()) {
                                            //Success email Sent
                                            //echo $this->email->print_debugger();
                                    } else {
                                            //Email Failed To Send
                                            // echo $this->email->print_debugger();
                                    } 
                                }



            }

            // this means the message is in inbox
            if($msg_senderid != $senderid){

            $data = array(
                    'senderid' => $senderid,
                    'sender_name' => $msg_receiver_name,
                    'receiverid' => $msg_senderid,
                    'receiver_name' =>  $msg_sender_name,
                    'msg_title' => $this->input->post('msg_title'),
                    'msg_body' => $this->input->post('msg_body'),
                    'msg_date' => $msg_date,
                    'msg_type' => $msg_type,
                    'msg_id' => $this->input->post('msg_id'),                         
                );
           $this->Messages_model->message_submit($data);


            $receiver_name        = $data['msgdtls']['receiver_name'];
                    $msg_id    = $this->input->post('msg_id');
                  $ordernow     = base_url() . 'project/create/';
                  $loginurl     = base_url() . 'user/login/';
                  $sitename     = $this->config->item('sitename');


                    $data['msg']     = $this->Siteconfigs_model->msg_config('new_message_received');
                     $msg_body_admin = $data['msg']['msg_body_admin'];


                      //this replaces all the double quotes with single quotes since when double quotes are left, they give an error. 
                                $msg_body_admin = str_replace('"', "'", $msg_body_admin);


                                // This evals so that the variables in the codes are read
                                eval("\$str1 = \"$msg_body_admin\";");
                                //echo $str2; 
                                

                                   //send email to admin
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
            
                                // send message to client
                                $this->email->from($smtp_user, $smtp_name);
                                $this->email->to($this->input->post('emailee'));
                                
                                $this->email->subject($receiver_name.', '.'Новое сообщение №'.  $msg_id . 'получено');
                                $this->email->message($str1);
                                if(!empty($this->input->post('emailee'))){
                                    if ($this->email->send()) {
                                            //Success email Sent
                                            //echo $this->email->print_debugger();
                                    } else {
                                            //Email Failed To Send
                                            // echo $this->email->print_debugger();
                                    } 
                                }
                        
        }

                        redirect('messages/read/'.$this->input->post('msg_id'));
                        
                        
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }
        
        
        public function read($msg_id = NULL)
        {
                $data['messages'] = $this->Messages_model->read_msg($msg_id);
                $data['receiverid'] = $data['messages']['receiverid'];
                $data['senderid'] = $data['messages']['senderid'];
                $data['msg_body'] = $data['messages']['msg_body'];
                $data['replies']  = $this->Messages_model->get_msg_replies($msg_id);
                $this->load->view('template/header');
                $this->load->view('template/sidebar-user');
                $this->load->view('messages/view', $data);
                $this->load->view('template/footer');

               if(1){
                        
                        $data = array(
                                'msg_read' => 1,
                                
                        );
                        // update to mark it as unread due to this reply
                      $this->Messages_model->mark_asread_user($msg_id, $data);
                }

                
        }
        
        
        
}