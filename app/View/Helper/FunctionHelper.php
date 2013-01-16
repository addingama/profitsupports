<?php
	App::uses('AppHelper', 'View/Helper');
  
  class FunctionHelper extends Helper {

   function checkColor($data = null, $model = null, $field = null){
		if(substr($data[$model]['created'], 0, 10) == date('Y-m-d') && $data[$model][$field] == '0'){return 'blue';}
		elseif($data[$model][$field] == '0'){ return 'red';}
		elseif($data[$model][$field] == '1'){return 'black';}	
	}
    
  }
?>
