<?php
class ControllerPaymentLiqPay extends Controller {
	public function index() {
 			$writer_id = $this->session->userdata('writer_id');
            $is_ajax = $this->input->is_ajax_request();
            $orderid = $this->input->post('liq_orderid');
            $sum = $this->input->post('amount');
            $sum_part = $this->input->post('sum_part');
            $time_f = (int)time();
            $data = array(
                'order_id'  => $orderid,
                'user_id'   => $writer_id,
                'sum'       => $sum,
                'sum_part'  => $sum_part,
                'encoded_id' => sha1($orderid+$time_f)
            );
            $order_id_gen = 'order_'.$orderid . rand(10000, 99999);

            $data['action'] = 'https://liqpay.com/?do=clickNbuy';

            $xml  = '<request>';
            $xml .= '   <version>1.2</version>';
            $xml .= '   <result_url>' . ci_site_url() . 'order/paymentSuccess/?lq='.base64_encode(sha1($orderid+$time_f)) . '</result_url>';
            $xml .= '   <server_url>' . ci_site_url() . 'controllers/Order/liq_callback' . '</server_url>';
            $xml .= '   <merchant_id>i37168373386</merchant_id>';
            $xml .= '   <order_id>' . $order_id_gen . '</order_id>';
            $xml .= '   <amount>' . $sum . '</amount>';
            $xml .= '   <currency>UAH</currency>';
            $xml .= '   <description>Оплата заказа '.$orderid.'</description>';
            $xml .= '   <default_phone></default_phone>';
            $xml .= '   <pay_way>card</pay_way>';
            $xml .= '</request>';

            $data['xml'] = base64_encode($xml);
            $data['signature'] = base64_encode(sha1('i37168373386' . $xml .'083tSpAB1jRoSF1n1wRNy0eNQtqMQikAanLBa5NJ', true));

            // print_r($data);
            // return true;
            return $this->load->view('Order/payMe', $data);
        }

        public function liq_callback() {
            $xml = base64_decode($this->request->post['operation_xml']);
            $signature = base64_encode(sha1('i37168373386' . $xml . '083tSpAB1jRoSF1n1wRNy0eNQtqMQikAanLBa5NJ', true));

            $posleft = strpos($xml, 'order_id');
            $posright = strpos($xml, '/order_id');

            $order_id = substr($xml, $posleft + 9, $posright - $posleft - 10);

            if ($signature == $this->request->post['signature']) {
                // $this->load->model('checkout/order');
                print_r('ok');
                // $this->model_checkout_order->addOrderHistory($order_id, $this->config->get('config_order_status_id'));
            }
}


