<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Upsells extends CI_Controller
{
        function  __construct() {
                parent::__construct();
                $this->load->library('paypal_lib');
                $this->load->model('Siteconfigs_model');
                $this->load->model('Upsells_model');
                $this->load->model('product');

        }
        
        function index(){

        }
        
        public function activate_upsell(){


            $this->form_validation->set_rules('upsell_name', 'upsell_name', 'required');
            $this->form_validation->set_rules('upsell_value', 'upsell_value', 'required|numeric|greater_than[0]');
            if($this->form_validation->run() === TRUE){
            
                $orderid      = $this->input->post('orderid');
                
                   $data = array(
                    'upsell_name'=> $this->input->post('upsell_name'),
                    'upsell_value'=> $this->input->post('upsell_value'),
                    'orderid'=> $this->input->post('orderid'),
                    
                    );

                   $this->Upsells_model->activate_upsell($data);


                        
                 $data = array(
                    'amount' => $this->input->post('amount')
                 );
                        
                 $this->Upsells_model->price_update($orderid, $data);


               redirect('order/view/'.$this->input->post('orderid'));
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }

        
        public function remove_upsell(){


            $this->form_validation->set_rules('upsell_name', 'upsell_name', 'required');
            $this->form_validation->set_rules('upsell_value', 'upsell_value', 'required|numeric|greater_than[0]');
            if($this->form_validation->run() === TRUE){
            
                         $orderid      = $this->input->post('orderid');
                         $upsell_name      = $this->input->post('upsell_name');

                        
                        $data = array(
                    'upsell_name'=> $this->input->post('upsell_name'),
                    'orderid'=> $this->input->post('orderid'),
                        );
                $this->Upsells_model->remove_upsell($orderid, $upsell_name);   


                $data = array(
                    'amount' => $this->input->post('amount')
                 );
                        
                 $this->Upsells_model->price_update($orderid, $data);


               redirect('order/view/'.$this->input->post('orderid'));
            } else {
                echo "<div class='error'>".validation_errors()."</div>";
            }
        }


}