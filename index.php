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

	function processMonth($str){
		$str = intval($str);
		if($str == 1)
			return "Jan";
		if($str == 2)
			return "Fev";
		if($str == 3)
			return "Mar";
		if($str == 4)
			return "Abr";
		if($str == 5)
			return "Mai";
		if($str == 6)
			return "Jun";
		if($str == 7)
			return "Jul";
		if($str == 8)
			return "Ago";
		if($str == 9)
			return "Set";
		if($str == 10)
			return "Out";
		if($str == 11)
			return "Nov";
		if($str == 12)
			return "Dez";
	}

    //verifica login
	$allowPages = array("login");
	$logged = false;
	if(isset($_SESSION) && isset($_SESSION["logged"]) && $_SESSION['logged'] == true){
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