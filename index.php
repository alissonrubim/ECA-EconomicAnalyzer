<?php
    require_once "classes/template.php";

    $template = new Template();
    $template->header();
    $template->sidebar();
    $template->mainpanel();
?>

<?php
	$page = "dashboard";
	if(isset($_GET) && isset($_GET['p'])){
		$page = $_GET['p'];
	}

	include "view/".$page.".php";
?>

<?php
    $template->footer();
?>