<?php 
include 'includes/header.php'; 

if (isset($_GET['generate'])) {
	$id = $_GET['generate'];

	$productgeneratetemp = $link->query("SELECT * FROM productrelease WHERE id = '$id'") or die($link->error);
	$productgenerate = $productgeneratetemp->fetch_assoc();

	$productreleasedate = date("F d, Y", strtotime($productgenerate['date_added']));
 
	$year = date("y");
	$lasttwodigits = substr($year,-2);

	$generatedpreparedname = explode("|", $productgenerate['preparedname']);
	$generatedpreparednamearraylength = count($generatedpreparedname);
	$generatedprepareddescription = explode("|", $productgenerate['prepareddescription']);
	$generatedprepareddescriptionarraylength = count($generatedprepareddescription);
	$generatedreviewedname = explode("|", $productgenerate['reviewedname']);
	$generatedreviewednamearraylength = count($generatedreviewedname);
	$generatedrevieweddescription = explode("|", $productgenerate['revieweddescription']);
	$generatedrevieweddescriptionarraylength = count($generatedrevieweddescription);
	$generatedapprovedname = explode("|", $productgenerate['approvedname']);
	$generatedapprovednamearraylength = count($generatedapprovedname);
	$generatedapproveddescription = explode("|", $productgenerate['approveddescription']);
	$generatedapproveddescriptionarraylength = count($generatedapproveddescription);
	$generatedauthorizedname = explode("|", $productgenerate['authorizedname']);
	$generatedauthorizednamearraylength = count($generatedauthorizedname);
	$generatedauthorizeddescription = explode("|", $productgenerate['authorizeddescription']);
	$generatedauthorizeddescriptionarraylength = count($generatedauthorizeddescription);
}
?>
<body>
<div style="padding-top: 20px;">
	<div class="container" style="background: white;" id="generatedproduct">
		<div>
			<div class="row">
				<!-- <div class="col-md-12 text-center">
					<div><img src="images/tn.png" style="width: 160px; height: 140px;"></div>
					<div style="padding-top: 10px;"><h3 style=" font-family:Arial;"> PRODUCT RELEASE STATEMENT</h3></div>
				</div> -->
			</div>
			<div class="row" style="padding-top: 20px;">
				<div class="col-md-12 d-flex justify-content-between">
					<div class="arial">
						<p style="font-size:12px;">
						Product Release Statement Date :
						<u class="arial" style="font-size:12px;">
							<?php echo $productreleasedate; ?>
						</u>
						</p>
					</div>
					<div class="arial" style="font-size:12px;">
						<p style="font-size:12px;">
						Control No.:
						<u class="arial" style="font-size:12px;">
							PRS-<?php echo $lasttwodigits; ?>-<?php echo $productgenerate['control_num']; ?>
						</u>
						</p>
					</div>
				</div>
				
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive fixed-table-body wrapper">
						<table class="generate" width="100%" border="2">
							<tbody>
								<tr>
									<th><div class="arial standardpaddingtd" style="font-size:12px;">Product Name :</div></th>
									<td colspan="3"><div class="arial standardpaddingtd" style="font-size:12px;"><?php echo $productgenerate['product_name']; ?></div></td>
								</tr>
								<tr>
									<th style="width: 25%;"><div class="arial standardpaddingtd" style="font-size:12px;">Item Lot No. :</div></th>
									<td style="width: 25%;"><div class="arial standardpaddingtd" style="font-size:12px;"><?php echo $productgenerate['lot_num']; ?></div></td>
									<th style="width: 25%;"><div class="arial standardpaddingtd" style="font-size:12px;">Manufacture Date :</div></th>
									<td style="width: 25%;"><div class="arial standardpaddingtd" style="font-size:12px;"><?php echo date("m/d/Y", strtotime($productgenerate['manufacture_date'])); ?></div></td>
								</tr>
								<tr>
									<th><div class="arial standardpaddingtd" style="font-size:12px;">PO No. :</div></th>
									<td><div class="arial standardpaddingtd" style="font-size:12px;"><?php echo $productgenerate['po_num']; ?></div></td>
									<th><div class="arial standardpaddingtd" style="font-size:12px;">Expiration Date :</div></th>
									<td><div class="arial standardpaddingtd" style="font-size:12px;"><?php echo date("m/d/Y", strtotime($productgenerate['expiration_date'])); ?></div></td>
								</tr>
								<tr>
									<th><div class="arial standardpaddingtd" style="font-size:12px;">Manufactured Quantity :</div></th>
									<td colspan="3"><div class="arial standardpaddingtd" style="font-size:12px;"><?php echo $productgenerate['manufactured_quantity']; ?></div></td>
								</tr>
								<tr>
									<th colspan="4" class="text-center"><div class="arial standardpaddingtd" style="font-size:12px;">Document Review</div></th>
								</tr>
								<tr>
									<td colspan="4">
										<div class="text-center arial" style="font-size:12px;">
											Documents Reviewed
										</div>
										<div class="text-center" style="padding-top: 10px;padding-bottom: 10px; font-size:12px;">
											<table class="center" border="1" style="margin: auto;">
												<tr>
													<th>COA</th>
													<th>Batch Record</th>
													<th>FTIR</th>
												</tr>
												<tr>
													<td><?php if ($productgenerate['coa'] == "Submitted") { echo "X"; } else { echo "NS"; } ?></td>
													<td><?php if ($productgenerate['batchrecord'] == "Submitted") { echo "X"; } else { echo "NS"; } ?></td>
													<td><?php if ($productgenerate['ftir'] == "Submitted") { echo "X"; } else { echo "NS"; } ?></td>
												</tr>
												<tr>
													<td><?php if ($productgenerate['coa'] == "Submitted") {
														echo "Passed";
													} else { echo "Not Submitted"; } ?></td>
													<td><?php if ($productgenerate['batchrecord'] == "Submitted") {
														echo "Passed";
													} else { echo "Not Submitted"; } ?></td>
													<td><?php if ($productgenerate['ftir'] == "Submitted") {
														echo "Passed";
													} else { echo "Not Submitted"; } ?></td>
												</tr>
											</table>
										</div>
										<div class="text-center arial" style="font-size:12px;">
											*X - Submitted; NS - Not Specified, Not Submitted
										</div>
										<div class="arial" style="padding-top: 10px; padding-bottom: 5px; font-size:12px;">
											The review of documentation for the above-mentioned products and lots resulted in the following findings;
										    <li class="arial" style="margin-left: 20px; font-size:12px;">Microbiological Test Results – Within Specifications</li>
										    <li class="arial" style="margin-left: 20px; font-size:12px;">Physicochemical Test Results – Within Specifications</li>
										    <li class="arial" style="margin-left: 20px; font-size:12px;">Nutrient Analysis Test Results – Within Specifications </li>
										</div>
									</td>
								</tr>
								<tr>
									<th colspan="4" class="text-center"><div class="arial standardpaddingtd" style="font-size:12px;">FSQA Disposition</div></th>
								</tr>
								<tr>
									<td colspan="4">
										<div class="arial standardpaddingtd" style="font-size:12px;">
									Thus, products are released based on COAs meeting specifications.
										</div>
									</td>
								</tr>
								<tr>
									<th colspan="2"><div class="arial standardpaddingtd" style="font-size:12px;">Prepared by :</div></th>
									<th colspan="2"><div class="arial standardpaddingtd" style="font-size:12px;">Reviewed by :</div></th>
								</tr>
								<tr>
									<td colspan="2">
										<div style="padding-left: 40px;font-size:12px;">
											<?php 
											for ($i=0; $i < $generatedpreparednamearraylength || $i < $generatedprepareddescriptionarraylength; $i++) { ?>
												<div class="arial standardpaddingtd" style="padding: 0px;"><b class="arial standardpaddingtd" style="font-size:12px;">
													<?php if (empty($generatedpreparedname[$i])) { echo ""; } else { echo $generatedpreparedname[$i]; } ?>,</b> 
													<span class="arial standardpaddingtd" style="font-size:12px;">
													<?php if (empty($generatedprepareddescription[$i])) { echo ""; } else { echo $generatedprepareddescription[$i]; } ?>
												</span>
												</div>
											<?php } ?>
											<!-- <div class="arial standardpaddingtd"><b class="arial standardpaddingtd">Virginia Wageyen</b>, FSQA Coordinator</div>
											<div class="arial standardpaddingtd"><b class="arial standardpaddingtd">Ezra Mabutas</b>, FSQA Coordinator</div>
											<div class="arial standardpaddingtd"><b class="arial standardpaddingtd">Ma. Elisa Aligam</b>, FSQA Coordinator</div>
											<div class="arial standardpaddingtd"><b class="arial standardpaddingtd">Nico Marry Lasaca</b>, FSQA Coordinator</div>
											<div class="arial standardpaddingtd"><b class="arial standardpaddingtd">Bryle Adrian Eugenio</b>, FSQA Coordinator</div> -->
										</div>
									</td>
									<td colspan="2">
										<?php 
										for ($j=0; $j < $generatedreviewednamearraylength || $j < $generatedrevieweddescriptionarraylength; $j++) { ?>
										<div class="arial" style="padding-left: 40px; padding-top: 0px; padding-bottom: 0px;">
											<b class="arial"  style="font-size:12px;">
												<?php if (empty($generatedreviewedname[$j])) {
											echo ""; } else { echo $generatedreviewedname[$j]; } ?>,</b>
											<span class="arial standardpaddingtd" style="font-size:12px;">
											 <?php if (empty($generatedrevieweddescription[$j])) {
											echo "";
										} else { echo $generatedrevieweddescription[$j]; } ?>
											</span>
										</div>
										<?php } ?>
										<!-- <div class="arial" style="padding-left: 40px;"><b class="arial">Christopher Santiañez</b>, Project Manager</div> -->
									</td>
								</tr>
								<tr>
									<th colspan="2"><div class="arial standardpaddingtd" style="font-size:12px;">Approved by :</div></th>
									<th colspan="2"><div class="arial standardpaddingtd" style="font-size:12px;">Authorized by :</div></th>
								</tr>
								<tr>
									<td colspan="2">
										<div class="row">
											<div class="col-md-12 d-flex justify-content-between">
												<div>
													<div class="arnel">
													<?php 
													for ($k=0; $k < $generatedapprovednamearraylength || $k < $generatedapproveddescriptionarraylength; $k++) {  ?>
														<div><b class="arial" style="font-size:12px;"><?php if (empty($generatedapprovedname[$k])) {
															echo "";
														} else { echo $generatedapprovedname[$k]; } ?>,</b><div class="arial" style="font-size:12px;"> <?php if (empty($generatedapproveddescription[$k])) {
															echo "";
														} else { echo $generatedapproveddescription[$k]; } ?></div></div>
														
													<?php } ?>
													</div>
													<!-- <div class="arnel">
														<div><b class="arial">Arnel Ryan,</b></div>
														<div class="arial">FSC, PCQI, FSVPQI</div>
													</div> -->
												</div>
												<div class="text-center" style="padding-top: 10px; padding-right:20px;">
													<img src="assets/images/arnelfsqa.png" style="height: 120px;width: 100px;">
												</div>
											</div>
											
										</div>
									</td>
									<td colspan="2">
										<div style="padding-left: 40px; font-size:12px;">
											<?php 
											for ($l=0; $l < $generatedauthorizednamearraylength || $l < $generatedauthorizeddescriptionarraylength; $l++) { ?>
											<div><b class="arial" style="font-size:12px;"><?php if (empty($generatedauthorizedname[$l])) {
												echo "";
											} else { echo $generatedauthorizedname[$l]; } ?>,</b></div>
											<div class="arial" style="font-size:12px;"><?php if (empty($generatedauthorizeddescription[$l])) {
												echo "";
											} else { echo $generatedauthorizeddescription[$l]; } ?></div>
											<?php } ?>
											<!-- <div><b class="arial">Victoria Alonso Hopkins,</b></div>
											<div class="arial">Director R&D and Manufacturing Tribal Nutrition, LLC</div> -->
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- <div class="row" style="padding-top: 20px;">
				<div class="col-md-12">
					<p>
					<b class="arial">Note to Manufacturer :</b> <i class="arial"> (1) Fill in Quantity Released, destination/location and Initials. (3) Submit back to Tribal Nutrition FSQA for records. Email at <u class="arial">quality@tribal-nutrition.com.</u></i>
					</p>
				</div>
			</div> -->
<!-- 			<div class="row" style="padding-top: 20px;">
				<div class="col-md-12">
					<div class="table-responsive fixed-table-body wrapper">
						<table class="generate" width="100%">
							<tr>
								<td style="width: 20%;">
									<div style="float: left; font-family: Arial;">
										20210127	
									</div>
								</td>
								<td style="width: 60%;" class="text-center">
									<div style="font-family: Arial;">
										Tribal Nutrition LLC
										<br>
										11500 South Eastern Avenue, #150 Henderson, NV 89052	
									</div>
								</td>
								<td style="width: 20%;">
									<div style="float: right; font-family: Arial;">
										TN-QMS-2.4.7.P0.F0
									</div>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div> -->
		</div>
	</div>
</div>
<!-- <script src="assets/jsfunction/pdf.js"></script> -->
<script type="text/javascript">
window.onload = function () {
    const invoice = this.document.getElementById("generatedproduct");
    console.log(invoice);
    console.log(window);
    var opt = {
        margin: 0.5,
        filename: 'generatedproduct.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
    };
    html2pdf().from(invoice).set(opt).save();
    // window.close();
    setTimeout(window.close, 5000);
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
</body>
<?php include 'includes/footer.php'; ?>