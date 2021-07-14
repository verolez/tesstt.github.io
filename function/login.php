<?php 
	
	$username = $password = $username_err = $password_err = $hashed_password = $id = $displayname = "";
	if (isset($_SESSION['id'])) {
        echo '<script> window.location.href="index.php"; </script>';
    }
	if (isset($_POST['login'])) {

		if(empty(trim($_POST["username"]))){
        	$username_err = "* Please enter username.";
    	} else{
        	$username = trim($_POST["username"]);
    	}
    
	    if(empty(trim($_POST["password"]))){
	        $password_err = "* Please enter your password.";
	    } else{
	        $password = trim($_POST["password"]);
	    }
	    if (empty($username_err) || empty($password_err)) {
	    	$databaseaccounttemp = $link->query("SELECT * FROM users WHERE username = '$username'") or die($link->error);
	    	

			if ($databaseaccounttemp->num_rows != 0) {
		  		
				$databaseaccount = $databaseaccounttemp->fetch_assoc();
				$hashed_password = $databaseaccount['password'];
				$displayname = $databaseaccount['displayname'];
				$id = $databaseaccount['id'];
				if(password_verify($password, $hashed_password)){
					$_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $id;
                    $_SESSION["username"] = $username;
                    $_SESSION["displayname"] = $displayname;
                    header("location: index.php");
				}else{
					$password_err = "* The Password you entered was not valid.";
					$password = $username_err = $hashed_password = $id = $displayname = "";
				}
			}else{
				$username_err = "* No account found with that Username";
				$username = $password = $password_err = $hashed_password = $id = $displayname = "";
			}
	    }
	}
 ?>