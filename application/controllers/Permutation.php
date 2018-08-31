<?php
class Permutation extends CI_Controller {
        public $permutations = array();
    function __construct(array $arr) 
    { $this->showPerms($this->permute($arr)); }
    


    private function showPerms($a,$i='') {
        if (is_array($a))
            foreach($a as $k => $v) 
                $this->showPerms($v,$i.$k);
        else 
            $this->results[] = $i.$a;
    }
    


    private function permute(array $arr) {
        $out = array();
        if (count($arr) > 1) 
            foreach($arr as $r => $c) {
                $n = $arr;
                unset($n[$r]);
                $out[$c] = $this->permute($n);
            }
        else
            return array_shift($arr);
        return $out;
    } 

}

$sword = "Jesus is comin soon";
$split = preg_split("/\s+/s", $sword, -1, PREG_SPLIT_NO_EMPTY);
   $rrr = array('please ', 'come ', 'Tuesday ', 'Morning ');
    $perms = new permutation($split);
   print_r($perms->results);
   // echo $perms->results[1];

