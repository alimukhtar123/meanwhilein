<?php


session_start();


if(!isset($_SESSION['id']))
{
    
    
        
	 header('Location: csc343.php');
	die();
        
       
         
}

require_once ('configcsc343.php');