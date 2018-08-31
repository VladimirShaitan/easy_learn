<?php
class Skills extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('students_model');
                $this->load->model('User_model');
                $this->load->model('Orders_model');
                $this->load->helper('url_helper');
                $this->load->library('session');
                $this->load->helper('directory');
                $this->load->library('upload');
                $this->load->library('pagination');
                
        }

        public function index()

        {

            redirect('skills/topwriters');
        }

        public function topwriters()
        {
                $config                = array();
                $config["base_url"]    = base_url() . "skills/topwriters";
                $config["total_rows"]  = $this->students_model->cget_writers();
                $config["per_page"]    = 10;
                $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["topwriters"] = $this->students_model->getwriters($config["per_page"], $page);
                $data["links"]   = $this->pagination->create_links();
                $data['subjects'] = $this->students_model->get_subjects();

                $this->load->view('template/header');
                $this->load->view('pages/top-writers', $data);
                $this->load->view('template/footer');
        }


       public function cat($subject = NULL)
            {


                $config                = array();
                $config["base_url"]    = base_url() . "skills/cat/".$subject;
                $data['topwriters'] = $this->students_model->get_skills($subject);

                $config["total_rows"]  = count($data['topwriters']);

                $config["per_page"]    = 2;
                $config["uri_segment"] = 4;
                
                $this->pagination->initialize($config);
                $page              = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            
                $data["links"]   = $this->pagination->create_links();
                $data['category']           = $this->Orders_model->get_subject();

            if (empty($subject))
            {
                  redirect('skills/index');
            }


            $data["links"]   = $this->pagination->create_links();
 $data['subjects'] = $this->students_model->get_subjects();
                $data['title'] = 'Top Writers';
                $this->load->view('template/header', $data);
                $this->load->view('pages/top-writers', $data);
                $this->load->view('template/footer');
            }




        public function skill_search()

        {
                
                $data['Title']    = 'Orders';
               // $data['writers']  = $this->Adminusers_model->get_students();
                $data['category']           = $this->Orders_model->get_subject();
                $data['topwriters'] = $this->students_model->skill_search();
                $data['title'] = 'Writers';
                $data["links"]   = $this->pagination->create_links();
                $this->load->view('template/header', $data);
                $this->load->view('pages/top-writers', $data);
                $this->load->view('template/footer');
        }
        
}