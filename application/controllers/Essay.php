<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Essay extends CI_Controller
{
        
        public function __construct()
        {
                parent::__construct();
                $this->load->model('Orders_model');
                $this->load->model('Adminusers_model');
                $this->load->model('Ordersed_model');
                $this->load->model('Messages_model');
                $this->load->library("pagination");
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
        
        function search3e()
        {
                $data['query'] = $this->Orders_model->get_search();
                $this->load->view('orders/books', $data);
        }
        
        public function index()
        {

                $orders['orders'] = $this->Orders_model->get_orders();
                $orders['title']  = 'Students List';
                $this->load->view('template/header', $orders);
                $this->load->view('orders/myorders', $orders);
                $this->load->view('template/footer');
        }
      
      public function ualias(){
        $orders['orders'] = $this->Orders_model->sitemap();

        foreach ($orders['orders'] as $orders){
        $title        = $orders['topic'];
        $title        = trim(substr($title, 0, 100));
        $orderid      = $orders['orderid'];
        $alias        = preg_replace("/[^\w]/", "-", $title);
        $alias        = str_replace('----', '-', $alias);
        $alias        = str_replace('---', '-', $alias); 
        $alias        = str_replace('--', '-', $alias); 
        $alias        = $orderid.'-'.$alias . '.html'; 
                        
        $data = array(
              'alias' => $alias,
        );
            
        $this->Ordersed_model->order_update($orderid, $data);

            echo $orderid.'<>'.$orders['alias'];
            echo '<br/>';


         }





      }
 
        
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
                        // $data['pages'] = $this->Orders_model->get_pages(); we replaced the pages by foreach, php
                        $data['configs']           = $this->Siteconfigs_model->configs();
                        $data['referencing_style'] = $this->Siteconfigs_model->referencing_style();
                        $data['type_service']      = $this->Siteconfigs_model->type_service();
                        $data['profile']           = $this->User_model->get_profile();
                        $data['title']             = 'Create Order';
                        
                        $this->form_validation->set_rules('topic', 'topic', 'required');
                        $this->form_validation->set_rules('instructions', 'instructions', '');
                        
                        
                        if ($this->form_validation->run() === FALSE) {
                                $this->load->view('template/header', $data);
                                $this->load->view('essays/upload_sample');
                                $this->load->view('template/footer');
                                
                        } else {
                                
                                redirect('essay/question/' . $alias);
                                
                        }
                }
                
                else {
                        $this->load->view('templates/header');
                        $this->load->view('login');
                        $this->load->view('templates/footer');
                }
        }
        
        
        public function upload_samples()
        {
                
                            $data['upload_folder'] = $this->Siteconfigs_model->upload_folder(1);
            $upload_folder         = $data['upload_folder']['upload'];

                if ($this->input->post('submit') && count($_FILES['multipleFiles']['name']) > 0) {
                        
                        // count the number of files uploades
                        $number_of_files = count($_FILES['multipleFiles']['name']);
                        
                        //store global files to local variable
                        
                        $files        = $_FILES;
                        $orderfile    = $this->input->post('orderid');
                        $order_period = $this->config->item('order_period');
                        $dif          = $upload_folder.'/' . $order_period . '/' . $orderfile;
                        // make sure the folder exists else create 
                        if (!is_dir($dif)) {
                                mkdir($dif, 0777, true);
                        }
                        
                        // upload files one by one
                        for ($i = 0; $i < $number_of_files; $i++) {
                                
                                $data['max_orderid'] = $this->Orders_model->max_orderid_essay();
                                $latest_orderid      = $data['max_orderid']['orderid'];
                                $this_orderid        = $latest_orderid + 1;
                                
                                $fminus = pathinfo($files['multipleFiles']['name'][$i], PATHINFO_FILENAME);
                                $titles = $fminus;
                                $aliass = preg_replace("/[^a-z-]/i", "-", $titles);
                                $aliass = str_replace(' ', '-', $aliass); // Replaces all spaces with hyphens.
                                $aliass = str_replace('--', '-', $aliass); // Replaces all spaces with hyphens.
                                $aliass = str_replace('---', '-', $aliass); // Replaces all spaces with hyphens.
                                $aliass = str_replace('----', '-', $aliass); // Replaces all spaces with hyphens.
                                $aliass = $aliass . '.html'; // Replaces all spaces with hyphens.
                                
                                $order_period = $this->config->item('order_period');
                                $title        = $this->input->post('topic');
                                $alias        = preg_replace("/[^ \w]+/", "", $title);
                                $alias        = str_replace(' ', '-', $alias); // Replaces all spaces with hyphens.
                                $alias        = $alias . '.html'; // Replaces all spaces with hyphens.
                                
                                $data = array(
                                        'topic' => $fminus,
                                        'order_period' => $order_period,
                                        'project_type' => 'essay',
                                        'amount' => 2,
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
                                
                                $config['upload_path']   = $dif;
                                $config['allowed_types'] = 'pdf|doc|dot|docx|docm|dotx|dotm|docb|xls|xlsx|xlt|xlm|xlsm|xltx|xltm|csv|txt|rtf|htm|html|zip|mp3|mp4|wma|mpg|flv|avi|jpg|jpeg|png|gif|pptx|pptm|ppt|pot|potx|potm|ppam|ppsx|ppsm|sldx|sldm|accdb|accde|accdt|accdr|';
                                $config['max_size']      = '50000000000';
                                $config['max_width']     = '5000000';
                                $config['max_height']    = '5000000';
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
                                
                                
                                $fminus = pathinfo($files['multipleFiles']['name'][$i], PATHINFO_FILENAME);
                                $titled = $fminus;
                                $aliasd = preg_replace("/[^a-z-]/i", "-", $titled);
                                $aliasd = str_replace(' ', '-', $aliasd); // Replaces all spaces with hyphens.
                                $aliasd = str_replace('--', '-', $aliasd); // Replaces all spaces with hyphens.
                                $aliasd = str_replace('---', '-', $aliasd); // Replaces all spaces with hyphens.
                                $aliasd = str_replace('----', '-', $aliasd); // Replaces all spaces with hyphens.
                                $aliasd = $aliasd . '.html'; // Replaces all spaces with hyphens.
                                
                                $data['orderid_viaalias'] = $this->Orders_model->get_ordeid_viaalias($aliasd);
                                $order_idvia_alis         = $data['orderid_viaalias']['orderid'];
                                
                                $fname         = $files['multipleFiles']['name'][$i];

                                $file_name = pathinfo($fname, PATHINFO_FILENAME);
                                $ext = pathinfo($fname, PATHINFO_EXTENSION);
                                $file_name     = str_replace(' ', '_', $file_name);
                                $file_name     = str_replace('.', '_', $file_name);
                                $file_name     = str_replace("'", "", $file_name);
                                $file_name     = str_replace("&", "", $file_name);
                                $file_name     = str_replace("$", "", $file_name);

                                $file_name  = $file_name.'.'.$ext;

                                $uploader_name = $this->session->userdata('firstname');
                                $this->session->userdata('lastname');
                                
                                //////////// do some work here to enter content into database for materials and essays. stopepd here
                                
                                
                                //$filename = base_url().''.$dif.'/'.$file_name;// or /var/www/html/file.docx
                                /*$filename = 'uploads/' . $order_period . '/' . $file_name; // or /var/www/html/file.docx
                                
                                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                                
                                if ($ext == 'docx'){
                                $content = $this->read_file_docx($filename);    
                                }
                                
                                if ($ext == 'doc'){
                                $content = $this->read_file_doc($filename); 
                                }
                                
                                
                                
                                if($content !== false) { 
                                
                                $textcontent     = nl2br($content);
                                //echo nl2br($content);  
                                //echo '<br/>';
                                //echo str_word_count($content);
                                //echo '<hr/>';
                                //$small = substr(nl2br($content), 0, 1000);
                                // echo $small;
                                }
                                ////////////// end of do some work
                                */
                                $data     = array(
                                        'file_name' => $files['multipleFiles']['name'][$i],
                                        'file_size' => $files['multipleFiles']['size'][$i],
                                        'tmp_name' => $file_name,
                                        'file_type' => $files['multipleFiles']['type'][$i],
                                        'upload_date' => date('Y-m-d H:i:s'),
                                        'order_id' => $order_idvia_alis,
                                        'upload_type' => 'essay',
                                        'alias' => $aliasd,
                                        // 'answer_content' => nl2br($content),
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

                        // $data['pages'] = $this->Orders_model->get_pages(); we replaced the pages by foreach, php
                        $data['configs']           = $this->Siteconfigs_model->configs();
                        $data['referencing_style'] = $this->Siteconfigs_model->referencing_style();
                        $data['type_service']      = $this->Siteconfigs_model->type_service();
                        $data['profile']           = $this->User_model->get_profile();
                        $data['title']             = 'Create Order';
                        
                        $this->form_validation->set_rules('topic', 'topic', 'required');
                        $this->form_validation->set_rules('instructions', 'instructions', '');
                        
                        
                        if ($this->form_validation->run() === FALSE) {
                                $this->load->view('template/header', $data);
                                $this->load->view('essays/upload_essay');
                                $this->load->view('template/footer');
                                
                        } else {
                                
                                redirect('essay/question/' . $alias);
                                
                        }
                }
                
                else {
                        $this->load->view('templates/header');
                        $this->load->view('login');
                        $this->load->view('templates/footer');
                }
        }
        
        
        
        public function question($alias = NULL)
        {
                            $data['upload_folder'] = $this->Siteconfigs_model->upload_folder(1);
            $upload_folder         = $data['upload_folder']['upload'];

                $data['profile']   = $this->User_model->get_profile();
                $dif               = $upload_folder.'/' . $alias;
                $data['news_item'] = $this->Orders_model->get_orders_filealias($alias);
                
                $data['uploaded_files'] = directory_map($dif);
                
                
                if (empty($data['news_item'])) {
                        $this->index();
                }
                
                //this is getting the latest answer for this question. when a writer updates answer, its automatically picked. 
                $data['latest_answer_file'] = $this->Orders_model->latest_answer_file($alias);
                $latest_answer_fileid       = $data['latest_answer_file']['id'];
                
                // this echoes or tarsnfers to the view  secton or a field of the order_files
                $data['latest_answer_details'] = $this->Orders_model->latest_answer_details($latest_answer_fileid);
                
                $orderfile = $data['latest_answer_details']['order_id'];
                $file_name = $data['latest_answer_details']['tmp_name'];
                
                $data['latest_answer']     = $this->Orders_model->latest_answer($alias);
                $data['latest_answer_doc'] = $data['latest_answer']['id'];
                
                $orderid             = $data['news_item']['orderid'];
                $data['order_files'] = $this->Orders_model->get_orderfiles($alias);
                
                $data['orderid']          = $data['news_item']['orderid'];
                $data['topic']            = $data['news_item']['topic'];
                $data['words']            = $data['news_item']['words'];
                $data['urgency']          = $data['news_item']['urgency'];
                $data['order_period']     = $data['news_item']['order_period'];
                $data['writerpay']        = $data['news_item']['writerpay'];
                $data['amount']           = $data['news_item']['amount'];
                $data['instructions']     = $data['news_item']['instructions'];
                $data['typeofservice']    = $data['news_item']['typeofservice'];
                $data['order_status']     = $data['news_item']['order_status'];
                $data['date_posted']      = $data['news_item']['date_posted'];
                $data['subject']          = $data['news_item']['subject'];
                $data['preferred_writer'] = $data['news_item']['preferred_writer'];
                $data['customer']         = $data['news_item']['customer'];
                $data['client_paid']      = $data['news_item']['client_paid'];
                $data['deadline']         = $data['news_item']['deadline'];
                $data['pages']            = $data['words'] / 250;
                
                $customer         = $data['news_item']['customer'];
                $loggedin         = $this->session->userdata('writer_id');
                $preferred_writer = $data['news_item']['preferred_writer'];
                
                $data['answer_confirm'] = $this->Orders_model->answer_alias($alias);
                $answer_column          = $data['answer_confirm']['alias'];
                
                if (!empty($answer_column)) {
                        $order_period = $data['news_item']['order_period'];
                        $orderid      = $data['news_item']['orderid'];
                        $dif          = $upload_folder.'/' . $order_period . '/' . $orderfile;
                        //$filename = base_url().''.$dif.'/'.$file_name;// or /var/www/html/file.docx
                        
                        $filename1 = $upload_folder.'/' . $order_period . '/' . $orderid . '/' . $file_name; // or /var/www/html/file.docx
                        if (file_exists($filename1)) {
                                $filename = $upload_folder.'/' . $order_period . '/' . $orderid . '/' . $file_name; // or /var/www/html/file.docx
                        } else {
                                $filename = $upload_folder.'/' . $order_period . '/' . $file_name; // or /var/www/html/file.docx    
                        }
                        
                        $ext = pathinfo($filename, PATHINFO_EXTENSION);
                        
                        if ($ext == 'docx') {
                                $content = $this->read_file_docx($filename);
                        }
                        
                        if ($ext == 'doc') {
                                $content = $this->read_file_doc($filename);
                        }
                        
                        if ($content !== false) {
                                
                                $textcontent          = nl2br($content);
                                $data['file_content'] = nl2br($content);
                                $data['word_count']   = str_word_count($content);
                                $data['extract']      = substr(nl2br($content), 0, 1000);
                                
                                //echo nl2br($content);  
                                //echo '<br/>';
                                //echo str_word_count($content);
                                //echo '<hr/>';
                                //$small = substr(nl2br($content), 0, 1000);
                                // echo $small;
                        } else {
                                
                                $textcontent          = 'conten missing';
                                $data['file_content'] = 'The file preview missing, download full essays';
                                $data['word_count']   = '';
                                $data['extract']      = 'The file preview missing, download full essays';
                                
                        }
                        
                }
                
                if (empty($answer_column)) {
                        $textcontent          = 'conten missing';
                        $data['file_content'] = 'This Essays is not answered yet';
                        $data['word_count']   = '';
                        $data['extract']      = 'This Essays is not answered yet';
                }
                
                
                
                //do content if is not set, 
                
                
                // This laods the header of the page
                $this->load->view('templates/header', $data);
                // this is the view that the user is not logged in. This is for public view on the front end. 
                
                $this->load->view('essays/view_question', $data);
                
                // This laods the right sidebar of the site
                if ($this->session->userdata('writer_id')) {
                        $this->load->view('templates/right_sidebar', $data);
                }
                if (!$this->session->userdata('writer_id')) {
                        $this->load->view('templates/view_orderlogout', $data);
                }
                
                // THis laods the footer of the site. You cna pass data to it if there is something that such data will achive
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
                
                $order_period = $this->config->item('order_period');
                
                $title = $this->input->post('topic');
                $title = trim($title);
                $alias = preg_replace('/[^a-zA-Z0-9.]/','',$title);
                $alias = str_replace(' ', '-', $alias); // Replaces all spaces with hyphens.
                $alias = str_replace('--', '-', $alias); // Replaces all spaces with hyphens.
                $alias = str_replace('---', '-', $alias); // Replaces all spaces with hyphens.
                $alias = str_replace('----', '-', $alias); // Replaces all spaces with hyphens.
                $alias = $alias . '.html'; // Replaces all spaces with hyphens.
                
                 $instructions = $this->input->post('instructions');
               $nstructions = strip_tags ($instructions, '<p><h1><h2><h3><ul><ol><li><h4><h5><h6><em><strong><table><tr><tbody><td><i>');
                $data = array(
                        'topic' => $this->input->post('topic'),
                        // 'customer' => $customer,
                        'orderid' => $this->input->post('orderid'),
                        'subject' => $this->input->post('subject'),
                        'words' => $this->input->post('words'),
                        'instructions' => $nstructions,
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

                $this->load->view('templates/header');
                
                
                if ($this->input->post('submit') && count($_FILES['multipleFiles']['name']) > 0) {
                        
                        // count the number of files uploades
                        $number_of_files = count($_FILES['multipleFiles']['name']);
                        
                        //store global files to local variable
                        
                        $files        = $_FILES;
                        $orderfile    = $this->input->post('orderid');
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
                                
                                $config['upload_path']   = $dif;
                                $config['allowed_types'] = 'pdf|doc|dot|docx|docm|dotx|dotm|docb|xls|xlsx|xlt|xlm|xlsm|xltx|xltm|csv|txt|rtf|htm|html|zip|mp3|mp4|wma|mpg|flv|avi|jpg|jpeg|png|gif|pptx|pptm|ppt|pot|potx|potm|ppam|ppsx|ppsm|sldx|sldm|accdb|accde|accdt|accdr|';
                                $config['max_size']      = '233232';
                                $config['max_width']     = '232323';
                                $config['max_height']    = '243233';
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
                                $fname         = $files['multipleFiles']['name'][$i];
                                $file_name = pathinfo($fname, PATHINFO_FILENAME);
                                $ext = pathinfo($fname, PATHINFO_EXTENSION);
                                $file_name     = str_replace(' ', '_', $file_name);
                                $file_name     = str_replace('.', '_', $file_name);
                                $file_name     = str_replace("'", "", $file_name);
                                $file_name     = str_replace("&", "", $file_name);
                                $file_name     = str_replace("$", "", $file_name);

                                $file_name  = $file_name.'.'.$ext;


                                $uploader_name = $this->session->userdata('firstname');
                                $this->session->userdata('lastname');
                                
                                //////////// do some work here to enter content into database for materials and essays. stopepd here
                                
                                /*
                                //$filename = base_url().''.$dif.'/'.$file_name;// or /var/www/html/file.docx
                                $filename = 'uploads/' . $order_period . '/' . $orderfile . '/' . $file_name; // or /var/www/html/file.docx
                                
                                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                                
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

                                */
                                
                                $data = array(
                                        'file_name' => $files['multipleFiles']['name'][$i],
                                        'file_size' => $files['multipleFiles']['size'][$i],
                                        'tmp_name' => $file_name,
                                        'file_type' => $files['multipleFiles']['type'][$i],
                                        'upload_date' => date('d.m.Y H:i:s'),
                                        'order_id' => $this->input->post('orderid'),
                                        'upload_type' => $this->input->post('upload_type'),
                                        'alias' => $alias,
                                        //'answer_content' => nl2br($content),
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
        
        
        
        
        public function view_essay($orderid = NULL)
        {
                $data['data']      = $this->Adminorders_model->get_requests($orderid);
                $data['news_item'] = $this->Adminorders_model->get_orders($orderid);
                
                $data['order_files'] = $this->Orders_model->get_files($orderid);
                
                
                if (empty($data['news_item'])) {
                        $this->index();
                }
                
                $data['orderid']          = $data['news_item']['orderid'];
                $data['topic']            = $data['news_item']['topic'];
                $data['words']            = $data['news_item']['words'];
                $data['alias']            = $data['news_item']['alias'];
                $data['urgency']          = $data['news_item']['urgency'];
                $data['order_period']          = $data['news_item']['order_period'];
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
                
                
                $data['writers']  = $this->Adminusers_model->get_students();
                $orders['orders'] = $this->Adminorders_model->get_requests($orderid);
                $this->load->view('opmaster/template/header', $data);
                $this->load->view('opmaster/template/sidebar');
                $this->load->view('opmaster/essays/view', $orders);
                $this->load->view('opmaster/template/footer');
        }
        public function get_answers()
        {
                $config                = array();
                $config["base_url"]    = base_url() . "essay/get_answers";
                $config["total_rows"]  = $this->Orders_model->record_count();
                $config["per_page"]    = 20;
                $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $orders['profile'] = $this->User_model->get_profile();
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["results"] = $this->Orders_model->fetch_orders($config["per_page"], $page);
                $orders["links"]   = $this->pagination->create_links();
                
                $this->load->view('templates/header', $orders);
                
                if ($this->session->userdata('writer_id')) {
                        $this->load->view('essays/get_answers', $orders);
                        $this->load->view('templates/right_sidebar', $orders);
                        
                }
                
                if (!$this->session->userdata('writer_id')) {
                        $this->load->view('essays/get_answer_loggedout');
                        $this->load->view('templates/view_question');
                }
                
                $this->load->view('templates/footer');
        }
        
        
        public function my_essays()
        {
                $config                = array();
                $config["base_url"]    = base_url() . "essay/get_answers";
                $config["total_rows"]  = $this->Orders_model->record_count();
                $config["per_page"]    = 20;
                $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $orders['profile'] = $this->User_model->get_profile();
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["results"] = $this->Orders_model->fetch_myorders($config["per_page"], $page);
                $orders["links"]   = $this->pagination->create_links();
                
                $this->load->view('templates/header', $orders);
                $this->load->view('essays/get_answers', $orders);
                $this->load->view('templates/right_sidebar', $orders);
                $this->load->view('templates/footer');
        }
        public function search_answers()
        {
                $orders['Title']   = 'Orders';
                //$orders['writers'] = $this->Adminusers_model->get_students();
                $orders['results'] = $this->Orders_model->searchperm();
                $orders['title']   = 'Students List';
           
                $this->load->view('template/header');
                $this->load->view('answers/search-results', $orders);          
                $this->load->view('template/footer');
        }
        

        public function sprep(){
                $search = $this->input->post('search'); 
                $str = trim($search);
                $searchw = str_replace(' ', '--', $str);
                                
               $this->session->set_flashdata('search',$search);
               $this->session->set_flashdata('urlparam',$searchw);

               $this->session->set_flashdata('orderid',$max_orderid);
               redirect('essay/search/'.$searchw); 

        }
        

        public function search($searchw){
                $urlparam = $this->uri->segment(3);
             //$searchw = str_replace('--', ' ', $urlparam);
             $search = str_replace('--', ' ', $urlparam);

             if($urlparam){
                 $orders['urlparam'] = $search;
             } else {
                $orders['urlparam'] = '';
             }
                $orders['results'] = $this->Orders_model->vsearch($search);
                $this->load->view('template/header');
                $this->load->view('pages/latest-orders', $orders);          
                $this->load->view('template/footer');

        }
        

        
        public function essays()
        {
                $config                = array();
                $config["base_url"]    = base_url() . "essay/essays";
                $config["total_rows"]  = $this->Orders_model->record_count();
                $config["per_page"]    = 15;
                $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $orders['profile'] = $this->User_model->get_profile();
                
                $data['Title']    = 'All Essays';
                $data['writers']  = $this->Adminusers_model->get_students();
                $page             = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["orders"] = $this->Orders_model->fetch_orders($config["per_page"], $page);
                $orders["links"]  = $this->pagination->create_links();
                
                $this->load->view('opmaster/template/header', $data);
                $this->load->view('opmaster/template/sidebar');
                $this->load->view('opmaster/essays/allessays', $orders);
                $this->load->view('opmaster/template/footer');
        }
        
        
}