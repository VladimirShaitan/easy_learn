<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Writersed extends CI_Controller
{
        
        public function __construct()
        {
                parent::__construct();
                $this->load->model('students_model');
                $this->load->model('Ordersed_model');
                $this->load->model('Writersed_model');
                $this->load->model('Siteconfigs_model');
                $this->load->model('Orders_model');
                $this->load->model('Messages_model');
                $this->load->model('Adminusers_model');
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
                $this->load->view('form');
        }
        
        
        public function submission($writer_id = NULL)
        {
                $email     = $this->input->post('email');
                $firstname = $this->input->post('firstname');
                $this->form_validation->set_rules('writer_status', 'writer_status', 'required');
                if ($this->form_validation->run() === TRUE) {
                        $writer_id     = $this->input->post('writer_id');
                        $writer_status = $this->input->post('writer_status');
                        
                        $data = array(
                                'writer_status' => $this->input->post('writer_status')
                        );
                        
                        $this->Ordersed_model->writer_update($writer_id, $data);

                        
                        // defin ethe varibales 
                        $useremail         = $this->input->post('email');
                        $userfirstname     = $this->input->post('firstname');
                        $userwriter_id     = $this->input->post('writer_id');
                        $userwriter_status = $this->input->post('writer_status');
                        // get the email details here and eval so that the codes can be read. 
                        $data['msg']       = $this->Siteconfigs_model->msg_config('writer_status_changed');
                        $msg_body_admin    = $data['msg']['msg_body_admin'];
                        $msg_body_writer   = $data['msg']['msg_body_writer'];
                        
                        //this replaces all the double quotes with single quotes since when double quotes are left, they give an error. 
                        $msg_body_admin  = str_replace('"', "'", $msg_body_admin);
                        $msg_body_writer = str_replace('"', "'", $msg_body_writer);
                        
                        // This evals so that the variables in the codes are read
                        eval("\$str1 = \"$msg_body_admin\";");
                        //echo $str1; 
                        
                        
                        // This evals so that the variables in the codes are read
                        eval("\$str2 = \"$msg_body_writer\";");
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
                        
                        //send email to admin to notify of status change
                        $this->email->from($smtp_user, $smtp_name);
                        $this->email->to($admin_email);
                        
                        $this->email->subject("Writer " . $userwriter_id . ' was sucessfully updated to ' . $userwriter_status);
                        $this->email->message($str1);
                        
                        if ($this->email->send()) {
                                //Success email Sent
                                //echo $this->email->print_debugger();
                        } else {
                                //Email Failed To Send
                                // echo $this->email->print_debugger();
                        }
                        
                        
                        // send message to writer to notify of accoutn status change
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
                        
                        $this->email->from($smtp_user, $smtp_name);
                        $this->email->to($this->input->post('email'));
                        
                        $this->email->subject("Статус Вашего аккаунта изменился на " . $userwriter_status);
                        $this->email->message($str2);
                        
                        if ($this->email->send()) {
                                //Success email Sent
                                //echo $this->email->print_debugger();
                        } else {
                                //Email Failed To Send
                                // echo $this->email->print_debugger();
                        }
                        
                         redirect('opmaster/view_writer/'.$this->input->post('writer_id'));
                        
                        
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
                
                
        }        
        






        
        public function mystatus_change($writer_id = NULL)
        {

                $this->form_validation->set_rules('writer_id', 'writer_id', 'required');
                $this->form_validation->set_rules('email', 'email', 'required');
                if ($this->form_validation->run() === TRUE) {
                        $writer_id     = $this->input->post('writer_id');
                      
                        $data = array('mystatus' => $this->input->post('mystatus'));
                        
                        $this->Ordersed_model->writer_update($writer_id, $data);
                        
                        // define the variables
                        $useremail         = $this->input->post('email');
                        $userfirstname     = $this->input->post('firstname');
                        $usermystatus = $this->input->post('mystatus');
                        // get the email details here and eval so that the codes can be read. 
                        $data['msg']       = $this->Siteconfigs_model->msg_config('writer_deactivates');

                        $msg_body_writer   = $data['msg']['msg_body_writer'];
                        
                        //this replaces all the double quotes with single quotes since when double quotes are left, they give an error. 
                        $msg_body_writer = str_replace('"', "'", $msg_body_writer);

                        // This evals so that the variables in the codes are read
                        eval("\$str2 = \"$msg_body_writer\";");
                        //echo $str2; 
                                             
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


                        // send message to writer to notify of accoutn status change
                        $this->email->from($smtp_user, $smtp_name);
                        $this->email->to($this->input->post('email'));
                        
                        $this->email->subject("Статус Вашего аккаунта изменился на " . $usermystatus);
                        $this->email->message($str2);
                        
                        if ($this->email->send()) {
                                //Success email Sent
                                //echo $this->email->print_debugger();
                        } else {
                                //Email Failed To Send
                                // echo $this->email->print_debugger();
                        }
                        
                        
                        redirect('user/myprofile');
                        
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
                
                
        }
        
        // This method is being used twice, by editing customer's details and also editing writer's details.        
        public function profadminedit($writer_id = NULL)
        {
                $this->form_validation->set_rules('firstname', 'firstname', 'required');
                $this->form_validation->set_rules('lastname', 'lastname', 'required');
                $this->form_validation->set_rules('email', 'email', 'required|valid_email');
                $this->form_validation->set_rules('gender', 'gender', 'required');
                $this->form_validation->set_rules('city', 'city', 'required');
                $this->form_validation->set_rules('primaryphone', 'primaryphone', 'required');
                $this->form_validation->set_rules('nativelanguage', 'nativelanguage', 'required');
                $this->form_validation->set_rules('subject', 'subject', 'required');
                if ($this->form_validation->run() === TRUE) {
                        $writer_id     = $this->input->post('writer_id');
                        $writer_status = $this->input->post('writer_status');
                        
                        $data = array(
                                'firstname' => $this->input->post('firstname'),
                                'lastname' => $this->input->post('lastname'),
                                'email' => $this->input->post('email'),
                                'gender' => $this->input->post('gender'),
                                'city' => $this->input->post('city'),
                                'primaryphone' => $this->input->post('primaryphone'),
                                'nativelanguage' => $this->input->post('nativelanguage')
                                //'subject' => $this->input->post('subject')
                        );
                        
                        $this->Ordersed_model->writer_update($writer_id, $data);
                        echo "Writer Profile sucessfully update";
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }
        
        // This method is being used by user to edit their profiles once they log in. This is called from the file view/myccount.       
        public function profuseredit($writer_id = NULL)
        {

                $this->form_validation->set_rules('email', 'email', 'required|valid_email');
                if ($this->form_validation->run() === TRUE) {
                        $writer_id     = $this->input->post('writer_id');
                        $writer_status = $this->input->post('writer_status');
                        $inputtext = $this->input->post('text');
                        $clean_text = strip_tags($inputtext,'<table><p><td><tr><th><em><strong><h1><h2><h3><h4><h5><h6><i>');
                         $subjecta      = $this->input->post('gas_my');
                        $subject       = implode(', ', $subjecta);        
                        $data = array(
                                'firstname' => $this->input->post('firstname'),
                                'lastname' => $this->input->post('lastname'),
                                'primaryphone' => $this->input->post('primaryphone'),
                                'email' => $this->input->post('email'),
                                'text' => $this->input->post('text'),
                                'city' => $this->input->post('city'),
                                'nativelanguage' => $this->input->post('nativelanguage'),
                                'subject' => $subject
                              //  'subject_all' => $this->input->post('subject_all')
                        );
                        
                        $this->Writersed_model->writer_update($writer_id, $data);
                        redirect('user/myprofile#editprofile');
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }
// проверка онлайн

public function check_online($writer_id = NULL)  {
    $user_level    = $this->session->userdata('user_level');
    $writer_id     = $this->input->post('writer_id');
    $online        = $this->input->post('date_now');
    $params        = $this->input->post('params');
    $pageUrl       = $this->input->post('url');
    $data = array(
            'online' => $online
    );
    $this->Writersed_model->check_online($writer_id, $data);
    
  

    if($user_level != 'client'){
        $queryMes = $this->Writersed_model->getOrdersMessages_v($writer_id);
        $mes = array();
        if(!empty($queryMes)){
            foreach ($queryMes as $singMes) {
                array_push($mes, implode(':', $singMes));
            }
            unset($queryMes);
        }  
        $newOrders_n = $this->Writersed_model->getOrdBidNotice_v($writer_id);
        $newOrders_n['orders_neworder'] = $newOrders_n['prof_ord_notices'];

        $newOrders_n['wr_files_notice'] = explode(', ', $newOrders_n['wr_files_notice']);
        $newOrders_n['wr_files_notice'] = array_unique($newOrders_n['wr_files_notice']);
        $newOrders_n['wr_files_notice'] = implode(', ', $newOrders_n['wr_files_notice']);
        $newOrders_n['orders_wr_file'] = $newOrders_n['wr_files_notice'];

        unset($newOrders_n['prof_ord_notices']);
        unset($newOrders_n['wr_files_notice']);

        $newOrders_n['orders_auctsion'] = $this->Writersed_model->getOrderBidNotice_v($writer_id);
        $newOrders_n['orders_auctsion'] = $newOrders_n['orders_auctsion']['oth_bids_notice'];

        $newOrders_n['orders_todo'] = $this->Writersed_model->getWriterNotice_v($writer_id, 'view_todo_ord');
        $newOrders_n['orders_revord'] = $this->Writersed_model->getWriterNotice_v($writer_id, 'wr_view_rev');
        $newOrders_n['plan_info'] = $this->Writersed_model->getWriterNotice_v($writer_id, 'wr_view_plan');
        $newOrders_n['orders_paid'] = $this->Writersed_model->getWriterNotice_v($writer_id, 'paid_writer_mes');
        $newOrders_n['orders_fine'] = $this->Writersed_model->getWriterNotice_v($writer_id, 'fine_wr_message');
        

        if(!empty($mes)){
            $newOrders_n['orders_chat'] = ', '.implode(', ', $mes);
        } else {
            $newOrders_n['orders_chat'] = '';
        } 

    } else {

        $queryMesCl = $this->Writersed_model->getClNoticeMessages_v($writer_id);
        $mesCl = array();
        if(!empty($queryMesCl)){
            foreach ($queryMesCl as $singMes) {
                array_push($mesCl, implode(':', $singMes));
            }
            unset($queryMesCl);
        } 
        if(!empty($mesCl)){
            $newOrders_n['orders_mesCl'] = ', '.implode(', ', $mesCl);;
        } else {
            $newOrders_n['orders_mesCl'] = '';
        }

        $fileNoticeChecker = $this->Writersed_model->getFileNotice_v($writer_id);
        if(!empty($fileNoticeChecker)){
            $newOrders_n['orders_file'] = ', '.implode(', ', $fileNoticeChecker);
        } else {$newOrders_n['orders_file'] ='';}


    }
        $newOrders_n['nom'] = $this->Writersed_model->countThechSupportMessages($writer_id);
    
    if(stripcslashes($pageUrl) === ci_site_url().'messages/messages'){
        $newOrders_n['newTechMessages'] = $this->Writersed_model->unreadTechMessages($writer_id);
    }

    $order_link = explode('/',stripcslashes($pageUrl));
    $orderid = array_pop($order_link);
    $order_link = implode('/', $order_link);
    if($order_link === ci_site_url().'order/view'){
        $newOrders_n['wr_cl_order_chat'] = $this->Writersed_model->cl_wr_order_chat_v($writer_id, explode('#',$orderid)[0]);
    }  

    unset($newOrders_n['oth_bids_notice']);
    echo json_encode($newOrders_n);

    die();

}

public function notice_checker($writer_id = NULL){
    // echo $writer_id;
    $id = $this->input->post('writer_id');
    $url = $this->input->post('url');
    $dateMsg = $this->input->post('techLastDate');


    $mngrNotices['orders_neworder'] = $this->Writersed_model->createSuperNotice_v('mngr_neworder', $id);
    $mngrNotices['orders_newmember'] = $this->Writersed_model->createSuperNotice_v('mngr_newuser', $id);
    $mngrNotices['orders_auctsion'] = $this->Writersed_model->createSuperNotice_v('mngr_new_order_bid', $id);
    $mngrNotices['orders_files'] = $this->Writersed_model->createSuperNotice_v('mngr_new_order_files', $id);
    $mngrNotices['orders_to_assign'] = $this->Writersed_model->createSuperNotice_v('mngr_wait_accept', $id);
    $mngrNotices['orders_chat'] = $this->Writersed_model->createSuperNotice_v('mngr_new_order_mes', $id);
    $mngrNotices['nom'] =  $this->Writersed_model->techMesManCount_v($id);


    stripcslashes($url);
    $url = explode('/', $url);
    $orderid = array_pop($url);
    $url = implode('/', $url);

     
    
    if($url === ci_site_url().'Adminmsg/sup_chat'){
        $userId = explode('#', $orderid)[0]; 

        // $a = $this->session->userdata();
        // $a['last_tech_mes'] = array($userId => $msg_date);
        // $this->session->set_userdata($a);
        // unset($a);


        $mngrNotices['techChat'] = $this->Writersed_model->techMesMan_v($id, $userId, $dateMsg);

    // if(!empty($mngrNotices['techChat'])){
    //     $a = $this->session->userdata();
    //     $a['last_tech_mes'] = array($userId => $mngrNotices['techChat'][count($mngrNotices['techChat'])-1]['msg_date']);
    //     $this->session->set_userdata($a);
    //     unset($a);
    // }

        // print_r();
        // return false;


    }

    if($url === ci_site_url().'Adminorders/view_order'){
        $mngrNotices['mngrUserChat'] = $this->Writersed_model->mngr_usr_order_chat_v($orderid);
    }


    // $mngrNotices['nom'] 


    echo json_encode($mngrNotices);
    // echo json_encode($url);
    die();
}



//проверка онлайн manager


public function msg_mananger($writer_id = NULL)
        {

                        $writer_id     = $this->input->post('writer_id');
                        $online        = $this->input->post('date_now');
                        $params        = $this->input->post('params');

                        $data = array(
                                'online' => $online
                        );
                        $this->Writersed_model->check_online($writer_id, $data);

                        $orders['orders_newmember'] = $this->Adminusers_model->ajax_all_writers();
                        $orders['orders_neworder'] = $this->Orders_model->ajax_all_neworder();
                        $orders['orders_auctsion'] = $this->Orders_model->ajax_auct_manager();
                        $orders['orders_files'] = $this->Orders_model->ajax_order_files_manager();
                        $orders['orders_chat'] = $this->Messages_model->ajax_get_messages_admin(); 
                         // $orders['orders_subject'] = $this->Orders_model->ajax_writer_profile();
                         // $orders['orders_revision'] = $this->Orders_model->ajax_writer_revision();
                         // $orders['orders_paid'] = $this->Orders_model->ajax_writer_paidord();
                         // $orders['orders_ass'] = $this->Orders_model->ajax_writer_assigned();
                         // $orders['orders_chat'] = $this->Messages_model->ajax_get_messages($writer_id);    
                         // $orders['orders_auctsion'] = $this->Orders_model->ajax_auct($writer_id);
                         // $orders['orders_plan'] = $this->Ordersed_model->ajax_order_plan();
                         // $orders['orders_fine'] = $this->Ordersed_model->ajax_order_fine();
                         // $orders['orders_files'] = $this->Orders_model->ajax_order_files();




                        //echo json_encode($orders['orders_ass']);

                         // $params_arr = array( 'orders_subject', 'orders_revision', 'orders_paid', 'orders_ass', 'orders_chat', 'orders_auctsion', 'orders_plan', 'orders_fine', 'orders_files');

                         $params_arr = array('orders_newmember', 'orders_neworder', 'orders_auctsion', 'orders_files', 'orders_chat');


                        if($params === ''){
                            echo json_encode($orders);  
                            die();
                        } else {
                            $params = str_replace(array('\"', '\/'), array('"', '/'), $params);
                            $params = json_decode($params, TRUE);
                            $sum = array();
                            if ( is_array( $params['orders_auctsion'] ) ) {
                                foreach ($params['orders_auctsion'] as $value) {  
                                    if(!in_array($value['sum'],$sum) ){
                                        $sum[] = $value['sum'];
                                    }
                                }
                            }
                            $new_sum = $this->Orders_model->ajax_auct_manager( $sum );
                            if ( false != $new_sum && is_array( $new_sum ) ) {
                                foreach ( $new_sum as  $new ) {
                                    array_push($orders['orders_auctsion'], $new);
                                }
                                //$orders['new_sum'] = $new_sum;
                            }
                            if ( is_array( $params_arr ) ) {
                                foreach( $params_arr as $param_arr ){

                                    if( ($params[$param_arr] == false && is_array($orders[$param_arr])) || (count( $params[$param_arr] ) < count( $orders[$param_arr]) ) ){
                                        $params[$param_arr] = $orders[$param_arr];
                                        foreach($params[$param_arr] as &$param){ 
                                            $param['changed'] = 'changed';
                                            unset($param);
                                        }
                                    } else {
                                         $params[$param_arr] = $orders[$param_arr];
                                    }

                                }
                            }
                            // $params['orders_subject'] = 'moma';
                            // $params = json_decode($params);
                            // $vova = $params['orders_subject'];
                            echo json_encode($params);
                            die();
                        }
                        
                        
                        
        }




//проверка онлайн manager



        public function get_all_subject($subject_th = NULL)
        {
                $subject_all['subject'] = $this->Orders_model->get_all_subject($subject_th);
                
                
        }

        
}