<?php
	$_SESSION["logged"] = false;
	if(isset($_POST)){
		if(!isset($_POST["username"])){

		}else if(!isset($_POST["password"])){
			
		}else {
			$userDAO = new usersDAO();
			$user = $userDAO->login($_POST["username"], md5($_POST["password"]));
			if($user != null && $user->getIdUser() != null){
				$_SESSION["logged"] = true;
				$_SESSION["accessprofile"] = $user->getStrAccessprofile();
				echo "<script>location.href='index.php'</script>";
			}else{
				echo "Wrong username or password!";
			}
		}
	}
?>

<style type="text/css">
	body{
		background: #f3f2f2;
	}
</style>
                <div class="card" style="margin: 30px auto; max-width: 300px;">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-12">
								<form method="POST" action="index.php?p=login">
									<div><label>User</label></div>
									<div><input type="text" name="username" required="required"></div>
									<div><label>Password</label></div>
									<div><input type="password" name="password" required="required" style="margin-bottom: 30px;"></div>
									<div><input type="submit" name="Send" class="btn" value="Entrar" style="float:right;"></div>
								</form>
								<a href="">Recovery password</a>
							</div>
						</div>
                    </div>
                </div>
