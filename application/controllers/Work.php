<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Work extends CI_Controller
{
        
        public function __construct()
        {
                parent::__construct();
                $this->load->model('Orders_model');
                $this->load->model('Questions_model');
                $this->load->model('User_model');
                $this->load->library(array(
                        'form_validation',
                        'session'
                ));
                $this->load->helper('directory');
                $this->load->library('upload');
                $this->load->library('pagination');
                
        }
        
        public function index()
        {
                
                $orders['profile'] = $this->User_model->get_profile();
                $orders['orders']  = $this->Orders_model->openorders();
                $orders['numrows'] = count($orders['orders']);
                $this->load->view('templates/header', $orders);
                $this->load->view('orders/work', $orders);
                $this->load->view('templates/footer');
        }


        

        public function test2($searchw){
 
                $search    = $this->session->flashdata('search');
                $urlparam    = $this->session->flashdata('urlparam');
                $orders['results'] = $this->Orders_model->tsearch($search);
                $this->load->view('template/header');
                $this->load->view('answers/search-results', $orders);          
                $this->load->view('template/footer');

        }
        
        public function answer ($alias = NULL)
        {
                
                

                $data['news_item']      = $this->Questions_model->get_question($alias);
                
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

                $search                = $data['news_item']['topic'];
                $data['related_answers'] = $this->Questions_model->relatedquestions($search);

               // This laods the header of the page
                $this->load->view('template/header');
                // this is the view that the user is not logged in. This is for public view on the front end. 
                $this->load->view('questions/question-answer', $data);
                // THis laods the footer of the site. You cna pass data to it if there is something that such data will achive
                $this->load->view('template/footer');

        }

        public function assignments()
        {

                $config                = array();
                $config["base_url"]    = base_url() . "work/assignments";
                $config["total_rows"]  = $this->Questions_model->qcount_sitemap();
                $config["per_page"]    = 5;
                $config["uri_segment"] = 3;

                
                $this->pagination->initialize($config);
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["results"] = $this->Questions_model->question_sitemap($config["per_page"], $page);
                $orders["links"]   = $this->pagination->create_links();
                $orders['urlparam'] = '';
                
                $this->load->view('template/header', $orders);

                $this->load->view('questions/questions');
               
                $this->load->view('template/footer');
        }
        public function assignments1()
        {

                $config                = array();
                $config["base_url"]    = base_url() . "work/assignments1";
                $config["total_rows"]  = $this->Questions_model->qcount_sitemap1();
                $config["per_page"]    = 5;
                $config["uri_segment"] = 3;

                
                $this->pagination->initialize($config);
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["results"] = $this->Questions_model->question_sitemap1($config["per_page"], $page);
                $orders["links"]   = $this->pagination->create_links();
                $orders['urlparam'] = '';
                
                $this->load->view('template/header', $orders);

                $this->load->view('questions/questions');
               
                $this->load->view('template/footer');
        }


        public function assignments2()
        {

                $config                = array();
                $config["base_url"]    = base_url() . "work/assignments2";
                $config["total_rows"]  = $this->Questions_model->qcount_sitemap2();
                $config["per_page"]    = 5;
                $config["uri_segment"] = 3;

                
                $this->pagination->initialize($config);
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["results"] = $this->Questions_model->question_sitemap2($config["per_page"], $page);
                $orders["links"]   = $this->pagination->create_links();
                $orders['urlparam'] = '';
                
                $this->load->view('template/header', $orders);

                $this->load->view('questions/questions');
               
                $this->load->view('template/footer');
        }

        public function assignments3()
        {

                $config                = array();
                $config["base_url"]    = base_url() . "work/assignments3";
                $config["total_rows"]  = $this->Questions_model->qcount_sitemap3();
                $config["per_page"]    = 5;
                $config["uri_segment"] = 3;

                
                $this->pagination->initialize($config);
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["results"] = $this->Questions_model->question_sitemap3($config["per_page"], $page);
                $orders["links"]   = $this->pagination->create_links();
                $orders['urlparam'] = '';
                
                $this->load->view('template/header', $orders);

                $this->load->view('questions/questions');
               
                $this->load->view('template/footer');
        }

        public function assignments4()
        {

                $config                = array();
                $config["base_url"]    = base_url() . "work/assignments4";
                $config["total_rows"]  = $this->Questions_model->qcount_sitemap4();
                $config["per_page"]    = 5;
                $config["uri_segment"] = 3;

                
                $this->pagination->initialize($config);
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["results"] = $this->Questions_model->question_sitemap4($config["per_page"], $page);
                $orders["links"]   = $this->pagination->create_links();
                $orders['urlparam'] = '';
                
                $this->load->view('template/header', $orders);

                $this->load->view('questions/questions');
               
                $this->load->view('template/footer');
        }

        public function assignments5()
        {

                $config                = array();
                $config["base_url"]    = base_url() . "work/assignments5";
                $config["total_rows"]  = $this->Questions_model->qcount_sitemap5();
                $config["per_page"]    = 5;
                $config["uri_segment"] = 3;

                
                $this->pagination->initialize($config);
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["results"] = $this->Questions_model->question_sitemap5($config["per_page"], $page);
                $orders["links"]   = $this->pagination->create_links();
                $orders['urlparam'] = '';
                
                $this->load->view('template/header', $orders);

                $this->load->view('questions/questions');
               
                $this->load->view('template/footer');
        }

        public function assignments6()
        {

                $config                = array();
                $config["base_url"]    = base_url() . "work/assignments6";
                $config["total_rows"]  = $this->Questions_model->qcount_sitemap6();
                $config["per_page"]    = 5;
                $config["uri_segment"] = 3;

                
                $this->pagination->initialize($config);
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["results"] = $this->Questions_model->question_sitemap6($config["per_page"], $page);
                $orders["links"]   = $this->pagination->create_links();
                $orders['urlparam'] = '';
                
                $this->load->view('template/header', $orders);

                $this->load->view('questions/questions');
               
                $this->load->view('template/footer');
        }
        public function assignments7()
        {

                $config                = array();
                $config["base_url"]    = base_url() . "work/assignments7";
                $config["total_rows"]  = $this->Questions_model->qcount_sitemap7();
                $config["per_page"]    = 5;
                $config["uri_segment"] = 3;

                
                $this->pagination->initialize($config);
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["results"] = $this->Questions_model->question_sitemap7($config["per_page"], $page);
                $orders["links"]   = $this->pagination->create_links();
                $orders['urlparam'] = '';
                
                $this->load->view('template/header', $orders);

                $this->load->view('questions/questions');
               
                $this->load->view('template/footer');
        }
        public function assignments8()
        {

                $config                = array();
                $config["base_url"]    = base_url() . "work/assignments8";
                $config["total_rows"]  = $this->Questions_model->qcount_sitemap8();
                $config["per_page"]    = 5;
                $config["uri_segment"] = 3;

                
                $this->pagination->initialize($config);
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["results"] = $this->Questions_model->question_sitemap8($config["per_page"], $page);
                $orders["links"]   = $this->pagination->create_links();
                $orders['urlparam'] = '';
                
                $this->load->view('template/header', $orders);

                $this->load->view('questions/questions');
               
                $this->load->view('template/footer');
        }        
        public function assignments9()
        {

                $config                = array();
                $config["base_url"]    = base_url() . "work/assignments9";
                $config["total_rows"]  = $this->Questions_model->qcount_sitemap9();
                $config["per_page"]    = 5;
                $config["uri_segment"] = 3;

                
                $this->pagination->initialize($config);
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["results"] = $this->Questions_model->question_sitemap9($config["per_page"], $page);
                $orders["links"]   = $this->pagination->create_links();
                $orders['urlparam'] = '';
                
                $this->load->view('template/header', $orders);

                $this->load->view('questions/questions');
               
                $this->load->view('template/footer');
        }

        public function blog(){
                $this->load->view('template/header');
                $this->load->view('questions/blog');       
                $this->load->view('template/footer');

        }

        public function questions()
        {

                $config                = array();
                $config["base_url"]    = base_url() . "work/questions";
                $config["total_rows"]  = $this->Orders_model->record_count();
                $config["per_page"]    = 5;
                $config["uri_segment"] = 3;

                
                $this->pagination->initialize($config);
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["results"] = $this->Orders_model->fetch_latest_orders($config["per_page"], $page);
                $orders["links"]   = $this->pagination->create_links();
                $orders['urlparam'] = '';
                
                $this->load->view('template/header', $orders);

                $this->load->view('pages/latest-orders');
               
                $this->load->view('template/footer');
        }


        
        public function question($alias = NULL)
        {
                $data['profile']   = $this->User_model->get_profile();
                $dif               = $this->config->item('uploads').'/' . $alias;
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
                
                // echo $data['latest_answer_details']['order_id'];
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
                
                
                
                $dif      = $this->config->item('uploads').'/' . $orderfile;
                //$filename = base_url().''.$dif.'/'.$file_name;// or /var/www/html/file.docx
                $filename = $this->config->item('uploads').'/' . $orderfile . '/' . $file_name; // or /var/www/html/file.docx
                $content  = $this->read_file_docx($filename);
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
                }
                
                // This laods the header of the page
                $this->load->view('templates/header', $data);
                // this is the view that the user is not logged in. This is for public view on the front end. 
                
                $this->load->view('orders/view_question', $data);
                
                // This laods the right sidebar of the site
                $this->load->view('templates/view_orderlogout', $data);
                
                // THis laods the footer of the site. You cna pass data to it if there is something that such data will achive
                $this->load->view('templates/footer');
                       
                
        }
}