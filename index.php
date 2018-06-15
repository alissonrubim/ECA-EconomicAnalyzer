<?php
	session_start();
    
	$allowPages = array("login");
	$logged = true;
	$page = "login";
	if(isset($_SESSION) && isset($_SESSION['logged']) && $_SESSION['logged'] == true){
		$page = "dashboard";
		$logged = true;
	}
	
	if(isset($_GET) && isset($_GET['p'])){
		$page = $_GET['p'];
	}

	if($logged){
		require_once "classes/template.php";

	    $template = new Template();
	    $template->header();
	    $template->sidebar();
	    $template->mainpanel();

		include "view/".$page.".php";

		$template->footer();
	}else{
		
		include "view/".$page.".php";
	}
?>