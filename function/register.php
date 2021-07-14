<?php 
	$displayname = $username = $passwordtemp = $password = $confirmpassword = $displayname_err = $username_err = $password_err = $confirmpassword_err = "";
    $oldpassword = $newpassword = $confirmnewpassword = $oldpassword_err = $newpassword_err = $confirmnewpassword_err = "";
        $userexist = 0;
    $usersession = 0;
    if(isset($_SESSION['id']) && !empty($_SESSION['id'])) {
       $usersession = 1;
    }
	if (isset($_POST['onetime-register'])) {
		


		$displayname = trim($_POST["displayname"]);
		$username = trim($_POST["username"]);
		$passwordtemp = trim($_POST["password"]);
		$confirmpassword = trim($_POST["confirmpassword"]);


        $usercheck = $link->query("SELECT * FROM users WHERE username = '$username'") or die($link->error);
        if ($usercheck->num_rows == 0) { $userexist = 0; }
        else { $userexist = 1;}

		if(strlen($displayname) < 4){
        	$displayname_err = "* Display name is too short.";
        	$displayname = $passwordtemp = $confirmpassword = "";
    	}

        if ($userexist == 1) {
            $username_err = "* Someone already used that username.";
            $username = $passwordtemp = $confirmpassword = "";   
        }elseif(strlen($username) < 8)
    	{
    		$username_err = "* Username must be above 8 characters.";
    		$username = $passwordtemp = $confirmpassword = "";
    	}

    	if(strlen($passwordtemp) < 8)
    	{
    		$password_err = "* Password must be above 8 characters.";
    		$passwordtemp = $confirmpassword = "";
    	}

    	if ($confirmpassword != $passwordtemp) {
    		$confirmpassword_err = "* Confirm Password does not match.";
    		$passwordtemp = $confirmpassword = "";
    	}

        $password = password_hash($passwordtemp, PASSWORD_DEFAULT);

    	if (empty($displayname_err) && empty($username_err) && empty($password_err) && empty($confirmpassword_err)) {
    		
    		$sql = "INSERT INTO users (displayname,username,password) VALUES ('$displayname','$username','$password')";
    		if (mysqli_query($link, $sql)) {
  				header("location: login.php");
			}
			else
			{
				echo "Something went wrong. Please try again later.";
			}
    	}
	}
    if (isset($_POST['register'])) {
        

        $displayname = trim($_POST["displayname"]);
        $username = trim($_POST["username"]);
        $passwordtemp = trim($_POST["password"]);
        $confirmpassword = trim($_POST["confirmpassword"]);

        $usercheck = $link->query("SELECT * FROM users WHERE username = '$username'") or die($link->error);
        if ($usercheck->num_rows == 0) { $userexist = 0; }
        else { $userexist = 1;}

        if(strlen($displayname) < 4){
            $displayname_err = "* Display name is too short.";
            $displayname = $passwordtemp = $confirmpassword = "";
        }

        if ($userexist == 1) {
            $username_err = "* Someone already used that username.";
            $username = $passwordtemp = $confirmpassword = "";   
        }elseif(strlen($username) < 8)
        {
            $username_err = "* Username must be above 8 characters.";
            $username = $passwordtemp = $confirmpassword = "";
        }

        if(strlen($passwordtemp) < 8)
        {
            $password_err = "* Password must be above 8 characters.";
            $passwordtemp = $confirmpassword = "";
        }

        if ($confirmpassword != $passwordtemp) {
            $confirmpassword_err = "* Confirm Password does not match.";
            $passwordtemp = $confirmpassword = "";
        }

        $password = password_hash($passwordtemp, PASSWORD_DEFAULT);

        if (empty($displayname_err) && empty($username_err) && empty($password_err) && empty($confirmpassword_err)) {
            
            $sql = "INSERT INTO users (displayname,username,password) VALUES ('$displayname','$username','$password')";
            if (mysqli_query($link, $sql)) {
                header("location: index.php");
            }
            else
            {
                echo "Something went wrong. Please try again later.";
            }
        }
    }
    if (isset($_POST['change'])) {
        
        $userid = $_SESSION["id"];

        $checkusertemp = $link->query("SELECT * FROM users WHERE id = '$userid'") or die($link->error);
        $checkuser = $checkusertemp->fetch_assoc();

        $checkpassword = $checkuser['password'];

        $oldpassword = trim($_POST["oldpassword"]);
        $newpassword = trim($_POST["newpassword"]);
        $confirmnewpassword = trim($_POST["confirmnewpassword"]);

        if (password_verify($oldpassword, $checkpassword)) {
            if (strlen($newpassword) < 8) {
                $newpassword_err = "* New Password must be above 8 characters.";
            }elseif ($newpassword != $confirmnewpassword) {
                $confirmnewpassword_err = "* Confirm New Password does not match.";
            }else{
                $newpassword = password_hash($newpassword, PASSWORD_DEFAULT);
            }

        }
        else
        {
            $oldpassword_err = "* Your old password is incorrect.";
        }


        if (empty($oldpassword_err) && empty($newpassword_err) && empty($confirmnewpassword_err)) {

            $sql = "UPDATE `users` SET `password`= '$newpassword' WHERE id = '$userid'";
            if (mysqli_query($link, $sql)) {
                header("location: index.php");
            }
            else
            {
                echo "Something went wrong. Please try again later.";
            }
        }   
        $oldpassword = $newpassword = $confirmnewpassword = "";
    }
 ?>