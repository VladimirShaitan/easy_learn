<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper('form');
                $this->load->model('Orders_model');
                $this->load->model('User_model');
                $this->load->helper('url_helper');
                 $this->load->model('Siteconfigs_model');
                $this->load->helper('directory');
                $this->load->library('upload');
                $this->load->library(array('form_validation','session'));
                $this->load->helper(array('form', 'url'));

                
        }

         public function index()

        {
                $data['title'] = '';
                $data['uploaded_files'] = directory_map('./uploads/');
                $this->load->view('templates/header');
                if($this->input->post('submit') && count($_FILES['multipleFiles']['name']) > 0){
                        
                // count the number of files uploades
                    $number_of_files = count($_FILES['multipleFiles']['name']);

                //store global files to local variable

                    $files = $_FILES;

                    // make sure the folder exists else create 
                    if(!is_dir('uploads')){
                        mkdir($this->config->item('uploads'), 0777, true);
                    }

                    // upload files one by one

               for ($i=0; $i<$number_of_files; $i++){
                    $_FILES['multipleFiles']['name'] =  $files['multipleFiles']['name'][$i];
                    $_FILES['multipleFiles']['type'] =  $files['multipleFiles']['type'][$i];
                    $_FILES['multipleFiles']['tmp_name'] =  $files['multipleFiles']['tmp_name'][$i];
                    $_FILES['multipleFiles']['error'] =  $files['multipleFiles']['error'][$i];
                    $_FILES['multipleFiles']['size'] =  $files['multipleFiles']['size'][$i];

                    $config['upload_path'] = $this->config->item('uploads');
                    $config['allowed_types'] = 'gif|jpg|png|doc|docx';
                    $config['max_size'] = '233232';
                    $config['max_width'] = '232323';
                    $config['max_height'] = '243233';
                    $config['overwrite'] = TRUE;
                    $config['remove_spaces'] = TRUE;

                   // $this->load-library('upload', $config);
                    $this->upload->initialize($config);
                  //  echo '<br/>';
                  //  echo '<br/>';
                  //  echo '<br/>';
//print_r($this->upload->data());
                    if(!$this->upload->do_upload('multipleFiles')){
                        $error = array('error' => $this->upload->display_errors());
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                    }


                }
                $error = array('error' => $this->upload->display_errors());
                if($error){

                   redirect('upload'); 
                }


                } else {
                  $this->load->view('upload', $data);

                }

           
                $this->load->view('templates/footer');
        }
       
        public function do_upload()

       {

            $writerid = $this->session->userdata('writer_id');

                  $dif = $this->config->item('uploads').'/profiles/'.$writerid;
                    // make sure the folder exists else create 
                    if(!is_dir($dif)){
                        mkdir($dif, 0777, true);
                    }
                    
                $config['upload_path']          = $dif;
                $config['allowed_types']        = 'pdf|doc|dot|docx|docm|dotx|dotm|docb|xls|xlsx|xlt|xlm|xlsm|xltx|xltm|csv|txt|rtf|htm|html|zip|mp3|mp4|wma|mpg|flv|avi|jpg|jpeg|png|gif|pptx|pptm|ppt|pot|potx|potm|ppam|ppsx|ppsm|sldx|sldm|accdb|accde|accdt|accdr|';
                $config['max_size']             = 10000;
                $config['max_width']            = 1020004;
                $config['max_height']           = 768000000;

                $this->upload->initialize($config);


                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                     //   $this->load->view('upload_form', $error);
                        redirect('user/myprofile');
                }
                else
                {
                        $writer_id = $this->input->post('writer_id');
                       //print_r($this->upload->data());
                       $data = array('upload_data' => $this->upload->data());
                    $data = array('profile_img' => $this->upload->data('file_name'));
                    $this->Orders_model->upload_file($data, $writer_id);
                    redirect('user/myprofile');


                }
        }


       
        public function upload_sample()

       {

            $writerid = $this->session->userdata('writer_id');
            //$writerid = <?=$this->session->userdata('writer_id');

            $data['upload_folder'] = $this->Siteconfigs_model->upload_folder(1);
            $upload_folder         = $data['upload_folder']['upload'];



                  $dif =  $upload_folder.'/samples/'. $writerid;
                    // make sure the folder exists else create 
                    if(!is_dir($dif)){
                        mkdir($dif, 0777, true);
                    }
                    
                                    //                $fname         = $title;
                               // $file_name = pathinfo($fname, PATHINFO_FILENAME);
                               // $ext = pathinfo($fname, PATHINFO_EXTENSION);

                               //  $newfile_name= preg_replace('/[^\w]/', '_', $file_name);
                              
                                $config['upload_path']   = $dif;
                                $config['allowed_types'] = 'pdf|doc|dot|docx|docm|dotx|dotm|docb|xls|xlsx|xlt|xlm|xlsm|xltx|xltm|csv|txt|rtf|htm|html|zip|mp3|mp4|wma|mpg|flv|avi|jpg|jpeg|png|gif|pptx|pptm|ppt|pot|potx|potm|ppam|ppsx|ppsm|sldx|sldm|accdb|accde|accdt|accdr|';
                                $config['max_size']      = '233232';
                                $config['max_width']     = '232323';
                                $config['max_height']    = '243233';
                               // $config['file_name']    = $newfile_name.'.'.$ext;
                                $config['eoverwrite']     = TRUE;
                                $config['remove_spaces'] = TRUE;

                $this->upload->initialize($config);


                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                     //   $this->load->view('upload_form', $error);
                        redirect('user/myprofile');
                }
                else
                {



                    $writerid = $this->input->post('writerid');
                    $title = $this->input->post('title');
                   $alias= preg_replace('/[^\w]/', '_', $title);


                      $data = array('upload_data' => $this->upload->data());

                                $data = array(
                                        'writerid' => $this->input->post('writerid'),
                                        'tmp_name' => $this->upload->data('file_name'),
                                        'alias' => $alias,
                                        'file_name' => $this->input->post('title'),
                                        'title' => $this->input->post('title'),
                                        
                                );


                                $this->User_model->upload_sample($data);

                    redirect('user/myprofile');


                }
        }



                public function upload_file()
        {


                if ($this->input->post('submit') && !empty($_FILES['multipleFiles'])) {
                        
                        // count the number of files uploades
                        $number_of_files = count($_FILES['multipleFiles']['name']);
                        
                        //store global files to local variable
            $data['upload_folder'] = $this->Siteconfigs_model->upload_folder(1);
            $upload_folder         = $data['upload_folder']['upload'];


                        $files        = $_FILES;
                        $orderfile    = $this->input->post('orderid');
                        $writerid    = $this->input->post('writerid');
                        $dif          = $upload_folder.'/samples/'.$writerid ;
                        // make sure the folder exists else create 





                        if (!is_dir($dif)) {
                                mkdir($dif, 0777, true);
                        }
                        
                        // upload files one by one
                        
                        for ($i = 0; $i < $number_of_files; $i++) {
                                $_FILES['multipleFiles']['name']     = $files['multipleFiles']['name'][$i];

                                $fname         = $files['multipleFiles']['name'][$i];
                                $file_name = pathinfo($fname, PATHINFO_FILENAME);
                                $ext = pathinfo($fname, PATHINFO_EXTENSION);

                                $newfile_name= preg_replace('/[^\w]/', '_', $file_name);

                                $_FILES['multipleFiles']['type']     = $files['multipleFiles']['type'][$i];
                                $_FILES['multipleFiles']['tmp_name'] = $files['multipleFiles']['tmp_name'][$i];
                                $_FILES['multipleFiles']['error']    = $files['multipleFiles']['error'][$i];
                                $_FILES['multipleFiles']['size']     = $files['multipleFiles']['size'][$i];
                                
                                $config['upload_path']   = $dif;
                                $config['allowed_types'] = 'pdf|doc|dot|docx|docm|dotx|dotm|docb|xls|xlsx|xlt|xlm|xlsm|xltx|xltm|csv|txt|rtf|htm|html|zip|mp3|mp4|wma|mpg|flv|avi|jpg|jpeg|png|gif|pptx|pptm|ppt|pot|potx|potm|ppam|ppsx|ppsm|sldx|sldm|accdb|accde|accdt|accdr|';
                                $config['max_size']      = '233232';
                                $config['max_width']     = '232323';
                                $config['max_height']    = '243233';
                                $config['file_name']    = $newfile_name.'.'.$ext;
                                $config['eoverwrite']     = TRUE;
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
                        
                        //
                        for ($i = 0; $i < $number_of_files; $i++) {
                                $_FILES['multipleFiles']['name']     = $files['multipleFiles']['name'][$i];

                                $fname         = $files['multipleFiles']['name'][$i];
                                $file_name = pathinfo($fname, PATHINFO_FILENAME);
                                $ext = pathinfo($fname, PATHINFO_EXTENSION);

                                $newfile_name= preg_replace('/[^\w]/', '_', $file_name);

                                $dbfile_name  = $newfile_name.'.'.$ext;


                                $uploader_name = $this->session->userdata('firstname');
                                $this->session->userdata('lastname');
                                
                                //////////// do some work here to enter content into database for materials and essays. stopepd here
                                $order_period = date('Y') . '' . date('M');
                                $title = $this->input->post('title');
                               $alias= preg_replace('/[^\w]/', '_', $title);
                               $alias        = str_replace('----', '-', $alias); // Replaces all spaces with hyphens.
                                $alias        = str_replace('---', '-', $alias); // Replaces all spaces with hyphens.
                                $alias        = str_replace('--', '-', $alias); // Replaces all spaces with hyphens.
                                $alias        = $alias . '.html'; // Replaces all spaces with hyphens.

                                $data = array(
                                        'writerid' => $this->session->userdata('writer_id'),
                                        'file_size' => $files['multipleFiles']['size'][$i],
                                        'file_name' => $files['multipleFiles']['name'][$i],
                                        'title' => $this->input->post('title'),
                                        'tmp_name' => $dbfile_name,
                                         'upload_date' => date('d.m.Y H:i:s'),
                                        'alias' => $alias,
                                        'tmp_name' => $dbfile_name,
                                        'Writer_name' => $this->session->userdata('firstname')
                                        
                                );
                                $this->User_model->upload_sample($data);
                        }
                        
                        for ($i = 0; $i < $number_of_files; $i++) {

                                
                        }
                        
                        $error = array(
                                'error' => $this->upload->display_errors()
                        );
                        if ($error) {
                                $url = $_SERVER['HTTP_REFERER'];
                                redirect($url);
                        }
                        
                        
                } else {
                       redirect('order/view/'.$this->input->post('orderid'));
                }
                
                

        }



}
