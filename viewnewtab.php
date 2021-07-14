<?php 
include 'includes/header.php';
if (isset($_GET['generate'])) {
  $productid = $_GET['generate'];
  $productviewtemp = $link->query("SELECT * FROM productrelease WHERE id = '$productid'") or die($link->error);
  $productview = $productviewtemp->fetch_assoc();
}
?>
<body>
        <div class="container">
          <div class="content">
          <div class="modal-header">
              <h4 class="modal-title" id="viewproductTitle">View <?php echo $productview['product_name']; ?></h4>
          </div>
          <div class="modal-body">
              <!-- Modal Content -->
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-3">Product Name
                  </div>
                  <div class="col-md-9"> : <b><?php echo $productview['product_name']; ?></b></div>
              </div>

              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-3">Customer Name
                  </div>
                  <div class="col-md-9"> : <b><?php echo $productview['customer_name']; ?></b></div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-3">Account
                  </div>
                  <div class="col-md-9"> : <b><?php echo $productview['account']; ?></b></div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-3">Created by
                  </div>
                  <div class="col-md-9"> : <b><?php echo $productview['created_by']; ?></b></div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-3">Assign Review
                  </div>
                  <div class="col-md-9"> : <b><?php echo $productview['assign_to']; ?></b></div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-3">Manufacture Date
                  </div>
                  <div class="col-md-9"> : <b><?php echo date("F d, Y", strtotime($productview['manufacture_date'])); ?></b></div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-3">Expiration Date
                  </div>
                  <div class="col-md-9"> : <b><?php echo date("F d, Y", strtotime($productview['expiration_date']));  ?></b></div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-3">
                  Manufactured Quantity
                  </div>
                  <div class="col-md-9">
                   : <b><?php echo $productview['manufactured_quantity']; ?></b>
                </div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-3">Control Number
                  </div>
                  <div class="col-md-9"> : <b><?php echo $productview['control_num']; ?></b></div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-3">PO #
                  </div>
                  <div class="col-md-9"> : <b><?php echo $productview['po_num']; ?></b></div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-3">Lot Number
                  </div>
                  <div class="col-md-9"> : <b><?php echo $productview['lot_num']; ?></b></div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-3">Product Code
                  </div>
                  <div class="col-md-9"> : <b><?php echo $productview['item_num']; ?></b></div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-3">Rev. Number
                  </div>
                  <div class="col-md-9"> : <b><?php echo $productview['rev_num']; ?></b></div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-3">Serving Size
                  </div>
                  <div class="col-md-9"> : <b><?php echo $productview['serving_size']; ?></b></div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-3">Serving Per Container
                  </div>
                  <div class="col-md-9"> : <b><?php echo $productview['serving_per']; ?></b></div>
              </div>
              <div class="row" style="padding-top: 3px; padding-bottom: 3px;">
                <div class="col-md-3">Status
                  </div>
                  <div class="col-md-9"> : <span style="color: <?php if ($productview['status'] == "Ongoing") { echo "gray"; }elseif($productview['status'] == "For Review") { echo "blue"; } elseif ($productview['status'] == "Approved") { echo "green"; }?> ;"><b><?php echo $productview['status']; ?></b></span></div>
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
                    $viewphysicaltest = explode("|", $productview['physicaltest']);
                    $viewphysicaltestarraylength = count($viewphysicaltest);
                    $viewphysicalspecification = explode("|", $productview['physicalspecification']);
                    $viewphysicalspecificationarraylength = count($viewphysicalspecification);
                    $viewphysicalmethod = explode("|", $productview['physicalmethod']);
                    $viewphysicalmethodarraylength = count($viewphysicalmethod);
                    $viewphysicalresults = explode("|", $productview['physicalresults']);
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
                      $viewchemicaltest = explode("|", $productview['chemicaltest']);
                      $viewchemicaltestarraylength = count($viewchemicaltest);
                      $viewchemicalunit = explode("|", $productview['chemicalunit']);
                      $viewchemicalunitarraylength = count($viewchemicalunit);
                      $viewchemicalmin = explode("|", $productview['chemicalmin']);
                      $viewchemicalminarraylength = count($viewchemicalmin);
                      $viewchemicalmax = explode("|", $productview['chemicalmax']);
                      $viewchemicalmaxarraylength = count($viewchemicalmax);
                      $viewchemicalinput = explode("|", $productview['chemicalinput']);
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
                    $viewheavymetaltest = explode("|", $productview['heavymetaltest']);
                    $viewheavymetaltestarraylength = count($viewheavymetaltest);

                    $viewheavymetalug = explode("|", $productview['heavymetalug']);
                    $viewheavymetalugarraylength = count($viewheavymetalug);

                    $viewheavymetalinput = explode("|", $productview['heavymetalinput']);
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
                    $viewmicrobiologicaltest = explode("|", $productview['microbiologicaltest']);
                    $viewmicrobiologicaltestarraylength = count($viewmicrobiologicaltest);

                    $viewmicrobiologicalcfu = explode("|", $productview['microbiologicalcfu']);
                    $viewmicrobiologicalcfuarraylength = count($viewmicrobiologicalcfu);

                    $viewmicrobiologicalinput = explode("|", $productview['microbiologicalinput']);
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
                      <div style="color:<?php if ($productview['coa'] == "Submitted") { echo "green"; } else { echo "gray"; } ?>;" class="col-md-4 text-center">
                          <?php echo $productview['coa']; ?>
                        </div>
                        <div style="color:<?php if ($productview['batchrecord'] == "Submitted") { echo "green"; } else { echo "gray"; } ?>;" class="col-md-4 text-center">
                          <?php echo $productview['batchrecord']; ?>
                        </div>
                        <div style="color:<?php if ($productview['ftir'] == "Submitted") { echo "green"; } else { echo "gray"; } ?>;" class="col-md-4 text-center">
                          <?php echo $productview['ftir']; ?>
                        </div>
                    </div>
                  </div>
                  <hr>
                  <?php
                    $viewpreparedname = explode("|", $productview['preparedname']);
                    $viewpreparednamearraylength = count($viewpreparedname);
                    $viewprepareddescription = explode("|", $productview['prepareddescription']);
                    $viewprepareddescriptionarraylength = count($viewprepareddescription);
                    $viewreviewedname = explode("|", $productview['reviewedname']);
                    $viewreviewednamearraylength = count($viewreviewedname);
                    $viewrevieweddescription = explode("|", $productview['revieweddescription']);
                    $viewrevieweddescriptionarraylength = count($viewrevieweddescription);
                    $viewapprovedname = explode("|", $productview['approvedname']);
                    $viewapprovednamearraylength = count($viewapprovedname);
                    $viewapproveddescription = explode("|", $productview['approveddescription']);
                    $viewapproveddescriptionarraylength = count($viewapproveddescription);
                    $viewauthorizedname = explode("|", $productview['authorizedname']);
                    $viewauthorizednamearraylength = count($viewauthorizedname);
                    $viewauthorizeddescription = explode("|", $productview['authorizeddescription']);
                    $viewauthorizeddescriptionarraylength = count($viewauthorizeddescription);

                   ?>
                  <!-- <div class="row" style="padding-top: 10px; padding-bottom: 10px;">
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
                  </div> -->

            <div class="row" style="padding-top: 10px; padding-bottom: 10px;">
              <div class="col-md-12">
                History Change Log and Comment :
                <textarea class="form-control" name="addcomment" style="height: 150px;" disabled placeholder="No History Change Log and Comment"><?php echo $productview['comment']; ?></textarea>
              </div>
            </div>
         </div>
            </div>
        </div>
</body>
<?php include 'includes/footer.php'; ?>