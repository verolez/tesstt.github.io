<?php 
include 'includes/header.php';
include 'function/usercheck.php';
include 'function/main.php';  
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
            <div><h1><?php echo $account; ?></h1></div>
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
           <h2><?php echo $status; ?> Product Releases</h2>
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addproduct" style="font-size: 17px;">
              <span class="fa fa-plus"></span>
            </button>
          </div>
        </div>
        <div class="row" >
          <div class="col-md-12">
            
          </div>
        </div>
        <div class="row d-flex justify-content-between text-center" style=" padding-top: 10px;">
          <?php if ($status == "All") { ?>
          <div class="col-md-3">
            <a href="productrelease.php?account=<?php echo($account) ?>&status=All" class="btn btn-dark form-control">All Release (<?php echo $statusdisplayall['COUNT(id)']; ?>)</a>
          </div>
          <?php }else{ ?>
          <div class="col-md-3">
            <a href="productrelease.php?account=<?php echo($account) ?>&status=All" class="btn btn-info account-button form-control">All Release (<?php echo $statusdisplayall['COUNT(id)']; ?>)</a>
          </div>
          <?php } ?>
          <?php if ($status == "Ongoing") { ?>
          <div class="col-md-3">
            <a href="productrelease.php?account=<?php echo($account) ?>&status=Ongoing" class="btn btn-dark form-control">Ongoing Release (<?php echo $statusdisplayongoing['COUNT(id)']; ?>)</a>
          </div>
          <?php }else{ ?>
          <div class="col-md-3">
            <a href="productrelease.php?account=<?php echo($account) ?>&status=Ongoing" class="btn btn-info account-button form-control">Ongoing Release (<?php echo $statusdisplayongoing['COUNT(id)']; ?>)</a>
          </div>
          <?php } ?>
          <?php if ($status == "For Review") { ?>
          <div class="col-md-3">
            <a href="productrelease.php?account=<?php echo($account) ?>&status=For Review" class="btn btn-dark form-control">For Review (<?php echo $statusdisplayforreview['COUNT(id)']; ?>)</a>
          </div>
          <?php }else{ ?>
          <div class="col-md-3">
            <a href="productrelease.php?account=<?php echo($account) ?>&status=For Review" class="btn btn-info account-button form-control">For Review (<?php echo $statusdisplayforreview['COUNT(id)']; ?>)</a>
          </div>
          <?php } ?>
          <?php if ($status == "Approved") { ?>
            <div class="col-md-3">
            <a href="productrelease.php?account=<?php echo($account) ?>&status=Approved" class="btn btn-dark form-control">Approved (<?php echo $statusdisplayapproved['COUNT(id)']; ?>)</a>
          </div>
          <?php }else{ ?>
            <div class="col-md-3">
            <a href="productrelease.php?account=<?php echo($account) ?>&status=Approved" class="btn btn-info account-button form-control">Approved (<?php echo $statusdisplayapproved['COUNT(id)']; ?>)</a>
          </div>
          <?php } ?>
        </div>
      </div>    
      <div class="container">
        <div class="row" style="padding-bottom: 20px; padding-top: 10px;">
          <div class="col-md-12">
            <div class="table-responsive fixed-table-body">
              <table id="example" class="table table-hover table-bordered">
                <thead class="text-center">
                  <th>ID</th>
                  <th>Control Number</th>
                  <th>Lot Number</th>
                  <th>Account</th>
                  <th>Status</th>
                  <th>Assigned</th>
                  <th>Date Added</th>
                  <!-- <th>Date Modified</th> -->
                  <th>Action</th>
                </thead>
                <tbody class="text-center">
                  <?php 
                  for ($i = 0;$productreleasetablerow = $productreleasetable->fetch_assoc();$i++) 
                    { ?>
                  <tr>
                    <td><?php echo $productreleasetablerow['id']; ?></td>
                    <td><?php echo $productreleasetablerow['control_num']; ?></td>
                    <td><?php echo $productreleasetablerow['lot_num']; ?></td>
                    <td><?php echo $productreleasetablerow['account']; ?></td>
                    <td style="color: <?php if ($productreleasetablerow['status'] == "Ongoing") { echo "gray"; } elseif ($productreleasetablerow['status'] == "For Review") { echo "blue"; } elseif ($productreleasetablerow['status'] == "Approved") { echo "green"; } ?>;"><?php echo $productreleasetablerow['status']; ?></td>
                    <td><?php echo $productreleasetablerow['assign_to']; ?></td>
                    <td><?php echo date("F d, Y", strtotime($productreleasetablerow['date_added'])); ?></td>
                    <!-- <td><?php echo date("F d, Y", strtotime($productreleasetablerow['date_modified'])); ?></td> -->
                    <td style="font-size: 20px;">
                      <?php if ($usersession == 1) { ?>
                      <a href="productrelease.php?approved=<?php echo($productreleasetablerow['id']) ?>&account=<?php echo($account) ?>&status=<?php echo($status) ?>" class="viewicon btn btn-success" style="padding-left: 3px; padding-right: 3px;">
                        <i class="fa fa-thumbs-up" style="padding-left: 4px;padding-right: 4px;"></i>
                      </a>
                      <?php } else {} ?>
                      <a href="#" class="viewicon btn btn-primary" data-toggle="modal" data-target="#viewproduct<?php echo($i) ?>" style="padding-left: 3px; padding-right: 3px;">
                        <i class="fa fa-eye" style="padding-left: 4px;padding-right: 4px;"></i>
                      </a>
                      <a href="#" class="editicon btn btn-secondary" data-toggle="modal" data-target="#editproduct<?php echo($i) ?>" style="padding-left: 3px; padding-right: 3px;">
                        <i class="fa fa-edit" style="padding-left: 4px;padding-right: 4px;"></i>
                      </a>
                           <a href="#" class="deleteicon btn btn-danger" data-toggle="modal" data-target="#deleteproduct<?php echo($i) ?>" style="padding-left: 3px; padding-right: 3px;">
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

<!-- Add Modal Start -->
<div class="modal fade" id="addproduct">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
       <div class="container">
        <form method="post" autocomplete="off">
            <div class="content">
             <div class="modal-header">
                <h4 class="modal-title" id="addproductTitle">Add Product Release</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
             </div>
             <div class="modal-body">
                <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                  <div class="col-md-12">
                    Product Name
                    <input type="text" name="addproductname" class="form-control" required>
                  </div>
                </div>
                <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                  <div class="col-md-6">
                    Customer Name
                    <input type="text" name="addcustomername" class="form-control" required>
                  </div>
                  <div class="col-md-6">
                    Account
                    <select name="addaccount" class="form-control" required>
                      <option value="">-- Select Account --</option>
                    <?php 
                    for ($random = 0; $random < $assignaccountmax; $random++) { 
                      ?>
                      <option value="<?php echo($assignaccount[$random]) ?>"><?php echo $assignaccount[$random]; ?></option>
                      <?php
                    }
                     ?>
                    </select>
                  </div>
                </div>
                <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                  <div class="col-md-6">
                    Created by
                    <input type="text" name="addcreatedby" class="form-control" required>
                  </div>
                  <div class="col-md-6">
                    Assign Review
                    <select name="addassignto" class="form-control" required>
                      <option value="">-- Select Assign Person --</option>
                    <?php 
                    for ($random = 0; $random < $assignpersonmax; $random++) { 
                      ?>
                      <option value="<?php echo($assignperson[$random]) ?>"><?php echo $assignperson[$random]; ?></option>
                      <?php
                    }
                     ?>
                    </select>
                  </div>
                </div>

                <!-- <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                  <div class="col-md-12">
                    Customer Name
                    <input type="text" name="addcustomername" class="form-control" required>
                  </div>
                </div>
                <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                  <div class="col-md-6">
                    Assign Review
                    <select name="addassignto" class="form-control" required>
                      <option value="">-- Select Assign Person --</option>
                    <?php 
                    for ($random = 0; $random < $assignpersonmax; $random++) { 
                      ?>
                      <option value="<?php echo($assignperson[$random]) ?>"><?php echo $assignperson[$random]; ?></option>
                      <?php
                    }
                     ?>
                    </select>
                  </div>
                  <div class="col-md-6">
                    Account
                    <select name="addaccount" class="form-control" required>
                      <option value="">-- Select Account --</option>
                    <?php 
                    for ($random = 0; $random < $assignaccountmax; $random++) { 
                      ?>
                      <option value="<?php echo($assignaccount[$random]) ?>"><?php echo $assignaccount[$random]; ?></option>
                      <?php
                    }
                     ?>
                    </select>
                  </div>
                </div> -->
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-6">
                  Manufacture Date
                  <input type="date" name="addmanufacturedate" class="form-control" required>
                </div>
                <div class="col-md-6">
                  Expiration Date
                  <input type="date" name="addexpirationdate" class="form-control" required>
                </div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-4">
                  Manufactured Quantity
                  <input type="text" name="addmanufacturedquan" class="form-control" required>
                </div>
                <div class="col-md-4">
                  Control Number
                  <input type="text" name="addcontrolnum" class="form-control" required>
                </div>
                <div class="col-md-4">
                  PO #
                  <input type="text" name="addponum" class="form-control" required>
                </div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-4">
                  Lot Number
                  <input type="text" name="addlotnum" class="form-control" required>
                </div>
                <div class="col-md-4">
                  Product Code
                  <input type="text" name="additemnum" class="form-control" required>
                </div>
                <div class="col-md-4">
                  Rev. Number
                  <input type="text" name="addrevnum" class="form-control" required>
                </div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-4">
                  Serving Size
                  <input type="text" name="addservingsize" class="form-control" required>
                </div>
                <div class="col-md-4">
                  Serving Per Container
                  <input type="text" name="addservingpercontainer" class="form-control" required>
                </div>
                <div class="col-md-4">
                  Status
                  <select name="addstatus" class="form-control" required>
                      <option value="">-- Select Status --</option>
                      <option value="Ongoing">Ongoing</option>
                      <option value="For Review">For Review</option>
                  </select>
                </div>
              </div>
              <hr>
                  <div class="row" style="padding-top: 10px; padding-bottom: 10px;">
                    <div class="col-md-12 d-flex justify-content-between">
                      <div>
                        <input type="number" disabled value="1" class="text-center" id="addphysicaltestingcount" style="width: 40px;">
                        <a href="javascript:void(0);" class="addphysicaltestingButton btn btn-success" style="font-size:17px;padding-left: 3px; padding-right: 3px;">
                          &nbsp<i class="fa fa-plus mr-2"></i>
                          Add Physical Testing&nbsp&nbsp
                        </a>    
                      </div>
                    </div>
                  </div>
                  <div class="addphysicaltesting" style="padding-top: 10px; padding-bottom: 2px;">
                    <div class="row" style="padding-top: 2px;padding-bottom: 2px;">
                      <div class="col-md-3 text-center"><b>Physical Testing</b></div>
                      <div class="col-md-3 text-center"><b>Specification</b></div>
                      <div class="col-md-3 text-center"><b>Method</b></div>
                      <div class="col-md-2 text-center"><b>Results</b></div>
                    </div>
                    <div class="row" style="padding-top: 2px;padding-bottom: 2px;">
                      <div class="col-md-3">
                        <input type="text" name="addphysicaltest[]" class="form-control">
                      </div>
                      <div class="col-md-3">
                        <input type="text" name="addphysicalspecification[]"  class="form-control">
                      </div>
                      <div class="col-md-3">
                        <input type="text" name="addphysicalmethod[]"  class="form-control">
                      </div>
                      <div class="col-md-2">
                        <input type="text" name="addphysicalresults[]"  class="form-control">
                      </div>
                      <div class="col-md-1">
                        <a href="javascript:void(0);" class="removephysicaltestingButton" style="padding-left: 3px; padding-right: 3px;"><i class="fa fa-minus text-danger"></i>
                        </a>
                      </div>
                    </div>

                  </div>
                  <div class="row" style="padding-top: 10px; padding-bottom: 10px;">
                    <div class="col-md-12 d-flex justify-content-between">
                      <div>
                        <input type="number" disabled value="1" class="text-center" id="addchemicaltestingcount" style="width: 40px;">
                        <a href="javascript:void(0);" class="addchemicaltestingButton btn btn-success" style="font-size:17px;padding-left: 3px; padding-right: 3px;">
                      &nbsp<i class="fa fa-plus mr-2"></i>
                      Add Chemical Testing&nbsp&nbsp
                    </a>    
                      </div>  
                    </div>
                  </div>
                  <div class="addchemicaltesting" style="padding-top: 10px; padding-bottom: 2px;">
                    <div class="row" style="padding-top: 2px;padding-bottom: 2px;">
                      <div class="col-md-6 text-center"><b>Chemical Testing/Manufacture Input per Serving:</b></div>
                      <div class="col-md-1"><b>Unit</b></div>
                      <div class="col-md-1"><b>min</b></div>
                      <div class="col-md-1"><b>max</b></div>
                      <div class="col-md-2 text-center"><b>Results</b></div>
                    </div>

                    <div class="row" style="padding-top: 2px;padding-bottom: 2px;">
                      <div class="col-md-6">
                        <input class="form-control"  type="text" name="addchemicaltest[]">
                      </div>
                      <div class="col-md-1">
                        <input class="form-control"  type="text" name="addchemicalunit[]">
                      </div>
                      <div class="col-md-1">
                        <input class="form-control"  type="text" name="addchemicalmin[]">
                      </div>
                      <div class="col-md-1">
                        <input class="form-control"  type="text" name="addchemicalmax[]">
                      </div>
                      <div class="col-md-2">
                        <input class="form-control"  type="text" name="addchemicalinput[]">
                      </div>
                      <div class="col-md-1"><a href="javascript:void(0);" class="removechemicaltestingButton" style="padding-left: 3px; padding-right: 3px;"><i class="fa fa-minus text-danger"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="padding-top: 10px; padding-bottom: 10px;">
                    <div class="col-md-12 d-flex justify-content-between">
                      <div>
                        <input type="number" disabled value="1" class="text-center" id="addheavymetaltestingcount" style="width: 40px;">
                        <a href="javascript:void(0);" class="addheavymetaltestingButton btn btn-success" style="font-size:17px;padding-left: 3px; padding-right: 3px;">
                          &nbsp<i class="fa fa-plus mr-2"></i>
                          Add Heavy Metal Testing&nbsp&nbsp
                        </a>    
                      </div>
                    </div>
                  </div>
                  <div class="addheavymetaltesting" style="padding-top: 10px; padding-bottom: 2px;">
                    <div class="row" style="padding-top: 2px;padding-bottom: 2px;">
                      <div class="col-md-5"><b>Heavy Metal Testing</b></div>
                      <div class="col-md-4"><b>µg</b></div>
                      <div class="col-md-2 text-center"><b>Results</b></div>
                    </div>

                    <div class="row" style="padding-top: 2px;padding-bottom: 2px;">
                      <div class="col-md-5">
                        <input  class="form-control" type="text" name="addheavymetaltest[]">
                      </div>
                      <div class="col-md-4">
                        <input  class="form-control" type="text" name="addheavymetalug[]">
                      </div>
                      <div class="col-md-2">
                        <input  class="form-control" type="text" name="addheavymetalinput[]">
                      </div>
                      <div class="col-md-1"><a href="javascript:void(0);" class="removeheavymetaltestingButton" style="padding-left: 3px; padding-right: 3px;"><i class="fa fa-minus text-danger"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="padding-top: 10px; padding-bottom: 10px;">
                    <div class="col-md-12 d-flex justify-content-between">
                      <div>
                        <input type="number" disabled value="1" class="text-center" id="addmicrobiologicaltestingcount" style="width: 40px;">
                        <a href="javascript:void(0);" class="addmicrobiologicaltestingButton btn btn-success" style="font-size:17px;padding-left: 3px; padding-right: 3px;">
                          &nbsp<i class="fa fa-plus mr-2"></i>
                          Add Microbiological Testing&nbsp&nbsp
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="addmicrobiologicaltesting" style="padding-top: 10px; padding-bottom: 2px;">
                    <div class="row" style="padding-top: 2px;padding-bottom: 2px;">
                      <div class="col-md-5"><b>Microbiological Testing</b></div>
                      <div class="col-md-4"><b>cfu/g</b></div>
                      <div class="col-md-2 text-center"><b>Results</b></div>
                    </div>

                    <div class="row" style="padding-top: 2px;padding-bottom: 2px;">
                      <div class="col-md-5">
                        <input  class="form-control" type="text" name="addmicrobiologicaltest[]">
                      </div>
                      <div class="col-md-4">
                        <input  class="form-control" type="text" name="addmicrobiologicalcfu[]">
                      </div>
                      <div class="col-md-2">
                        <input  class="form-control" type="text" name="addmicrobiologicalinput[]">
                      </div>
                      <div class="col-md-1"><a href="javascript:void(0);" class="removemicrobiologicaltestingButton" style="padding-left: 3px; padding-right: 3px;"><i class="fa fa-minus text-danger"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="padding-top: 10px; padding-bottom: 10px;">
                    <div class="col-md-12 text-center"><h4>Document Review</h4></div>
                    <div class="col-md-4 text-center">
                      COA
                      <select name="addcoa" class="form-control" required>
                          <option value="">-- Select an item --</option>
                          <option value="Not Submitted">Not Submitted</option>
                          <option value="Submitted">Submitted</option>
                      </select>
                    </div>
                    <div class="col-md-4 text-center">
                      Batch Record
                      <select name="addbatchrecord" class="form-control" required>
                          <option value="">-- Select an item --</option>
                          <option value="Not Submitted">Not Submitted</option>
                          <option value="Submitted">Submitted</option>
                      </select>
                    </div>
                    <div class="col-md-4 text-center">
                      FTIR
                      <select name="addftir" class="form-control" required>
                          <option value="">-- Select an item --</option>
                          <option value="Not Submitted">Not Submitted</option>
                          <option value="Submitted">Submitted</option>
                      </select>
                    </div>
                  </div>
                  <div class="row" style="padding-top: 10px; padding-bottom: 10px;">
                    
                    <div class="col-md-6">
                      <b>Prepared by :</b>
                      <div class="addprepared">
                        <div class="row">
                          <div class="col-md-5">Name</div>
                          <div class="col-md-5">Description</div>
                        </div>
                        <div class="row" style="padding-top: 5px; padding-bottom: 5px;">
                          <div class="col-md-5"><input type="text" name="addpreparedname[]" class="form-control"></div>
                          <div class="col-md-6"><input type="text" name="addprepareddescription[]" class="form-control"></div>
                          <div class="col-md-1">
                            <a href="javascript:void(0);" class="addpreparedButton" style="padding-left: 3px; padding-right: 3px;">
                              <i class="fa fa-plus text-success"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-6">
                      <b>Reviewed by :</b>
                      <div class="addreviewed">
                        <div class="row">
                          <div class="col-md-5">Name</div>
                          <div class="col-md-5">Description</div>
                        </div>
                        <div class="row" style="padding-top: 5px; padding-bottom: 5px;">
                          <div class="col-md-5"><input type="text" name="addreviewedname[]" class="form-control"></div>
                          <div class="col-md-6"><input type="text" name="addrevieweddescription[]" class="form-control"></div>
                          <div class="col-md-1">
                            <a href="javascript:void(0);" class="addreviewedButton" style="padding-left: 3px; padding-right: 3px;">
                              <i class="fa fa-plus text-success"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="padding-top: 10px; padding-bottom: 10px;">
                    <div class="col-md-6">
                      <b>Approved by :</b>
                      <div class="addapproved">
                        <div class="row">
                          <div class="col-md-5">Name</div>
                          <div class="col-md-5">Description</div>
                        </div>
                        <div class="row" style="padding-top: 5px; padding-bottom: 5px;">
                          <div class="col-md-5"><input type="text" name="addapprovedname[]" class="form-control"></div>
                          <div class="col-md-6"><input type="text" name="addapproveddescription[]" class="form-control"></div>
                          <div class="col-md-1">
                            <a href="javascript:void(0);" class="addapprovedButton" style="padding-left: 3px; padding-right: 3px;">
                              <i class="fa fa-plus text-success"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <b>Authorized by :</b>
                      <div class="addauthorized">
                        <div class="row">
                          <div class="col-md-5">Name</div>
                          <div class="col-md-5">Description</div>
                        </div>
                        <div class="row" style="padding-top: 5px; padding-bottom: 5px;">
                          <div class="col-md-5"><input type="text" name="addauthorizedname[]" class="form-control"></div>
                          <div class="col-md-6"><input type="text" name="addauthorizeddescription[]" class="form-control"></div>
                          <div class="col-md-1">
                            <a href="javascript:void(0);" class="addauthorizedButton" style="padding-left: 3px; padding-right: 3px;">
                              <i class="fa fa-plus text-success"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="padding-top: 10px; padding-bottom: 10px;">
                    <div class="col-md-12">
                      Comment :
                      <textarea class="form-control" name="addcomment" style="height: 150px;" placeholder="Put your comment here"></textarea>
                    </div>
                  </div>
                </div>
                  <div class="modal-footer">
                    <button type="button" style="font-size: 17px;" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="add" style="font-size: 17px;" class="btn btn-primary">Add Product</button>
                  </div>
              </div>
        </form>
      </div>    
    </div>
  </div>
</div>
<!-- Add Modal End -->



<!-- View Modal Start -->
<?php for ($j=0;$productreleaseviewrow = $productreleaseview->fetch_assoc(); $j++) { ?>
<div class="modal fade" id="viewproduct<?php echo($j) ?>">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="container">
          <div class="content">
          <div class="modal-header">
              <h4 class="modal-title" id="viewproductTitle">View <?php echo $productreleaseviewrow['product_name']; ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <!-- Modal Content -->
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-3">Product Name
                  </div>
                  <div class="col-md-9"> : <b><?php echo $productreleaseviewrow['product_name']; ?></b></div>
              </div>

              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-3">Customer Name
                  </div>
                  <div class="col-md-9"> : <b><?php echo $productreleaseviewrow['customer_name']; ?></b></div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-3">Account
                  </div>
                  <div class="col-md-9"> : <b><?php echo $productreleaseviewrow['account']; ?></b></div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-3">Created by
                  </div>
                  <div class="col-md-9"> : <b><?php echo $productreleaseviewrow['created_by']; ?></b></div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-3">Assign Review
                  </div>
                  <div class="col-md-9"> : <b><?php echo $productreleaseviewrow['assign_to']; ?></b></div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-3">Manufacture Date
                  </div>
                  <div class="col-md-9"> : <b><?php echo date("F d, Y", strtotime($productreleaseviewrow['manufacture_date'])); ?></b></div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-3">Expiration Date
                  </div>
                  <div class="col-md-9"> : <b><?php echo date("F d, Y", strtotime($productreleaseviewrow['expiration_date']));  ?></b></div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-3">Manufactured Quantity
                  </div>
                  <div class="col-md-9"> : <b><?php echo $productreleaseviewrow['manufactured_quantity']; ?></b></div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-3">Control Number
                  </div>
                  <div class="col-md-9"> : <b><?php echo $productreleaseviewrow['control_num']; ?></b></div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-3">PO #
                  </div>
                  <div class="col-md-9"> : <b><?php echo $productreleaseviewrow['po_num']; ?></b></div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-3">Lot Number
                  </div>
                  <div class="col-md-9"> : <b><?php echo $productreleaseviewrow['lot_num']; ?></b></div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-3">Product Code
                  </div>
                  <div class="col-md-9"> : <b><?php echo $productreleaseviewrow['item_num']; ?></b></div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-3">Rev. Number
                  </div>
                  <div class="col-md-9"> : <b><?php echo $productreleaseviewrow['rev_num']; ?></b></div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-3">Serving Size
                  </div>
                  <div class="col-md-9"> : <b><?php echo $productreleaseviewrow['serving_size']; ?></b></div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-3">Serving Per Container
                  </div>
                  <div class="col-md-9"> : <b><?php echo $productreleaseviewrow['serving_per']; ?></b></div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-3">Status
                  </div>
                  <div class="col-md-9"> : <span style="color: <?php if ($productreleaseviewrow['status'] == "Ongoing") { echo "gray"; }elseif($productreleaseviewrow['status'] == "For Review") { echo "blue"; } elseif ($productreleaseviewrow['status'] == "Approved") { echo "green"; }?> ;"><b><?php echo $productreleaseviewrow['status']; ?></b></span></div>
              </div>
              <hr>
                  <div style="padding-top: 10px; padding-bottom: 10px;">
                    <div class="row" style="padding-top: 2px;padding-bottom: 2px;">
                      <div class="col-md-3 text-center"><b>Physical Testing</b></div>
                      <div class="col-md-3 text-center"><b>Specification</b></div>
                      <div class="col-md-3 text-center"><b>Method</b></div>
                      <div class="col-md-3 text-center"><b>Results</b></div>
                    </div>
                    <?php 
                    $viewphysicaltest = explode("|", $productreleaseviewrow['physicaltest']);
                    $viewphysicaltestarraylength = count($viewphysicaltest);
                    $viewphysicalspecification = explode("|", $productreleaseviewrow['physicalspecification']);
                    $viewphysicalspecificationarraylength = count($viewphysicalspecification);
                    $viewphysicalmethod = explode("|", $productreleaseviewrow['physicalmethod']);
                    $viewphysicalmethodarraylength = count($viewphysicalmethod);
                    $viewphysicalresults = explode("|", $productreleaseviewrow['physicalresults']);
                    $viewphysicalresultsarraylength = count($viewphysicalresults);

                      for ($viewphysical = 0; $viewphysical < $viewphysicaltestarraylength || $viewphysical < $viewphysicalspecificationarraylength || $viewphysical < $viewphysicalmethodarraylength || $viewphysical < $viewphysicalresultsarraylength; $viewphysical++) 
                      { 
                        ?>
                      <div class="row" style="padding-top: 2px;padding-bottom: 2px;">
                        <div class="col-md-3"><?php echo $viewphysicaltest[$viewphysical]; ?></div>
                        <div class="col-md-3 text-center"><?php echo $viewphysicalspecification[$viewphysical]; ?></div>
                        <div class="col-md-3 text-center"><?php echo $viewphysicalmethod[$viewphysical]; ?></div>
                        <div class="col-md-3 text-center"><?php echo $viewphysicalresults[$viewphysical]; ?></div>
                      </div>
                        <?php
                      }
                    
                       ?>
                  </div>
            <div class="row" style="padding-top: 10px; padding-bottom: 10px;">
              <div class="col-md-12">
                <ul style="list-style-type: disc; padding-left: 20px;" >
                  <li style="padding-top: 2px;padding-bottom: 2px"><input type="text" name="" disabled style="background: green; border-color: green;">&nbsp&nbsp&nbspMinimum Values</li>
                  <li style="padding-top: 2px;padding-bottom: 2px"><input type="text" name="" disabled style="background: yellow; border-color: yellow;">&nbsp&nbsp&nbspMiddle Values</li>
                  <li style="padding-top: 2px;padding-bottom: 2px"><input type="text" name="" disabled style="background: red; border-color: red;">&nbsp&nbsp&nbspAbove Max Values</li>
                  <li style="padding-top: 2px;padding-bottom: 2px"><input type="text" name="" disabled style="background: gray; border-color: gray;">&nbsp&nbsp&nbspNo Max Level Yet</li>
                  <li style="padding-top: 2px;padding-bottom: 2px"><input type="text" name="" disabled style="background: white; border-color: black;">&nbsp&nbsp&nbspNo Value/Pending</li>
                  <li style="padding-top: 2px;padding-bottom: 2px">Min. value - NLT (based on COA Specs)</li>
                </ul>
              </div>
            </div>

                  <div style="padding-top: 10px; padding-bottom: 10px;">
                    <div class="row" style="padding-top: 2px;padding-bottom: 2px;">
                      <div class="col-md-5 text-center"><b>Chemical Testing/Manufacture Input per Serving:</b></div>
                      <div class="col-md-1"><b>Unit</b></div>
                      <div class="col-md-1"><b>min</b></div>
                      <div class="col-md-1"><b>max</b></div>
                      <div class="col-md-2 text-center"><b>Results</b></div>
                      <!-- <div class="col-md-2 text-center"><b>Results</b></div> -->
                    </div>
                    <?php 
                      $viewchemicaltest = explode("|", $productreleaseviewrow['chemicaltest']);
                      $viewchemicaltestarraylength = count($viewchemicaltest);
                      $viewchemicalunit = explode("|", $productreleaseviewrow['chemicalunit']);
                      $viewchemicalunitarraylength = count($viewchemicalunit);
                      $viewchemicalmin = explode("|", $productreleaseviewrow['chemicalmin']);
                      $viewchemicalminarraylength = count($viewchemicalmin);
                      $viewchemicalmax = explode("|", $productreleaseviewrow['chemicalmax']);
                      $viewchemicalmaxarraylength = count($viewchemicalmax);
                      $viewchemicalinput = explode("|", $productreleaseviewrow['chemicalinput']);
                      $viewchemicalinputarraylength = count($viewchemicalinput);

                      for ($viewchemical = 0; $viewchemical < $viewchemicaltestarraylength || $viewchemical < $viewchemicalunitarraylength || $viewchemical < $viewchemicalminarraylength || $viewchemical < $viewchemicalmaxarraylength || $viewchemical < $viewchemicalinputarraylength; $viewchemical++) 
                      { 
                        ?>
                    <div class="row" style="padding-top: 2px;padding-bottom: 2px;">
                      <div class="col-md-5"><?php echo $viewchemicaltest[$viewchemical]; ?></div>
                      <div class="col-md-1"><?php echo $viewchemicalunit[$viewchemical]; ?></div>
                      <div class="col-md-1"><?php echo $viewchemicalmin[$viewchemical]; ?></div>
                      <div class="col-md-1"><?php echo $viewchemicalmax[$viewchemical]; ?></div>
                      <div class="col-md-2 text-center"><?php echo $viewchemicalinput[$viewchemical]; ?></div>
                      <div class="col-md-2">
                        <?php 
                        if (empty($viewchemicalinput[$viewchemical])) {
                          ?>
                          <input type="text" name="" disabled class="form-control" style="outline: none; background:white;">
                          <?php
                        }
                        else
                        {
                         ?>
                        <input type="text" name="" disabled class="form-control" style="outline: none; background: <?php 
                        if ($viewchemicalinput[$viewchemical] == 0 || $viewchemicalinput[$viewchemical] == "") {
                          echo "white";
                        } elseif ($viewchemicalinput[$viewchemical] <= $viewchemicalmin[$viewchemical]) {
                          echo "green";
                        } elseif ($viewchemicalinput[$viewchemical] >= $viewchemicalmax[$viewchemical]) {
                          echo "red";
                        } elseif ($viewchemicalinput[$viewchemical] > $viewchemicalmin[$viewchemical]) {
                          echo "yellow";
                        }
                         ?> ;">
                       <?php } ?>
                      </div>
                    </div>
                        <?php
                      }
                       ?>
                  </div>
                    
                  <div style="padding-top: 10px; padding-bottom: 10px;">
                    <div class="row" style="padding-top: 2px;padding-bottom: 2px;">
                      <div class="col-md-5"><b>Heavy Metal Testing</b></div>
                      <div class="col-md-3"><b>µg</b></div>
                      <div class="col-md-4 text-center"><b>Results</b></div>
                    </div>
                    <?php 
                    $viewheavymetaltest = explode("|", $productreleaseviewrow['heavymetaltest']);
                    $viewheavymetaltestarraylength = count($viewheavymetaltest);

                    $viewheavymetalug = explode("|", $productreleaseviewrow['heavymetalug']);
                    $viewheavymetalugarraylength = count($viewheavymetalug);

                    $viewheavymetalinput = explode("|", $productreleaseviewrow['heavymetalinput']);
                    $viewheavymetalinputarraylength = count($viewheavymetalinput);

                    for ($viewheavymetal = 0; $viewheavymetal < $viewheavymetaltestarraylength || $viewheavymetal < $viewheavymetalugarraylength || $viewheavymetal < $viewheavymetalinputarraylength; $viewheavymetal++) 
                      { 
                        ?>
                    <div class="row" style="padding-top: 2px;padding-bottom: 2px;">
                      <div class="col-md-5"><?php echo $viewheavymetaltest[$viewheavymetal]; ?></div>
                      <div class="col-md-3"><?php echo $viewheavymetalug[$viewheavymetal]; ?></div>
                      <div class="col-md-4 text-center"><?php echo $viewheavymetalinput[$viewheavymetal]; ?></div>
                    </div>
                        <?php
                      }
                    
                       ?>
                  </div>

                  <div style="padding-top: 10px; padding-bottom: 10px;">
                    <div class="row" style="padding-top: 2px;padding-bottom: 2px;">
                      <div class="col-md-5"><b>Microbiological Testing</b></div>
                      <div class="col-md-3"><b>cfu/g</b></div>
                      <div class="col-md-4 text-center"><b>Results</b></div>
                    </div>
                    <?php 
                    $viewmicrobiologicaltest = explode("|", $productreleaseviewrow['microbiologicaltest']);
                    $viewmicrobiologicaltestarraylength = count($viewmicrobiologicaltest);

                    $viewmicrobiologicalcfu = explode("|", $productreleaseviewrow['microbiologicalcfu']);
                    $viewmicrobiologicalcfuarraylength = count($viewmicrobiologicalcfu);

                    $viewmicrobiologicalinput = explode("|", $productreleaseviewrow['microbiologicalinput']);
                    $viewmicrobiologicalinputarraylength = count($viewmicrobiologicalinput);
                  

                    for ($viewmicrobiological = 0; $viewmicrobiological < $viewmicrobiologicaltestarraylength || $viewmicrobiological < $viewmicrobiologicalcfuarraylength || $viewmicrobiological < $viewmicrobiologicalinputarraylength; $viewmicrobiological++) 
                      { 
                        ?>
                    <div class="row" style="padding-top: 2px;padding-bottom: 2px;">
                      <div class="col-md-5"><?php echo $viewmicrobiologicaltest[$viewmicrobiological]; ?></div>
                      <div class="col-md-3"><?php echo $viewmicrobiologicalcfu[$viewmicrobiological]; ?></div>
                      <div class="col-md-4 text-center"><?php echo $viewmicrobiologicalinput[$viewmicrobiological]; ?></div>
                    </div>
                        <?php
                      }
                       ?>
                  </div>

                  <div class="row" style="padding-top: 2px;padding-bottom: 2px;">
                    <div class="col-md-12 text-center"><h4>Document Review</h4></div>
                  </div>
                  <div style="padding-top: 10px; padding-bottom: 10px;">
                    <div class="row" style="padding-top: 2px;padding-bottom: 2px;">
                      <div class="col-md-4 text-center">COA</div>
                      <div class="col-md-4 text-center">Batch Record</div>
                      <div class="col-md-4 text-center">FTIR</div>
                    </div>
                    <div class="row" style="padding-top: 2px;padding-bottom: 2px;">
                      <div style="color:<?php if ($productreleaseviewrow['coa'] == "Submitted") { echo "green"; } else { echo "gray"; } ?>;" class="col-md-4 text-center">
                          <?php echo $productreleaseviewrow['coa']; ?>
                        </div>
                        <div style="color:<?php if ($productreleaseviewrow['batchrecord'] == "Submitted") { echo "green"; } else { echo "gray"; } ?>;" class="col-md-4 text-center">
                          <?php echo $productreleaseviewrow['batchrecord']; ?>
                        </div>
                        <div style="color:<?php if ($productreleaseviewrow['ftir'] == "Submitted") { echo "green"; } else { echo "gray"; } ?>;" class="col-md-4 text-center">
                          <?php echo $productreleaseviewrow['ftir']; ?>
                        </div>
                    </div>
                  </div>
                  <hr>
                  <?php
                    $viewpreparedname = explode("|", $productreleaseviewrow['preparedname']);
                    $viewpreparednamearraylength = count($viewpreparedname);
                    $viewprepareddescription = explode("|", $productreleaseviewrow['prepareddescription']);
                    $viewprepareddescriptionarraylength = count($viewprepareddescription);
                    $viewreviewedname = explode("|", $productreleaseviewrow['reviewedname']);
                    $viewreviewednamearraylength = count($viewreviewedname);
                    $viewrevieweddescription = explode("|", $productreleaseviewrow['revieweddescription']);
                    $viewrevieweddescriptionarraylength = count($viewrevieweddescription);
                    $viewapprovedname = explode("|", $productreleaseviewrow['approvedname']);
                    $viewapprovednamearraylength = count($viewapprovedname);
                    $viewapproveddescription = explode("|", $productreleaseviewrow['approveddescription']);
                    $viewapproveddescriptionarraylength = count($viewapproveddescription);
                    $viewauthorizedname = explode("|", $productreleaseviewrow['authorizedname']);
                    $viewauthorizednamearraylength = count($viewauthorizedname);
                    $viewauthorizeddescription = explode("|", $productreleaseviewrow['authorizeddescription']);
                    $viewauthorizeddescriptionarraylength = count($viewauthorizeddescription);

                   ?>
                  <div class="row" style="padding-top: 10px; padding-bottom: 10px;">
                    <div class="col-md-6">
                      <b>Prepared by :</b>
                      <div class="row">
                        <div class="col-md-6">Name</div>
                        <div class="col-md-6">Description</div>
                      </div>
                      <?php 
                      for ($viewprepared = 0; $viewprepared < $viewpreparednamearraylength || $viewprepared < $viewprepareddescriptionarraylength; $viewprepared++) 
                      { 
                        ?>
                        <div class="row" style="padding-top: 5px; padding-bottom: 5px;">
                          <div class="col-md-6"><?php if (empty($viewpreparedname[$viewprepared])) {
                            echo ""; } else { echo $viewpreparedname[$viewprepared]; } ?></div>
                          <div class="col-md-6"><?php if (empty($viewprepareddescription[$viewprepared])) {
                            echo ""; } else { echo $viewprepareddescription[$viewprepared]; } ?></div>
                        </div>
                        <?php
                      }
                       ?>
                    </div>
                    <div class="col-md-6">
                      <b>Reviewed by :</b>
                      <div class="row">
                        <div class="col-md-6">Name</div>
                        <div class="col-md-6">Description</div>
                      </div>
                      <?php 
                      for ($viewreviewed = 0; $viewreviewed < $viewreviewednamearraylength || $viewreviewed < $viewrevieweddescriptionarraylength; $viewreviewed++) { 
                        ?>
                        <div class="row" style="padding-top: 5px; padding-bottom: 5px;">
                          <div class="col-md-6"><?php if (empty($viewreviewedname[$viewreviewed])) {
                            echo ""; } else { echo $viewreviewedname[$viewreviewed]; } ?></div>
                          <div class="col-md-6"><?php if (empty($viewrevieweddescription[$viewreviewed])) {
                            echo ""; } else { echo $viewrevieweddescription[$viewreviewed]; } ?></div>
                        </div>
                        <?php
                        }
                       ?>
                    </div>
                  </div>
                  <div class="row" style="padding-top: 10px; padding-bottom: 10px;">
                    <div class="col-md-6">
                      <b>Approved by :</b>
                      <div class="row">
                        <div class="col-md-6">Name</div>
                        <div class="col-md-6">Description</div>
                      </div>
                      <?php 
                      for ($viewapproved = 0; $viewapproved < $viewapprovednamearraylength || $viewapproved < $viewapproveddescriptionarraylength; $viewapproved++) { 
                        ?>
                        <div class="row" style="padding-top: 5px; padding-bottom: 5px;">
                          <div class="col-md-6"><?php if (empty($viewapprovedname[$viewapproved])) {
                            echo ""; } else { echo $viewapprovedname[$viewapproved]; } ?></div>
                          <div class="col-md-6"><?php if (empty($viewapproveddescription[$viewapproved])) {
                            echo ""; } else { echo $viewapproveddescription[$viewapproved]; } ?></div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="col-md-6">
                      <b>Authorized by :</b>
                      <div class="row">
                        <div class="col-md-6">Name</div>
                        <div class="col-md-6">Description</div>
                      </div>
                      <?php 
                      for ($viewauthorized = 0; $viewauthorized < $viewauthorizednamearraylength || $viewauthorized < $viewauthorizeddescriptionarraylength; $viewauthorized++) {
                      ?>
                      <div class="row" style="padding-top: 5px; padding-bottom: 5px;">
                        <div class="col-md-6"><?php if (empty($viewauthorizedname[$viewauthorized])) {
                          echo ""; } else { echo $viewauthorizedname[$viewauthorized]; } ?></div>
                        <div class="col-md-6"><?php if (empty($viewauthorizeddescription[$viewauthorized])) {
                          echo "";  } else { echo $viewauthorizeddescription[$viewauthorized]; } ?></div>
                      </div>
                      <?php 
                        }
                        ?>
                    </div>
                  </div>

            <div class="row" style="padding-top: 10px; padding-bottom: 10px;">
              <div class="col-md-12">
                History Change Log and Comment :
                <textarea class="form-control" name="addcomment" style="height: 150px;" disabled placeholder="No History Change Log and Comment"><?php echo $productreleaseviewrow['comment']; ?></textarea>
              </div>
            </div>
         </div>
            <div class="row">
              <div class="col-md-6"><a href="viewnewtab.php?generate=<?php echo($productreleaseviewrow['id']) ?>" target="_blank" name="generatetable" style="font-size: 17px;" class="btn btn-primary form-control">View Table in New Tab</a></div>
              <div class="col-md-6"><a href="generated-productrelease.php?generate=<?php echo($productreleaseviewrow['id']) ?>" target="_blank" name="generate" style="font-size: 17px;" class="btn btn-success form-control">Generate Product Release Statement</a></div>
            </div>
            </div>
        </div>
      </div>
    </div>
</div>
<?php } ?>
<!-- View Modal End -->



<!-- Edit Modal Start -->
<?php for ($k=0;$productreleaseeditrow = $productreleaseedit->fetch_assoc(); $k++) { ?>
<div class="modal fade" id="editproduct<?php echo($k) ?>">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="container">
          <div class="content">
            <form method="post" autocomplete="off">
              <div class="modal-header">
                  <h4 class="modal-title" id="viewproductTitle">Edit <?php echo $productreleaseeditrow['product_name']; ?></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <!-- Modal Content -->
                <input type="hidden" name="editid" value="<?php echo($productreleaseeditrow['id']) ?>">
                <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                  <div class="col-md-12">
                    Product Name
                    <input type="text" name="editproductname" class="form-control" required value="<?php echo ($productreleaseeditrow['product_name']) ?>">
                  </div>
                </div>

                <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                  <div class="col-md-6">
                    Customer Name
                    <input type="text" name="editcustomername" class="form-control" required value="<?php echo ($productreleaseeditrow['customer_name']) ?>">
                  </div>
                  <div class="col-md-6">
                  Account
                  <select name="editaccount" class="form-control" required>
                    <option value="">-- Select Account --</option>
                  <?php 
                  for ($random = 0; $random < $assignaccountmax; $random++) { 
                    ?>
                    <option <?php if ($productreleaseeditrow['account'] == $assignaccount[$random]) { echo 'selected="selected"'; } ?> value="<?php echo($assignaccount[$random]) ?>"><?php echo $assignaccount[$random]; ?></option>
                    <?php
                  } ?>
                  </select>
                </div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-6">
                  Created by
                  <input type="text" name="editcreatedby" class="form-control" required value="<?php echo ($productreleaseeditrow['created_by']) ?>">
                </div>
                <div class="col-md-6">
                  Assign Review
                  <select name="editassignto" class="form-control" required>
                    <?php 
                    for ($random = 0; $random < $assignpersonmax; $random++) { 
                      ?>
                      <option <?php if ($productreleaseeditrow['assign_to'] == $assignperson[$random]) { echo 'selected="selected"'; } ?> value="<?php echo($assignperson[$random]) ?>"><?php echo $assignperson[$random]; ?></option>
                      <?php
                    }
                     ?>
                  </select>
                </div>
              </div>

              <!-- <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                  <div class="col-md-12">
                    Customer Name
                    <input type="text" name="editcustomername" class="form-control" required value="<?php echo ($productreleaseeditrow['customer_name']) ?>">
                  </div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-6">
                  Assign Review
                  <select name="editassignto" class="form-control" required>
                    <?php 
                    for ($random = 0; $random < $assignpersonmax; $random++) { 
                      ?>
                      <option <?php if ($productreleaseeditrow['assign_to'] == $assignperson[$random]) { echo 'selected="selected"'; } ?> value="<?php echo($assignperson[$random]) ?>"><?php echo $assignperson[$random]; ?></option>
                      <?php
                    }
                     ?>
                  </select>
                </div>
                <div class="col-md-6">
                  Account
                  <select name="editaccount" class="form-control" required>
                    <option value="">-- Select Account --</option>
                  <?php 
                  for ($random = 0; $random < $assignaccountmax; $random++) { 
                    ?>
                    <option <?php if ($productreleaseeditrow['account'] == $assignaccount[$random]) { echo 'selected="selected"'; } ?> value="<?php echo($assignaccount[$random]) ?>"><?php echo $assignaccount[$random]; ?></option>
                    <?php
                  } ?>
                  </select>
                </div>
              </div> -->
              
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-6">
                  Manufacture Date
                  <input type="date" name="editmanufacturedate" class="form-control" required value="<?php echo ($productreleaseeditrow['manufacture_date']) ?>">
                </div>
                <div class="col-md-6">
                  Expiration Date
                  <input type="date" name="editexpirationdate" class="form-control" required value="<?php echo ($productreleaseeditrow['expiration_date']) ?>">
                </div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-4">
                  Manufactured Quantity
                  <input type="text" name="editmanufacturedquan" class="form-control" required value="<?php echo ($productreleaseeditrow['manufactured_quantity']) ?>">
                </div>
                <div class="col-md-4">
                  Control Number
                  <input type="text" name="editcontrolnum" class="form-control" required value="<?php echo ($productreleaseeditrow['control_num']) ?>">
                </div>
                <div class="col-md-4">
                  PO #
                  <input type="text" name="editponum" class="form-control" required value="<?php echo ($productreleaseeditrow['po_num']) ?>">
                </div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-4">
                  Lot Number
                  <input type="text" name="editlotnum" class="form-control" required value="<?php echo ($productreleaseeditrow['lot_num']) ?>">
                </div>
                <div class="col-md-4">
                  Product Code
                  <input type="text" name="edititemnum" class="form-control" required value="<?php echo ($productreleaseeditrow['item_num']) ?>">
                </div>
                <div class="col-md-4">
                  Rev. Number
                  <input type="text" name="editrevnum" class="form-control" required value="<?php echo ($productreleaseeditrow['rev_num']) ?>">
                </div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-4">
                  Serving Size
                  <input type="text" name="editservingsize" class="form-control" required value="<?php echo ($productreleaseeditrow['serving_size']) ?>">
                </div>
                <div class="col-md-4">
                  Serving Per Container
                  <input type="text" name="editservingpercontainer" class="form-control" required value="<?php echo ($productreleaseeditrow['serving_per']) ?>">
                </div>
                <div class="col-md-4">
                  Status
                  <select name="editstatus" class="form-control" required>
                      <option  <?php  if($productreleaseeditrow['status'] == 'Ongoing') { echo 'selected="selected"'; } ?> value="Ongoing">Ongoing</option>
                        <option  <?php  if($productreleaseeditrow['status'] == 'For Review') { echo 'selected="selected"'; } ?> value="For Review">For Review</option>
                        <?php 
                        if($productreleaseeditrow['status'] == 'Approved') { ?>
                          <option  selected="selected" value="Approved">Approved</option>
                      <?php }
                         ?>
                    </select>
                </div>
              </div>
              <hr>
                <?php 
                    $editphysicaltest = explode("|", $productreleaseeditrow['physicaltest']);
                    $editphysicaltestarraylength = count($editphysicaltest);
                    $editphysicalspecification = explode("|", $productreleaseeditrow['physicalspecification']);
                    $editphysicalspecificationarraylength = count($editphysicalspecification);
                    $editphysicalmethod = explode("|", $productreleaseeditrow['physicalmethod']);
                    $editphysicalmethodarraylength = count($editphysicalmethod);
                    $editphysicalresults = explode("|", $productreleaseeditrow['physicalresults']);
                    $editphysicalresultsarraylength = count($editphysicalresults);
                    $editphysicaltestingmax = max($editphysicaltestarraylength,$editphysicalspecificationarraylength,$editphysicalmethodarraylength,$editphysicalresultsarraylength);

                 ?>
                  <div class="row" style="padding-top: 10px; padding-bottom: 10px;">
                    <div class="col-md-12 d-flex justify-content-between">
                      <div>
                      <!-- <input type="number" disabled value="<?php echo($editphysicaltestingmax) ?>" class="text-center" id="editphysicaltestingcount<?php echo($k) ?>" style="width: 40px;"> -->
                      <a href="javascript:void(<?php echo($k) ?>);" class="addeditphysicaltestingButton btn btn-success" style="font-size:17px;padding-left: 3px; padding-right: 3px;">
                        &nbsp<i class="fa fa-plus mr-2"></i>
                        Add Physical Testing&nbsp&nbsp
                      </a>
                      </div>
                    </div>
                  </div>
                  <div class="editphysicaltesting" style="padding-top: 10px; padding-bottom: 2px;">
                    <div class="row" style="padding-top: 2px;padding-bottom: 2px;">
                      <div class="col-md-3 text-center"><b>Physical Testing</b></div>
                      <div class="col-md-3 text-center"><b>Specification</b></div>
                      <div class="col-md-3 text-center"><b>Method</b></div>
                      <div class="col-md-2 text-center"><b>Results</b></div>
                    </div>
                    <?php 

                      for ($editphysical = 0; $editphysical < $editphysicaltestarraylength || $editphysical < $editphysicalspecificationarraylength || $editphysical < $editphysicalmethodarraylength || $editphysical < $editphysicalresultsarraylength; $editphysical++) 
                      { 
                        ?>
                      <div class="row" style="padding-top: 2px;padding-bottom: 2px;">
                        <div class="col-md-3"><input type="text" name="editphysicaltest[]" class="form-control" value="<?php echo($editphysicaltest[$editphysical]) ?>"></div>
                        <div class="col-md-3"><input type="text" name="editphysicalspecification[]"  class="form-control" value="<?php echo($editphysicalspecification[$editphysical]) ?>"></div>
                        <div class="col-md-3"><input type="text" name="editphysicalmethod[]"  class="form-control" value="<?php echo($editphysicalmethod[$editphysical]) ?>"></div>
                        <div class="col-md-2"><input type="text" name="editphysicalresults[]"  class="form-control" value="<?php echo($editphysicalresults[$editphysical]) ?>"></div>
                        <div class="col-md-1">
                        <a href="javascript:void(0);" class="removeeditphysicaltestingButton" style="padding-left: 3px; padding-right: 3px;"><i class="fa fa-minus text-danger"></i></a>
                      </div>
                      </div>
                        <?php
                      }
                       ?>
                  </div>
                  <?php 
                      $editchemicaltest = explode("|", $productreleaseeditrow['chemicaltest']);
                      $editchemicaltestarraylength = count($editchemicaltest);
                      $editchemicalunit = explode("|", $productreleaseeditrow['chemicalunit']);
                      $editchemicalunitarraylength = count($editchemicalunit);
                      $editchemicalmin = explode("|", $productreleaseeditrow['chemicalmin']);
                      $editchemicalminarraylength = count($editchemicalmin);
                      $editchemicalmax = explode("|", $productreleaseeditrow['chemicalmax']);
                      $editchemicalmaxarraylength = count($editchemicalmax);
                      $editchemicalinput = explode("|", $productreleaseeditrow['chemicalinput']);
                      $editchemicalinputarraylength = count($editchemicalinput);
                      $editchemicaltestingmax = max($editchemicaltestarraylength,$editchemicalunitarraylength,$editchemicalminarraylength,$editchemicalmaxarraylength,$editchemicalinputarraylength);
                   ?>
                  <div class="row" style="padding-top: 10px; padding-bottom: 10px;">
                    <div class="col-md-12 d-flex justify-content-between">
                      <div>
                        <!-- <input type="number" disabled value="<?php echo($editchemicaltestingmax) ?>" class="text-center" id="editchemicaltestingcount<?php echo($k) ?>" style="width: 40px;"> -->
                        <a href="javascript:void(<?php echo($k) ?>);" class="addeditchemicaltestingButton btn btn-success" style="font-size:17px;padding-left: 3px; padding-right: 3px;">
                        &nbsp<i class="fa fa-plus mr-2"></i>
                        Add Chemical Testing&nbsp&nbsp
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="editchemicaltesting" style="padding-top: 10px; padding-bottom: 2px;">
                    <div class="row" style="padding-top: 2px;padding-bottom: 2px;">
                      <div class="col-md-6 text-center"><b>Chemical Testing/Manufacture Input per Serving:</b></div>
                      <div class="col-md-1"><b>Unit</b></div>
                      <div class="col-md-1"><b>min</b></div>
                      <div class="col-md-1"><b>max</b></div>
                      <div class="col-md-2 text-center"><b>Results</b></div>
                    </div>

                    <?php 


                      for ($editchemical = 0; $editchemical < $editchemicaltestarraylength || $editchemical < $editchemicalunitarraylength || $editchemical < $editchemicalminarraylength || $editchemical < $editchemicalmaxarraylength || $editchemical < $editchemicalinputarraylength; $editchemical++) 
                      { 
                        ?>
                    <div class="row" style="padding-top: 2px;padding-bottom: 2px;">
                      <div class="col-md-6"><input class="form-control"  type="text" name="editchemicaltest[]" value="<?php echo($editchemicaltest[$editchemical]) ?>"></div>
                      <div class="col-md-1"><input class="form-control"  type="text" name="editchemicalunit[]" value="<?php echo($editchemicalunit[$editchemical]) ?>"></div>
                      <div class="col-md-1"><input class="form-control"  type="text" name="editchemicalmin[]" value="<?php echo($editchemicalmin[$editchemical]) ?>"></div>
                      <div class="col-md-1"><input class="form-control"  type="text" name="editchemicalmax[]" value="<?php echo($editchemicalmax[$editchemical]) ?>"></div>
                      <div class="col-md-2"><input class="form-control"  type="text" name="editchemicalinput[]" value="<?php echo($editchemicalinput[$editchemical]) ?>"></div>
                      <div class="col-md-1">
                        <a href="javascript:void(0);" class="removeeditchemicaltestingButton" style="padding-left: 3px; padding-right: 3px;"><i class="fa fa-minus text-danger"></i></a>
                      </div>
                    </div>
                        <?php
                      }
                       ?>
                  </div>
                  <?php 
                    $editheavymetaltest = explode("|", $productreleaseeditrow['heavymetaltest']);
                    $editheavymetaltestarraylength = count($editheavymetaltest);
                    $editheavymetalug = explode("|", $productreleaseeditrow['heavymetalug']);
                    $editheavymetalugarraylength = count($editheavymetalug);
                    $editheavymetalinput = explode("|", $productreleaseeditrow['heavymetalinput']);
                    $editheavymetalinputarraylength = count($editheavymetalinput);
                    $editheavymetaltestingmax = max($editheavymetaltestarraylength,$editheavymetalugarraylength,$editheavymetalinputarraylength);
                   ?>
                  <div class="row" style="padding-top: 10px; padding-bottom: 10px;">
                    <div class="col-md-12 d-flex justify-content-between">
                      <div>
                      <!-- <input type="number" disabled value="<?php echo($editheavymetaltestingmax) ?>" class="text-center" id="editheavymetaltestingcount<?php echo($k) ?>" style="width: 40px;"> -->
                      <a href="javascript:void(<?php echo($k) ?>);" class="addeditheavymetaltestingButton btn btn-success" style="font-size:17px;padding-left: 3px; padding-right: 3px;">
                        &nbsp<i class="fa fa-plus mr-2"></i>
                        Add Heavy Metal Testing&nbsp&nbsp
                      </a>
                      </div>
                    </div>
                  </div>
                  <div class="editheavymetaltesting" style="padding-top: 10px; padding-bottom: 2px;">
                    <div class="row" style="padding-top: 2px;padding-bottom: 2px;">
                      <div class="col-md-5"><b>Heavy Metal Testing</b></div>
                      <div class="col-md-4"><b>µg</b></div>
                      <div class="col-md-2 text-center"><b>Results</b></div>
                    </div>
                    <?php

                    for ($editheavymetal = 0; $editheavymetal < $editheavymetaltestarraylength || $editheavymetal < $editheavymetalugarraylength || $editheavymetal < $editheavymetalinputarraylength; $editheavymetal++) 
                      { 
                        ?>
                    <div class="row" style="padding-top: 2px;padding-bottom: 2px;">
                      <div class="col-md-5"><input  class="form-control" type="text" name="editheavymetaltest[]" value="<?php echo($editheavymetaltest[$editheavymetal]) ?>"></div>
                      <div class="col-md-4"><input  class="form-control" type="text" name="editheavymetalug[]" value="<?php echo($editheavymetalug[$editheavymetal]) ?>"></div>
                      <div class="col-md-2"><input  class="form-control" type="text" name="editheavymetalinput[]" value="<?php echo($editheavymetalinput[$editheavymetal]) ?>"></div>
                      <div class="col-md-1">
                        <a href="javascript:void(0);" class="removeeditheavymetaltestingButton" style="padding-left: 3px; padding-right: 3px;"><i class="fa fa-minus text-danger"></i></a>
                      </div>
                    </div>
                        <?php
                      }
                       ?>
                  </div>
                  <?php 
                    $editmicrobiologicaltest = explode("|", $productreleaseeditrow['microbiologicaltest']);
                    $editmicrobiologicaltestarraylength = count($editmicrobiologicaltest);
                    $editmicrobiologicalcfu = explode("|", $productreleaseeditrow['microbiologicalcfu']);
                    $editmicrobiologicalcfuarraylength = count($editmicrobiologicalcfu);
                    $editmicrobiologicalinput = explode("|", $productreleaseeditrow['microbiologicalinput']);
                    $editmicrobiologicalinputarraylength = count($editmicrobiologicalinput);
                    $editmicrobiologicaltestingmax = max($editmicrobiologicaltestarraylength,$editmicrobiologicalcfuarraylength,$editmicrobiologicalinputarraylength);
                   ?>
                  <div class="row" style="padding-top: 10px; padding-bottom: 10px;">
                    <div class="col-md-12 d-flex justify-content-between">
                      <div>  
                      <!-- <input type="number" disabled value="<?php echo($editmicrobiologicaltestingmax) ?>" class="text-center" id="editmicrobiologicaltestingcount<?php echo($k) ?>" style="width: 40px;"> -->
                      <a href="javascript:void(<?php echo($k) ?>);" class="addeditmicrobiologicaltestingButton btn btn-success" style="font-size:17px;padding-left: 3px; padding-right: 3px;">
                        &nbsp<i class="fa fa-plus mr-2"></i>
                        Add Microbiological Testing&nbsp&nbsp
                      </a>
                      </div>
                    </div>
                  </div>
                  <div class="editmicrobiologicaltesting" style="padding-top: 10px; padding-bottom: 2px;">
                    <div class="row" style="padding-top: 2px;padding-bottom: 2px;">
                      <div class="col-md-5"><b>Microbiological Testing</b></div>
                      <div class="col-md-4"><b>cfu/g</b></div>
                      <div class="col-md-2 text-center"><b>Results</b></div>
                    </div>
                    <?php 

                    for ($editmicrobiological = 0; $editmicrobiological < $editmicrobiologicaltestarraylength || $editmicrobiological < $editmicrobiologicalcfuarraylength || $editmicrobiological < $editmicrobiologicalinputarraylength; $editmicrobiological++) 
                      { 
                        ?>
                    <div class="row" style="padding-top: 2px;padding-bottom: 2px;">
                      <div class="col-md-5"><input  class="form-control" type="text" name="editmicrobiologicaltest[]" value="<?php echo($editmicrobiologicaltest[$editmicrobiological]) ?>"></div>
                      <div class="col-md-4"><input  class="form-control" type="text" name="editmicrobiologicalcfu[]" value="<?php echo($editmicrobiologicalcfu[$editmicrobiological]) ?>"></div>
                      <div class="col-md-2"><input  class="form-control" type="text" name="editmicrobiologicalinput[]" value="<?php echo($editmicrobiologicalinput[$editmicrobiological]) ?>"></div>
                      <div class="col-md-1">
                        <a href="javascript:void(0);" class="removeeditmicrobiologicaltestingButton" style="padding-left: 3px; padding-right: 3px;"><i class="fa fa-minus text-danger"></i></a>
                      </div>
                    </div>
                        <?php
                      } ?>
                  </div>
                  <div class="row" style="padding-top: 10px; padding-bottom: 10px;">
                    <div class="col-md-12 text-center"><h4>Document Review</h4></div>
                    <div class="col-md-4 text-center">
                      COA 
                      <select name="editcoa" class="form-control" required>
                          <option  <?php  if($productreleaseeditrow['coa'] == 'Not Submitted') { echo 'selected="selected"'; } ?> value="Not Submitted">Not Submitted</option>
                          <option  <?php  if($productreleaseeditrow['coa'] == 'Submitted') { echo 'selected="selected"'; } ?> value="Submitted">Submitted</option>
                      </select>
                    </div>
                    <div class="col-md-4 text-center">
                      Batch Record
                      <select name="editbatchrecord" class="form-control" required>
                          <option  <?php  if($productreleaseeditrow['batchrecord'] == 'Not Submitted') { echo 'selected="selected"'; } ?> value="Not Submitted">Not Submitted</option>
                          <option  <?php  if($productreleaseeditrow['batchrecord'] == 'Submitted') { echo 'selected="selected"'; } ?> value="Submitted">Submitted</option>
                      </select>
                    </div>
                    <div class="col-md-4 text-center">
                      FTIR
                      <select name="editftir" class="form-control" required>
                          <option  <?php  if($productreleaseeditrow['ftir'] == 'Not Submitted') { echo 'selected="selected"'; } ?> value="Not Submitted">Not Submitted</option>
                          <option  <?php  if($productreleaseeditrow['ftir'] == 'Submitted') { echo 'selected="selected"'; } ?> value="Submitted">Submitted</option>
                      </select>
                    </div>
                  </div>
                  <?php 
                    $editpreparedname = explode("|", $productreleaseeditrow['preparedname']);
                    $editpreparednamearraylength = count($editpreparedname);

                    $editprepareddescription = explode("|", $productreleaseeditrow['prepareddescription']);
                    $editprepareddescriptionarraylength = count($editprepareddescription);

                    $editreviewedname = explode("|", $productreleaseeditrow['reviewedname']);
                    $editreviewednamearraylength = count($editreviewedname);

                    $editrevieweddescription = explode("|", $productreleaseeditrow['revieweddescription']);
                    $editrevieweddescriptionarraylength = count($editrevieweddescription);

                    $editapprovedname = explode("|", $productreleaseeditrow['approvedname']);
                    $editapprovednamearraylength = count($editapprovedname);

                    $editapproveddescription = explode("|", $productreleaseeditrow['approveddescription']);
                    $editapproveddescriptionarraylength = count($editapproveddescription);

                    $editauthorizedname = explode("|", $productreleaseeditrow['authorizedname']);
                    $editauthorizednamearraylength = count($editauthorizedname);

                    $editauthorizeddescription = explode("|", $productreleaseeditrow['authorizeddescription']);
                    $editauthorizeddescriptionarraylength = count($editauthorizeddescription);

                   ?>
                  <div class="row" style="padding-top: 10px; padding-bottom: 10px;">
                    <div class="col-md-6">
                      <b>Prepared by :</b>
                      <div class="editprepared">
                      <div class="row">
                        <div class="col-md-5">Name</div>
                        <div class="col-md-5">Description</div>
                      </div>
                      <div class="row">
                        <div class="col-md-5"><input type="text" name="editpreparedname[]" <?php if (empty($editpreparedname[0])) {  } else { echo "value=\"".$editpreparedname[0]."\""; } ?> class="form-control"></div>
                        <div class="col-md-6"><input type="text" name="editprepareddescription[]" <?php if (empty($editprepareddescription[0])) {  } else { echo "value=\"".$editprepareddescription[0]."\""; } ?> class="form-control"></div>
                        <div class="col-md-1">
                          <a href="javascript:void(<?php echo($k) ?>);" class="addeditpreparedButton" style="padding-left: 3px; padding-right: 3px;">
                            <i class="fa fa-plus text-success"></i>
                          </a>
                        </div>
                      </div>
                      <?php 
                      for ($editprepared = 1; $editprepared < $editpreparednamearraylength || $editprepared < $editprepareddescriptionarraylength ; $editprepared++) { ?>
                      <div class="row" style="padding-top: 5px; padding-bottom: 5px;">
                        <div class="col-md-5">
                          <input type="text" name="editpreparedname[]" <?php if (empty($editpreparedname[$editprepared])) {  } else { echo "value=\"".$editpreparedname[$editprepared]."\""; } ?> class="form-control">
                        </div>
                        <div class="col-md-6">
                          <input type="text" name="editprepareddescription[]" <?php if (empty($editprepareddescription[$editprepared])) {  } else { echo "value=\"".$editprepareddescription[$editprepared]."\""; } ?> class="form-control">
                        </div>
                        <div class="col-md-1"><a href="javascript:void(<?php echo($k) ?>);" class="removeeditpreparedButton" style="padding-left: 3px; padding-right: 3px;"><i class="fa fa-minus text-danger"></i></a>
                        </div>
                      </div>
                    <?php } ?>
                      
                      </div>
                    </div>
                    <div class="col-md-6">
                      <b>Reviewed by :</b>
                      <div class="editreviewed">
                      <div class="row">
                        <div class="col-md-5">Name</div>
                        <div class="col-md-5">Description</div>
                      </div>
                      <div class="row">
                        <div class="col-md-5"><input type="text" name="editreviewedname[]" <?php if (empty($editreviewedname[0])) {  } else { echo "value=\"".$editreviewedname[0]."\""; } ?> class="form-control"></div>
                        <div class="col-md-6"><input type="text" name="editrevieweddescription[]" <?php if (empty($editrevieweddescription[0])) {  } else { echo "value=\"".$editrevieweddescription[0]."\""; } ?> class="form-control"></div>
                        <div class="col-md-1">
                          <a href="javascript:void(<?php echo($k) ?>);" class="addeditreviewedButton" style="padding-left: 3px; padding-right: 3px;">
                            <i class="fa fa-plus text-success"></i>
                          </a>
                        </div>
                      </div>
                      <?php 
                      for ($editreviewed = 1; $editreviewed < $editreviewednamearraylength || $editreviewed < $editrevieweddescriptionarraylength ; $editreviewed++) { ?>
                      <div class="row" style="padding-top: 5px; padding-bottom: 5px;">
                        <div class="col-md-5"><input type="text" name="editreviewedname[]" <?php if (empty($editreviewedname[$editreviewed])) {  } else { echo "value=\"".$editreviewedname[$editreviewed]."\""; } ?> class="form-control"></div>
                        <div class="col-md-6"><input type="text" name="editrevieweddescription[]" <?php if (empty($editrevieweddescription[$editreviewed])) {  } else { echo "value=\"".$editrevieweddescription[$editreviewed]."\""; } ?> class="form-control"></div>
                        <div class="col-md-1">
                          <a href="javascript:void(<?php echo($k) ?>);" class="removeeditreviewedButton" style="padding-left: 3px; padding-right: 3px;">
                            <i class="fa fa-minus text-danger"></i>
                          </a>
                        </div>
                      </div>
                    <?php } ?>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="padding-top: 10px; padding-bottom: 10px;">
                    <div class="col-md-6">
                      <b>Approved by :</b>
                      <div class="editapproved">
                      <div class="row">
                        <div class="col-md-5">Name</div>
                        <div class="col-md-5">Description</div>
                      </div>
                      <div class="row">
                        <div class="col-md-5"><input type="text" name="editapprovedname[]" <?php if (empty($editapprovedname[0])) {  } else { echo "value=\"".$editapprovedname[0]."\""; } ?> class="form-control"></div>
                        <div class="col-md-6"><input type="text" name="editapproveddescription[]" <?php if (empty($editapproveddescription[0])) {  } else { echo "value=\"".$editapproveddescription[0]."\""; } ?> class="form-control"></div>
                        <div class="col-md-1">
                          <a href="javascript:void(<?php echo($k) ?>);" class="addeditapprovedButton" style="padding-left: 3px; padding-right: 3px;">
                            <i class="fa fa-plus text-success"></i>
                          </a>
                        </div>
                      </div>
                      <?php 
                      for ($editapproved = 1; $editapproved < $editapprovednamearraylength || $editapproved < $editapproveddescriptionarraylength ; $editapproved++) { ?>
                      <div class="row" style="padding-top: 5px; padding-bottom: 5px;">
                        <div class="col-md-5"><input type="text" name="editapprovedname[]" <?php if (empty($editapprovedname[$editapproved])) {  } else { echo "value=\"".$editapprovedname[$editapproved]."\""; } ?> class="form-control"></div>
                        <div class="col-md-6"><input type="text" name="editapproveddescription[]" <?php if (empty($editapproveddescription[$editapproved])) {  } else { echo "value=\"".$editapproveddescription[$editapproved]."\""; } ?> class="form-control"></div>
                        <div class="col-md-1">
                          <a href="javascript:void(<?php echo($k) ?>);" class="removeeditapprovedButton" style="padding-left: 3px; padding-right: 3px;"><i class="fa fa-minus text-danger"></i></a>
                        </div>
                      </div>
                  <?php   } ?>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <b>Authorized by :</b>
                      <div class="editauthorized">
                      <div class="row">
                        <div class="col-md-5">Name</div>
                        <div class="col-md-5">Description</div>
                      </div>
                      <div class="row">
                        <div class="col-md-5"><input type="text" name="editauthorizedname[]" <?php if (empty($editauthorizedname[0])) {  } else { echo "value=\"".$editauthorizedname[0]."\""; } ?> class="form-control"></div>
                        <div class="col-md-6"><input type="text" name="editauthorizeddescription[]" <?php if (empty($editauthorizeddescription[0])) {  } else { echo "value=\"".$editauthorizeddescription[0]."\""; } ?> class="form-control"></div>
                        <div class="col-md-1">
                          <a href="javascript:void(<?php echo($k) ?>);" class="addeditauthorizedButton" style="padding-left: 3px; padding-right: 3px;">
                            <i class="fa fa-plus text-success"></i>
                          </a>
                        </div>
                      </div>
                      <?php 
                      for ($editauthorized = 1; $editauthorized < $editauthorizednamearraylength || $editauthorized < $editauthorizeddescriptionarraylength ; $editauthorized++) { ?>
                      <div class="row" style="padding-top: 5px; padding-bottom: 5px;">
                        <div class="col-md-5"><input type="text" name="editauthorizedname[]" <?php if (empty($editauthorizedname[$editauthorized])) {  } else { echo "value=\"".$editauthorizedname[$editauthorized]."\""; } ?> class="form-control"></div>
                        <div class="col-md-6"><input type="text" name="editauthorizeddescription[]" <?php if (empty($editauthorizeddescription[$editauthorized])) {  } else { echo "value=\"".$editauthorizeddescription[$editauthorized]."\""; } ?> class="form-control"></div>
                        <div class="col-md-1">
                          <a href="javascript:void(<?php echo($k) ?>);" class="removeeditauthorizedButton" style="padding-left: 3px; padding-right: 3px;"><i class="fa fa-minus text-danger"></i>
                          </a>
                        </div>
                      </div>    
                      <?php } ?>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="padding-top: 10px; padding-bottom: 10px;">
                    <div class="col-md-12">
                      Add Comment :
                      <textarea name="editcomment" class="form-control" style="height: 150px;" placeholder="Put your comment here"></textarea>
                    </div>
                  </div>
                  <div class="row" style="padding-top: 10px; padding-bottom: 10px;">
                    <div class="col-md-12">
                      History Change Log and Past Comment :
                      <textarea class="form-control" style="height: 150px;" disabled><?php echo ($productreleaseeditrow['comment']) ?></textarea>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
               <button type="button" style="font-size: 17px;" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
               <button type="submit" name="save" style="font-size: 17px;" class="btn btn-primary">Save changes</button>
             </div>
            </form>
        </div>
       </div>
     </div>
  </div>
</div>
<?php } ?>
<!-- Edit Modal End -->

<!-- Confirm Delete Modal Start -->
<?php for ($l=0;$productreleasedeleterow = $productreleasedelete->fetch_assoc(); $l++) { ?>
<div class="modal fade" id="deleteproduct<?php echo($l) ?>">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="container">
          <form method="post">
            <div class="content">
              <div class="modal-header">
                  <h4 class="modal-title" id="deleteproductLabel">Delete <?php echo $productreleasedeleterow['product_name']; ?></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  Are you sure you want to Delete <?php echo $productreleasedeleterow['product_name']; ?>?
                  <input type="hidden" name="deleteid" value=" <?php echo($productreleasedeleterow['id']) ?> ">
              </div>
            <div class="modal-footer">
                <button type="button" style="font-size: 17px;" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" name="delete" style="font-size: 17px;" class="btn btn-danger">Delete</button>
                  <!-- <a href="main.php?delete=<?php echo($productreleasedeleterow['id']) ?>" name="delete" style="font-size: 17px;" class="btn btn-danger">Delete</a> -->
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
  </div>
</body>
<?php include 'includes/footer.php'; ?>