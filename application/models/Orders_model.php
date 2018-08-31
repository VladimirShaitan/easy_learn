<?php
class  Orders_model extends CI_Model
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


       public function count_sitemap() {
      $this->db->where(array());
         return $this->db->count_all_results('orders'); 
        }    
                public function qcount_sitemap() {
      $this->db->where(array());
         return $this->db->count_all_results('opskill_questions'); 
        }    

                public function qcount_sitemap1() {
      $this->db->where(array());
         return $this->db->count_all_results('opskill_questions1'); 
        }    

                        public function qcount_sitemap2() {
      $this->db->where(array());
         return $this->db->count_all_results('opskill_questions2'); 
        }    

                        public function qcount_sitemap3() {
      $this->db->where(array());
         return $this->db->count_all_results('opskill_questions3'); 
        }    

                public function qcount_sitemap4() {
      $this->db->where(array());
         return $this->db->count_all_results('opskill_questions4'); 
        }    


                        public function qcount_sitemap5() {
      $this->db->where(array());
         return $this->db->count_all_results('opskill_questions5'); 
        }    


                        public function qcount_sitemap6() {
      $this->db->where(array());
         return $this->db->count_all_results('opskill_questions6'); 
        }    

                        public function qcount_sitemap7() {
      $this->db->where(array());
         return $this->db->count_all_results('opskill_questions7'); 
        }
                        public function qcount_sitemap8() {
      $this->db->where(array());
         return $this->db->count_all_results('opskill_questions8'); 
        }    
                        public function qcount_sitemap9() {
      $this->db->where(array());
         return $this->db->count_all_results('opskill_questions9'); 
        }  


      
       public function sitemap($limit, $start) {
                
        $this->db->limit($limit, $start);
       $query = $this->db->get_where('orders', array());

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }


       public function question_sitemap($limit, $start) {
                
        $this->db->limit($limit, $start);
       $query = $this->db->get_where('opskill_questions', array());

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }


       public function question_sitemap1($limit, $start) {
                
        $this->db->limit($limit, $start);
       $query = $this->db->get_where('opskill_questions1', array());

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }


       public function question_sitemap2($limit, $start) {
                
        $this->db->limit($limit, $start);
       $query = $this->db->get_where('opskill_questions2', array());

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }


       public function question_sitemap3($limit, $start) {
                
        $this->db->limit($limit, $start);
       $query = $this->db->get_where('opskill_questions3', array());

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }


       public function question_sitemap4($limit, $start) {
                
        $this->db->limit($limit, $start);
       $query = $this->db->get_where('opskill_questions4', array());

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }


       public function question_sitemap5($limit, $start) {
                
        $this->db->limit($limit, $start);
       $query = $this->db->get_where('opskill_questions5', array());

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
      }


       public function question_sitemap6($limit, $start) {
                
        $this->db->limit($limit, $start);
       $query = $this->db->get_where('opskill_questions6', array());

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
      }


       public function question_sitemap7($limit, $start) {
                
        $this->db->limit($limit, $start);
       $query = $this->db->get_where('opskill_questions7', array());

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }


       public function question_sitemap8($limit, $start) {
                
        $this->db->limit($limit, $start);
       $query = $this->db->get_where('opskill_questions8', array());

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
      }


       public function question_sitemap9($limit, $start) {
                
        $this->db->limit($limit, $start);
       $query = $this->db->get_where('opskill_questions9', array());

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
       }


       public function questions($limit, $start) {
                
        $this->db->limit($limit, $start);
       $query = $this->db->get_where('opskill_questions', array());

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
      }


        
        public function pending_orders()
            {
                $this->db->select("*");
                $this->db->from("orders");
                $this->db->where('order_status', 'pending');
                $query = $this->db->get();
                return $query->result_array();
            }
            
        
        public function get_files($orderid = FALSE)
        {
                $this->db->select("*");
                $this->db->from("order_files");
                $this->db->where('order_id', $orderid);
                $this->db->order_by("upload_date", "desc");
                $query = $this->db->get();
                return $query->result_array();
        }

        
        public function order_materials($orderid = FALSE)
        {
                $this->db->select("*");
                $this->db->from("order_files");
                $this->db->where('order_id', $orderid);
                $this->db->where('upload_type', 'material');
                $this->db->order_by("upload_date", "desc");
                $query = $this->db->get();
                return $query->result_array();
        }

        public function order_check($orderid = FALSE)
        {
                $this->db->select("*");
                $this->db->from("order_files");
                $this->db->where('order_id', $orderid);
                $this->db->where('upload_type', 'check');
                $this->db->order_by("upload_date", "desc");
                $query = $this->db->get();
                return $query->result_array();
        }

        
        public function order_essays($orderid = FALSE)
        {
                $this->db->select("*");
                $this->db->from("order_files");
                $this->db->where('order_id', $orderid);
                $this->db->where('upload_type', 'essay');
                $this->db->order_by("upload_date", "desc");
                $query = $this->db->get();
                return $query->result_array();
        }

        public function order_plan($orderid = FALSE)
        {
                $this->db->select("*");
                $this->db->from("order_files");
                $this->db->where('order_id', $orderid);
                $this->db->where('upload_type', 'plan');
                $this->db->order_by("upload_date", "desc");
                $query = $this->db->get();
                return $query->result_array();
        }

        //половина заказа
        public function order_second($orderid = FALSE)
        {
                $this->db->select("*");
                $this->db->from("order_files");
                $this->db->where('order_id', $orderid);
                $this->db->where('upload_type', 'mat_sec');
                $this->db->order_by("upload_date", "desc");
                $query = $this->db->get();
                return $query->result_array();
        }

        //проверка на уникальность
         public function order_unic($orderid = FALSE)
        {
                $this->db->select("*");
                $this->db->from("order_files");
                $this->db->where('order_id', $orderid);
                $this->db->where('upload_type', 'unic');
                $this->db->order_by("upload_date", "desc");
                $query = $this->db->get();
                return $query->result_array();
        }


        function get_search()
        {
                $match = $this->input->post('search');
                $this->db->like('topic', $match);
                $this->db->or_like('instructions', $match);
                $query = $this->db->get('orders');
                return $query->result();
        }

        function get_search_order()
        {
                $match = $this->input->post('search');
                $this->db->like('orderid', $match);
                $this->db->or_like('topic', $match);
                $this->db->or_like('instructions', $match);
                $query = $this->db->get('orders');
                return $query->result_array();
        }   


        function get_search_writers()
        {
                $match = $this->input->post('search');
                $this->db->like('writer_id', $match);
                $this->db->or_like('firstname', $match);
                $this->db->or_like('lastname', $match);
                $this->db->or_like('country', $match);
                $this->db->or_like('email', $match);
                $this->db->or_like('primaryphone', $match);
                $this->db->or_like('academiclevel', $match);
                $this->db->or_like('subject', $match);
                $this->db->or_like('writer_status', $match);
                $query = $this->db->get('writers');
                return $query->result_array();
        }

        function get_search_clients()
        {
                $match = $this->input->post('search');
                $this->db->like('writer_id', $match);
                $this->db->or_like('firstname', $match);
                $this->db->or_like('lastname', $match);
                $this->db->or_like('country', $match);
                $this->db->or_like('email', $match);
                $this->db->or_like('primaryphone', $match);
                $this->db->or_like('academiclevel', $match);
                $this->db->or_like('subject', $match);
                $this->db->or_like('writer_status', $match);
                $query = $this->db->get('writers');
                return $query->result_array();
        }

function powerSet($in,$minLength =2) { 
   $count = count($in); 
   $members = pow(2,$count); 
   $return = array(); 
   for ($i = 0; $i < $members; $i++) { 
      $b = sprintf("%0".$count."b",$i); 
      $out = array(); 
      for ($j = 0; $j < $count; $j++) { 
         if ($b{$j} == '1') $out[] = $in[$j]; 
      } 
      if (count($out) >= $minLength) { 
         $return[] = $out; 
      } 
   } 
   return $return; 
}

            public function relatedquestions ($search){
 $phrase = $search;
 $search = preg_replace("/[^\w]/", " ", $phrase);
 //$search = trim($search); 

 $total_words = str_word_count($phrase);
 $one = ($total_words*0.8);
 $two = ($total_words*0.6);
 $three = ($total_words*0.5);
 $four = ($total_words*0.4);
 $five = ($total_words*0.2);


$srch1 = implode(' ', array_slice(str_word_count($search, 2), 0, $one));
$srch2 = implode(' ', array_slice(str_word_count($search, 2), 0, $two));
$srch3 = implode(' ', array_slice(str_word_count($search, 2), $five, $total_words));
$srch4 = implode(' ', array_slice(str_word_count($search, 2), 0, $three));
$srch5 = implode(' ', array_slice(str_word_count($search, 2), $three, $total_words));
$srch6 = implode(' ', array_slice(str_word_count($search, 2), 0, $four));
$srch7 = implode(' ', array_slice(str_word_count($search, 2), 0, $five));

                $this->db->or_like('topic', $phrase);
                $this->db->or_like('instructions', $phrase);
                $this->db->limit(4);
                $query = $this->db->get('opskill_questions');
            
             if($query->num_rows() >3){
                return $query->result_array();

            } else {

                // start seraching using the first one
                $this->db->or_like('topic', $srch1);
                $this->db->or_like('instructions', $srch1);
                $this->db->limit(4);
                $query = $this->db->get('opskill_questions');

                if ($query->num_rows() >3) {
                   return $query->result_array();                  
                } else {
                // start seraching using the second one
                $this->db->or_like('topic', $srch2);
                $this->db->or_like('instructions', $srch2);
                $this->db->limit(4);
                $query = $this->db->get('opskill_questions');

                if($query->num_rows() >3){
                
                return $query->result_array(); 

                } else {

                $this->db->or_like('topic', $srch3);
                $this->db->or_like('instructions', $srch3);
                $this->db->limit(4);
                $query = $this->db->get('opskill_questions');

                if($query->num_rows() >3){
                    return $query->result_array();
                } else {

                 $this->db->or_like('topic', $srch4);
                $this->db->or_like('instructions', $srch4);
                $this->db->limit(4);
                $query = $this->db->get('opskill_questions');
 if($query->num_rows() >3){
return $query->result_array();
 } else {

                $this->db->or_like('topic', $srch5);
                $this->db->or_like('instructions', $srch5);
                $this->db->limit(4);
                $query = $this->db->get('opskill_questions');
if($query->num_rows() >3){
    return $query->result_array();
} else {

                $this->db->or_like('topic', $srch6);
                $this->db->or_like('instructions', $srch6);
                $this->db->limit(4);
                $query = $this->db->get('opskill_questions');

                if($query->num_rows() >3){
                        return $query->result_array();
                    } else {

                $this->db->or_like('topic', $srch7);
                $this->db->or_like('instructions', $srch7);
                $this->db->limit(4);
                $query = $this->db->get('opskill_questions');
  return $query->result_array();
                    }

}
 }
                }
            }
          }

      }
    }


            public function relatedsearch ($search){
 $phrase = $search;
 $search = preg_replace("/[^\w]/", " ", $phrase);
 //$search = trim($search); 

 $total_words = str_word_count($phrase);
 $one = ($total_words*0.8);
 $two = ($total_words*0.6);
 $three = ($total_words*0.5);
 $four = ($total_words*0.4);
 $five = ($total_words*0.2);


$srch1 = implode(' ', array_slice(str_word_count($search, 2), 0, $one));
$srch2 = implode(' ', array_slice(str_word_count($search, 2), 0, $two));
$srch3 = implode(' ', array_slice(str_word_count($search, 2), $five, $total_words));
$srch4 = implode(' ', array_slice(str_word_count($search, 2), 0, $three));
$srch5 = implode(' ', array_slice(str_word_count($search, 2), $three, $total_words));
$srch6 = implode(' ', array_slice(str_word_count($search, 2), 0, $four));
$srch7 = implode(' ', array_slice(str_word_count($search, 2), 0, $five));

                $this->db->or_like('topic', $phrase);
                $this->db->or_like('instructions', $phrase);
                $this->db->limit(4);
                $query = $this->db->get('orders');
            
             if($query->num_rows() >3){
                return $query->result_array();

            } else {

                // start seraching using the first one
                $this->db->or_like('topic', $srch1);
                $this->db->or_like('instructions', $srch1);
                $this->db->limit(4);
                $query = $this->db->get('orders');

                if ($query->num_rows() >3) {
                   return $query->result_array();                  
                } else {
                // start seraching using the second one
                $this->db->or_like('topic', $srch2);
                $this->db->or_like('instructions', $srch2);
                $this->db->limit(4);
                $query = $this->db->get('orders');

                if($query->num_rows() >3){
                
                return $query->result_array(); 

                } else {

                $this->db->or_like('topic', $srch3);
                $this->db->or_like('instructions', $srch3);
                $this->db->limit(4);
                $query = $this->db->get('orders');

                if($query->num_rows() >3){
                    return $query->result_array();
                } else {

                 $this->db->or_like('topic', $srch4);
                $this->db->or_like('instructions', $srch4);
                $this->db->limit(4);
                $query = $this->db->get('orders');
 if($query->num_rows() >3){
return $query->result_array();
 } else {

                $this->db->or_like('topic', $srch5);
                $this->db->or_like('instructions', $srch5);
                $this->db->limit(4);
                $query = $this->db->get('orders');
if($query->num_rows() >3){
    return $query->result_array();
} else {

                $this->db->or_like('topic', $srch6);
                $this->db->or_like('instructions', $srch6);
                $this->db->limit(4);
                $query = $this->db->get('orders');

                if($query->num_rows() >3){
                        return $query->result_array();
                    } else {

                $this->db->or_like('topic', $srch7);
                $this->db->or_like('instructions', $srch7);
                $this->db->limit(4);
                $query = $this->db->get('orders');
  return $query->result_array();
                    }

}
 }
                }
                }
                }

      }
    }


            public function vsearch ($search){
 $phrase = $search;
 $search = preg_replace("/[^\w]/", " ", $phrase);
 //$search = trim($search); 

 $total_words = str_word_count($phrase);
 $one = ($total_words*0.8);
 $two = ($total_words*0.6);
 $three = ($total_words*0.5);
 $four = ($total_words*0.4);
 $five = ($total_words*0.2);


$srch1 = implode(' ', array_slice(str_word_count($search, 2), 0, $one));
$srch2 = implode(' ', array_slice(str_word_count($search, 2), 0, $two));
$srch3 = implode(' ', array_slice(str_word_count($search, 2), $five, $total_words));
$srch4 = implode(' ', array_slice(str_word_count($search, 2), 0, $three));
$srch5 = implode(' ', array_slice(str_word_count($search, 2), $three, $total_words));
$srch6 = implode(' ', array_slice(str_word_count($search, 2), 0, $four));
$srch7 = implode(' ', array_slice(str_word_count($search, 2), 0, $five));

                $this->db->or_like('topic', $phrase);
                $this->db->or_like('instructions', $phrase);
                $this->db->limit(20);
                $query = $this->db->get('orders');
            
             if($query->num_rows() >0){
                return $query->result_array();

            } else {

                // start seraching using the first one
                $this->db->or_like('topic', $srch1);
                $this->db->or_like('instructions', $srch1);
                $this->db->limit(20);
                $query = $this->db->get('orders');

                if ($query->num_rows() >0) {
                   return $query->result_array();                  
                } else {
                // start seraching using the second one
                $this->db->or_like('topic', $srch2);
                $this->db->or_like('instructions', $srch2);
                $this->db->limit(20);
                $query = $this->db->get('orders');

                if($query->num_rows() >0){
                
                return $query->result_array(); 

                } else {

                $this->db->or_like('topic', $srch3);
                $this->db->or_like('instructions', $srch3);
                $this->db->limit(20);
                $query = $this->db->get('orders');

                if($query->num_rows() >0){
                    return $query->result_array();
                } else {

                 $this->db->or_like('topic', $srch4);
                $this->db->or_like('instructions', $srch4);
                $this->db->limit(20);
                $query = $this->db->get('orders');
 if($query->num_rows() >0){
return $query->result_array();
 } else {

                $this->db->or_like('topic', $srch5);
                $this->db->or_like('instructions', $srch5);
                $this->db->limit(20);
                $query = $this->db->get('orders');
if($query->num_rows() >0){
    return $query->result_array();
} else {

                $this->db->or_like('topic', $srch6);
                $this->db->or_like('instructions', $srch6);
                $this->db->limit(20);
                $query = $this->db->get('orders');

                if($query->num_rows() >0){
                        return $query->result_array();
                    } else {

                $this->db->or_like('topic', $srch7);
                $this->db->or_like('instructions', $srch7);
                $this->db->limit(20);
                $query = $this->db->get('orders');
  return $query->result_array();
                    }

}
 }
                }
                }
                }

      }
    }



            public function searchperm (){

$str = $this->input->post('search');
$str = trim($str);
$x = $this->powerSet(explode(" ", $str));
                $this->db->or_like('topic', $str);
                $this->db->or_like('instructions', $str);
                $this->db->limit(99);
                $query = $this->db->get('orders');
            
             if($query->row_array() >0){
              
                return $query->result_array();

            } else {

              foreach($x as $r) {
             $explode = implode($r, ' ') . " ";
  // echo $search;

                $match = $this->input->post('search');
                $this->db->like('orderid', $explode);
                $this->db->or_like('topic', $explode);
                $this->db->or_like('instructions', $explode);
  // echo '<br/>';
            }
                $this->db->limit(99);
                $query = $this->db->get('orders');
                
                           return $query->result_array(); 
}
    
    }


                function get_search_answer()
        {


$sword = "11 ppzz";
$split = preg_split("/\s+/s", $sword, -1, PREG_SPLIT_NO_EMPTY);
   // print_r($split);
    //echo count($split);


   require  APPPATH .  str_replace('\\', DIRECTORY_SEPARATOR, 'controllers\Permutation') . '.php';
   $rrr = array('please ', 'come ', 'Tuesday ', 'Morning ');
    $perms = new permutation($rrr);
   // print_r($perms->results);

                $match = $this->input->post('search');
                $match1 = "life";
                $this->db->or_like('topic', $match);
                $this->db->or_like('instructions', $match);
                $query = $this->db->get('orders');
                if($query->row_array() >0){
                return $query->result_array();
            } else {
                $this->db->or_like('topic', $match1);
                $this->db->or_like('instructions', $match);
                $query = $this->db->get('orders');
                return $query->result_array();
            }


        }


        
        public function get_file_materials($orderid = FALSE)
        {

$this->db->order_by("upload_date", "desc");
$this->db->where(array('order_id' =>  $orderid, 'upload_type' =>  'material'));
   $query =   $this->db->get('order_files');  
     return $query->result_array(); 

        }

        
        public function get_file_essay($orderid = FALSE)
        {

            $this->db->order_by("upload_date", "desc");
$this->db->where(array('order_id' =>  $orderid, 'upload_type' =>  'essay'));
$this->db->limit(1);
   $query =   $this->db->get('order_files');  
     return $query->row_array(); 


        }


        
      
        public function get_orders($orderid = FALSE)
        {
                
                if ($orderid === FALSE) {
                        
                        $query = $this->db->get_where('orders');
                        return $query->result_array();
                }
                
                $query = $this->db->get_where('orders', array(
                        'orderid' => $orderid
                ));


            $this->db->set(array('msg_read' => '1'));
            $this->db->where('orderid', $orderid);
            $this->db->where('receiverid', $this->session->userdata('writer_id'));
            $this->db->update('order_messages');


                return $query->row_array();
        }


                
      
        public function get_question($alias = FALSE)
        {
                
                if ($alias === FALSE) {
                        
                        $query = $this->db->get_where('opskill_questions');
                        return $query->result_array();
                }
                
                $query = $this->db->get_where('opskill_questions', array(
                        'alias' => $alias
                ));
                return $query->row_array();
        }
        
        
        
        public function get_orders_alias($alias = FALSE)
        {
                
                if ($alias === FALSE) {
                        
                        $query = $this->db->get_where('orders');
                        return $query->result_array();
                }
                
                $query = $this->db->get_where('orders', array(
                        'alias' => $alias
                ));
                return $query->row_array();
        }
        
        
        public function answer_alias($alias = FALSE)
        {
                
                if ($alias === FALSE) {
                        
                        $query = $this->db->get_where('order_files');
                        return $query->result_array();
                }
                
                $query = $this->db->get_where('order_files', array(
                        'alias' => $alias,
                        'upload_type' => 'essay',
                ));
                return $query->row_array();
        }
        
               
        
        public function answer_orderid($order_id = FALSE)
        {
          $this->db->order_by("upload_date", "desc");
         $query = $this->db->get_where('order_files', array(
                   'order_id' => $order_id,
                   'upload_type' => 'essay',
         ));
         return $query->row_array();
        }
        
        
        public function answer_alias_orderid($alias = FALSE)
        {
                               
                $query = $this->db->get_where('orders', array(
                        'alias' => $alias,
                ));
                return $query->row_array();
        }

        public function get_orders_filealias($alias = FALSE)
        {
                
                if ($alias === FALSE) {
                        
                        $query = $this->db->get_where('orders');
                        return $query->result_array();
                }
                
                $query = $this->db->get_where('orders', array(
                        'alias' => $alias
                ));
                return $query->row_array();
        }
        





        public function my_essays()
        {

$customer = $this->session->userdata('writer_id');
$this->db->order_by("upload_date", "desc");
             $this->db->order_by("upload_date", "desc");
$this->db->where(array('customer' =>  $customer, 'project_type' =>  'essay'));
   $query =   $this->db->get('orders');  
     return $query->result_array(); 

        }
        
        // these are the order made by client and not yet paid for. They cannot be assigned to writers, they are not in open projects, they are not listed till they are paid for. 
        public function client_unpaid()
        {
                $writer_id = $this->session->userdata('writer_id');
     $this->db->where(array('customer' => $writer_id, 'client_paid' => 'unpaid'));
   $query =   $this->db->get('orders');  
     return $query->result_array(); 


        }
        
      
        public function client_paid()
        {
                $writer_id = $this->session->userdata('writer_id');
        $this->db->where(array('customer' => $writer_id, 'client_paid' => 'paid'));
   $query =   $this->db->get('orders');  
     return $query->result_array(); 

        }

    //     //Архив 
    //      public function client_paid()
    //     {
    // $writer_id = $this->session->userdata('writer_id');

    // $this->db->where(array('customer' => $writer_id, 'client_paid' =>'paid'));
    // $query =   $this->db->get('orders');  
    //  return $query->result_array(); 
    //     }


        public function clientmyorders()
        {
           $writer_id = $this->session->userdata('writer_id');
           $this->db->where(array('customer' => $writer_id));
           // $assigned = array('Openproject', 'Archived');
           $query = $this->db->where_in('order_status', 'Openproject'); //clientmyorders
           $this->db->order_by('orderid', 'desc');
           $query =   $this->db->get('orders');  
           return $query->result_array(); 
        } 
        
        public function client_assigned() {
         $writer_id = $this->session->userdata('writer_id');
         // $this->db->where(array('customer' => $writer_id, 'preferred_writer' > 0, 'order_status' => 'Assigned'));
         // $this->db->where('order_status', 'pending');
         $this->db->where("customer='".$writer_id."' AND (order_status='Assigned' OR order_status='Cancelled')  ");
         //(order_status='Assigned' OR order_status='pending')
         $this->db->order_by('orderid', 'desc');
         $query =   $this->db->get('orders');  
         return $query->result_array(); 
        }

        
        public function client_unassigned()
        {
                $writer_id = $this->session->userdata('writer_id');
    $this->db->where(array('customer' => $writer_id, 'preferred_writer' => 0, 'order_status' => 'Openproject'));
    $this->db->order_by('orderid', 'desc');
   $query =   $this->db->get('orders');  
     return $query->result_array(); 


        }

        public function client_pending()
        {
           $writer_id = $this->session->userdata('writer_id');
           $this->db->where(array('customer' => $writer_id, 'order_status' => 'completed'));
           $this->db->order_by('orderid', 'desc');
           $query =   $this->db->get('orders');  
           return $query->result_array(); 
        }



        
        public function client_completed()
        {
            $writer_id = $this->session->userdata('writer_id');
            // $this->db->where(array('customer' => $writer_id, 'order_status' => 'completed'));
            $this->db->where("customer='".$writer_id."' AND (order_status='completed' OR order_status='Archived' OR order_status='onlyAvtorDoplata' OR order_status='pending' )");
            $this->db->order_by('orderid', 'desc');  
            $query =   $this->db->get('orders');
            return $query->result_array(); 
        }
        
        
        public function client_revision()
        {
          $writer_id = $this->session->userdata('writer_id');
          $this->db->order_by('orderid', 'desc');
          $this->db->where(array('customer' => $writer_id, 'order_status' => 'revision'));
          $query =   $this->db->get('orders');  
          return $query->result_array(); 

        }
        

        public function uni_count ($order_status = NULL){
                $writer_id = $this->session->userdata('writer_id');
                $this->db->where('customer', $writer_id);
                $this->db->where('project_type', 'project');
                // $this->db->where('client_paid', 'paid');
               //  $this->db->where('preferred_writer >', 0);
               $this->db->where('order_status', $order_status);
                $this->db->from("orders");
                return $this->db->count_all_results();

        }

        public function pay_count ($pay_status = NULL){
                $writer_id = $this->session->userdata('writer_id');
                $this->db->where('customer', $writer_id);
                $this->db->where('project_type', 'project');
                // $this->db->where('client_paid', 'paid');
               //  $this->db->where('preferred_writer >', 0);
               $this->db->where('order_status', $order_status);
                $this->db->from("orders");
                return $this->db->count_all_results();

        }




        public function client_cancelled()
        {
         $writer_id = $this->session->userdata('writer_id');
        $this->db->where(array('customer' => $writer_id,'order_status' => 'cancelled'));
   $query =   $this->db->get('orders');  
   $this->db->order_by('orderid', 'desc');
     return $query->result_array(); 



        }


        public function count_writerassigned() {
             $writer_id = $this->session->userdata('writer_id');
      $this->db->where(array('preferred_writer' => $writer_id,'order_status' => 'Assigned'));
         return $this->db->count_all_results('orders'); 
        }      


        public function writer_assigned($limit, $start) {
         $writer_id = $this->session->userdata('writer_id');
         $this->db->limit($limit, $start);
         $this->db->order_by("gived_to_writer", "desc");
         $this->db->where("preferred_writer='".$writer_id."' AND order_status='Assigned' AND customer!='".$writer_id."' ");
         $query = $this->db->get('orders');
         // $query = $this->db->get_where('orders', array('preferred_writer' => $writer_id,'order_status' => 'Assigned'));
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }

// --------------

public function ajax_writer_assigned() {
         $writer_id = $this->session->userdata('writer_id');
        $this->db->select(array('orderid', 'date_posted'));
         $this->db->order_by("orderid", "asc");
         $query = $this->db->get_where('orders', array('preferred_writer' => $writer_id,'order_status' => 'Assigned'));

        if ($query->num_rows() > 0) {
            // foreach ($query->result() as $row) {
            //     $data[] = $row;
            // }
           return $query->result_array();
        }
        return false;
   }
// --------------
// график 

  public function writer_grafik() {//$limit, $start
         $writer_id = $this->session->userdata('writer_id');
        // $this->db->limit($limit, $start);
         $this->db->select(array('orderid', 'order_status', 'plan', 'half_work', 'all_work', 'dorabotka', 'yesno'));
         $this->db->order_by("orderid", "desc");
         $this->db->where("order_status!='Archived' AND order_status!='Completed' AND order_status!='pending' AND order_status!='onlyAvtorDoplata'");
         $query = $this->db->get_where('orders', array('preferred_writer' => $writer_id));

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }




   //оцененные заказы
          
public function writer_requests($limit, $start) {
        $writer_id = $this->session->userdata('writer_id');
        // $this->db->limit($limit, $start);
        // $this->db->order_by("orderid", "desc");
        $this->db->where(array('writerid' => $writer_id));
        $query = $this->db->get('project_requests');




        if ($query->num_rows() > 0) {
            // foreach ($query->result() as $row) {
            //     $data[] = $row;
            // }

          $res_arr = array();
          foreach ($query->result_array() as $res) {
              array_push($res_arr, $res['orderid']);
          }

          // echo "<pre>";
          //   print_r($res_arr);
          // echo "</pre>";
          $this->db->limit($limit, $start);
          $this->db->order_by('orderid', 'desc');
          $this->db->where_in('orderid', $res_arr);
          $this->db->where('order_status', 'Openproject');
          $query2 = $this->db->get('orders');
          if($query2->num_rows() > 0){
            return $query2->result_array();            
          }

           return false;
        }
        return false;
   }


       public function count_writerrequests() {
       $writer_id = $this->session->userdata('writer_id');
       $this->db->where(array('writerid' => $writer_id));
         return $this->db->count_all_results('project_requests'); 
        }      



        public function count_writerpending() {
        $writer_id = $this->session->userdata('writer_id');
        $this->db->where(array('preferred_writer' => $writer_id,'order_status' => 'pending'));
         return $this->db->count_all_results('orders'); 
        }      
        

         public function writer_pending($limit, $start) {
         $writer_id = $this->session->userdata('writer_id');
         $this->db->limit($limit, $start);
         $this->db->order_by("orderid", "desc");
         $query = $this->db->get_where('orders', array('preferred_writer' => $writer_id, 'client_paid' =>'paid'));

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }


public function writer_paidord($limit, $start) {
        $writer_id = $this->session->userdata('writer_id');
        $this->db->limit($limit, $start);
         $this->db->order_by("orderid", "desc");

        // $this->db->where("preferred_writer='".$writer_id."' AND (order_status='completed' OR order_status='pending')  AND customer!='".$writer_id."' ");


         $this->db->where("preferred_writer='".$writer_id."' AND (client_paid='paid' OR client_paid='paid_writer') AND order_status='Completed' AND customer!='".$writer_id."' ");

         //(order_status='pendig' OR order_status='onlyAvtorDoplata' OR order_status='Completed') AND
         $query = $this->db->get('orders');

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }
// --------------
public function ajax_writer_paidord() {
        $writer_id = $this->session->userdata('writer_id');
        $this->db->select(array('orderid', 'date_posted'));
         $this->db->order_by("orderid", "desc");
         $query = $this->db->get_where('orders', array('preferred_writer' => $writer_id,'client_paid' =>'paid'));

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }

// ------------   
    public function unpaid_completed($limit, $start) {
     $writer_id = $this->session->userdata('writer_id');
        $this->db->limit($limit, $start);
         $this->db->order_by("orderid", "desc");

         $this->db->where(" preferred_writer='".$writer_id."' AND (order_status='pending' OR order_status='onlyAvtorDoplata' OR order_status='Completed') AND (client_paid!='paid' AND client_paid!='paid_writer') AND customer!='".$writer_id."' ");

         //order_status='completed' OR 
         //AND (client_paid!='paid' AND client_paid!='paid_writer')
         $query = $this->db->get('orders');

         // $query = $this->db->get_where('orders', array('preferred_writer' => $writer_id,'order_status' => 'completed', 'order_status' => 'pending'));

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }



 // public function proforders($limit, $start) {
        //  $writer_id = $this->session->userdata('writer_id');    

        //  $this->db->limit($limit, $start);

        // $subj = $this->db->select('subject')->where('writer_id', $writer_id)->get('writers');
        // if ($subj->num_rows() > 0) {
        //     foreach ($subj->result() as $row) {

        // $subj = explode(', ', $row->subject);
        //     }
           
        // }
       
        //  $this->db->order_by("orderid", "desc");
         
        // $query = $this->db->where_in ('subject', $subj);
        // $query = $this->db->get('orders');


        // if ($query->num_rows() > 0) {
        //     foreach ($query->result() as $row) {
        //         $data[] = $row;
        //     }
        //    return $query->result_array();
        // }
        // return false;
 //  }

   
 public function count_writercompleted() {
 $writer_id = $this->session->userdata('writer_id');
 $this->db->where(array('preferred_writer' => $writer_id,'order_status' => 'completed'));
  return $this->db->count_all_results('orders'); 
        }     
        
public function writer_completed($limit, $start) {
     $writer_id = $this->session->userdata('writer_id');
        $this->db->limit($limit, $start);
         $this->db->order_by("orderid", "desc");
         $query = $this->db->get_where('orders', array('preferred_writer' => $writer_id,'order_status' => 'pending'));

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }
        
  

 public function count_writerrevision() {
    $writer_id = $this->session->userdata('writer_id');
      $this->db->where(array('preferred_writer' => $writer_id,'order_status' => 'revision'));
         return $this->db->count_all_results('orders'); 
        }     
        
    public function writer_revision($limit, $start) {
        $writer_id = $this->session->userdata('writer_id');
        $this->db->limit($limit, $start);
        $this->db->order_by("orderid", "desc");

        $this->db->where("preferred_writer='".$writer_id."' AND order_status='revision' AND customer!='".$writer_id."' ");

        $query = $this->db->get('orders');

        if ($query->num_rows() > 0) {
            // foreach ($query->result() as $row) {
            //     $data[] = $row;
            // }
           return $query->result_array();
        }
        return false;
   }
        
// --------------

    public function ajax_writer_revision() {
      $writer_id = $this->session->userdata('writer_id');
         $this->db->select(array('orderid', 'date_posted'));
         $this->db->order_by("orderid", "asc");
         $query = $this->db->get_where('orders', array('preferred_writer' => $writer_id,'order_status' => 'revision'));

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }
// ---------------
        
 public function count_writerprofile() {
 $writer_id = $this->session->userdata('writer_id');
  $this->db->where(array('preferred_writer' => $writer_id, 'order_status' => 'Openproject'));
  return $this->db->count_all_results('orders'); 
  }     
        

 public function writer_profile($limit, $start) {
      $writer_id = $this->session->userdata('writer_id');

      $this->db->select('orderid');
      $this->db->where('writerid', $writer_id);
      $wr_orders = $this->db->get('project_requests');
      $idsNoOrd = array();
      if ($wr_orders->num_rows() > 0) {
        foreach($wr_orders->result_array() as $ord){
          foreach ($ord as $ord1) {
            array_push($idsNoOrd, $ord1);
          }
      }
      }


        $this->db->limit($limit, $start);
        $subj = $this->db->select('subject')->where('writer_id', $writer_id)->get('writers');
        if ($subj->num_rows() > 0) {
        foreach ($subj->result() as $row) {

        $subj = explode(', ', $row->subject);
            }
           
        }
       
        $this->db->order_by("orderid", "desc");
        $assigned = array('Openproject');
        $this->db->where_in ('order_status', $assigned);
        $this->db->where_in ('subject', $subj);
        $this->db->where("customer!='".$writer_id."'");
        // $this->db->where_in ('customer!=', $writer_id);
        if(!empty($idsNoOrd)){
          $this->db->where_not_in('orderid', $idsNoOrd);
        }
        $query = $this->db->get('orders');


        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }


// ------
 public function ajax_writer_profile() {
        $writer_id = $this->session->userdata('writer_id');    
        $subj = $this->db->select('subject')->where('writer_id', $writer_id)->get('writers');
        if ($subj->num_rows() > 0) {
        foreach ($subj->result() as $row) {

        $subj = explode(', ', $row->subject);
            }
           
        }
       
         $this->db->select(array('orderid', 'date_posted'));
         $this->db->order_by("orderid", "asc");
         $assigned = array('Openproject');
          $query = $this->db->where_in ('order_status', $assigned);
        $query = $this->db->where_in ('subject', $subj);
        $query = $this->db->get('orders');


        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }
    public function ajax_user_oplata() {
        $writer_id = $this->session->userdata('writer_id');    
        // $subj = $this->db->select('subject')->where('writer_id', $writer_id)->get('writers');
        // if ($subj->num_rows() > 0) {
        // foreach ($subj->result() as $row) {

        // $subj = explode(', ', $row->subject);
        //     }
           
        // }
       
          $this->db->select(array('orderid', 'date_posted'));
          $this->db->order_by("orderid", "asc");
          // $assigned = array('Openproject');
          $query = $this->db->where_not_in ('oplata', '');
          $query = $this->db->where_in ('customer', $writer_id);
          $query = $this->db->get('orders');


        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }
// ----------
    public function ajax_all_neworder() {
       // $qq = "user_level='writer' OR user_level='client'";
        $this->db->select('orderid');
        $this->db->from('orders');
        $this->db->where('order_status', 'Openproject');
        $this->db->order_by("orderid", "asc");
        $query = $this->db->get(); 

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }

        return false;
   }
// ----------

   public function orders_table() {
  
       
        $this->db->order_by("orderid", "desc");
        $status = array('Completed', 'Cancelled', 'Revision', 'Openproject', 'Archived', 'pending', 'Assigned');
        $query = $this->db->where_in ('order_status', $status);
        $query = $this->db->get('orders');


        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }

      public function orders_table_custom_req() {
  
        $this->db->select(array('orderid', 'order_status', 'plan', 'half_work', 'all_work', 'dorabotka', 'yesno'));
        $this->db->order_by('orderid', 'desc');
        $status = array('Cancelled', 'Revision', 'Openproject', 'Assigned');
        if($this->session->userdata('writer_id') != '2562'){
          $this->db->where('manager_id', $this->session->userdata('writer_id'));
        }
        $this->db->where_in('order_status', $status);
        $query = $this->db->get('orders');


        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }
        

        public function writer_balance()
        {

      $writer_id = $this->session->userdata('writer_id');
  $this->db->where(array('preferred_writer' => $writer_id,'order_status' => 'completed', 'writerpaid' => 'unpaid'));
   $query =   $this->db->get('orders');  
     return $query->result_array(); 

                
                if ($query->num_rows() > 0) {
                        $results = $query->result();
                }
                return $results;
                
                
                
        }
        
        
        public function unpaid_sum()
        {

                $writer_id = $this->session->userdata('writer_id');
                $query     = $this->db->select_sum('writerpay', 'Amount');
                $this->db->where('preferred_writer', $writer_id); // this check if the order is assigend to this user
                $this->db->where('order_status', 'completed'); // checks if swriter_idaus is completed
                $this->db->where('writerpaid', 'unpaid'); // checks if swriter_idaus is cancelled
                $query  = $this->db->get('orders');
                $result = $query->result();
                $amount = $result[0]->Amount;
                return $amount;
                
        }


        public function get_skills($subject = FALSE)
        {
                if ($subject === FALSE) {
                $query = $this->db->select('subject')->distinct()->get('writers');
                return $query->result_array();
                }
                
                $query = $this->db->get_where('writers', array('subject' => $subject));

            return $query->row_array();
        }
        
        
        
 
       // public function proforders($limit, $start) {
        //  $writer_id = $this->session->userdata('writer_id');    

        //  $this->db->limit($limit, $start);

        // $subj = $this->db->select('subject')->where('writer_id', $writer_id)->get('writers');
        // if ($subj->num_rows() > 0) {
        //     foreach ($subj->result() as $row) {

        // $subj = explode(', ', $row->subject);
        //     }
           
        // }
       
        //  $this->db->order_by("orderid", "desc");
         
        // $query = $this->db->where_in ('subject', $subj);
        // $query = $this->db->get('orders');


        // if ($query->num_rows() > 0) {
        //     foreach ($query->result() as $row) {
        //         $data[] = $row;
        //     }
        //    return $query->result_array();
        // }
        // return false;
 //  }

        public function openorders($limit, $start) {
          $writer_id = $this->session->userdata('writer_id');
        $this->db->limit($limit, $start);
         $this->db->order_by("orderid", "asc");
         $query = $this->db->get_where('orders', array('preferred_writer' => 0));
         // $this->db->where("preferred_writer='0' AND customer!='".$writer_id."' ");
         // $query = $this->db->get('orders');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
        }

        // public function notall_openorders($limit, $start) {
                
        // $this->db->limit($limit, $start);
        //  $this->db->order_by("orderid", "desc");
         //   $assigend = 'Assigned';
        //  $query = $this->db->where_not_in('orders', $assigned);

        // if ($query->num_rows() > 0) {
        //     foreach ($query->result() as $row) {
        //         $data[] = $row;
        //     }
        //    return $query->result_array();
        // }
        // return false;
        // }
          public function all_openorders($start) {
            $writer_id = $this->session->userdata('writer_id');
            $this->db->select('orderid');
            $this->db->where('writerid', $writer_id);
            // $this->db->where("writerid='".$writer_id."' AND customer!='".$writer_id."'");
            $wr_orders = $this->db->get('project_requests');
            $idsNoOrd = array();
            if ($wr_orders->num_rows() > 0) {
              foreach($wr_orders->result_array() as $ord){
                foreach ($ord as $ord1) {
                  array_push($idsNoOrd, $ord1);
                }
              }
            }
 

          $this->db->select(array('orderid', 'order_status', 'topic', 'subject', 'referencing_style', 'words'));
          $this->db->order_by("orderid", "desc");
          // $this->db->where('order_status', 'Openproject');
          $this->db->where("order_status='Openproject' AND customer!='".$writer_id."'");
          if(!empty($idsNoOrd)){
            $this->db->where_not_in('orderid', $idsNoOrd);
          }
          $query = $this->db->get('orders');

          if ($query->num_rows() > 0) {
              foreach ($query->result() as $row) {
                  $data[] = $row;
              }
             // echo "<pre>";
             // print_r($query->result_array());
             // echo "</pre>";

             return $query->result_array();

          }
          return false;
        }
          


        
        public function lastten()
        {

       $this->db->order_by("orderid", "desc");
       $this->db->limit(5);
       $this->db->where(array());
   $query =   $this->db->get('orders');  
     return $query->result_array(); 

        }
        
        public function sumorders()
        {
                
                $writer_id = $this->session->userdata('writer_id');
                $this->db->select_sum('amount');
                $this->db->from('orders');
                $this->db->where('preferred_writer', $writer_id);
                 $this->db->where('project_type', 'project');
                $this->db->where('writerpaid', 'unpaid');
                $getData = $this->db->get('');
                if ($getData->num_rows() > 0) {
                        return $getData->result_array();
                } else {
                        return null;
                }
                
        }
        
       
        public function create_order($data)
        {
                $this->db->insert('orders', $data);

                //
                $this->db->select(array('orderid'));
                $numOrd = $this->db->get('orders'); 
                $numOrdArr = array();
                foreach ($numOrd->result_array() as $row){
                    array_push($numOrdArr, $row);
                 }

                 $oi = $numOrdArr[count($numOrdArr)-1]['orderid'];

                // $data['subject'];
                $this->db->select('writer_id');
                $this->db->from('writers');
                $this->db->where('user_level', 'writer');
                $this->db->like('subject', $data['subject']);
                $wr_ids = $this->db->get();

                 $writer_ids = array();
                 foreach($wr_ids->result_array() as $id){
                    foreach ($id as $id2) {
                        array_push($writer_ids, $id2);
                    }
                 }

                $this->db->set('prof_ord_notices', "CONCAT(prof_ord_notices,', ','".$oi."')", FALSE);
                $this->db->where_in('writer_id', $writer_ids);
                $this->db->update('writers');


                $this->db->select('writer_id');
                $this->db->from('writers');
                $this->db->where('writer_level', 'admin');
                $mngr_ids = $this->db->get();
                
                $manager_ids = array();
                 foreach($mngr_ids->result_array() as $id){
                    foreach ($id as $id2) {
                        array_push($manager_ids, $id2);
                    }
                 }                
 
                $this->db->set('mngr_neworder', "CONCAT(mngr_neworder,', ','".$oi."')", FALSE);
                $this->db->where_in('writer_id', $manager_ids);
                $this->db->update('writers');

        }

        public function mngrNewUserNotice(){
          $numOrd = $this->db->select('writer_id');
          $numOrd = $this->db->get('writers'); 
          $numOrdArr = array();
          foreach ($numOrd->result_array() as $row){
            array_push($numOrdArr, $row);
          }

          $oi = $numOrdArr[count($numOrdArr)-1]['writer_id'];

          $this->db->select('writer_id');
          $this->db->from('writers');
          $this->db->where('writer_level', 'admin');
          $mngr_ids = $this->db->get();

          $manager_ids = array();
             foreach($mngr_ids->result_array() as $id){
                foreach ($id as $id2) {
                    array_push($manager_ids, $id2);
                }
             }                

            $this->db->set('mngr_newuser', "CONCAT(mngr_newuser,', ','".$oi."')", FALSE);
            $this->db->where_in('writer_id', $manager_ids);
            $this->db->update('writers');
        }

      public function mngrNewNotice($colName, $oId, $wait_accept = FALSE){
          if($wait_accept){
            $this->db->select('manager_id');
            $this->db->where('orderid', $oId);
            $ord_mIds_query = $this->db->get('orders');
            $temp_ord_mid_arr = $ord_mIds_query->row_array();
            // print_r($temp_ord_mid_arr) ;
            $ord_mIds = array();
            if($ord_mIds_query->num_rows() > 0){
              foreach ($temp_ord_mid_arr as $mid_ord) {
                array_push($ord_mIds, $mid_ord);
              }
              array_push($ord_mIds, '2562');
            }


          }

          // $numOrd = $this->db->select('orderid');
          // $numOrd = $this->db->get('orders'); 
          // $numOrdArr = array();
          // foreach ($numOrd->result_array() as $row){
          //   array_push($numOrdArr, $row);
          // }

          $oi = $oId;

        if(!$wait_accept){
          $this->db->select('writer_id');
          $this->db->from('writers');
          $this->db->where('writer_level', 'admin');
          $mngr_ids = $this->db->get();
        // } else {
        //   $mngr_ids = $ord_mIds;
        // }

          $manager_ids = array();
             foreach($mngr_ids->result_array() as $id){
                foreach ($id as $id2) {
                    array_push($manager_ids, $id2);
                }
             }                
          } else {
            $manager_ids = $ord_mIds;
          }

            $this->db->set($colName, "CONCAT(".$colName.",', ','".$oi."')", FALSE);
            $this->db->where_in('writer_id', $manager_ids);
            $this->db->update('writers');
        
        }

        public function gwe($writerid){
          $this->db->select('email');
          $this->db->where('writer_id', $writerid);
          $query = $this->db->get('writers');

            if($query->num_rows() > 0){
              return $query->result_array();
            } 

            return false;

        }


        
        public function get_universities($abbname = FALSE)
        {
                
                if ($abbname === FALSE) {
                        $query = $this->db->get('universities');
                        return $query->result_array();
                }
                
                $query = $this->db->get_where('universities', array(
                        'abbname' => $abbname
                ));
                return $query->row_array();
                
        }
        
        public function get_country($countryname = FALSE)
        {
                
                if ($countryname === FALSE) {
                        $query = $this->db->get('country');
                        return $query->result_array();
                }
                
                $query = $this->db->get_where('country', array(
                        'name' => $countryname
                ));
                return $query->row_array();
                
        }
        
        
        public function get_urgency()
        {
                
                $query = $this->db->get('urgency');
                return $query->result_array();
        }
        
        public function get_subject($subject = FALSE)
        {
                
                if ($subject === FALSE) {
                        $query = $this->db->get('subject');
                        return $query->result_array();
                }
                
                $query = $this->db->get_where('subject', array(
                        'subject' => $subject
                ));
                return $query->row_array();
                
        }

        
 public function get_all_subject($subject = FALSE)
        {
                
                if ($subject === FALSE) {
                        $query = $this->db->get('subject');
                        return $query->result_array();
                }
                
                $query = $this->db->get_where('subject', array(
                        'subject' => $subject
                ));
                return $query->row_array();
                
        }
//

 public function order_requests($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->distinct('orderid');
        $this->db->group_by('orderid');
        $this->db->where(array());
        $query =   $this->db->get('project_requests'); 

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;

    }



        
        public function upload_file($data, $writer_id)
        {
                //students is table name here               
                $this->db->where('writer_id', $writer_id);
                $this->db->update('writers', $data);
        }
        
        public function order_files($data)
        {
                $this->db->select('manager_id');
                $this->db->where('orderid', $data['order_id']);
                $query = $this->db->get('orders');
                if($query->num_rows() > 0){
                  $query = $query->row_array();
                  if(!empty($query['manager_id'])){
                  $this->db->set('mngr_new_order_files', "CONCAT(mngr_new_order_files,', ','".$data['order_id']."')", FALSE);
                  $this->db->where_in('writer_id', $query['manager_id']);
                  $this->db->update('writers');
                } else {
                  $this->mngrNewNotice('mngr_new_order_files', $data['order_id']);
                }
              }
                //students is table name here
                
                $this->db->insert('order_files', $data);
        }

        public function order_file_wr_notice($data){
          $this->db->select('preferred_writer');
          $this->db->where('orderid', $data['wr_files_notice']);
          $p_writer = $this->db->get('orders')->result_array()[0]['preferred_writer'];

            if($p_writer === '0'){
              unset($p_writer);
              $this->db->select('writerid');
              $this->db->where('orderid', $data['wr_files_notice']);
              $bid_writers = $this->db->get('project_requests')->result_array();

              $writers_ids = array();

              foreach ($bid_writers as $bw) {array_push($writers_ids, $bw['writerid']);}

              unset($bid_writers);

              if(!empty($writers_ids)){
                $this->db->set('wr_files_notice', "CONCAT(wr_files_notice,', ','".$data['wr_files_notice']."')", FALSE);
                $this->db->where_in('writer_id', $writers_ids);
                $this->db->update('writers');
              } else {return false;}

            } else {
              $this->db->set('wr_files_notice', "CONCAT(wr_files_notice,', ','".$data['wr_files_notice']."')", FALSE);
              $this->db->where('writer_id', $p_writer);
              $this->db->update('writers');
            }
            return false;
        }


// -----------
        public function ajax_order_files()
        {
            $writer_id = $this->session->userdata('writer_id');
            $this->db->select('orderid');
            $this->db->from('orders');
            $this->db->where('customer', $writer_id);
            $this->db->order_by('orderid', 'asc');

             $orderids = $this->db->get();

             if ($orderids->num_rows() > 0) {
                foreach ($orderids->result() as $row) {
                  $orderids = explode(', ', $row->orderid);
                }
                   
              } else {return false;}
               
              $this->db->select(array('order_id', 'upload_type'));
              $this->db->order_by("order_id", "asc");
              $this->db->where_in ('order_id', $orderids);
                // $this->db->where_not_in('sum', $sum);
              $query = $this->db->get('order_files');
              if ($query->num_rows() > 0) {
                  // foreach ($query->result() as $row) {
                  //     $data[] = $row;
                  // }
                 return $query->result_array();
              }
              return false;
        }
// =====
public function ajax_order_files_manager()
        {
            // $this->db->select('orderid');
            // $this->db->from('orders');
            // $this->db->order_by('orderid', 'asc');
            //  $orderids = $this->db->get();
            //  // print_r($orderids->result_array());

            //  if ($orderids->num_rows() > 0) {
            //     foreach ($orderids->result() as $row) {
            //       $orderids = explode(', ', $row->orderid);
            //     }
                   
            //   } else {return false;}
               
              $this->db->select(array('order_id'));
              // $this->db->order_by('order_id', 'asc');
              $query = $this->db->get('order_files');
              if ($query->num_rows() > 0) {

                 $query = $query->result_array();
                 $queryTemp = array();
                 foreach ($query as $ordId) {
                    foreach ($ordId as $ordIdNext) {
                      array_push($queryTemp, $ordIdNext);
                   } 
                 }
                 // print_r($queryTemp);
                  $this->db->select(array('orderid'));
                  $this->db->where_in('orderid', $queryTemp);
                   
                  if($this->session->userdata('admin_level') != 'super'){
                    $this->db->where('manager_id', $this->session->userdata('writer_id'));
                  }

                  $newFileMans = $this->db->get('orders'); 
                  // print_r($newFileMans->result_array());
                  $newFileMansTemp = array();
                  foreach ($newFileMans->result_array() as $ordIdN) {
                      foreach ($ordIdN as $ordIdNextN) {
                        array_push($newFileMansTemp, $ordIdNextN);
                     } 
                   }
                   // print_r($newFileMansTemp);
                  $this->db->select(array('order_id', 'upload_type'));
                  $this->db->where_in('order_id', $newFileMansTemp);
                  // $this->db->distinct();
                  $newMesMansTemp = $this->db->get('order_files');
                  // print_r($newMesMansTemp->result_array());
                  return $newMesMansTemp->result_array();
              } else {
              return false;
            }
        }


// -----------
        
        public function max_orderid()
        {
                $this->db->select_max('orderid');
                $query = $this->db->get('orders');
                return $query->row_array();
        }
                      
        public function max_orderid_essay()
        {
                $this->db->select_max('orderid');
                $query = $this->db->get('orders');
                return $query->row_array();
        }
                
        public function latest_answer($alias = FALSE)
        {

     $this->db->where(array('alias' => $alias));
   $query =   $this->db->get('order_files');  
     return $query->row_array(); 

        }            

        public function get_ordeid_viaalias($alias = FALSE)
        {

                 $this->db->where(array('alias' => $alias));
   $query =   $this->db->get('orders');  
     return $query->row_array(); 

        }        
        

       public function yget_orderfiles($alias = FALSE)
        {

    $this->db->where(array('alias' => $alias));
   $query =   $this->db->get('order_files');  
     return $query->result_array(); 
        }
       
       public function count_completed($alias = FALSE)
        {
                $this->db->where(array('alias' => $alias));
   $query =   $this->db->get('orders');  
     return $query->result_array(); 

        }

        public function record_count() {
        return $this->db->count_all("orders");
        }        



        public function fetch_orders($limit, $start) {
                
        $this->db->limit($limit, $start);
         $this->db->order_by("orderid", "desc");
                        $query = $this->db->get_where('orders', array(
                        'project_type' => 'essay',

                ));

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }
        public function fetch_latest_orders($limit, $start) {
                
        $this->db->limit($limit, $start);
         $this->db->order_by("orderid", "desc");
                        $query = $this->db->get_where('orders', array());

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }


        public function fetch_myorders($limit, $start) {
        $writer_id = $this->session->userdata('writer_id');
        $this->db->limit($limit, $start);
                        $query = $this->db->get_where('orders', array(
                        'project_type' => 'essay',
                        'customer' => $writer_id
                ));

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }


        public function msy_essays()
        {
                
                $customer = $this->session->userdata('writer_id');
 $this->db->order_by("date_posted", "desc");
                $this->db->where(array('customer' => $customer, 'project_type' => 'essay'));
   $query =   $this->db->get('orders');  
     return $query->result_array(); 

        }
        
        public function fetch_myessays($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("orders");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
           return $query->result_array();
        }
        return false;
   }

// Дедлайны
           public function orders_full_requests()
            {

                 $clientid = $this->session->userdata('writer_id');              
                $this->db->distinct();
                $this->db->group_by('orderid');
                $this->db->where(array('clientid' => $clientid));
                $query =   $this->db->get('orders');  
                return $query->result_array(); 
              }
                
// Дедлайны          

        public function mypending_requests()
            {

                 $clientid = $this->session->userdata('writer_id');              
                $this->db->distinct();
                $this->db->group_by('orderid');
$this->db->where(array('clientid' => $clientid));
   $query =   $this->db->get('project_requests');  
     return $query->result_array(); 
                
            }  


    public function upsells()
    {

   $this->db->where(array('upsell_activated' => 1));
   $query =   $this->db->get('ops_upsells');  
     return $query->result_array(); 

    }

    public function ops_coupon()
    {
        $this->db->select("*");
        $this->db->from("ops_coupon");
        $query = $this->db->get();
        return $query->result_array();
    }


//aucyion

    public function auct($orderid = FALSE)
        {
               $this->db->select("*");
                $this->db->from("project_requests");
                $this->db->where('orderid', $orderid);
                $this->db->order_by("date", "desc");

                 $query = $this->db->get();
                return $query->result_array();
        }

public function ajax_auct($writerid = FALSE, $sum = FALSE)
        {
          if ( FALSE != $sum ) {
            $this->db->select("orderid");
            $this->db->from("project_requests");
            $this->db->where('writerid', $writerid);
            $this->db->order_by("date", "asc");

             $orderids = $this->db->get();

             if ($orderids->num_rows() > 0) {
                foreach ($orderids->result() as $row) {

                $orderids = explode(', ', $row->orderid);
                    }
                   
                } else {return false;}
               
                $this->db->select(array('orderid', 'sum'));
                $this->db->order_by("orderid", "asc");
                 // $assigned = array('Openproject');
                 //  $query = $this->db->where_in ('order_status', $assigned);
                // $prices = array('12', '123', '24');
                $this->db->where_in ('orderid', $orderids);
                $this->db->where_not_in('sum', $sum);
                $query = $this->db->get('project_requests');


                if ($query->num_rows() > 0) {
                    foreach ($query->result() as $row) {
                        $data[] = $row;
                    }
                   return $query->result_array();
                }
                return false;
          } else {
            $this->db->select("orderid");
            $this->db->from("project_requests");
            $this->db->where('writerid', $writerid);
            $this->db->order_by("date", "asc");

             $orderids = $this->db->get();

             if ($orderids->num_rows() > 0) {
                foreach ($orderids->result() as $row) {

                  $orderids = explode(', ', $row->orderid);
                 }
                   
                } else {return false;}
               
                 $this->db->select(array('orderid', 'sum'));
                 $this->db->order_by("orderid", "asc");
                 // $assigned = array('Openproject');
                 //  $query = $this->db->where_in ('order_status', $assigned);
                // $prices = array('12', '123', '24');
                 // $orderids = '12';
                $this->db->where_in ('orderid', $orderids);
                //$this->db->where_not_in('sum', $prices);
                $query = $this->db->get('project_requests');


                if ($query->num_rows() > 0) {
                    foreach ($query->result() as $row) {
                        $data[] = $row;
                    }
                   return $query->result_array();
                }
                return array();
          }
        }






public function ajax_auct_manager($sum = FALSE)
        {
          if ( FALSE != $sum ) {
            $this->db->select("orderid");
            $this->db->from("project_requests");
            $this->db->order_by("date", "asc");

             $orderids = $this->db->get();

             if ($orderids->num_rows() > 0) {
                foreach ($orderids->result() as $row) {

                $orderids = explode(', ', $row->orderid);
                    }
                   
                } else {return false;}
               
                $this->db->select(array('orderid', 'sum'));
                $this->db->order_by("orderid", "asc");
                $this->db->where_not_in('sum', $sum);
                $query = $this->db->get('project_requests');


                if ($query->num_rows() > 0) {
                    foreach ($query->result() as $row) {
                        $data[] = $row;
                    }
                   return $query->result_array();
                }
                return false;
          } else {
            $this->db->select("orderid");
            $this->db->from("project_requests");
            $this->db->order_by("date", "asc");

             $orderids = $this->db->get();

             if ($orderids->num_rows() > 0) {
                foreach ($orderids->result() as $row) {

                  $orderids = explode(', ', $row->orderid);
                 }
                   
                } else {return false;}
               
                 $this->db->select(array('orderid', 'sum'));
                 $this->db->order_by("orderid", "asc");
                $query = $this->db->get('project_requests');


                if ($query->num_rows() > 0) {
                    foreach ($query->result() as $row) {
                        $data[] = $row;
                    }
                   return $query->result_array();
                }
                return array();
          }
        }



        public function del_prof_ord($order_id)
        {
                $this->db->select('prof_ord_notices');
                $this->db->from('writers');
                $this->db->where_in('writer_id', $this->session->userdata('writer_id'));
                $q = $this->db->get();

                $prof_order = array();

                foreach ($q->result_array() as $q1) {
                  foreach ($q1 as $q2) {
                      array_push($prof_order, $q2);
                  }
                }

              if(!empty($prof_order[0])){
                  $prof_order = explode (", ", substr ($prof_order[0], 2));
              } else {unset($prof_order);}
              $pon = array();
              foreach ($prof_order as $ponOld) {
                if($ponOld != $order_id){
                  array_push($pon, $ponOld);
                }
              }
                   $pon = ', ' . implode(', ', $pon);
                if($pon === ', '){
                    $this->db->set('prof_ord_notices', '');
                    $this->db->where('writer_id', $this->session->userdata('writer_id'));
                    $this->db->update('writers');
                } else {
                  $this->db->set('prof_ord_notices', $pon);
                  $this->db->where('writer_id', $this->session->userdata('writer_id'));
                  $this->db->update('writers');
                }
        } 



        public function del_wr_files_notice($order_id)
        {
                $this->db->select('wr_files_notice');
                $this->db->from('writers');
                $this->db->where_in('writer_id', $this->session->userdata('writer_id'));
                $q = $this->db->get();

                $prof_order = array();

                foreach ($q->result_array() as $q1) {
                  foreach ($q1 as $q2) {
                      array_push($prof_order, $q2);
                  }
                }

              if(!empty($prof_order[0])){
                  $prof_order = explode (", ", substr ($prof_order[0], 2));
              } else {unset($prof_order);}
              $pon = array();
              foreach ($prof_order as $ponOld) {
                if($ponOld != $order_id){
                  array_push($pon, $ponOld);
                }
              }
                   $pon = ', ' . implode(', ', $pon);
                if($pon === ', '){
                    $this->db->set('wr_files_notice', '');
                    $this->db->where('writer_id', $this->session->userdata('writer_id'));
                    $this->db->update('writers');
                } else {
                  $this->db->set('wr_files_notice', $pon);
                  $this->db->where('writer_id', $this->session->userdata('writer_id'));
                  $this->db->update('writers');
                }
        } 



        public function del_bid_ord($order_id)
        {
                $this->db->select('oth_bids_notice');
                $this->db->from('writers');
                $this->db->where_in('writer_id', $this->session->userdata('writer_id'));
                $q = $this->db->get();
                // return $q->result_array();
                $bid_order = array();

                foreach ($q->result_array() as $q1) {
                  foreach ($q1 as $q2) {
                      array_push($bid_order, $q2);
                  }
                }

                // return $bid_order;

              if(!empty($bid_order[0])){
                  $bid_order = explode (", ", substr ($bid_order[0], 2));
              } else {unset($bid_order);}
              $pon = array();
              foreach ($bid_order as $ponOld) {
                if($ponOld != $order_id){
                  array_push($pon, $ponOld);
                }
              }

              
                   $pon = ', ' . implode(', ', $pon);
              // return $pon;
                   
                if($pon === ', '){
                    $this->db->set('oth_bids_notice', '');
                    $this->db->where('writer_id', $this->session->userdata('writer_id'));
                    $this->db->update('writers');
                } else {
                  $this->db->set('oth_bids_notice', $pon);
                  $this->db->where('writer_id', $this->session->userdata('writer_id'));
                  $this->db->update('writers');
                }
        } 
//////////

      public function del_writer_new_message($orderid)
      {
        $this->db->set('viewed_writer', 'true');
        // $this->db->where('receiverid', $this->session->userdata('writer_id'));
        $this->db->where('orderid', $orderid);
        $this->db->update('order_messages');
      }


      public function del_client_new_message($orderid)
      {
        $this->db->set('viewed_client', 'true');
        // $this->db->where('receiverid', $this->session->userdata('writer_id'));
        $this->db->where('orderid', $orderid);
        $this->db->update('order_messages');
      }


      public function del_client_file_message($orderid)
      {
        $this->db->set('viewed_client', 'true');
        // $this->db->where('receiverid', $this->session->userdata('writer_id'));
        $this->db->where('order_id', $orderid);
        $this->db->update('order_files');
      }


      public function del_viev_rev_ord_massage($orderid)
      {
        $this->db->set('wr_view_rev', 'true');
        $this->db->where('orderid', $orderid);
        $this->db->where_in('preferred_writer', $this->session->userdata('writer_id'));
        $this->db->update('orders');
      }
      public function del_viev_todo_ord_massage($orderid)
      {
        $this->db->set('view_todo_ord', 'true');
        $this->db->where('orderid', $orderid);
        $this->db->where_in('preferred_writer', $this->session->userdata('writer_id'));
        $this->db->update('orders');
      }
      public function del_viev_plan_massage($orderid)
      {
        $this->db->set('wr_view_plan', 'true');
        $this->db->where('orderid', $orderid);
        $this->db->where_in('preferred_writer', $this->session->userdata('writer_id'));
        $this->db->update('orders');
      }

      public function del_writer_paid_mes($orderid)
      {
        $this->db->set('paid_writer_mes', 'true');
        $this->db->where('orderid', $orderid);
        $this->db->where_in('preferred_writer', $this->session->userdata('writer_id'));
        $this->db->update('orders');
      }
      public function del_writer_fine_mes($orderid)
      {
        $this->db->set('fine_wr_message', 'true');
        $this->db->where('orderid', $orderid);
        $this->db->where_in('preferred_writer', $this->session->userdata('writer_id'));
        $this->db->update('orders');
      }
      // public function del_writer_file_mes($orderid)
      // {
      //   $this->db->set('answer_content', 'true');
      //   $this->db->where('order_id', $orderid);
      //   // $this->db->where_in('preferred_writer', $this->session->userdata('writer_id'));
      //   $this->db->update('order_files');
      // }


//

      public function setPayment($data){
        
        $this->db->select('id');
        $this->db->where('order_id', $data['order_id']);
        $query = $this->db->get('payments');
        if($query->num_rows() > 0){
          $this->db->set($data);
          $this->db->where('order_id', $data['order_id']);
          $this->db->update('payments');
          return false;
        } else {
          $this->db->set($data);
          $this->db->insert('payments');
        }

      }
// public function testData($data){
//   // $this->db->set('id', $data);
//   $a = array('sum' => $data);
//   $this->db->insert('payments', $a);

// }
public function paymentSuccess($id_hash = FALSE){

  if(!empty($id_hash)){
    $this->db->select(array('user_id', 'sum_part', 'order_id', 'email'));
    $this->db->from('payments');
    $this->db->where("encoded_id='".$id_hash."' AND user_id='".$this->session->userdata('writer_id')."' ");
    $this->db->join('writers', 'writers.writer_id = payments.user_id');
    $query = $this->db->get();

    if($query->num_rows()>0){
      foreach ($query->result_array() as $ord_pay) {
        if($ord_pay['sum_part'] === 'full' || $ord_pay['sum_part'] === 'rest'){
          $this->db->set(array('client_paid' => 'paid_client'));
        } elseif($ord_pay['sum_part'] === 'doplata'){
          $this->db->set(array('doplata_status' => 'true'));
        } elseif($ord_pay['sum_part'] === 'half') {
          $this->db->set(array('client_paid' => 'half'));
        }
        $this->db->where('orderid', $ord_pay['order_id']);
        $this->db->update('orders');

        $del = $this->db->where('order_id', $ord_pay['order_id']);
        $del = $this->db->delete('payments');

      }
      return $query->result_array();
    }
    return false;
  }
  return false;

}



}

