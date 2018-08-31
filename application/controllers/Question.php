<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Question extends CI_Controller
{
        public function __construct()
        {
                parent::__construct();
                $this->load->model('Orders_model');

                $this->load->model('Subscription_model');
                $this->load->model('Adminusers_model');
                $this->load->model('User_model');

                $this->load->model('Siteconfigs_model');
                $this->load->model('Msgconfig_model');
                $this->load->helper('url_helper');
                $this->load->helper('url');
                $this->load->library(array(
                        'form_validation',
                        'session'
                ));
                $this->load->helper('directory');
                $this->load->library('upload');

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
                $this->load->library('pagination');
                $orders['Title']    = 'Orders';
                $config                = array();
                $config["base_url"]    = base_url() . "question";
                $config["total_rows"]  = $this->Orders_model->count_sitemap();
                $config["per_page"]    = 20;
                $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $orders['profile'] = $this->User_model->get_profile();
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["orders"] = $this->Orders_model->questions($config["per_page"], $page);
                $orders["links"]   = $this->pagination->create_links();
                
                 $this->load->view('questions', $orders);
        }
        //this is the method for rendering the view of any individual order
        public function ask()
        {
                $this->load->library('pagination');
                $orders['Title']    = 'assignment';
                $config                = array();
                $config["base_url"]    = base_url() . "question/ask";
                $config["total_rows"]  = $this->Orders_model->count_sitemap();
                $config["per_page"]    = 50;
                $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $orders['profile'] = $this->User_model->get_profile();
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["orders"] = $this->Orders_model->questions($config["per_page"], $page);
                $orders["links"]   = $this->pagination->create_links();
                $this->load->view('questions', $orders);
        }



        //this is the method for rendering the view of any individual order
        public function university($abbname = NULL)
        {
                $university['uni'] = $this->Orders_model->get_universities($abbname);
                if (empty($university['uni'])) {
                        $this->index();
                }
                $university['id']       = $university['uni']['id'];
                $university['abbname']  = $university['uni']['abbname'];
                $university['uni_name'] = $university['uni']['uni_name'];
                $this->load->view('templates/header', $university);
                $this->load->view('Students/university', $university);
                $this->load->view('templates/footer');
        }
        public function subject($subject = NULL)
        {
                $subject['subject'] = $this->Orders_model->get_subject($subject);
                if (empty($subject['subject'])) {
                        $this->index();
                }
                $subject['subject'] = $subject['subject']['subject'];
        }
        public function upload_sample()
        {
                // the order page has been restricted tologged in memebrs only. they have to log in to make an order.. The sessions are stored as writer_id. 
                if ($this->session->userdata('writer_id')) {
                        $this->load->helper('form');
                        $this->load->library('form_validation');
                        $data['subject']           = $this->Orders_model->get_subject();
                        $data['max_orderid']       = $this->Orders_model->max_orderid();
                        $data['topic']             = $this->Siteconfigs_model->order_fields('topic');
                        $data['type_of_service']   = $this->Siteconfigs_model->order_fields('type_of_service');
                        $data['no_of_words']       = $this->Siteconfigs_model->order_fields('no_of_words');
                        $data['order_details']     = $this->Siteconfigs_model->order_fields('order_details');
                        $data['deadline']          = $this->Siteconfigs_model->order_fields('urgency');
                        $data['chosenwriter']      = $this->Siteconfigs_model->order_fields('preferred_writer');
                        $data['academic_level']    = $this->Siteconfigs_model->order_fields('academic_level');
                        $data['order_cost']        = $this->Siteconfigs_model->order_fields('order_cost');
                        $data['category']          = $this->Siteconfigs_model->order_fields('category');
                        // $data['pages'] = $this->Orders_model->get_pages(); we replaced the pages by foreach, php
                        $data['configs']           = $this->Siteconfigs_model->configs();
                        $data['referencing_style'] = $this->Siteconfigs_model->referencing_style();
                        $data['type_service']      = $this->Siteconfigs_model->type_service();
                        $data['profile']           = $this->User_model->get_profile();
                        $data['title']             = 'Create Order';
                        $this->form_validation->set_rules('topic', 'topic', 'required');
                        $this->form_validation->set_rules('instructions', 'instructions', 'required');
                        if ($this->form_validation->run() === FALSE) {
                                $this->load->view('templates/header', $data);
                                $this->load->view('essays/upload_sample');
                                $this->load->view('templates/right_sidebar', $data);
                                $this->load->view('templates/footer');
                        } else {
                                redirect('essay/question/' . $alias);
                        }
                } else {
                        $this->load->view('templates/header');
                        $this->load->view('login');
                        $this->load->view('templates/footer');
                }
        }
        public function upload_samples()
        {


                if ($this->input->post('submit') && count($_FILES['multipleFiles']['name']) > 0) {
                        // count the number of files uploades
                        $number_of_files = count($_FILES['multipleFiles']['name']);
                        //store global files to local variable
                        $files           = $_FILES;
                        $orderfile       = $this->input->post('orderid');
                        $order_period    = date('Y') . '' . date('M') . '' . date('d');
                        $dif             = $this->config->item('uploads').'/' . $order_period . '/' . $orderfile;
                        // make sure the folder exists else create 
                        if (!is_dir($dif)) {
                                mkdir($dif, 0777, true);
                        }
                        // upload files one by one
                        for ($i = 0; $i < $number_of_files; $i++) {
                                $data['max_orderid'] = $this->Orders_model->max_orderid_essay();
                                $latest_orderid      = $data['max_orderid']['orderid'];
                                $this_orderid        = $latest_orderid + 1;
                                $fminus              = pathinfo($files['multipleFiles']['name'][$i], PATHINFO_FILENAME);
                                $titles              = $fminus;
                                $aliass              = preg_replace("/[^a-z-]/i", "-", $titles);
                                $aliass              = str_replace(' ', '-', $aliass); // Replaces all spaces with hyphens.
                                $aliass              = str_replace('--', '-', $aliass); // Replaces all spaces with hyphens.
                                $aliass              = str_replace('---', '-', $aliass); // Replaces all spaces with hyphens.
                                $aliass              = str_replace('----', '-', $aliass); // Replaces all spaces with hyphens.
                                $aliass              = $aliass . '.html'; // Replaces all spaces with hyphens.
                                $order_period        = date('Y') . '' . date('M') . '' . date('d');
                                $title               = $this->input->post('topic');
                                $alias               = preg_replace("/[^ \w]+/", "", $title);
                                $alias               = str_replace(' ', '-', $alias); // Replaces all spaces with hyphens.
                                $alias               = $alias . '.html'; // Replaces all spaces with hyphens.
                                $data                = array(
                                        'topic' => $fminus,
                                        'order_period' => $order_period,
                                        'project_type' => 'essay',
                                        'amount' => 5,
                                        'alias' => $aliass,
                                        'customer' => $this->session->userdata('writer_id'),
                                        'orderid' => $this_orderid
                                );
                                $this->Orders_model->create_order($data);
                        }
                        for ($i = 0; $i < $number_of_files; $i++) {
                                $_FILES['multipleFiles']['name']     = $files['multipleFiles']['name'][$i];
                                $_FILES['multipleFiles']['type']     = $files['multipleFiles']['type'][$i];
                                $_FILES['multipleFiles']['tmp_name'] = $files['multipleFiles']['tmp_name'][$i];
                                $_FILES['multipleFiles']['error']    = $files['multipleFiles']['error'][$i];
                                $_FILES['multipleFiles']['size']     = $files['multipleFiles']['size'][$i];
                                $config['upload_path']               = $dif;
                                $config['allowed_types']             = 'pdf|doc|docx|xls|xlsx|csv|txt|rtf|html|zip|mp3|mp4|wma|mpg|flv|avi|jpg|jpeg|png|gif';
                                $config['max_size']                  = '233232';
                                $config['max_width']                 = '232323';
                                $config['max_height']                = '243233';
                                $config['overwrite']                 = TRUE;
                                $config['remove_spaces']             = TRUE;
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
                                $fminus                   = pathinfo($files['multipleFiles']['name'][$i], PATHINFO_FILENAME);
                                $titled                   = $fminus;
                                $aliasd                   = preg_replace("/[^a-z-]/i", "-", $titled);
                                $aliasd                   = str_replace(' ', '-', $aliasd); // Replaces all spaces with hyphens.
                                $aliasd                   = str_replace('--', '-', $aliasd); // Replaces all spaces with hyphens.
                                $aliasd                   = str_replace('---', '-', $aliasd); // Replaces all spaces with hyphens.
                                $aliasd                   = str_replace('----', '-', $aliasd); // Replaces all spaces with hyphens.
                                $aliasd                   = $aliasd . '.html'; // Replaces all spaces with hyphens.
                                $data['orderid_viaalias'] = $this->Orders_model->get_ordeid_viaalias($aliasd);
                                $order_idvia_alis         = $data['orderid_viaalias']['orderid'];
                                $fname                    = $files['multipleFiles']['name'][$i];
                                $file_name                = str_replace(' ', '_', $fname);
                                $uploader_name            = $this->session->userdata('firstname');
                                $this->session->userdata('lastname');
                                //////////// do some work here to enter content into database for materials and essays. stopepd here
                                //$filename = base_url().''.$dif.'/'.$file_name;// or /var/www/html/file.docx
                                $filename = $this->config->item('uploads').'/' . $order_period . '/' . $orderfile . '/' . $file_name; // or /var/www/html/file.docx
                                $ext      = pathinfo($filename, PATHINFO_EXTENSION);
                                if ($ext == 'docx') {
                                        $content = $this->read_file_docx($filename);
                                }
                                if ($ext == 'doc') {
                                        $content = $this->read_file_doc($filename);
                                }
                                if ($content !== false) {
                                        $textcontent = nl2br($content);
                                        //echo nl2br($content);  
                                        //echo '<br/>';
                                        //echo str_word_count($content);
                                        //echo '<hr/>';
                                        //$small = substr(nl2br($content), 0, 1000);
                                        // echo $small;
                                }
                                ////////////// end of do some work
                                $data = array(
                                        'file_name' => $files['multipleFiles']['name'][$i],
                                        'file_size' => $files['multipleFiles']['size'][$i],
                                        'tmp_name' => $file_name,
                                        'file_type' => $files['multipleFiles']['type'][$i],
                                        'upload_date' => date('Y-m-d H:i:s'),
                                        'order_id' => $order_idvia_alis,
                                        'upload_type' => 'essay',
                                        'alias' => $aliasd,
                                        'answer_content' => nl2br($content),
                                        'uploader_name' => $uploader_name,
                                        'uploaded_by' => $this->session->userdata('writer_id')
                                );
                                $this->Orders_model->order_files($data);
                        }
                        $error = array(
                                'error' => $this->upload->display_errors()
                        );
                        if ($error) {
                                $url = $_SERVER['HTTP_REFERER'];
                                redirect($url);
                        }
                } else {
                        // $this->load->view('upload', $data);
                }
                $this->load->view('templates/footer');
        }
        public function upload_essay()
        {
                // the order page has been restricted tologged in memebrs only. they have to log in to make an order.. The sessions are stored as writer_id. 
                if ($this->session->userdata('writer_id')) {
                        $this->load->helper('form');
                        $this->load->library('form_validation');
                        $data['subject']           = $this->Orders_model->get_subject();
                        $data['max_orderid']       = $this->Orders_model->max_orderid();
                        $data['topic']             = $this->Siteconfigs_model->order_fields('topic');
                        $data['type_of_service']   = $this->Siteconfigs_model->order_fields('type_of_service');
                        $data['no_of_words']       = $this->Siteconfigs_model->order_fields('no_of_words');
                        $data['order_details']     = $this->Siteconfigs_model->order_fields('order_details');
                        $data['deadline']          = $this->Siteconfigs_model->order_fields('urgency');
                        $data['chosenwriter']      = $this->Siteconfigs_model->order_fields('preferred_writer');
                        $data['academic_level']    = $this->Siteconfigs_model->order_fields('academic_level');
                        $data['order_cost']        = $this->Siteconfigs_model->order_fields('order_cost');
                        $data['category']          = $this->Siteconfigs_model->order_fields('category');
                        // $data['pages'] = $this->Orders_model->get_pages(); we replaced the pages by foreach, php
                        $data['configs']           = $this->Siteconfigs_model->configs();
                        $data['referencing_style'] = $this->Siteconfigs_model->referencing_style();
                        $data['type_service']      = $this->Siteconfigs_model->type_service();
                        $data['profile']           = $this->User_model->get_profile();
                        $data['title']             = 'Create Order';
                        $this->form_validation->set_rules('topic', 'topic', 'required');
                        $this->form_validation->set_rules('instructions', 'instructions', 'required');
                        if ($this->form_validation->run() === FALSE) {
                                $this->load->view('templates/header', $data);
                                $this->load->view('essays/upload_essay');
                                $this->load->view('templates/right_sidebar', $data);
                                $this->load->view('templates/footer');
                        } else {
                                redirect('essay/question/' . $alias);
                        }
                } else {
                        $this->load->view('templates/header');
                        $this->load->view('login');
                        $this->load->view('templates/footer');
                }
        }



        public function post ($alias = NULL)
        {
                $data['news_item']      = $this->Orders_model->get_question($alias);
                $data['alias']      = $alias;
                $data['sitetitle'] = $data['news_item']['topic'];
                $data['instructions']          = $data['news_item']['instructions'];

                $data['order_files']           = $this->Orders_model->get_orderfiles($alias);
                $data['orderid']               = $data['news_item']['orderid'];
                $data['topic']                 = $data['news_item']['topic'];
                $data['words']                 = $data['news_item']['words'];
                $data['urgency']               = $data['news_item']['urgency'];
                $data['order_period']          = $data['news_item']['order_period'];
                $data['writerpay']             = $data['news_item']['writerpay'];
                $data['amount']                = $data['news_item']['amount'];
                $data['instructions']          = $data['news_item']['instructions'];
                $data['typeofservice']         = $data['news_item']['typeofservice'];
                $data['order_status']          = $data['news_item']['order_status'];
                $data['date_posted']           = $data['news_item']['date_posted'];
                $data['subject']               = $data['news_item']['subject'];
                $data['preferred_writer']      = $data['news_item']['preferred_writer'];
                $data['customer']              = $data['news_item']['customer'];
                $data['client_paid']           = $data['news_item']['client_paid'];
                $data['deadline']              = $data['news_item']['deadline'];

                $search                = $data['news_item']['topic'];
                $data['related_answers'] = $this->Orders_model->relatedquestions($search);


                // This laods the header of the page
                $this->load->view('template/header');
                // this is the view that the user is not logged in. This is for public view on the front end. 
                $this->load->view('questions/question-answer', $data);
                // THis laods the footer of the site. You cna pass data to it if there is something that such data will achive
                $this->load->view('template/footer');

        }



        public function answer ($alias = NULL)
        {


                $data['news_item']      = $this->Orders_model->answer_alias_orderid($alias);
                $data['alias']      = $alias;
                $data['sitetitle'] = $data['news_item']['topic'];
                $data['instructions']          = $data['news_item']['instructions'];
                $data['orderid']               = $data['news_item']['orderid'];
                $data['topic']                 = $data['news_item']['topic'];
                $data['words']                 = $data['news_item']['words'];
                $data['urgency']               = $data['news_item']['urgency'];
                $data['order_period']          = $data['news_item']['order_period'];
                $data['writerpay']             = $data['news_item']['writerpay'];
                $data['amount']                = $data['news_item']['amount'];
                $data['instructions']          = $data['news_item']['instructions'];
                $data['typeofservice']         = $data['news_item']['typeofservice'];
                $data['order_status']          = $data['news_item']['order_status'];
                $data['date_posted']           = $data['news_item']['date_posted'];
                $data['subject']               = $data['news_item']['subject'];
                $data['preferred_writer']      = $data['news_item']['preferred_writer'];
                $data['customer']              = $data['news_item']['customer'];
                $data['client_paid']           = $data['news_item']['client_paid'];
                $data['deadline']              = $data['news_item']['deadline'];

                $orderid = $data['news_item']['orderid'];
                $order_period = $data['news_item']['order_period'];
                $subscriber_id = $this->session->userdata('writer_id');

                //get order file
            $data['order_files'] = $this->Orders_model->get_file_materials($orderid);
             $data['essay_answer'] = $this->Orders_model->get_file_essay($orderid);
             $tmp_name = $data['essay_answer']['tmp_name'];

        if(!isset($data['essay_answer'])){
            $data['file_embed'] = "Question not answered";
            
        }



        if(isset($data['essay_answer'])){

         // checks if user is subscribed 
        $data['if_subscribed']    = $this->Subscription_model->check_if_subscribed($subscriber_id);
        // if user is not subscribed do this
        if(!isset($data['if_subscribed'])){
            $subscribe    = ci_site_url().'subscription/subscribe';
            $data['file_embed'] = "<a href='".$subscribe."'>Please subscribe to view answer</a>";
        }

        // if user is subscribed do this function
        if(isset($data['if_subscribed'])){
        // controll the number of views
          $count["essays_accessed"] = $this->Subscription_model->count_accessed();       

                               if ($count["essays_accessed"] < 20) {


        // check if the file exists and then loads it
        $filename = $this->config->item('uploads').'/' . $order_period . '/' . $orderid . '/' . $tmp_name;
        $urlfile    = ci_site_url() . $filename;
        $data['file_embed'] = "<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=".$urlfile." ' class='col-md-12' height='623px' frameborder='0'></iframe>";


        /* REGULATE VIEWS */
        // chekc if user had viewed this doucment  and record
              $data['doc_accessed'] = $this->Subscription_model->check_document_accessed($alias);
                if (!isset($data['doc_accessed'])) {
                        $accessor_id   = $this->session->userdata('writer_id');
                        $accessor_name = $this->session->userdata('firstname') . ' ' . $this->session->userdata('lastname');
                        $data          = array(
                                'accessor_id' => $accessor_id,
                                'accessor_name' => $accessor_name,
                                'access_type' => 'view',
                                'access_alias' => $alias, 
                                'access_date' => date('Y-m-d')
                        );
                        $this->Subscription_model->document_accessed($data);

                }



                } else {
                     $data['file_embed'] = 'Ooops, reached maximum view for today, try tomorrow or subscribe here';
                                        
               }

        } // ends if(isset($data['if_subscribed']))


        
        } //end if(isset($data['essay_answer']))
        $data['news_item']      = $this->Orders_model->answer_alias_orderid($alias);
        $search = $data['news_item']['topic'];
      $data['related_answers'] = $this->Orders_model->relatedquestions($search);
        $this->load->view('template/header-essay', $data);

        $writer_id = $this->session->userdata('writer_id');
        if(!$writer_id){
            $this->load->view('questions/question-answer');
        } else {
            $this->load->view('answers/view-essay-ans');
        }

        $this->load->view('template/footer');
            
            $subscriber_id = $this->session->userdata('writer_id');
                if ($subscriber_id) {
                        $data = array(
                                'accessor_id' => $subscriber_id
                        );
                        $this->Subscription_model->delete_old_views($subscriber_id);
                }
        }


        public function myuplaoded_essays()
        {
                $orders['profile']        = $this->User_model->get_profile();
                $orders['orders']         = $this->Orders_model->myuplaoded_essays();
                $orders['clientmyorders'] = count($orders['orders']);
                $this->load->view('templates/header', $orders);
                $this->load->view('essays/myessays', $orders);
                $this->load->view('templates/right_sidebar', $orders);
                $this->load->view('templates/footer');
        }

        public function upload_file()
        {


                $order_period = date('Y') . '' . date('M');
                $title        = $this->input->post('topic');
                $alias        = preg_replace("/[^ \w]+/", "", $title);
                $alias        = str_replace(' ', '-', $alias); // Replaces all spaces with hyphens.
                $alias        = $alias . '.html'; // Replaces all spaces with hyphens.
                $data         = array(
                        'topic' => $this->input->post('topic'),
                        // 'customer' => $customer,
                        'orderid' => $this->input->post('orderid'),
                        'subject' => $this->input->post('subject'),
                        'words' => $this->input->post('words'),
                        'instructions' => $this->input->post('instructions'),
                        'amount' => $this->input->post('amount'),
                        // 'date_posted' => $date_posted,
                        'referencing_style' => $this->input->post('referencing_style'),
                        'customer_email' => $this->input->post('customer_email'),
                        'sources' => $this->input->post('sources'),
                        'project_type' => $this->input->post('project_type'),
                        // 'writerpaid' => $writerpaid,
                        //'writerpay' => $writerpay,
                        'alias' => $alias,
                        'order_period' => $order_period,
                        'customer_name' => $this->input->post('customer_name'),
                        'customer' => $this->input->post('customer')
                );
                $this->Orders_model->create_order($data);
                $data['title']          = '';
                $data['uploaded_files'] = directory_map('./uploads/');
                $this->load->view('templates/header');
                if ($this->input->post('submit') && count($_FILES['multipleFiles']['name']) > 0) {
                        // count the number of files uploades
                        $number_of_files = count($_FILES['multipleFiles']['name']);
                        //store global files to local variable
                        $files           = $_FILES;
                        $orderfile       = $this->input->post('orderid');
                        $order_period    = date('Y') . '' . date('M');
                        $dif             = $this->config->item('uploads').'/' . $order_period . '/' . $orderfile;
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
                                $config['upload_path']               = $dif;
                                $config['allowed_types']             = 'pdf|doc|docx|xls|xlsx|csv|txt|rtf|html|zip|mp3|mp4|wma|mpg|flv|avi|jpg|jpeg|png|gif';
                                $config['max_size']                  = '233232';
                                $config['max_width']                 = '232323';
                                $config['max_height']                = '243233';
                                $config['overwrite']                 = TRUE;
                                $config['remove_spaces']             = TRUE;
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
                                $fname         = $files['multipleFiles']['name'][$i];
                                $file_name     = str_replace(' ', '_', $fname);
                                $uploader_name = $this->session->userdata('firstname');
                                $this->session->userdata('lastname');
                                //////////// do some work here to enter content into database for materials and essays. stopepd here
                                //$filename = base_url().''.$dif.'/'.$file_name;// or /var/www/html/file.docx
                                $filename = $this->config->item('uploads').'/' . $order_period . '/' . $orderfile . '/' . $file_name; // or /var/www/html/file.docx
                                $ext      = pathinfo($filename, PATHINFO_EXTENSION);
                                if ($ext == 'docx') {
                                        $content = $this->read_file_docx($filename);
                                }
                                if ($ext == 'doc') {
                                        $content = $this->read_file_doc($filename);
                                }
                                if ($content !== false) {
                                        $textcontent = nl2br($content);
                                        //echo nl2br($content);  
                                        //echo '<br/>';
                                        //echo str_word_count($content);
                                        //echo '<hr/>';
                                        //$small = substr(nl2br($content), 0, 1000);
                                        // echo $small;
                                }
                                ////////////// end of do some work
                                $data = array(
                                        'file_name' => $files['multipleFiles']['name'][$i],
                                        'file_size' => $files['multipleFiles']['size'][$i],
                                        'tmp_name' => $file_name,
                                        'file_type' => $files['multipleFiles']['type'][$i],
                                        'upload_date' => date('d.m.Y H:i:s'),
                                        'order_id' => $this->input->post('orderid'),
                                        'upload_type' => $this->input->post('upload_type'),
                                        'alias' => $alias,
                                        'answer_content' => nl2br($content),
                                        'uploader_name' => $uploader_name,
                                        'uploaded_by' => $this->session->userdata('writer_id')
                                );
                                $this->Orders_model->order_files($data);
                        }
                        $error = array(
                                'error' => $this->upload->display_errors()
                        );
                        if ($error) {
                                $url = $_SERVER['HTTP_REFERER'];
                                redirect($url);
                        }
                } else {
                        // $this->load->view('upload', $data);
                }
                $this->load->view('templates/footer');
        }

        public function essays()
        {
                $data['Title']    = 'All Essays';
                $data['writers']  = $this->Adminusers_model->get_students();
                $orders['orders'] = $this->Adminorders_model->getall_essays();
                $this->load->view('opmaster/template/header', $data);
               // $this->load->view('opmaster/template/sidebar');
                $this->load->view('opmaster/essays/allessays', $orders);
                $this->load->view('opmaster/template/footer');
        }
        public function view_essay($orderid = NULL)
        {
                $data['data']        = $this->Adminorders_model->get_requests($orderid);
                $data['news_item']   = $this->Adminorders_model->get_orders($orderid);
                $data['order_files'] = $this->Orders_model->get_files($orderid);
                if (empty($data['news_item'])) {
                        $this->index();
                }
                $data['orderid']          = $data['news_item']['orderid'];
                $data['topic']            = $data['news_item']['topic'];
                $data['words']            = $data['news_item']['words'];
                $data['urgency']          = $data['news_item']['urgency'];
                $data['amount']           = $data['news_item']['amount'];
                $data['writerpay']        = $data['news_item']['writerpay'];
                $data['instructions']     = $data['news_item']['instructions'];
                $data['typeofservice']    = $data['news_item']['typeofservice'];
                $data['order_status']     = $data['news_item']['order_status'];
                $data['date_posted']      = $data['news_item']['date_posted'];
                $data['subject']          = $data['news_item']['subject'];
                $data['deadline']         = $data['news_item']['deadline'];
                $data['preferred_writer'] = $data['news_item']['preferred_writer'];
                $data['writer_name']      = $data['news_item']['writer_name'];
                $data['customer_email']   = $data['news_item']['customer_email'];
                $data['client_paid']      = $data['news_item']['client_paid'];
                $data['pages']            = $data['words'] / 250;
                $data['writers']          = $this->Adminusers_model->get_students();
                $orders['orders']         = $this->Adminorders_model->get_requests($orderid);
                $this->load->view('opmaster/template/header', $data);
                $this->load->view('opmaster/template/sidebar');
                $this->load->view('opmaster/essays/view', $orders);
                $this->load->view('opmaster/template/footer');
        }
}