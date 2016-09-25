<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

 
 
 <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <!-- call jquery -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   <!-- call js scripts -->
   <script src="<?php echo DIR_ASSET; ?>/js/scripts.js"></script>
   <!-- call normalize.css -->
   <link rel="stylesheet" href="<?php echo DIR_ASSET; ?>/css/normalize.css" />
   <!-- call css -->
   <link rel="stylesheet" href="<?php echo DIR_ASSET; ?>/css/style.css" />

 <body>
 <!-- container -->
  
	  <h1>This is the default template</h1>
	 
<?php

     include($fw -> getPage($page));

?>
	
  </body>
  </html>