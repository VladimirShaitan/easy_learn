<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription extends CI_Controller
{
        
        public function __construct()
        {
                parent::__construct();
                $this->load->model('Subscription_model');
                $this->load->helper('url_helper');
                $this->load->helper('url');
                $this->load->library(array(
                        'form_validation',
                        'session'
                ));
               if (!$this->session->userdata('writer_id')) {
                        redirect('user/login');
                };
        }
        
        
        public function index()
        {
                $subscriber_id         = $this->session->userdata('writer_id');
                $data['if_subscribed'] = $this->Subscription_model->check_if_subscribed($subscriber_id);
                $subscribed            = $data['if_subscribed']['subscriber_id'];
                $subscription_end_date = $data['if_subscribed']['subscriber_id'];
                $current_date          = date('Y-m-d');
                
                $data['subscriber_name']       = $data['if_subscribed']['subscriber_name'];
                $data['subscription_trans_id'] = $data['if_subscribed']['subscription_trans_id'];
                $data['subscriber_name']       = $data['if_subscribed']['subscriber_name'];
                $data['subscription_date']     = $data['if_subscribed']['subscription_date'];
                $data['subscription_end_date'] = $data['if_subscribed']['subscription_end_date'];
                $data['subscription_amount']   = $data['if_subscribed']['subscription_amount'];
                $data['subscriber_id']         = $data['if_subscribed']['subscriber_id'];
                
                
                $data['profile'] = $this->Subscription_model->get_profile();
                $this->load->view('templates/header');
                
                if (!empty($subscribed) && $subscription_end_date > $current_date) {
                        $this->load->view('subscription/index', $data);
                }
                
                if (empty($subscribed)) {
                        $this->load->view('subscription/subscribe', $data);
                }
                
                
                
                
                $this->load->view('templates/right_sidebar', $data);
                $this->load->view('templates/footer');
        }
        
        public function subscribe()
        {
                $subscriber_id         = $this->session->userdata('writer_id');
                $data['if_subscribed'] = $this->Subscription_model->check_if_subscribed($subscriber_id);
                $subscribed            = $data['if_subscribed']['subscriber_id'];
                $subscription_end_date = $data['if_subscribed']['subscriber_id'];
                $current_date          = date('Y-m-d');
                
                $data['subscriber_name']       = $data['if_subscribed']['subscriber_name'];
                $data['subscription_trans_id'] = $data['if_subscribed']['subscription_trans_id'];
                $data['subscriber_name']       = $data['if_subscribed']['subscriber_name'];
                $data['subscription_date']     = $data['if_subscribed']['subscription_date'];
                $data['subscription_end_date'] = $data['if_subscribed']['subscription_end_date'];
                $data['subscription_amount']   = $data['if_subscribed']['subscription_amount'];
                $data['subscriber_id']         = $data['if_subscribed']['subscriber_id'];
                
                
                $data['profile'] = $this->Subscription_model->get_profile();
                $this->load->view('template/header');

                $this->load->view('template/sidebar-user', $data);
                
                if ($subscribed && $subscription_end_date > $current_date) {
                        $this->load->view('subscription/index', $data);
                }
                
                if (!$subscribed) {
                        $this->load->view('subscription/subscribe', $data);
                }
                           

                $this->load->view('template/footer');
        }
                
        public function click2sell()
        {
                
                
                $c2sTransId = urldecode($_POST["c2s_transaction_id"]);
                /* click2sell transaction number */
                
                $purchaseDate       = urldecode($_POST["purchase_date"]);
                /* format: yyyy-MM-dd (year-month-day) */
                $subscriptionStatus = urldecode($_POST["subscription_status"]);
                /* in case of subscription: New, Recurring, Cancel*/
                $buyerEmail         = urldecode($_POST["buyer_email"]);
                /* email */
                $buyerPhone         = urldecode($_POST["buyer_phone"]);
                /* phone */
                $productPrice       = urldecode($_POST["product_price"]);
                /* price: amount + currency – "###.## CUR", CUR is a currency code: USD, EUR or GBP */
                
                
                if (!empty($c2sTransId)) {
                        $orderid      = $this->input->post('orderid');
                        $order_status = $this->input->post('order_status');
                        $current_date = date('Y-m-d');
                        $accessor_id  = $this->session->userdata('writer_id');
                        
                        $data = array(
                                'subscriber_id' => $accessor_id,
                                'subscriber_name' => $buyerEmail,
                                'subscription_trans_id' => $c2sTransId,
                                'subscription_date' => $current_date,
                                'subscription_end_date' => $current_date,
                                'subscription_plan' => "Basic",
                                'subscription_amount' => $productPrice,
                                'subscription_pay_method' => 'click2sell'
                        );
                        
                        $this->Subscription_model->create_subscription($data);
                }
                
                
                
        }
        
        
        public function click2sell_buy()
        {
                
                
                $c2sTransId = urldecode($_POST["c2s_transaction_id"]);
                /* click2sell transaction number */
                
                $purchaseDate       = urldecode($_POST["purchase_date"]);
                /* format: yyyy-MM-dd (year-month-day) */
                $subscriptionStatus = urldecode($_POST["subscription_status"]);
                /* in case of subscription: New, Recurring, Cancel*/
                $buyerEmail         = urldecode($_POST["buyer_email"]);
                /* email */
                $buyerPhone         = urldecode($_POST["buyer_phone"]);
                /* phone */
                $productPrice       = urldecode($_POST["product_price"]);
                /* price: amount + currency – "###.## CUR", CUR is a currency code: USD, EUR or GBP */
                
                
                if (!empty($c2sTransId)) {
                        $orderid      = $this->input->post('orderid');
                        $order_status = $this->input->post('order_status');
                        $current_date = date('Y-m-d');
                        $accessor_id  = $this->session->userdata('writer_id');
                        
                        $data = array(
                                'trns_id' => $accessor_id,
                                'trns_type' => 'buyessay',
                                'trans_amount' => $productPrice,
                                'trns_date' => $current_date,
                                'trns_status' => 'complete',
                                'trns_fullname' => $buyerEmail
                        );
                        
                        $this->Subscription_model->buy_essay($data);
                }
                
                
                
        }
        
        
        
}