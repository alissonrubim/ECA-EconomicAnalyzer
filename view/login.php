<?php
	if(isset($_POST)){
		if(!isset($_POST["username"])){

		}else if(!isset($_POST["password"])){
			
		}else {
			$userDAO = new usersDAO();
			$user = $userDAO->login($_POST["username"], md5($_POST["password"]));
			if($user != null){
				$_SESSION["logged"] = true;
				$_SESSION["accessprofile"] = $user->getStrAccessprofile();
				echo "<script>location.href='index.php'</script>";
			}else{
				echo "Wrong username or password!";
			}
		}
	}
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-8">
								<form method="POST" action="index.php?p=login">
									<label>User</label>
									<input type="text" name="username" required="required">
									<label>Password</label>
									<input type="password" name="password" required="required">
									<input type="submit" name="Send">
								</form>
								<a href="">Recovery password</a>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>