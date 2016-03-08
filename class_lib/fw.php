<?php
/*
+--------------------------------------------
|
|   PHP Skeleton
|   Author: Mark L Bentley
|   github.com/marklbentley/PHPSkeleton
|
+--------------------------------------------
|
|   framework class
|
+--------------------------------------------
*/

//===========================================
// Methods List
//===========================================
//
// getPos
// getDefault
// getPage
// getError
//
//===========================================

class Fw{
	
   private $pos;
   
   private function getPos($url){
	   
	   $url = rtrim($url, '/');
	   
	   $path = explode('/', $url);
	   
	   if (DIR_ROOT != ''){ //check if site is in a subfolder
		  
		  $pos = array_search(DIR_ROOT, $path);
		  $pos = $pos+1;
		  
	  }else{ 
		  $pos = 1;
	  }
	  
	  return $pos;
   }
   
   function getDefault($url){ //method to get the correct template
      
	  
	  
	  $path = explode('/', $url);
	  	  
	  $temp = $path[$this -> getPos($url)];
	  
	  if($temp != ''){
	    
		$file = DIR_TEMPLATE.'/'.$temp.'.php';
		
	    if (is_readable($file)) {

          //include the alternative template
		  $template = $file;
		
		}else{
		
		  //include the default template
		  $template = DIR_TEMPLATE.'/default.php';
		
		}
       }else{
        
		 //include the default template
		 $template = DIR_TEMPLATE.'/default.php';

       }	   
   
      return $template;
   
   }
 

   function getPage($page){ //method to get the correct controller
     
     //method variables
	 $index = $this -> getPos($page); //position in url of the root
	 $url =  explode('/', $page); //array formed from url
	 $control = DIR_CONTROL; //path to controller
	 
	 //check if url is for root
	 if(array_key_exists($index, $url)){
		 $path = $url[$index];
	 }else{
		 $path = '';
	 }
	 
	 $temp = DIR_TEMPLATE.'/'.$path.'.php'; //possible template file
	 
	 //check if alternative template is used
	 if (is_readable($temp)){
		if(array_key_exists($index+1, $url)){
		 $path = $url[$index+1];
	 }else{
		 $path = '';
	 } 
	  $control = DIR_CONTROL.'/'.$url[$index];
	  
	 }
	 
	 //check if controller exists
	 if(isset($path) && $path !=''){ 
	 $file = array_shift (explode("?",$path));
	 $file = $control.'/'.$file.'.php';
	 }else{
	 $file = $control.'/home.php';
	 }
	 
	 
      if (is_readable($file)) {
            return $file;
        }else{
		
      return DIR_CONTROL.'/error.php';
    }
	
   
   }//end getTemplate

   function getError($error){
   
      $errors = [
	  
	    'errorName' => 'error message',
		'general'   => 'Unfortunately it looks like something went wrong. Please try again.',
		'nopage'    => 'Ooooops. This is not the page you are looking for.',
	    'badlog'    => 'Some of your credentials were wrong, please login again',
		'deets'		=> 'Some details are missing, please try again.',
		'mismatch'  => 'The passwords supplied do not match.',
		'exists'	=> 'This account already exists'
	  
	  ];
   
    return $errors[$error];
   
   }//end getError
    

}// end framework class


?>