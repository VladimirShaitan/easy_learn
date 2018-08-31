<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books extends CI_Controller
{

    public function __construct() {
        parent::__construct();
        $this->load->model("books_model");
    }

     public function index()
     {
          $this->load->view("books/index.php", array());
     }



public function books_page()
     {

          // Datatables Variables
          $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));


          $books = $this->books_model->get_books($start, $length);

          $data = array();

          foreach($books->result() as $r) {

               $data[] = array(
                    $r->orderid,
                    $r->topic,
                    $r->amount,
                    $r->customer . "/10 Stars",
                    $r->customer_name
               );
          }

$total_books = $this->books_model->get_total_books();

$output = array(
   "draw" => $draw,
     "recordsTotal" => $total_books,
     "recordsFiltered" => $total_books,
     "data" => $data
);
          echo json_encode($output);
          exit();
     }
}
?>