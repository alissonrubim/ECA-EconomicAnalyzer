<?php
	if(isset($_POST)){
		if(!isset($_POST["username"])){

		}else if(!isset($_POST["username"])){
			
		}else {
			$_SESSION["logged"] = true;
			$_SESSION["accessprofile"] = "admin";
			echo "<script>location.href='index.php'</script>";
		}
	}
?>

<form method="POST" action="index.php?p=login">
	<input type="text" name="username" required="required">
	<input type="password" name="password" required="required">
	<input type="submit" name="Send">
</form>