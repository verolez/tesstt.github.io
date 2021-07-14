<?php 
include 'includes/header.php';
include 'function/usercheck.php';
include 'function/accounts.php';  
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
        <li class="active">
          <a href="manage-accounts.php"><span class="fa fa-list mr-3"></span> Manage Accounts</a>
        </li>
        <?php if ($usersession == 1) { ?>
        <li>
          <div class="text-center" style="padding-top: 10px; font-size:20px;"><u>Reviewers Section</u></div>
        </li>
        <li>
          <a href="assigned.php?status=All"><span class="fa fa-user mr-3"></span> Assigned Release</a>
        </li>
        <li>
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
            <div><h1>Manage Accounts</h1></div>
            <div>
              <?php if ($usersession == 0) { ?>
              <a href="login.php" style="font-size: 17px;" class="btn btn-primary"><span class="fa fa-sign-in mr-2"></span>Login for Reviewer</a>  
            <?php } else{ ?>
              <a href="function/logout.php" style="font-size: 17px;" class="btn btn-danger"><span class="fa fa-sign-out mr-2"></span>Logout</a>
            <?php } ?>
            </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-12 d-flex justify-content-between">
            <h2>All Accounts</h2>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addaccount" style="font-size: 17px;">
              <span class="fa fa-plus"></span>
            </button>
          </div>
        </div>
      </div>    
      <div class="container">
        <div class="row" style="padding-bottom: 20px; padding-top: 10px;">
          <div class="col-md-12">
            <div class="table-responsive fixed-table-body">
              <table id="example" class="table table-hover table-bordered">
                <thead class="text-center">
                  <th>ID</th>
                  <th>Account Name</th>
                  <th>Total Count Product Release</th>
                  <th>Action</th>
                </thead>
                <tbody class="text-center">
                  <?php for ($i = 0;$accountsviewrow = $accountsview->fetch_assoc();$i++) { ?>
                  <tr>
                    <td><?php echo $accountsviewrow['account_id']; ?></td>
                    <td><?php echo $accountsviewrow['account_name']; ?></td>
                    <td><?php echo $accountsviewrow['COUNT(productrelease.id)']; ?></td>
                    <td style="font-size: 20px;">
                      <a href="productrelease.php?account=<?php echo($accountsviewrow['account_name']) ?>&status=All" class="viewicon btn btn-primary" style="padding-left: 3px; padding-right: 3px;">
                        <i class="fa fa-eye" style="padding-left: 4px;padding-right: 4px;"></i>
                      </a>
                      <a href="#" class="editicon btn btn-secondary" data-toggle="modal" data-target="#editaccount<?php echo($i) ?>" style="padding-left: 3px; padding-right: 3px;">
                        <i class="fa fa-edit" style="padding-left: 4px;padding-right: 4px;"></i>
                      </a>
                      <a href="#" class="deleteicon btn btn-danger" data-toggle="modal" data-target="#deleteaccount<?php echo($i) ?>" style="padding-left: 3px; padding-right: 3px;">
                        <i class="fa fa-trash" style="padding-left: 4px;padding-right: 4px;"></i>
                      </a>
                      
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>



<!-- Add Account Start -->
<div class="modal fade" id="addaccount">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="container">
          <form method="post">
            <div class="content">
              <div class="modal-header">
                  <h4 class="modal-title" id="addaccountLabel">Add Account</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <input type="text" name="account" class="form-control" placeholder="New Account">
              </div>
            <div class="modal-footer">
                <button type="button" style="font-size: 17px;" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" name="addnewaccount" style="font-size: 17px;" class="btn btn-primary">Add Account</button>
              </div>
            </div>
         </form>
        </div>
    </div>
  </div>
</div>
<!-- Add Account End -->

<?php for ($j=0;$accountseditrow = $accountsedit->fetch_assoc() ; $j++) { ?>
<!-- Edit Account Start -->
<div class="modal fade" id="editaccount<?php echo($j) ?>">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="container">
          <form method="post">
            <div class="content">
              <div class="modal-header">
                  <h4 class="modal-title" id="addaccountLabel">Edit Account</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <input type="hidden" name="editid" value="<?php echo($accountseditrow['account_id']) ?>">
                <input type="text" name="editaccount" value="<?php echo($accountseditrow['account_name']) ?>" class="form-control" placeholder="New Account" autocomplete="off">
                <br>
                <p style="font-size: 15px;">* Once you edit this Account, Product Release that are under this account will be updated to the changes you made.</p>
              </div>

            <div class="modal-footer">
                <button type="button" style="font-size: 17px;" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" name="save" style="font-size: 17px;" class="btn btn-primary">Save Changes</button>
              </div>
            </div>
         </form>
        </div>
    </div>
  </div>
</div>
<!-- Edit Account End -->
<?php } ?>

<!-- Confirm Delete Modal Start -->
<?php for ($k=0;$accountsdeleterow = $accountsdelete->fetch_assoc(); $k++) { ?>
<div class="modal fade" id="deleteaccount<?php echo($k) ?>">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="container">
          <form method="post">
            <div class="content">
              <div class="modal-header">
                  <h4 class="modal-title" id="deleteproductLabel">Delete <?php echo $accountsdeleterow['account_name']; ?></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  Are you sure you want to Delete <?php echo $accountsdeleterow['account_name']; ?>? If you delete this account, all of the product release under this account will also be deleted. Continue?
                  <input type="hidden" name="deletename" value="<?php echo($accountsdeleterow['account_name']) ?>">
              </div>
            <div class="modal-footer">
                <button type="button" style="font-size: 17px;" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" name="delete" style="font-size: 17px;" class="btn btn-danger">Delete</button>
              </div>
            </div>
         </form>
        </div>
    </div>
  </div>
</div>
<?php } ?>
<!-- Confirm Delete Modal End -->
  </div>
</body>
<?php include 'includes/footer.php'; ?>