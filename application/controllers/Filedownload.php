<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filedownload extends CI_Controller
{
        
        public function __construct()
        {
                parent::__construct();
                $this->load->model('students_model');
                $this->load->model('Messages_model');
                $this->load->model('Siteconfigs_model');
                $this->load->model('Msgconfig_model');
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
                $data['title'] = 'Mail Inbox';
                $this->load->view('templates/header1', $data);
                $this->load->view('messages/messages1', $data);
               // $this->load->view('templates/footer');
                
        }
                
     public function download($fileName = NULL) {   
   if ($fileName) {
    $orderid = $this->input->post('orderid');
    $file = $this->input->post('path');
    // check file exists    
    $this->load->helper('download');
    if (file_exists ( $file )) {
     // get file content
     $data = file_get_contents ( $file );
     //force download
     force_download ( $fileName, $data );
    } else {
     // Redirect to base url
     redirect ('order/view/'.$orderid);
    }
   }
  }                
     public function fileessay($fileName = NULL) {   
   if ($fileName) {
    $orderid = $this->input->post('orderid');
    $file = $this->input->post('path');
    // check file exists    
    $this->load->helper('download');
    if (file_exists ( $file )) {
     // get file content
     $data = file_get_contents ( $file );
     //force download
     force_download ( $fileName, $data );
    } else {
     // Redirect to base url
     redirect ('order/view/'.$orderid);
    }
   }
  }




}