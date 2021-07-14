<?php 
include 'includes/header.php';
include 'function/login.php'; 
?>
<body style="background: #004A8B;">
	<form method="post">
		<div class="container">
		  	<div class="row" style="padding-top: 14%;">
			  	<div class="col-md-4 mx-auto" style="background-color:white; border:solid;font-size: 20px;">
			  		<div style="padding: 20px;">
				  		<div class="text-center" style="font-size: 25px;">COA System Development</div>
				  		<div class="form-group" style="padding-top: 25px;">
					  		<input class="form-control" type="text" autocomplete="off" name="username" placeholder="Username" value="<?php echo($username) ?>" required>
					  		<span style="color: red;"><?php echo $username_err; ?></span>
				  		</div>
				  		<div class="form-group">
					  		<input class="form-control" type="password" name="password" placeholder="Password" value="<?php echo($password) ?>" required>
					  		<span style="color: red;"><?php echo $password_err; ?></span>
				  		</div>
				  		<div class="form-group d-flex justify-content-between">
				  			<button type="submit" name="login" class="btn btn-primary form-control">LOGIN</button>
				  		</div>
				  		<div class="form-group d-flex justify-content-between">
				  			<a href="index.php" type="button" name="back" class="btn btn-secondary form-control">BACK</a>
				  		</div>
			  		</div>
			  	</div>
		  	</div>
		</div>
	</form>	
</body>
<?php include 'includes/footer.php'; ?>