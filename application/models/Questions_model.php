<?php
class Questions_model extends CI_Model
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


        public function get_question($alias = FALSE)
        {
                
                if ($alias === FALSE) {
                        
                        $query = $this->db->get_where('opskill_questions');
                        return $query->result_array();
                }
                $query = $this->db->get_where('opskill_questions', array('alias' => $alias));
                $this->db->limit(1);
                if ($query->num_rows() > 0){
                   return $query->row_array();
                } else {
                  $query = $this->db->get_where('opskill_questions1', array('alias' => $alias));
                  $this->db->limit(1);
                  if ($query->num_rows() > 0){
                    return $query->row_array();
                  } else {
                    $query = $this->db->get_where('opskill_questions2', array('alias' => $alias));
                    $this->db->limit(1);
                    if ($query->num_rows() > 0){
                      return $query->row_array();
                    } else {
                      $query = $this->db->get_where('opskill_questions3', array('alias' => $alias));
                      $this->db->limit(1);
                      if ($query->num_rows() > 0){
                        return $query->row_array();
                      }else {
                      $query = $this->db->get_where('opskill_questions4', array('alias' => $alias));
                      $this->db->limit(1);
                        if ($query->num_rows() > 0){
                          return $query->row_array();
                        } else {
$query = $this->db->get_where('opskill_questions5', array('alias' => $alias));
$this->db->limit(1);
if ($query->num_rows() > 0){
  return $query->row_array(); 
} else {
  $query = $this->db->get_where('opskill_questions6', array('alias' => $alias));
  $this->db->limit(1);
  if ($query->num_rows() > 0){
    return $query->row_array();
  } else {
    $query = $this->db->get_where('opskill_questions7', array('alias' => $alias));
    $this->db->limit(1);
    if ($query->num_rows() > 0){
      return $query->row_array();
    } else {
      $query = $this->db->get_where('opskill_questions8', array('alias' => $alias));
      $this->db->limit(1);
    if ($query->num_rows() > 0){
       return $query->row_array();
    } else {
      $query = $this->db->get_where('opskill_questions9', array('alias' => $alias));
      $this->db->limit(1);
    if ($query->num_rows() > 0){
      return $query->row_array();
    }
    }
    }
  }
}
                        }
                      }
                    }
                  }


                }

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


      
        public function get_files($orderid = FALSE)
        {
                $this->db->select("*");
                $this->db->from("order_files");
                $this->db->where('order_id', $orderid);
                $this->db->order_by("upload_date", "desc");
                $query = $this->db->get();
                return $query->result_array();
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
        
        
        

}