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
|   index page
|
+--------------------------------------------
*/


//include the config page to use constants

   include('config.php');
   

//include the framework class and create object

   include(DIR_CLASS.'/fw.php');
   $fw = new Fw();
   
//include the database class and create object (uncomment if needed)
   
   //include(DIR_CLASS.'/db.php');
   //$db = new Db();

//include the correct template
   
  $page   = $_SERVER['REQUEST_URI'];
  include($fw -> getDefault($page)); 

  
   ?>