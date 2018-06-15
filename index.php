<?php
	session_start();
	
	require_once "classes/template.php";
	require_once "DAO/conexao.php";
	//Todas as models
	require_once "models/action.php";
	require_once "models/beneficiaries.php";
	require_once "models/user.php";
	require_once "models/payments.php";

	//Todas as DAO
	require_once "DAO/paymentsDAO.php";
	require_once "DAO/beneficiariesDAO.php";
	require_once "DAO/usersDAO.php";

    //verifica login
	$allowPages = array("login");
	$logged = false;
	if(isset($_SESSION) && isset($_SESSION['logged']) && $_SESSION['logged'] == true){
		$logged = true;
	}

	//processa pagina inicial
	$page = "login";
	if($logged)
		$page = "dashboard";
	
	if(isset($_GET) && isset($_GET['p'])){
		$page = $_GET['p'];
	}

	//tratamento de login
	if($logged){
	    $template = new Template();
	    $template->header();
	    $template->sidebar();
	    $template->mainpanel();

		include "view/".$page;

		$template->footer();
	}else{
		$template = new Template();
	    $template->header();
		include "view/".$page.".php";
	}
?>