<?php include ("switch.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
<title><?=$myTitle?></title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width" />
 
<link rel=”shortcut icon” href=”http://www.lindese.com/favicon.ico” type=”image/icon”>
<link rel=”icon” href=”http://www.lindese.com/favicon.ico” type=”image/icon”>    

<link href='https://fonts.googleapis.com/css?family=Mystery+Quest' rel='stylesheet' type='text/css'>    
    
<link rel="stylesheet" type="text/css" href="css/portal.css" />
<!-- <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />-->
<!--[if lt IE 9]>
   <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->
</head>
    
<body>
<header> 
        
  <!-- <h2 class="pageid">Home Page</h2> -->
  <h3><a href="index.php">Mike Sinkula Rideshare Page</a></h3>
  <!-- START NAVIGATION (Main) -->
    
    
  <nav class="main center">
    <ul>
    <?php echo makeLinks($nav1);?> 
    </ul>
  </nav>
    
  <!-- END NAVIGATION (Main) --> 
</header>