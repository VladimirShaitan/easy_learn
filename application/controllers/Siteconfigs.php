<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Siteconfigs extends CI_Controller{

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Siteconfigs_model');
                $this->load->model('Financial_model');
                $this->load->model('Msgconfig_model');
                $this->load->library(array('form_validation','session'));
                $this->load->helper(array('url','html','form'));

                 if ($this->session->userdata('writer_level') != 'admin') {
                        redirect('user/myaccount');
                }

        } 

        public function index(){ 
            $configs['configs'] = $this->Siteconfigs_model->configs();
             $this->load->view('opmaster/template/header');
             $this->load->view('opmaster/template/admin-sideconfigs');
            $this->load->view('opmaster/configs/admin-configs', $configs);
 
        }
        public function configs(){ 
            $configs['configs'] = $this->Siteconfigs_model->configs();
             $this->load->view('opmaster/template/header');
             $this->load->view('opmaster/template/admin-sideconfigs');
            $this->load->view('opmaster/configs/admin-configs', $configs);
 
        }
        public function payout(){ 
            $configs['accepted_payout'] = $this->Financial_model->accepted_payout();
             $this->load->view('opmaster/template/header');
              $this->load->view('opmaster/template/admin-sideconfigs');
            $this->load->view('opmaster/configs/admin-payout', $configs);
 
        }
       public function coupon(){ 
            $configs['ops_coupon'] = $this->Siteconfigs_model->ops_coupon();
             $this->load->view('opmaster/template/header');
             $this->load->view('opmaster/template/admin-sideconfigs');
            $this->load->view('opmaster/configs/admin-coupon', $configs);
 
        }
        public function acalevel(){ 
            $configs['academic_level'] = $this->Siteconfigs_model->academic_level();
             $this->load->view('opmaster/template/header');
             $this->load->view('opmaster/template/admin-sideconfigs');
            $this->load->view('opmaster/configs/admin-acalevel', $configs);
 
        }
        public function urgency(){ 
            $configs['urgency'] = $this->Siteconfigs_model->urgency();
        	 $this->load->view('opmaster/template/header');
             $this->load->view('opmaster/template/admin-sideconfigs');
            $this->load->view('opmaster/configs/admin-urgency', $configs);
 
        }
        public function refstyles(){ 
            $configs['urgency'] = $this->Siteconfigs_model->urgency();
             $this->load->view('opmaster/template/header');
             $this->load->view('opmaster/template/admin-sideconfigs');
            $this->load->view('opmaster/configs/admin-urgency', $configs);
 
        }

        public function smtpconfig(){ 
            $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_admin();
             $this->load->view('opmaster/template/header');
             $this->load->view('opmaster/template/admin-sideconfigs');
            $this->load->view('opmaster/configs/admin-smtpconfig', $configs);
 
        }

        public function subjects(){
            $configs['subjects'] = $this->Siteconfigs_model->subjects();
             $this->load->view('opmaster/template/header');
             $this->load->view('opmaster/template/admin-sideconfigs');
            $this->load->view('opmaster/configs/admin-subjects', $configs);
        }

        

        public function upsells(){
            $configs['upsells'] = $this->Siteconfigs_model->upsells();
             $this->load->view('opmaster/template/header');
             $this->load->view('opmaster/template/admin-sideconfigs');
            $this->load->view('opmaster/configs/admin-upsells', $configs);

        }

        
        public function messages(){

        	$configs['messages'] = $this->Siteconfigs_model->messages();
        	 $this->load->view('opmaster/template/header');
            $this->load->view('opmaster/configs/admin-msgconfigs', $configs);
    
        }

        public function countries(){
        	$configs['countries'] = $this->Siteconfigs_model->countries();
        	 $this->load->view('opmaster/template/header');
             $this->load->view('opmaster/template/admin-sideconfigs');
            $this->load->view('opmaster/configs/admin-countries', $configs);

        }


                // this is the method that helps in requesting orders from the writer's end. only a writer can request an order        
        public function add_subject(){

            $this->form_validation->set_rules('subject', 'subject', 'required');
            $this->form_validation->set_rules('pvalue', 'pvalue', 'required|numeric|greater_than[0]');
            if($this->form_validation->run() === TRUE){

                   $data = array(
                    'subject'=> $this->input->post('subject'),
                    'pvalue'=> $this->input->post('pvalue'),
                    
                    );

                   $this->Siteconfigs_model->add_subject($data);
               redirect('siteconfigs/subjects');
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }
        public function add_upsell(){


            $this->form_validation->set_rules('upsell_name', 'upsell_name', 'required');
            $this->form_validation->set_rules('upsell_value', 'upsell_value', 'required|numeric|greater_than[0]');
            if($this->form_validation->run() === TRUE){

                   $data = array(
                    'upsell_name'=> $this->input->post('upsell_name'),
                    'upsell_value'=> $this->input->post('upsell_value'),
                    
                    );

                   $this->Siteconfigs_model->add_upsell($data);
               redirect('siteconfigs/upsells');
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }

                // this is the method that helps in requesting orders from the writer's end. only a writer can request an order        
        public function add_academic_level(){

            $this->form_validation->set_rules('academic_level', 'academic_level', 'required');
            $this->form_validation->set_rules('pvalue', 'pvalue', 'required|numeric|greater_than[0]');
            if($this->form_validation->run() === TRUE){

                   $data = array(
                    'academic_level'=> $this->input->post('academic_level'),
                    'pvalue'=> $this->input->post('pvalue'),
                    
                    );

                   $this->Siteconfigs_model->add_academic_level($data);
               redirect('Siteconfigs/acalevel');
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }
       

        public function add_urgency(){

            $this->form_validation->set_rules('urgency', 'urgency', 'required');
            $this->form_validation->set_rules('pvalue', 'pvalue', 'required|numeric|greater_than[0]');
            if($this->form_validation->run() === TRUE){

                   $data = array(
                    'urgency'=> $this->input->post('urgency'),
                    'pvalue'=> $this->input->post('pvalue'),
                    'duration'=> $this->input->post('duration'),
                    
                    );

                   $this->Siteconfigs_model->add_urgency($data);
               redirect('Siteconfigs/urgency');
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }



        public function add_payout(){

            $this->form_validation->set_rules('payout', 'payout', 'required');
            if($this->form_validation->run() === TRUE){

                   $data = array(
                    'payout'=> $this->input->post('payout'),
                  
                    );

                   $this->Siteconfigs_model->add_payout($data);
                redirect('Siteconfigs');
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }



        public function add_style(){

            $this->form_validation->set_rules('style', 'style', 'required');
            if($this->form_validation->run() === TRUE){

                   $data = array(
                    'style'=> $this->input->post('style'),
                  
                    );

                   $this->Siteconfigs_model->add_style($data);
                redirect('Siteconfigs');
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }


        public function update_subject($id = NULL){

            $this->form_validation->set_rules('id', 'id', 'required');
            $this->form_validation->set_rules('pvalue', 'pvalue', 'required');
            $this->form_validation->set_rules('subject', 'subject', 'required');
            if($this->form_validation->run() === TRUE){

                   $data = array(
                    'subject'=> $this->input->post('subject'),
                    'pvalue'=> $this->input->post('pvalue'),
                  
                    );

                   $this->Siteconfigs_model->update_subject($id, $data);
                redirect('Siteconfigs/subjects');
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }



        public function delete_subject($id = NULL){
           $this->form_validation->set_rules('id', 'id', 'required');
            if($this->form_validation->run() === TRUE){
                   $this->Siteconfigs_model->delete_subject($id);
                redirect('Siteconfigs/subjects');
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }



        public function delete_upsell($id = NULL){
           $this->form_validation->set_rules('id', 'id', 'required');
            if($this->form_validation->run() === TRUE){
                   $this->Siteconfigs_model->delete_upsell($id);
                redirect('Siteconfigs/upsells');
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }

        public function delete_academic_level($id = NULL){

           $this->form_validation->set_rules('id', 'id', 'required');
            if($this->form_validation->run() === TRUE){


                   $this->Siteconfigs_model->delete_academic_level($id);
                redirect('Siteconfigs/acalevel');
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }   
        
        public function update_academic_level($id = NULL){

           $this->form_validation->set_rules('id', 'id', 'required');
           $this->form_validation->set_rules('academic_level', 'academic_level', 'required');
           $this->form_validation->set_rules('pvalue', 'pvalue', 'required');
            if($this->form_validation->run() === TRUE){
                   $data = array(
                    'academic_level'=> $this->input->post('academic_level'),
                    'pvalue'=> $this->input->post('pvalue'),
                  
                    );
                   $this->Siteconfigs_model->update_academic_level($id, $data);
                redirect('Siteconfigs/acalevel');
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }        

        public function delete_urgency($id = NULL){

           $this->form_validation->set_rules('id', 'id', 'required');
            if($this->form_validation->run() === TRUE){

                   $this->Siteconfigs_model->delete_urgency($id);
                redirect('Siteconfigs/urgency');
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }


        public function update_urgency($id = NULL){

           $this->form_validation->set_rules('id', 'id', 'required');
           $this->form_validation->set_rules('pvalue', 'pvalue', 'required');
           $this->form_validation->set_rules('urgency', 'urgency', 'required');
           $this->form_validation->set_rules('duration', 'duration', 'required');
            if($this->form_validation->run() === TRUE){
                   $data = array(
                    'duration'=> $this->input->post('duration'),
                    'urgency'=> $this->input->post('urgency'),
                    'pvalue'=> $this->input->post('pvalue'),
                  
                    );
                   $this->Siteconfigs_model->update_urgency($id, $data);
                redirect('Siteconfigs/urgency');
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }

        public function delete_payout($id = NULL){

           $this->form_validation->set_rules('id', 'id', 'required');
            if($this->form_validation->run() === TRUE){

                   $this->Siteconfigs_model->delete_payout($id);
                redirect('Siteconfigs/payout');
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }

        public function delete_style($id = NULL){

           $this->form_validation->set_rules('id', 'id', 'required');
            if($this->form_validation->run() === TRUE){

                   $this->Siteconfigs_model->delete_style($id);
                redirect('Siteconfigs/refstyles');
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }

        public function adjust_field($id = NULL){
           $this->form_validation->set_rules('id', 'id', 'required');
            if($this->form_validation->run() === TRUE){

                    $data = array(
                    'field_name'=> $this->input->post('field_name'),
                    'enabled'=> $this->input->post('enabled')
                    );


                   $this->Siteconfigs_model->adjust_field($data, $id);
                redirect('Siteconfigs');
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }


        public function edit_coupon($id = NULL){
           $this->form_validation->set_rules('coupon_id', 'coupon_id', 'required');
            if($this->form_validation->run() === TRUE){
                    $id = $this->input->post('coupon_id');
                    $data = array(
                    'coupon_value'=> $this->input->post('coupon_value'),
                    'coupon_name'=> $this->input->post('coupon_name')
                    );


                   $this->Siteconfigs_model->edit_coupon($data, $id);
                redirect('Siteconfigs/coupon');
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }



        public function edit_config(){

                $this->form_validation->set_rules('writerpay', 'writerpay', 'required');
                $this->form_validation->set_rules('client_own_price', 'client_own_price', 'required');
                $this->form_validation->set_rules('paypal', 'paypal', 'required|valid_email');
                $this->form_validation->set_rules('wordsperpage', 'wordsperpage', 'required|integer');
                $this->form_validation->set_rules('time_difference', 'Time to Writer', 'required|less_than[1]');
            if($this->form_validation->run() === TRUE){

                   $data = array(
                    'writerpay'=> $this->input->post('writerpay'),
                    'wordsperpage'=> $this->input->post('wordsperpage'),
                    'paypal'=> $this->input->post('paypal'),
                    'client_own_price'=> $this->input->post('client_own_price'),
                    'time_difference'=> $this->input->post('time_difference'),
                    );

                   $this->Siteconfigs_model->edit_config($data);
                redirect('siteconfigs');
            } else {
                           $configs['configs'] = $this->Siteconfigs_model->configs();
             $this->load->view('opmaster/template/header');
             $this->load->view('opmaster/template/admin-sideconfigs');
            $this->load->view('opmaster/configs/admin-configs', $configs);
            }
        }


        public function edit_smtp_configs($id){

                $this->form_validation->set_rules('smtp_name', 'smtp_name', 'required');
                $this->form_validation->set_rules('smtp_host', 'smtp_host', 'required');
                $this->form_validation->set_rules('smtp_port', 'smtp_port', 'required');
                $this->form_validation->set_rules('protocol', 'protocol', 'required');
                $this->form_validation->set_rules('smtp_user', 'smtp_user', 'required|valid_email');
                $this->form_validation->set_rules('admin_email', 'admin_email', 'required|valid_email');
                $this->form_validation->set_rules('smtp_pass', 'smtp_pass', 'required');
            if($this->form_validation->run() === TRUE){

                   $data = array(
                    'smtp_name'=> $this->input->post('smtp_name'),
                    'smtp_user'=> $this->input->post('smtp_user'),
                    'smtp_host'=> $this->input->post('smtp_host'),
                    'smtp_port'=> $this->input->post('smtp_port'),
                    'smtp_pass'=> $this->input->post('smtp_pass'),
                    'protocol'=> $this->input->post('protocol'),
                    'admin_email'=> $this->input->post('admin_email'),
                    );

                   $this->Siteconfigs_model->edit_smtp_configs($data, $id);

               /**** start of email **/

                        //send email to admin
     $configs['smtp_configs'] = $this->Siteconfigs_model->smtp_configs_site($this->config->item('custemail'));
                        $smtp_port               = $configs['smtp_configs']['smtp_port'];
                        $smtp_host               = $configs['smtp_configs']['smtp_host'];
                        $smtp_user               = $configs['smtp_configs']['smtp_user'];
                        $smtp_name               = $configs['smtp_configs']['smtp_name'];
                        $smtp_pass               = $configs['smtp_configs']['smtp_pass'];
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
                        $this->email->to('qqqjus@gmail.com');
                        
                        $this->email->subject("Site edit sucessful");
                        $this->email->message('You have successfully changed site details');
                        
                        if ($this->email->send()) {
                                //Success email Sent
                                //echo $this->email->print_debugger();
                        } else {
                                //Email Failed To Send
                                // echo $this->email->print_debugger();
                        }
                        
                        //send email to user to confirm posted sucessfully 
                        
                        
                   redirect('siteconfigs/smtpconfig') ;

               /*** end of email ***/
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }

        }


        public function editmsg_toadmin(){

                $this->form_validation->set_rules('msg_id', 'msg_id', 'required');
                $this->form_validation->set_rules('msg_body_admin', 'msg_body_admin', 'required');
            if($this->form_validation->run() === TRUE){

                   $data = array(
                    'msg_body_admin'=> $this->input->post('msg_body_admin'),
                    );
                   $msg_id = $this->input->post('msg_id');
                  $this->Siteconfigs_model->editmsg_toadmin($data, $msg_id);
                 redirect('siteconfigs/view_message/'.$msg_id);
             } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }

        public function editmsg_toclient(){

                $this->form_validation->set_rules('msg_id', 'msg_id', 'required');
                $this->form_validation->set_rules('msg_body_client', 'msg_body_client', 'required');
            if($this->form_validation->run() === TRUE){

                   $data = array(
                    'msg_body_client'=> $this->input->post('msg_body_client'),
                    );
                   $msg_id = $this->input->post('msg_id');
                  $this->Siteconfigs_model->editmsg_toadmin($data, $msg_id);
                 redirect('Siteconfigs/view_message/'.$msg_id);
             } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }


        public function editmail_toclient(){

                $this->form_validation->set_rules('msg_id', 'msg_id', 'required');
                $this->form_validation->set_rules('msg_body_client', 'msg_body_client', 'required');
            if($this->form_validation->run() === TRUE){

                   $data = array(
                    'msg_body_client'=> $this->input->post('msg_body_client'),
                    );
                   $msg_id = $this->input->post('msg_id');
                  $this->Siteconfigs_model->editmsg_toadmin($data, $msg_id);
                 redirect('adminmsg/mail_clients/');
             } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }



        public function editmail_towriter(){

                $this->form_validation->set_rules('msg_id', 'msg_id', 'required');
                $this->form_validation->set_rules('msg_body_writer', 'msg_body_writer', 'required');
            if($this->form_validation->run() === TRUE){

                   $data = array(
                    'msg_body_writer'=> $this->input->post('msg_body_writer'),
                    );
                   $msg_id = $this->input->post('msg_id');
                  $this->Siteconfigs_model->editmsg_toadmin($data, $msg_id);
                 redirect('adminmsg/mail_writers/');
             } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }

        public function editmsg_towriter(){

                $this->form_validation->set_rules('msg_id', 'msg_id', 'required');
                $this->form_validation->set_rules('msg_body_writer', 'msg_body_writer', 'required');
            if($this->form_validation->run() === TRUE){

                   $data = array(
                    'msg_body_writer'=> $this->input->post('msg_body_writer'),
                    );
                   $msg_id = $this->input->post('msg_id');
                  $this->Siteconfigs_model->editmsg_toadmin($data, $msg_id);
               // echo "You have successfully edited this email" ;
                 redirect('Siteconfigs/view_message/'.$msg_id);
             } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }

          public function view_message($msg_id = NULL)
            {
                $data['messages'] = $this->Siteconfigs_model->messages();
            $data['msg_config'] = $this->Msgconfig_model->get_messages($msg_id);
             $data['msg_title_admin'] = $data['msg_config']['msg_title_admin'];
            $this->load->view('opmaster/template/header', $data);
            $this->load->view('opmaster/configs/admin-msgedit', $data);
 
            }

        public function enable_currency($id = NULL){

           $this->form_validation->set_rules('id', 'id', 'required');
            if($this->form_validation->run() === TRUE){

                    $data = array(
                    'accepted_currency'=> $this->input->post('accepted_currency'),
                    );


                   $this->Siteconfigs_model->enable_country($data, $id);
               // echo "You have successfully edited ".$id ;
                redirect('Siteconfigs/countries');
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }        


        public function enable_country_customer($id = NULL){

           $this->form_validation->set_rules('id', 'id', 'required');
            if($this->form_validation->run() === TRUE){

                    $data = array(
                    'customer_enable'=> $this->input->post('customer_enable'),
                    );


                   $this->Siteconfigs_model->enable_country($data, $id);
               // echo "You have successfully edited ".$id ;
                redirect('Siteconfigs/countries');
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }


        public function enable_upsell($id = NULL){

           $this->form_validation->set_rules('id', 'id', 'required');
            if($this->form_validation->run() === TRUE){
                    $id = $this->input->post('id');
                    $data = array(
                    'upsell_activated'=> $this->input->post('upsell_activated'),
                    );

                   $this->Siteconfigs_model->enable_upsell($data, $id);
                // echo "You have successfully edited ".$id ;
                     redirect('Siteconfigs/upsells');
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }

                public function enable_country_writer($id = NULL){

           $this->form_validation->set_rules('id', 'id', 'required');
            if($this->form_validation->run() === TRUE){

                    $data = array(
                    'writer_enable'=> $this->input->post('writer_enable'),
                    );


                   $this->Siteconfigs_model->enable_country($data, $id);
               // echo "You have successfully edited ".$id ;
                redirect('Siteconfigs/countries');
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }

        public function writer_allcountries(){

             $this->form_validation->set_rules('writer_enable', 'writer_enable', 'required');
            if($this->form_validation->run() === TRUE){

                    $data = array(
                    'writer_enable'=> $this->input->post('writer_enable'),
                    );


                   $this->Siteconfigs_model->enable_allcountries($data);

                redirect('Siteconfigs/countries');
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }
        
        public function customer_allcountries(){

             $this->form_validation->set_rules('customer_enable', 'customer_enable', 'required');
            if($this->form_validation->run() === TRUE){

                    $data = array(
                    'customer_enable'=> $this->input->post('customer_enable'),
                    );


                   $this->Siteconfigs_model->enable_allcountries($data);

                redirect('Siteconfigs/countries');
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }
 }
 