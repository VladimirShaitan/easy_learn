<?php
class Siteconfigs_model extends CI_Model
{
        
        public function __construct()
        {
                $this->load->database();
                $this->load->helper('string');
                $this->load->library(array(
                        'form_validation',
                        'session'
                ));
        }
        
        
        public function configs()
        {
                $this->db->select("*");
                $this->db->from("configs");
                $query = $this->db->get();
                return $query->result_array();
        }
        
        
        public function max_writerid()
        {
                $this->db->select_max('writer_id');
                $query = $this->db->get('writers');
                return $query->row_array();
        }

        
        public function smtp_configs($id = FALSE)
        {
                
                if ($id === FALSE) {
                        
                        $query = $this->db->get_where('smtp_configs');
                        return $query->result_array();
                }
                
                $query = $this->db->get_where('smtp_configs', array(
                        'id' => $id
                ));
                return $query->row_array();
                
                
        }        

        
        public function msg_config($msg_id = FALSE)
        {
                
                if ($msg_id === FALSE) {
                        
                        $query = $this->db->get_where('msg_config');
                        return $query->result_array();
                }
                
                $query = $this->db->get_where('msg_config', array(
                        'msg_id' => $msg_id
                ));
                return $query->row_array();
                
                
        }
        
        
        public function get_subject_name($pvalue = FALSE)
        {
                
                $query = $this->db->get_where('subject', array(
                        'pvalue' => $pvalue
                ));
                return $query->row_array();
        }        
        
        public function get_writer_email($writerid = FALSE)
        {
                
                $query = $this->db->get_where('writers', array(
                        'writer_id' => $writerid
                ));
                return $query->row_array();
        }

        public function get_writer_email_new($writerid)
        {
                $this->db->select('email');
                $query = $this->db->get_where('writers' , array('writer_id' => $writerid));
                return $query->row_array();
        }
        public function get_writer_name_new($writerid)
        {
                $this->db->select(array('firstname', 'lastname'));
                $query = $this->db->get_where('writers' , array('writer_id' => $writerid));
                return $query->row_array();
        }

        public function get_order_price_fine($orderid)
        {
                $this->db->select('oplata, fine, fine_wr_message, doplata, doplata_status');
                $query = $this->db->get_where('orders' , array('orderid' => $orderid));
                return $query->row_array();
        }

    // public function get_order_fine_status($orderid)
    //     {
    //             $this->db->select('fine_wr_message');
    //             $query = $this->db->get_where('orders' , array('orderid' => $orderid));
    //             return $query->row_array();
    //     }
        
        
        public function get_email_viaorder($orderid = FALSE)
        {
                
                $query = $this->db->get_where('orders', array(
                        'orderid' => $orderid
                ));
                return $query->row_array();
        }


        
        public function select_words($id = FALSE)
        {
                
                $query = $this->db->get_where('configs', array(
                        'id' => $id
                ));
                return $query->row_array();
        }





        
        public function upload_folder($id = FALSE)
        {
                
                $query = $this->db->get_where('configs', array(
                        'id' => $id
                ));
                return $query->row_array();
        }






        
        public function get_configs($id = FALSE)
        {
                
                $query = $this->db->get_where('configs', array(
                        'id' => $id
                ));
                return $query->row_array();
        }

        
        public function select_servicetype($pvalue = FALSE)
        {
                
                $query = $this->db->get_where('type_service', array(
                        'pvalue' => $pvalue
                ));
                return $query->row_array();
        }
        
        public function get_country_writers()
        {
                
                $this->db->select("*");
                $this->db->from("country");
                $this->db->where('writer_enable', 1);
                $query = $this->db->get();
                return $query->result_array();
        }        
        public function get_usa_states()
        {
                
                $this->db->select("*");
                $this->db->from("usa_states");
                $query = $this->db->get();
                return $query->result_array();
        }



        public function get_country_customers()
        {                
                $this->db->select("*");
                $this->db->from("country");
                $this->db->where('customer_enable', 1);
                $query = $this->db->get();
                return $query->result_array();
        }
        
        public function get_accepted_currency()
        {                

                $this->db->select("*");
                $this->db->from("country");
               $this->db->where('accepted_currency', 1);
                $query = $this->db->get();
                return $query->result_array();
        }
                
        public function ops_coupon()
        {                

                $this->db->select("*");
                $this->db->from("ops_coupon");
                $query = $this->db->get();
                return $query->result_array();
        }
        
        
        public function getacademic_level($pvalue = FALSE)
        {
                
                $query = $this->db->get_where('academic_level', array(
                        'pvalue' => $pvalue
                ));
                return $query->row_array();
        }            
        
        public function get_currency($currencyxchange = FALSE)
        {
                
                $query = $this->db->get_where('country', array(
                        'currencyxchange' => $currencyxchange
                ));
                return $query->row_array();
        }        
        
        public function get_user_client($email = FALSE)
        {
                
                $query = $this->db->get_where('writers', array(
                        'email' => $email
                ));
                return $query->row_array();
        }        
        

        public function geturgency($pvalue = FALSE)
        {
                
                $query = $this->db->get_where('urgency', array(
                        'pvalue' => $pvalue
                ));
                return $query->row_array();
        }
        
        
        public function smtp_configs_admin()
        {
                $this->db->select("*");
                $this->db->from("smtp_configs");
                $query = $this->db->get();
                return $query->result_array();
        }
        public function smtp_configs_site($id = FALSE)
        {

                $query = $this->db->get_where('smtp_configs', array(
                        'id' => $id
                ));
                return $query->row_array();
        }
                

                 public function customer_own_price($id = FALSE)
        {

                $query = $this->db->get_where('configs', array(
                        'id' => $id
                ));
                return $query->row_array();
        }
         
        public function coupon($id = FALSE)
        {

                $query = $this->db->get_where('ops_coupon', array(
                        'id' => $id
                ));
                return $query->row_array();
        }
         
        
        public function subjects()
        {
                $this->db->select("*");
                $this->db->from("subject");
                $this->db->order_by("id", "asc");
                $query = $this->db->get();
                return $query->result_array();
        }
                 
        
        public function upsells()
        {
                $this->db->select("*");
                $this->db->from("ops_upsells");
                $this->db->order_by("id", "asc");
                $query = $this->db->get();
                return $query->result_array();
        }
        
                 
        
        public function num_writers()
        {
                $this->db->select("*");
                $this->db->from("writers");
                $this->db->where('user_level', 'writer');
                $query = $this->db->get();
                return $query->result_array();
        }
                         
        
        public function num_allregistered()
        {
                $this->db->select("*");
                $this->db->from("writers");
                $query = $this->db->get();
                return $query->result_array();
        }
                
        public function num_clients()
        {
                $this->db->select("*");
                $this->db->from("writers");
                $this->db->where('user_level', 'client');
                $query = $this->db->get();
                return $query->result_array();
        }
                        
        public function num_orders()
        {
                $this->db->select("*");
                $this->db->from("orders");
                $query = $this->db->get();
                return $query->result_array();
        }
        
        
        
        public function messages()
        {
                $this->db->select("*");
                $this->db->from("msg_config");
                $this->db->order_by("id", "asc");
                $query = $this->db->get();
                return $query->result_array();
        }
        
        
        public function countries()
        {
                $this->db->select("*");
                $this->db->from("country");
                $query = $this->db->get();
                return $query->result_array();
        }
               
        public function type_service()
        {
                $this->db->select("*");
                $this->db->from("type_service");
                $query = $this->db->get();
                return $query->result_array();
        }
                
        public function academic_level()
        {
                $this->db->select("*");
                $this->db->from("academic_level");
                $query = $this->db->get();
                return $query->result_array();
        }                


        public function urgency()
        {
                $this->db->select("*");
                $this->db->from("urgency");
                $query = $this->db->get();
                return $query->result_array();
        }
        
        
        public function add_subject($data)
        {
                //students is table name here
                
                $this->db->insert('subject', $data);
        }
               
        public function add_upsell($data)
        {
                //students is table name here
                
                $this->db->insert('ops_upsells', $data);
        }
        
        
        public function add_academic_level($data)
        {
                //students is table name here
                
                $this->db->insert('academic_level', $data);
        }
                
        
        public function add_urgency($data)
        {
                //students is table name here
                
                $this->db->insert('urgency', $data);
        }
        
        
        public function add_payout($data)
        {
                //students is table name here
                
                $this->db->insert('accepted_payout', $data);
        }
               
        public function add_style($data)
        {
                //students is table name here
                
                $this->db->insert('referencing_style', $data);
        }
        
        
        public function edit_subject($id, $data)
        {
                //students is table name here
                $this->db->where('id', $id);
                $this->db->update('subject', $data);
        }


        public function update_subject($id, $data)
        {
                //students is table name here
                $this->db->where('id', $id);
                $this->db->update('subject', $data);
        }
        
        public function delete_subject($id)
        {
                
                
                //students is table name here
                $this->db->where('id', $id);
                $this->db->delete('subject');
        }
        public function delete_upsell($id)
        {
                                
                //students is table name here
                $this->db->where('id', $id);
                $this->db->delete('ops_upsells');
                
        }
        
        
        public function adjust_field($data, $id)
        {
                //students is table name here
                $this->db->where('id', $id);
                $this->db->update('order_fields', $data);
        }       
        
        public function edit_coupon($data, $id)
        {
                //students is table name here
                $this->db->where('id', $id);
                $this->db->update('ops_coupon', $data);
        }
        
        public function delete_academic_level($id)
        {
                
                //students is table name here
                $this->db->where('id', $id);
                $this->db->delete('academic_level');
                
        }

        public function update_academic_level($id, $data)
        {
                //students is table name here
                $this->db->where('id', $id);
                $this->db->update('academic_level', $data);
        }


                public function update_urgency($id, $data)
        {
                //students is table name here
                $this->db->where('id', $id);
                $this->db->update('urgency', $data);
        }
                
        public function delete_urgency($id)
        {
                
                //students is table name here
                $this->db->where('id', $id);
                $this->db->delete('urgency');
                
        }
        
        public function delete_payout($id)
        {
                
                //students is table name here
                $this->db->where('id', $id);
                $this->db->delete('accepted_payout');
                
        }        
        public function delete_style($id)
        {
                
                //students is table name here
                $this->db->where('id', $id);
                $this->db->delete('referencing_style');
                
        }
        
        
        public function get_subject($id = FALSE)
        {
                
                if ($id === FALSE) {
                        
                        $query = $this->db->get_where('subject');
                        return $query->result_array();
                }
                
                $query = $this->db->get_where('subject', array(
                        'id' => $id
                ));
                return $query->row_array();
        }
        
        public function edit_config($data)
        {
                //students is table name here
                $this->db->where('id', 1);
                $this->db->update('configs', $data);
        }
        public function edit_smtp_configs($data, $id)
        {
                //students is table name here
                $this->db->where('id', $id);
                $this->db->update('smtp_configs', $data);
        }
        public function editmsg_toadmin($data, $msg_id)
        {
                //students is table name here
             $img = '<table style="width: 100%"><tr style="width: 100%"><td style="width: 100%; height: 250px; text-align: center;"><img src="https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png"></td></tr></table>';
               
             if(isset($data['msg_body_client'])){
                $data['msg_body_client'] = $img . $data['msg_body_client'];
             } elseif(isset($data['msg_body_writer'])){
                $data['msg_body_writer'] = $img . $data['msg_body_writer'];
             
             } elseif(isset($data['msg_body_admin'])){
                $data['msg_body_admin'] = $img . $data['msg_body_admin'];
             }
                $this->db->where('msg_id', $msg_id);
                $this->db->update('msg_config', $data);
        }
        
        
        public function referencing_style()
        {
                
                $query = $this->db->get('referencing_style');
                return $query->result_array();
        }
        
        
        public function enable_country($data, $id)
        {
                //students is table name here
                $this->db->where('id', $id);
                $this->db->update('country', $data);
        }        
        
        public function enable_upsell($data, $id)
        {
                //students is table name here
                $this->db->where('id', $id);
                $this->db->update('ops_upsells', $data);
        }
        public function enable_allcountries($data)
        {
                //students is table name here
                $this->db->update('country', $data);
        }



}