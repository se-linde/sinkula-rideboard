<?php
/*
switch.php - will allow us to swap html pieces dynamically
include this file at the top 'top.php'!
*/

//place URL & labels in the variable/array here for navigation:
$nav1['index.php'] = "Home";
$nav1['bio.php'] = "Bio";
$nav1['portfolio.php'] = "Portfolio";
$nav1['contact.php'] = "Contact Us";



//this line below identifies the current page
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

/* below we can create 'case' statements to accommodate
 unique data items (title, a page id and an image) that will
reside in the 'top.php' file
*/
switch(THIS_PAGE)
{
  case "index.php":
  $myTitle = "Mike Sinkula Rideshare Page";
  $myPageID = "Mike Sinkula Rideshare Page";
  break;
  
  case "bio.php":
  $myTitle = "Bio Page";
  $myPageID = "Bio Page";
  break;
  
   case "portfolio.php":
  $myTitle = "Portfolio Page";
  $myPageID = "Portfolio Page";
  break;
  
        
  case "contact.php":
  $myTitle = "Contact Us Page";
  $myPageID = "Contact Us Page";
  break;     
  

  //fallback values for undefined pages
  default:
  $myTitle = THIS_PAGE; #the file name is unique
  $myPageID = "Welcome!";
        
}
//--------------END CONFIG AREA --------------------------------
/*
makeLinks function will create our dynamic nav when called.
Call like this:
echo makeLinks($nav1); #in which $nav1 is an associative array of links
*/
function makeLinks($linkArray)
{
    $myReturn = '';

    foreach($linkArray as $url => $text)
    {
        if($url == THIS_PAGE)
        {//current page - add class reference
	    	$myReturn .= '<li class="current"><a href="' . $url . '">' . $text . '</a></li>' . PHP_EOL;
    	}else{
	    	$myReturn .= '<li><a href="' . $url . '">' . $text . '</a></li>'  . PHP_EOL;
    	}    
    }
      
    return $myReturn;    
}


#uncomment to test:
/*
echo 'THIS_PAGE is: ' . THIS_PAGE . '<br />';
echo '$myTitle is: ' . $myTitle . '<br />';
echo '$myPageID is: ' . $myPageID . '<br />';
echo '$myPic is: ' . $myPic . '<br />';
echo 'Nav:<br />';
echo makeLinks($nav1);
die;
*/

/*

saved below as the original HTML for the nav:

 <nav class="nav">
	<ul>
		<li class="current"><a href="index.php">Welcome</a></li>
		<li><a href="alice.php">About Alice</a></li>
		<li><a href="queen.php">The Queen</a></li>
		<li><a href="madhatter.php">The Mad Hatter</a></li>
		<li><a href="gallery.php">The Gallery</a></li>
	</ul>
  </nav>

*/


?>