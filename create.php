<?php 
include 'includes/header.php';
include 'function/usercheck.php';
include 'function/register.php';  
if ($usersession == 0) {
  header("location: index.php");
}
?>
<body>
	<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar" style="background: #004A8B;">
      <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
          </button>
      </div>
      <div class="text-center">
        <h1 style="padding-top: 20px;"><a href="index.php" class="logo" style="background: #004A8B;">COA System Development</a></h1>
      </div>
      <ul class="list-unstyled components mb-5">
        <li>
          <a href="index.php"><span class="fa fa-tachometer mr-3"></span> Dashboard</a>
        </li>
        <li>
          <a href="allrelease.php?status=All"><span class="fa fa-sticky-note mr-3"></span> All Product Release</a>
        </li>
        <li>
          <a href="manage-accounts.php"><span class="fa fa-list mr-3"></span> Manage Accounts</a>
        </li>
        <?php if ($usersession == 1) { ?>
        <li>
          <div class="text-center" style="padding-top: 10px; font-size:20px;"><u>Reviewers Section</u></div>
        </li>
        <li>
          <a href="assigned.php?status=All"><span class="fa fa-user mr-3"></span> Assigned Release</a>
        </li>
        <li class="active">
          <a href="create.php"><span class="fa fa-plus mr-3"></span> Create User</a>
        </li>
        <li>
          <a href="changepassword.php"><span class="fa fa-lock mr-3"></span> Change Password</a>
        </li>
        <?php }else { } ?>
      </ul>
    </nav>

        <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
      <div class="container">
        <div class="row" style="padding-top: 10px;">
          <div class="col-md-12 d-flex justify-content-between">
            <div><h1>Create Another User</h1></div>
            <div>
              <?php if ($usersession == 0) { ?>
              <a href="login.php" style="font-size: 17px;" class="btn btn-primary"><span class="fa fa-sign-in mr-2"></span>Login for Reviewer</a>  
            <?php } else{ ?>
              <a href="function/logout.php" style="font-size: 17px;" class="btn btn-danger"><span class="fa fa-sign-out mr-2"></span>Logout</a>
            <?php } ?>
            </div>
          </div>
        </div>
        <form method="post">
          <div class="row" style="padding-top: 10px;">
            <div class="col-md-5 mx-auto" style="background-color:white; font-size: 20px;">
              <div style="padding: 20px;">
                <div class="form-group">
                  <label>Display Name</label>
                  <input class="form-control" type="text" autocomplete="off" name="displayname" placeholder="Display Name" value="<?php echo($displayname) ?>" required>
                  <span style="color: red;font-size: 17px;"><?php echo $displayname_err; ?></span>
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input class="form-control" type="text" autocomplete="off" name="username" placeholder="Username" value="<?php echo($username) ?>" required>
                  <span style="color: red;font-size: 17px;"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input class="form-control" type="password" name="password" placeholder="Password" value="<?php echo($passwordtemp) ?>" required>
                  <span style="color: red;font-size: 17px;"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                  <label>Confirm Password</label>
                  <input class="form-control" type="password" name="confirmpassword" placeholder="Confirm Password" value="<?php echo($confirmpassword) ?>" required>
                  <span style="color: red;font-size: 17px;"><?php echo $confirmpassword_err; ?></span>
                </div>
                <!-- <div class="form-group d-flex justify-content-between">
                  <a href="login.php" type="button" name="back" class="btn btn-secondary">BACK</a>
                  <button type="submit" name="register" class="btn btn-success">REGISTER</button>
                </div> -->
                <div class="form-group d-flex justify-content-between">
                  <button type="submit" name="register" class="btn btn-success form-control">CREATE USER</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
<?php include 'includes/footer.php'; ?>