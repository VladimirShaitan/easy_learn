<?php
class Opmaster extends CI_Controller
{
        
        public function __construct()
        {
                parent::__construct();
                $this->load->model('Adminorders_model');
                $this->load->model('Adminusers_model');
                $this->load->model('Ordersed_model');
                $this->load->model('Messages_model');
                $this->load->model('Orders_model');
                $this->load->model('Financial_model');
                $this->load->model('User_model');
                $this->load->model('Users_model');
                $this->load->model('Siteconfigs_model');
                $this->load->model('clients_model');
                $this->load->model('students_model');
                $this->load->helper('url_helper');
                $this->load->library('upload');
                $this->load->library(array(
                        'form_validation',
                        'session'
                ));
                
                $this->load->library('pagination');
                $this->load->helper(array(
                        'url',
                        'html',
                        'form'
                ));

                
                if ($this->session->userdata('writer_level') != 'admin') {
                        redirect('user/myaccount');
                }

                                
        }
        
        public function index()
        {
                
               redirect('opmaster/login');
        }
        
        public function dashboard()
        {
                $data['deactivated_writers'] = $this->Adminusers_model->count_deactivatedwriters();

                $data['pending_orders']    = $this->Adminorders_model->dash_revision_orders();
                $data['order_requests']    = $this->Adminorders_model->allorder_requests();
                $this->load->view('opmaster/template/header', $data);
                 $this->load->view('opmaster/admin-dashboard');
        }
        
        
        public function login()
        {
                // check if user is logged in it renders profile page else when user is not logged in it renders log in form. The check is by the firstname of the user in session 
                if (!$this->session->userdata('writer_id')) {
                        $this->load->view('opadmin');
                } else {
                        
                        redirect('opmaster/dashboard');
                }
                
        }
        
        
        function logout()
        {
                $this->session->sess_destroy();
                redirect($this->index());
        }
        
        public function trnk (){
            $str = "how-the-National-Security-Telecommunications-and-Information-Systems-Security-Policy-NSTISSP-national-policies-facilitate-the-confidentiality-integrity-authentication-and-non-repudiation-of-computing-security
";
echo  $str;
$title = substr($str, 0, 150);
echo "<br/>";
echo $title;
        }
        public function alias ()
        {

                                $orders= $this->Orders_model->sitemap();
                                $i = 0;





                                foreach ($orders as $orders){
                                    $orderid=$orders['orderid'];



                                
                                $title        = $orders['topic'];
                                $title = substr($title, 0, 220);
                                $title = trim($title);
                                $alias        = preg_replace("/[^\w]/", "-", $title);
                                $alias        = str_replace('----', '-', $alias); // Replaces all spaces with hyphens.
                                $alias        = str_replace('---', '-', $alias); // Replaces all spaces with hyphens.
                                $alias        = str_replace('--', '-', $alias); // Replaces all spaces with hyphens.

                                $alias        = $orderid.'-'.$alias . '.html'; // Replaces all spaces with hyphens.


echo $i++;                                    
echo "<hr/>";
                        $data = array(
                                'alias' => $alias,
                                'amount' => 15,
                        );
                        
                        $this->Ordersed_model->order_update($orderid, $data);


                            }
        }



        public function neworder()
        {
                $data['configs'] = $this->Siteconfigs_model->configs();
                $data['subject'] = $this->Orders_model->get_subject();
                $data['urgency'] = $this->Orders_model->get_urgency();
                $data['writers'] = $this->students_model->get_writers();
                $this->load->view('opmaster/template/header', $data);
                $this->load->view('opmaster/template/sidebar');
                $this->load->view('opmaster/orders/create', $data);
                $this->load->view('opmaster/template/footer');
        }


        


                public function admin_profile($writerid = NULL)
        {

                                        $data['upload_folder'] = $this->Siteconfigs_model->upload_folder(1);
            $data['upload']         = $data['upload_folder']['upload'];
                $data['writerpay'] = $this->Messages_model->myaverage_ratings();
                $data['profile']   = $this->User_model->admin_profile($writerid);
                $data['profile_img']   = $data['profile']['profile_img'];
                
                // Sumith
                $sessionUserID = $this->session->userdata('writer_id');
                $data['writer_id'] = $this->session->userdata('writer_id');
                $data['user_status']  = $this->Users_model->getUser(array('writer_id'=>$sessionUserID),$fields=''); 
                        
                        
                $this->load->view('opmaster/template/header');
                $this->load->view('opmaster/admin-profile', $data);

                

                        
        }



        


        public function new_editors()
        {
                
                
                $this->load->helper('form');
                $this->load->library('form_validation');
                $data['country'] = $this->Siteconfigs_model->get_country_writers();
                $data['states']  = $this->Siteconfigs_model->get_usa_states();
                $data['subject'] = $this->students_model->get_subject();
                $data['title']   = 'Editor Sign up';
                
                $this->form_validation->set_rules('firstname', 'firstname', 'required');
                $this->form_validation->set_rules('text', 'Text', 'required');
                $this->form_validation->set_rules('lastname', 'lastname', 'required');
                $this->form_validation->set_rules('gender', 'gender', 'required');
                $this->form_validation->set_rules('city', 'city', 'required');
                $this->form_validation->set_rules('streetaddress', 'streetaddress', 'required');
                $this->form_validation->set_rules('zip', 'zip', 'required');
                $this->form_validation->set_rules('country', 'country', 'required');
                $this->form_validation->set_rules('state', 'state', 'required');
                $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[writers.email]');
                $this->form_validation->set_rules('password', 'password', 'trim|required');
                $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
                $this->form_validation->set_rules('primaryphone', 'primaryphone', 'required');
                // $this->form_validation->set_rules('availability', 'availability', 'required');
                //$this->form_validation->set_rules('citation[]', 'citation[]', 'required');
                $this->form_validation->set_rules('nativelanguage', 'nativelanguage', 'required');
                $this->form_validation->set_rules('academiclevel', 'academiclevel', '');
                // $this->form_validation->set_rules('subject[]', 'subject', 'required');
                
                if ($this->form_validation->run() === TRUE) {
                        $this->load->helper('url');
                        
                        $slug          = url_title($this->input->post('firstname'), 'dash', TRUE);
                        $writer_status = 'FALSE';
                        $user_level    = 'writer';
                        $writer_id     = random_string('numeric', 8);
                        $profile_img   = 'placeholder.png';
                        $subjecta      = $this->input->post('subject');
                        $subject       = implode(', ', $subjecta);                        

                        $citationa      = $this->input->post('citation');
                        $citation       = implode(', ', $citationa);
                        
                        $data = array(
                                'firstname' => $this->input->post('firstname'),
                                'slug' => $slug,
                                'lastname' => $this->input->post('lastname'),
                                // 'gender' => $this->input->post('gender'),
                                'text' => $this->input->post('text'),
                                'country' => $this->input->post('country'),
                                'zip' => $this->input->post('zip'),
                                'streetaddress' => $this->input->post('streetaddress'),
                                'state' => $this->input->post('state'),
                                'city' => $this->input->post('city'),
                                'email' => $this->input->post('email'),
                                'password' => md5($this->input->post('password')),
                                'primaryphone' => $this->input->post('primaryphone'),
                                // 'availability' => $this->input->post('availability'),
                                'citation' => $citation,
                                'nativelanguage' => $this->input->post('nativelanguage'),
                                'academiclevel' => $this->input->post('academiclevel'),
                                'subject' => $subject,
                                'writer_status' => $writer_status,
                                'user_level' => 'admin',
                                'writer_id' => $writer_id,
                                'profile_img' => $profile_img
                                
                        );
                        
                        $this->students_model->freelancer_register($data);
                        $this->User_model->delete_key($this->input->post('email'));
                        
                        
                        // the variables to be used in emails when sendign to admin and writer
                        $useremail     = $this->input->post('email');
                        $userfirstname = $this->input->post('firstname');
                        $userlastname  = $this->input->post('lastname');
                        $usercountry   = $this->input->post('country');
                        $userwriterid  = $writer_id;
                        $siteurl       = base_url();
                        $userpassword  = $this->input->post('password');
                        
                        // get the email details here and eval so that the codes can be read. 
                        $data['msg']     = $this->Siteconfigs_model->msg_config('new_writer_registers');
                        $msg_body_admin  = $data['msg']['msg_body_admin'];
                        $msg_body_client = $data['msg']['msg_body_client'];
                        
                        //this replaces all the double quotes with single quotes since when double quotes are left, they give an error. 
                        $msg_body_admin  = str_replace('"', "'", $msg_body_admin);
                        $msg_body_client = str_replace('"', "'", $msg_body_client);
                        
                        
                        // This evals so that the variables in the codes are read
                        eval("\$str1 = \"$msg_body_admin\";");
                        //echo $str1; 
                        
                        
                        // This evals so that the variables in the codes are read
                        eval("\$str2 = \"$msg_body_client\";");
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
                        
                        //send email to admin to notify of new project
                        $this->email->from($smtp_user, $smtp_name);
                        $this->email->to($admin_email);
                        
                        $this->email->subject("Новый автор" . $userwriterid . " зарегистрировался на вашем сайте");
                        $this->email->message($str1);
                        
                        if ($this->email->send()) {
                                //Success email Sent
                                //echo $this->email->print_debugger();
                        } else {
                                //Email Failed To Send
                                // echo $this->email->print_debugger();
                        }
                        
                        //send email to user to confirm posted sucessfully 
                        
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
                        
                        $this->email->subject("Вы успешно зарегистрировались " . $siteurl);
                        $this->email->message($str2);
                        
                        if ($this->email->send()) {
                                //Success email Sent
                                //echo $this->email->print_debugger();
                        } else {
                                //Email Failed To Send
                                // echo $this->email->print_debugger();
                        }
                        
                         redirect('opmaster/view_writer/'. $writer_id);
                } else {
                $this->load->view('opmaster/template/iheader', $data);
                //$this->load->view('opmaster/template/sidebar');
                $this->load->view('opmaster/writers/create_editor', $data);
                 $this->load->view('opmaster/template/ifooter');
                        
                }
        }
 

       
        


        
        public function search()
        {
                $data['Title']    = 'Orders';
                $data['writers']  = $this->Adminusers_model->get_students();
                $orders['orders'] = $this->Orders_model->get_search_order();
                $this->load->view('opmaster/template/iheader', $data);
                $this->load->view('opmaster/orders/iorders', $orders);
                $this->load->view('opmaster/template/ifooter');
        }
        
        public function searchwriters()
        {
                
                $writers['Title']   = 'All editors';
                $writers['writers'] = $this->Orders_model->get_search_writers();
                $this->load->view('opmaster/template/header', $writers);
                $this->load->view('opmaster/template/sidebar');
                $this->load->view('opmaster/writers/writers', $writers);
                $this->load->view('opmaster/template/footer');
        }
        public function searchclients()
        {
                
                $writers['Title']   = 'All Customers';
                $writers['writers'] = $this->Orders_model->get_search_clients();
                $this->load->view('opmaster/template/header', $writers);
                $this->load->view('opmaster/template/sidebar');
                $this->load->view('opmaster/writers/writers', $writers);
                $this->load->view('opmaster/template/footer');
        }
        
        public function orders()
        {

                $data['assignedorders']    = $this->Adminorders_model->assigned_orders();
                $data['unassigned_orders'] = $this->Adminorders_model->unassigned_orders();
                $data['pending_orders']    = $this->Adminorders_model->pending_orders();
                $data['completed_orders']  = $this->Adminorders_model->completed_orders();
                $data['revision_orders']   = $this->Adminorders_model->revision_orders();
                $data['order_requests']    = $this->Adminorders_model->order_requests();
                $data['cancelled_orders']  = $this->Adminorders_model->cancelled_orders();
                $data['assignedorders']    = count($data['assignedorders']);
                $data['unassigned_orders'] = count($data['unassigned_orders']);
                $data['pending_orders']    = count($data['pending_orders']);
                $data['completed_orders']  = count($data['completed_orders']);
                $data['revision_orders']   = count($data['revision_orders']);
                $data['cancelled_orders']  = count($data['cancelled_orders']);
                $data['order_requests']    = count($data['order_requests']);

                
                $data['Title']    = 'Orders';
                $data['writers']  = $this->Adminusers_model->get_students();
                $orders['orders'] = $this->Adminorders_model->getall_orders();
                $this->load->view('opmaster/template/header', $data);
                $this->load->view('opmaster/orders/admin-orders', $orders);
        }
        


        public function iorders()
        {
                $orders['Title']    = 'Orders';
                $config                = array();
                $config["base_url"]    = base_url() . "opmaster/iorders";
                $config["total_rows"]  = $this->Adminorders_model->record_count();
                $config["per_page"]    = 20;
                $config["uri_segment"] = 3;
                
                $this->pagination->initialize($config);
                $orders['profile'] = $this->User_model->get_profile();
                $page              = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $orders["orders"] = $this->Adminorders_model->fetch_latest_orders($config["per_page"], $page);
                $orders["links"]   = $this->pagination->create_links();
                
                $this->load->view('opmaster/template/header', $orders);
                $this->load->view('opmaster/template/admin-sideorders');   
                $this->load->view('opmaster/orders/admin-allorders');

        }


        public function search_orders()
        {
                $orders['Title']   = 'Orders';
                $orders['writers'] = $this->Adminusers_model->get_students();
                $orders['orders'] = $this->Orders_model->searchperm();
                $orders['title']   = 'Students List';
                $orders["links"]   = "";
                $this->load->view('opmaster/template/header', $orders);
                $this->load->view('opmaster/orders/admin-allorders');          

        }

        
        public function search_transactions()
        {
                $data['Title']          = 'All withdrawals';
                $data['writers']        = $this->Adminusers_model->get_students();
                $orders['transactions'] = $this->Financial_model->search_transactions();
                $this->load->view('opmaster/template/header', $data);
                $this->load->view('opmaster/template/sidebar');
                $this->load->view('opmaster/trans/withdrawal_requests', $orders);
                $this->load->view('opmaster/template/footer');
        }


        
        public function pending_deposits()
        {
                $data['Title']          = 'Pending Deposits';
                $data['writers']        = $this->Adminusers_model->get_students();
                $orders['transactions'] = $this->Financial_model->pending_deposits();
                $this->load->view('opmaster/template/iheader', $data);
               // $this->load->view('opmaster/template/sidebar');
                $this->load->view('opmaster/trans/payment_deposit', $orders);
                $this->load->view('opmaster/template/ifooter');
        }
        
                

        
        public function view_client($writer_id = NULL)
        {
                
                $data['news_item'] = $this->Adminusers_model->get_clients($writer_id);
                
                if (empty($data['news_item'])) {
                        $this->index();
                }
                
                $data['firstname']      = $data['news_item']['firstname'];
                $data['text']           = $data['news_item']['text'];
                $data['writer_id']      = $data['news_item']['writer_id'];
                $data['id']             = $data['news_item']['id'];
                $data['lastname']       = $data['news_item']['lastname'];
                $data['gender']         = $data['news_item']['gender'];
                $data['city']           = $data['news_item']['city'];
                $data['country']        = $data['news_item']['country'];
                $data['subject']        = $data['news_item']['subject'];
                $data['email']          = $data['news_item']['email'];
                $data['password']       = $data['news_item']['password'];
                $data['primaryphone']   = $data['news_item']['primaryphone'];
                $data['profile_img']    = $data['news_item']['profile_img'];
                $data['subject']        = $data['news_item']['subject'];
                $data['academiclevel']  = $data['news_item']['academiclevel'];
                $data['citation']       = $data['news_item']['citation'];
                $data['writer_status']  = $data['news_item']['writer_status'];
                $data['nativelanguage'] = $data['news_item']['nativelanguage'];
                $data['availability']   = $data['news_item']['availability'];
                
                $this->load->view('opmaster/template/iheader', $data);
               // $this->load->view('opmaster/template/sidebar');
                $this->load->view('opmaster/clients/client_view', $data);
                $this->load->view('opmaster/template/ifooter');
        }
        
        
        
        public function panels()
        {
                $this->load->view('opmaster/template/header');
                $this->load->view('opmaster/template/sidebar');
                $this->load->view('opmaster/panels');
                $this->load->view('opmaster/template/footer');
        }
        
        
        public function general()
        {
                $this->load->view('opmaster/template/header');
                $this->load->view('opmaster/template/sidebar');
                $this->load->view('opmaster/general');
                $this->load->view('opmaster/template/footer');
        }
        
        
        public function buttons()
        {
                $this->load->view('opmaster/template/header');
                $this->load->view('opmaster/template/sidebar');
                $this->load->view('opmaster/buttons');
                $this->load->view('opmaster/template/footer');
        }
        
        
        public function basic_table()
        {
                $this->load->view('opmaster/template/header');
                $this->load->view('opmaster/template/sidebar');
                $this->load->view('opmaster/basic_table');
                $this->load->view('opmaster/template/footer');
        }
        
        public function test()
        {
                $writers['writers'] = $this->Adminusers_model->get_students();
                $this->load->view('opmaster/template/header', $writers);
                $this->load->view('opmaster/template/sidebar');
                $this->load->view('opmaster/writers/writers', $writers);
                $this->load->view('opmaster/template/footer');
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
                        echo "You have successfully assigned this order to " . $preferred_writer;
                        
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }
        

         public function edit_client($writer_id = NULL)
        {
                
                $this->form_validation->set_rules('writer_id', 'writer_id', 'required');
                if ($this->form_validation->run() === TRUE) {
                        $writer_id          = $this->input->post('writer_id');
                       
                        $data = array(
                                'firstname' => $this->input->post('firstname'),
                                'lastname' => $this->input->post('lastname'),
                                'email' => $this->input->post('email'),
                                'primaryphone' => $this->input->post('primaryphone'),
                        );
                        
                        $this->Adminusers_model->edit_user($writer_id, $data);
                        redirect('opmaster/view_client/'.$this->input->post('writer_id'));
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }
             
            
         public function edit_admin($writer_id = NULL)
        {
                
                $this->form_validation->set_rules('writer_id', 'writer_id', 'required');
                if ($this->form_validation->run() === TRUE) {
                        $writer_id          = $this->input->post('writer_id');
                       
                        $data = array(
                                'firstname' => $this->input->post('firstname'),
                                'lastname' => $this->input->post('lastname'),
                                'email' => $this->input->post('email'),
                                'primaryphone' => $this->input->post('primaryphone'),
                                'subject' => $this->input->post('subject'),
                                'academiclevel' => $this->input->post('academiclevel'),
                                'gender' => $this->input->post('gender'),
                                'country' => $this->input->post('country'),
                                'city' => $this->input->post('city'),
                        );
                        
                        $this->Adminusers_model->edit_user($writer_id, $data);
                        redirect('opmaster/admin_profile');
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }
                

         public function edit_password_admin($writer_id = NULL)
        {
                
                $this->form_validation->set_rules('writer_id', 'writer_id', 'required');
                if ($this->form_validation->run() === TRUE) {
                        $writer_id          = $this->input->post('writer_id');
                        $data = array(
                                'password' => md5($this->input->post('password')),
                        );
                        
                        $this->Adminusers_model->edit_user($writer_id, $data);
                        redirect('opmaster/admin_profile');
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }                


        
        public function editwriterpay($id = NULL)
        {
                
                $this->form_validation->set_rules('id', 'id', 'required');
                if ($this->form_validation->run() === TRUE) {
                        $id  = $this->input->post('id');
                        $writerid  = $this->input->post('writer_id');
                        $data = array(
                                'payment_details' => $this->input->post('payment_details'),
                                
                        );
                        
                        $this->Financial_model->editwriterpay($id, $writerid, $data);
                        redirect('opmaster/view_writer/'.$this->input->post('writer_id'));
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }
        


        public function deletewriterpay(){

           $this->form_validation->set_rules('id', 'id', 'required');
            if($this->form_validation->run() === TRUE){
                        $id  = $this->input->post('id');
                        $writerid  = $this->input->post('writer_id');
                   $this->Financial_model->deletewriterpay($id, $writerid);
                redirect('opmaster/view_writer/'.$writerid);
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }  


         public function edit_password_client($writer_id = NULL)
        {
                
                $this->form_validation->set_rules('writer_id', 'writer_id', 'required');
                if ($this->form_validation->run() === TRUE) {
                        $writer_id          = $this->input->post('writer_id');
                        $data = array(
                                'password' => md5($this->input->post('password')),
                        );
                        
                        $this->Adminusers_model->edit_user($writer_id, $data);
                        redirect('opmaster/view_client/'.$this->input->post('writer_id'));
                } else {
                        echo "<div class='error'>" . validation_errors() . "</div>";
                }
        }
        
        
}