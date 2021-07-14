<?php

// comment this part of code if the info is going to be limited to 50
date_default_timezone_set('Asia/Manila');
// View All Product Release
$dashboardaccount = $link->query("SELECT account,COUNT(id) FROM `productrelease` GROUP BY account") or die($link->error);
// $dashboardaccount = $link->query("SELECT account,COUNT(id) FROM `productrelease` GROUP BY account ORDER BY account") or die($link->error);
	$addaccount = $link->query("SELECT account_name FROM accounts") or die($link->error);
	for ($uknown = 0;$addaccountrow = $addaccount->fetch_assoc();$uknown++) {
		$assignaccount[$uknown] = $addaccountrow['account_name'];
	}
	$assignaccountmax = count($assignaccount);
if (isset($_GET['status'])) {
	$assign = $_SESSION["displayname"];
	$status = $_GET['status'];

	if ($status == "All") {
		$productreleaseview = $link->query("SELECT * FROM productrelease WHERE assign_to = '$assign'") or die($link->error);
		$productreleasetable = $link->query("SELECT id,control_num,assign_to,lot_num,account,status,date_added,date_modified FROM productrelease WHERE assign_to = '$assign'") or die($link->error);
		$productreleaseedit = $link->query("SELECT * FROM productrelease WHERE assign_to = '$assign'") or die($link->error);
$link->query("SELECT id,product_name FROM productrelease WHERE assign_to = '$assign'") or die($link->error);
		$productreleasedelete = $link->query("SELECT id,product_name,status FROM productrelease WHERE assign_to = '$assign'") or die($link->error);
	}else {
		$productreleaseview = $link->query("SELECT * FROM productrelease WHERE assign_to = '$assign' && status = '$status'") or die($link->error);
		$productreleasetable = $link->query("SELECT id,control_num,assign_to,lot_num,account,status,date_added,date_modified FROM productrelease WHERE assign_to = '$assign' && status = '$status'") or die($link->error);
		$productreleaseedit = $link->query("SELECT * FROM productrelease WHERE assign_to = '$assign' && status = '$status'") or die($link->error);
		$productreleasedelete = $link->query("SELECT id,product_name,status FROM productrelease WHERE assign_to = '$assign' && status = '$status'") or die($link->error);
	}
	$statusdisplayalltemp = $link->query("SELECT status,COUNT(id) FROM `productrelease` WHERE assign_to = '$assign'") or die($link->error);
	$statusdisplayall = $statusdisplayalltemp->fetch_assoc();

	$statusdisplayongoingtemp = $link->query("SELECT status,COUNT(id) FROM `productrelease` WHERE assign_to = '$assign' && status = 'Ongoing'") or die($link->error);
	$statusdisplayongoing = $statusdisplayongoingtemp->fetch_assoc();

	$statusdisplayforreviewtemp = $link->query("SELECT status,COUNT(id) FROM `productrelease` WHERE assign_to = '$assign' && status = 'For Review'") or die($link->error);
	$statusdisplayforreview = $statusdisplayforreviewtemp->fetch_assoc();

	$statusdisplayapprovedtemp = $link->query("SELECT status,COUNT(id) FROM `productrelease` WHERE assign_to = '$assign' && status = 'Approved'") or die($link->error);
	$statusdisplayapproved = $statusdisplayapprovedtemp->fetch_assoc();

}

$dashboardview = $link->query("SELECT * FROM productrelease") or die($link->error);
$dashboardtable = $link->query("SELECT id,control_num,assign_to,lot_num,account,status,date_added,date_modified FROM productrelease") or die($link->error);
$dashboardedit = $link->query("SELECT * FROM productrelease") or die($link->error);
$dashboarddelete = $link->query("SELECT id,product_name FROM productrelease") or die($link->error);

$productview = $link->query("SELECT * FROM productrelease  ORDER BY id DESC LIMIT 10") or die($link->error);
$producttable = $link->query("SELECT id,control_num,assign_to,lot_num,account,status,date_added,date_modified FROM productrelease  ORDER BY id DESC LIMIT 10") or die($link->error);
$productedit = $link->query("SELECT * FROM productrelease  ORDER BY id DESC LIMIT 10") or die($link->error);
$productdelete = $link->query("SELECT id,product_name FROM productrelease  ORDER BY id DESC LIMIT 10") or die($link->error);

	$allreleasestatusdisplayongoingtemp = $link->query("SELECT status,COUNT(id) FROM `productrelease` WHERE status = 'Ongoing'") or die($link->error);
	$allreleasestatusdisplayongoing = $allreleasestatusdisplayongoingtemp->fetch_assoc();

	$allreleasestatusdisplayforreviewtemp = $link->query("SELECT status,COUNT(id) FROM `productrelease` WHERE status = 'For Review'") or die($link->error);
	$allreleasestatusdisplayforreview = $allreleasestatusdisplayforreviewtemp->fetch_assoc();

	$allreleasestatusdisplayapprovedtemp = $link->query("SELECT status,COUNT(id) FROM `productrelease` WHERE status = 'Approved'") or die($link->error);
	$allreleasestatusdisplayapproved = $allreleasestatusdisplayapprovedtemp->fetch_assoc();
	
	$addassign = $link->query("SELECT displayname FROM users") or die($link->error);

	for ($uknown = 0;$addassignrow = $addassign->fetch_assoc();$uknown++) {
		$assignperson[$uknown] = $addassignrow['displayname'];
	}
	$assignpersonmax = count($assignperson);

// uncomment the bottom code if we're going to limit the view to 50 for future.

// $productview = $link->query("SELECT * FROM productrelease limit 50") or die($link->error);
// $producttable = $link->query("SELECT id,control_num,assign_to,lot_num,account,status,date_added,date_modified FROM productrelease limit 50") or die($link->error);
// $productedit = $link->query("SELECT * FROM productrelease limit 50") or die($link->error);
// $productdelete = $link->query("SELECT id,product_name FROM productrelease limit 50") or die($link->error);
		
if (isset($_POST['add'])) {

	$sql = "";

	$currentDatetemp1 = date('Y-m-d h:i:s a');
	$currentDate1 = "[".$currentDatetemp1."]";

	$add_product_name = trim($_POST['addproductname']);
	$add_account = trim($_POST['addaccount']);
	$add_manufactured_quantity = trim($_POST['addmanufacturedquan']);
	$add_control_num = trim($_POST['addcontrolnum']);
	$add_created_by = trim($_POST['addcreatedby']);
	// $add_created_by = $_SESSION["displayname"];
	$add_assign_to = trim($_POST['addassignto']);
	// $add_assign_to = "Not Yet Reviewed";
	$add_po_num = trim($_POST['addponum']);
	$add_status = trim($_POST['addstatus']);
	$add_customer_name = trim($_POST['addcustomername']);
	$add_manufacture_date = trim($_POST['addmanufacturedate']);
	$add_rev_num = trim($_POST['addrevnum']);
	$add_expiration_date = trim($_POST['addexpirationdate']);
	$add_lot_num = trim($_POST['addlotnum']);
	$add_serving_size = trim($_POST['addservingsize']);
	$add_item_num = trim($_POST['additemnum']);
	$add_serving_per = trim($_POST['addservingpercontainer']);
	
	$add_coa = trim($_POST['addcoa']);
	$add_batchrecord = trim($_POST['addbatchrecord']);
	$add_ftir = trim($_POST['addftir']);

	$add_physical_test = $_POST['addphysicaltest'];
	if (empty($add_physical_test)) {
		$add_physical_test = "";
	}
	$add_physical_specification = $_POST['addphysicalspecification'];
	if (empty($add_physical_specification)) {
		$add_physical_specification = "";
	}
	$add_physical_method = $_POST['addphysicalmethod'];
	if (empty($add_physical_method)) {
		$add_physical_method = "";
	}
	$add_physical_results = $_POST['addphysicalresults'];
	if (empty($add_physical_results)) {
		$add_physical_results = "";
	}
	$add_chemical_test = $_POST['addchemicaltest'];
	if (empty($add_chemical_test)) {
		$add_chemical_test = "";
	}
	$add_chemical_unit = $_POST['addchemicalunit'];
	if (empty($add_chemical_unit)) {
		$add_chemical_unit = "";
	}
	$add_chemical_min = $_POST['addchemicalmin'];
	if (empty($add_chemical_min)) {
		$add_chemical_min = "";
	}
	$add_chemical_max = $_POST['addchemicalmax'];
	if (empty($add_chemical_max)) {
		$add_chemical_max = "";
	}
	$add_chemical_input = $_POST['addchemicalinput'];
	if (empty($add_chemical_input)) {
		$add_chemical_input = "";
	}
	$add_heavymetal_test = $_POST['addheavymetaltest'];
	if (empty($add_heavymetal_test)) {
		$add_heavymetal_test = "";
	}
	$add_heavymetal_ug = $_POST['addheavymetalug'];
	if (empty($add_heavymetal_ug)) {
		$add_heavymetal_ug = "";
	}
	$add_heavymetal_input = $_POST['addheavymetalinput'];
	if (empty($add_heavymetal_input)) {
		$add_heavymetal_input = "";
	}
	$add_microbiological_test = $_POST['addmicrobiologicaltest'];
	if (empty($add_microbiological_test)) {
		$add_microbiological_test = "";
	}
	$add_microbiological_cfu = $_POST['addmicrobiologicalcfu'];
	if (empty($add_microbiological_cfu)) {
		$add_microbiological_cfu = "";
	}
	$add_microbiological_input = $_POST['addmicrobiologicalinput'];
	if (empty($add_microbiological_input)) {
		$add_microbiological_input = "";
	}

	$add_physical_test = implode("|",$add_physical_test);
	$add_physical_specification = implode("|",$add_physical_specification);
	$add_physical_method = implode("|",$add_physical_method);
	$add_physical_results = implode("|",$add_physical_results);

	$add_chemical_test = implode("|",$add_chemical_test);
	$add_chemical_unit = implode("|",$add_chemical_unit); 
	$add_chemical_min = implode("|",$add_chemical_min);
	$add_chemical_max = implode("|",$add_chemical_max);
	$add_chemical_input = implode("|",$add_chemical_input);
	
	$add_heavymetal_test = implode("|",$add_heavymetal_test);
	$add_heavymetal_ug = implode("|",$add_heavymetal_ug);
	$add_heavymetal_input = implode("|",$add_heavymetal_input);
	
	$add_microbiological_test = implode("|",$add_microbiological_test);
	$add_microbiological_cfu = implode("|",$add_microbiological_cfu);
	$add_microbiological_input = implode("|",$add_microbiological_input);


	$add_prepared_name = $_POST['addpreparedname'];
	if (empty($add_prepared_name)) {
		$add_prepared_name = "";
	}	
	$add_prepared_description = $_POST['addprepareddescription'];
	if (empty($add_prepared_description)) {
		$add_prepared_description = "";
	}	
	$add_reviewed_name = $_POST['addreviewedname'];
	if (empty($add_reviewed_name)) {
		$add_reviewed_name = "";
	}	
	$add_reviewed_description = $_POST['addrevieweddescription'];
	if (empty($add_reviewed_description)) {
		$add_reviewed_description = "";
	}	
	$add_approved_name = $_POST['addapprovedname'];
	if (empty($add_approved_name)) {
		$add_approved_name = "";
	}	
	$add_approved_description = $_POST['addapproveddescription'];
	if (empty($add_approved_description)) {
		$add_approved_description = "";
	}	
	$add_authorized_name = $_POST['addauthorizedname'];
	if (empty($add_authorized_name)) {
		$add_authorized_name = "";
	}	
	$add_authorized_description = $_POST['addauthorizeddescription'];
	if (empty($add_authorized_description)) {
		$add_authorized_description = "";
	}	

	$add_prepared_name = implode("|",$add_prepared_name);
	$add_prepared_description = implode("|",$add_prepared_description);
	$add_reviewed_name = implode("|",$add_reviewed_name);
	$add_reviewed_description = implode("|",$add_reviewed_description);
	$add_approved_name = implode("|",$add_approved_name);
	$add_approved_description = implode("|",$add_approved_description);
	$add_authorized_name = implode("|",$add_authorized_name);
	$add_authorized_description = implode("|",$add_authorized_description);
	
	if (empty(trim($_POST['addcomment']))) {
		$add_comment = trim($_POST['addcomment']);
	}
	else {
		$add_comment = "Comment - " . $currentDate1 . "\n";
		$add_comment = $add_comment ." - ". trim($_POST['addcomment']) . "\n";
	}


	$add_comment = "\n". $add_comment ." - Added Release " .$currentDate1;
	
	$sql = "INSERT INTO productrelease (`product_name`, `account`, `manufactured_quantity`, `control_num`, `created_by`, `assign_to`, `po_num`, `status`, `customer_name`, `manufacture_date`, `rev_num`, `expiration_date`, `lot_num`, `serving_size`, `item_num`, `serving_per`,`physicaltest`, `physicalspecification`, `physicalmethod`, `physicalresults`,`chemicaltest`, `chemicalunit`, `chemicalmin`, `chemicalmax`, `chemicalinput`,`heavymetaltest`,`heavymetalug`,`heavymetalinput`,`microbiologicaltest`,`microbiologicalcfu`,`microbiologicalinput`, `comment` , `coa` , `batchrecord` , `ftir` , `preparedname` , `prepareddescription` , `reviewedname` , `revieweddescription` , `approvedname` , `approveddescription` , `authorizedname` , `authorizeddescription`) VALUES ('$add_product_name','$add_account','$add_manufactured_quantity','$add_control_num','$add_created_by','$add_assign_to','$add_po_num','$add_status','$add_customer_name','$add_manufacture_date','$add_rev_num','$add_expiration_date','$add_lot_num','$add_serving_size','$add_item_num','$add_serving_per','$add_physical_test','$add_physical_specification','$add_physical_method','$add_physical_results','$add_chemical_test','$add_chemical_unit','$add_chemical_min','$add_chemical_max','$add_chemical_input','$add_heavymetal_test','$add_heavymetal_ug','$add_heavymetal_input','$add_microbiological_test','$add_microbiological_cfu','$add_microbiological_input','$add_comment','$add_coa','$add_batchrecord','$add_ftir','$add_prepared_name','$add_prepared_description','$add_reviewed_name','$add_reviewed_description','$add_approved_name','$add_approved_description','$add_authorized_name','$add_authorized_description')";

	$status = $_GET['status'];
	if (mysqli_query($link, $sql)) {
		// echo '<script> window.location.href="assigned.php?status='.$status.'"; </script>';
		echo '<script> window.location.href="assigned.php?status=All"; </script>';
	} else {
   		echo "Error 'Can't Add Product Release. Try again later. ". mysqli_error($link);
	}
}
if (isset($_POST['save'])) {

	$sql = $addanothercomment = $historylog = "";
	$checkchanges = 0;
	$edit_id = $_POST['editid'];
	$productedittemp = $link->query("SELECT * FROM `productrelease` WHERE id = '$edit_id' ") or die($link->error);
	$productedit = $productedittemp->fetch_assoc();
	$errorremover1 = $errorremover2 = $errorremover3 = $errorremover4 = $errorremover5 = 0;

	$edit_product_name = trim($_POST['editproductname']);
	if ($edit_product_name != $productedit['product_name']) {
		$historylog = " - Product Name has been changed from \"".$productedit['product_name']."\" to \"".$edit_product_name."\"\n";
		$checkchanges++;
	}

	$edit_account = trim($_POST['editaccount']);
	if ($edit_account != $productedit['account']) {
		$historylog = $historylog ." - Account has been changed from \"".$productedit['account']."\" to \"".$edit_account . "\"\n";
		$checkchanges++;
	}

	$edit_manufactured_quantity = trim($_POST['editmanufacturedquan']);
	if ($edit_manufactured_quantity != $productedit['manufactured_quantity']) {
		$historylog = $historylog ." - Manufactured Quantity has been changed from \"".$productedit['manufactured_quantity']."\" to \"".$edit_manufactured_quantity . "\"\n";
		$checkchanges++;
	}

	$edit_control_num = trim($_POST['editcontrolnum']);
	if ($edit_control_num != $productedit['control_num']) {
		$historylog = $historylog ." - Control Number has been changed from \"".$productedit['control_num']."\" to \"".$edit_control_num . "\"\n";
		$checkchanges++;
	}
	
	$edit_created_by = trim($_POST['editcreatedby']);
	if ($edit_created_by != $productedit['created_by']) {
		$historylog = $historylog ." - Creator has been changed from \"".$productedit['created_by']."\" to \"".$edit_created_by . "\"\n";
		$checkchanges++;
	}
	
	$edit_assign_to = trim($_POST['editassignto']);
	if ($edit_assign_to != $productedit['assign_to']) {
		$historylog = $historylog ." - Person Assign has been changed from \"".$productedit['assign_to']."\" to \"".$edit_assign_to . "\"\n";
		$checkchanges++;
	}
	
	$edit_po_num = trim($_POST['editponum']);
	if ($edit_po_num != $productedit['po_num']) {
		$historylog = $historylog ." - PO # has been changed from \"".$productedit['po_num']."\" to \"".$edit_po_num . "\"\n";
		$checkchanges++;
	}

	$edit_status = trim($_POST['editstatus']);
	if ($edit_status != $productedit['status']) {
		$historylog = $historylog ." - Status has been changed from \"".$productedit['status']."\" to \"".$edit_status . "\"\n";
		$checkchanges++;
	}
	
	$edit_customer_name = trim($_POST['editcustomername']);
	if ($edit_customer_name != $productedit['customer_name']) {
		$historylog = $historylog ." - Customer Name has been changed from \"".$productedit['customer_name']."\" to \"".$edit_customer_name . "\"\n";
		$checkchanges++;
	}
	
	$edit_manufacture_date = trim($_POST['editmanufacturedate']);
	if ($edit_manufacture_date != $productedit['manufacture_date']) {
		$historylog = $historylog ." - Manufactured Date has been changed from \"".$productedit['manufacture_date']."\" to \"".$edit_manufacture_date . "\"\n";
		$checkchanges++;
	}
	
	$edit_rev_num = trim($_POST['editrevnum']);
	if ($edit_rev_num != $productedit['rev_num']) {
		$historylog = $historylog ." - Rev. Number has been changed from \"".$productedit['rev_num']."\" to \"".$edit_rev_num . "\"\n";
		$checkchanges++;
	}
	
	$edit_expiration_date = trim($_POST['editexpirationdate']);
	if ($edit_expiration_date != $productedit['expiration_date']) {
		$historylog = $historylog ." - Expiration Date has been changed from \"".$productedit['expiration_date']."\" to \"".$edit_expiration_date . "\"\n";
		$checkchanges++;
	}
	
	$edit_lot_num = trim($_POST['editlotnum']);
	if ($edit_lot_num != $productedit['lot_num']) {
		$historylog = $historylog ." - Lot Number has been changed from \"".$productedit['lot_num']."\" to \"".$edit_lot_num . "\"\n";
		$checkchanges++;
	}
	
	$edit_serving_size = trim($_POST['editservingsize']);
	if ($edit_serving_size != $productedit['serving_size']) {
		$historylog = $historylog ." - Serving Size has been changed from \"".$productedit['serving_size']."\" to \"".$edit_serving_size . "\"\n";
		$checkchanges++;
	}
	
	$edit_item_num = trim($_POST['edititemnum']);
	if ($edit_item_num != $productedit['item_num']) {
		$historylog = $historylog ." - Item Number has been changed from \"".$productedit['item_num']."\" to \"".$edit_item_num . "\"\n";
		$checkchanges++;
	}
	
	$edit_serving_per = trim($_POST['editservingpercontainer']);
	if ($edit_serving_per != $productedit['serving_per']) {
		$historylog = $historylog ." - Serving Per Container has been changed from \"".$productedit['serving_per']."\" to \"".$edit_serving_per . "\"\n";
		$checkchanges++;
	}
	
	$edit_physical_test = $_POST['editphysicaltest'];
	$edit_physical_test_original = $productedit['physicaltest'];
	$edit_physical_specification = $_POST['editphysicalspecification'];
	$edit_physical_specification_original = $productedit['physicalspecification'];
	$edit_physical_method = $_POST['editphysicalmethod'];
	$edit_physical_method_original = $productedit['physicalmethod'];
	$edit_physical_results = $_POST['editphysicalresults'];
	$edit_physical_results_original = $productedit['physicalresults'];

	$edit_physical_test = implode("|",$edit_physical_test);
	$edit_physical_test = explode("|",$edit_physical_test);
	$edit_physical_testarraylength = count($edit_physical_test);
	$edit_physical_test_original = explode("|",$edit_physical_test_original);
	$edit_physical_test_originalarraylength = count($edit_physical_test_original);

	$edit_physical_specification = implode("|",$edit_physical_specification);
	$edit_physical_specification = explode("|",$edit_physical_specification);
	$edit_physical_specificationarraylength = count($edit_physical_specification);
	$edit_physical_specification_original = explode("|",$edit_physical_specification_original);
	$edit_physical_specification_originalarraylength = count($edit_physical_specification_original);

	$edit_physical_method = implode("|",$edit_physical_method);
	$edit_physical_method = explode("|",$edit_physical_method);
	$edit_physical_methodarraylength = count($edit_physical_method);
	$edit_physical_method_original = explode("|",$edit_physical_method_original);
	$edit_physical_method_originalarraylength = count($edit_physical_method_original);

	$edit_physical_results = implode("|",$edit_physical_results);
	$edit_physical_results = explode("|",$edit_physical_results);
	$edit_physical_resultsarraylength = count($edit_physical_results);
	$edit_physical_results_original = explode("|",$edit_physical_results_original);
	$edit_physical_results_originalarraylength = count($edit_physical_results_original);

	for ($a=0; $a < $edit_physical_testarraylength || $a < $edit_physical_test_originalarraylength ||  $a < $edit_physical_specificationarraylength || $a < $edit_physical_specification_originalarraylength || $a < $edit_physical_methodarraylength || $a < $edit_physical_method_originalarraylength ||  $a < $edit_physical_resultsarraylength || $a < $edit_physical_results_originalarraylength; $a++) { 

		$errorremover1 = $errorremover2 = $errorremover3 = $errorremover4 = 0;

		if (isset($edit_physical_test[$a])) {
			$edit_physical_test[$a] = trim($edit_physical_test[$a]);
		}
		if (isset($edit_physical_test_original[$a])) {
			$edit_physical_test_original[$a] = trim($edit_physical_test_original[$a]);
		}
		if (isset($edit_physical_specification[$a])) {
			$edit_physical_specification[$a] = trim($edit_physical_specification[$a]);
		}
		if (isset($edit_physical_specification_original[$a])) {
			$edit_physical_specification_original[$a] = trim($edit_physical_specification_original[$a]);
		}
		if (isset($edit_physical_method[$a])) {
			$edit_physical_method[$a] = trim($edit_physical_method[$a]);
		}
		if (isset($edit_physical_method_original[$a])) {
			$edit_physical_method_original[$a] = trim($edit_physical_method_original[$a]);
		}
		if (isset($edit_physical_results[$a])) {
			$edit_physical_results[$a] = trim($edit_physical_results[$a]);
		}
		if (isset($edit_physical_results_original[$a])) {
			$edit_physical_results_original[$a] = trim($edit_physical_results_original[$a]);
		}



		if (isset($edit_physical_test[$a]) && isset($edit_physical_test_original[$a])) {
			
		}else {$errorremover1 = 1;}
		if (isset($edit_physical_specification[$a]) && isset($edit_physical_specification_original[$a])) {
			
		}else {$errorremover2 = 1;}
		if (isset($edit_physical_method[$a]) && isset($edit_physical_method_original[$a])) {
			
		}else {$errorremover3 = 1;}
		if (isset($edit_physical_results[$a]) && isset($edit_physical_results_original[$a])) {
			
		}else {$errorremover4 = 1;}


		// if ($edit_physical_test[$a] != $edit_physical_test_original[$a] && $edit_physical_specification[$a] != $edit_physical_specification_original[$a] && $edit_physical_method[$a] != $edit_physical_method_original[$a] && $edit_physical_results[$a] != $edit_physical_results_original[$a]) {
		// 	$historylog = $historylog ." - 1 Column has been removed.\n";
		// 	$checkchanges++;
		// }

		if (empty($edit_physical_test[$a]) && !empty($edit_physical_test_original[$a])) {
			$historylog = $historylog ." - \"". $edit_physical_test_original[$a] ."\" Test Info has been removed to the Physical Testing section\n";
			$checkchanges++;
		}elseif (!empty($edit_physical_test[$a]) && empty($edit_physical_test_original[$a])) {
			$historylog = $historylog ." - \"". $edit_physical_test[$a] ."\" Test Info has been added to the Physical Testing section\n";
			$checkchanges++;
		}elseif ($errorremover1 == 0) {
			if ($edit_physical_test[$a] != $edit_physical_test_original[$a]) {
			$historylog = $historylog ." - Physical Testing Test Info has been changed from \"". $edit_physical_test_original[$a] ."\" to \"".$edit_physical_test[$a] . "\"\n";
			$checkchanges++;
			}
		}

		if (empty($edit_physical_specification[$a]) && !empty($edit_physical_specification_original[$a])) {
			$historylog = $historylog ." - \"". $edit_physical_specification_original[$a] ."\" Specification Info has been removed to the Physical Testing section\n";
			$checkchanges++;
		}elseif (!empty($edit_physical_specification[$a]) && empty($edit_physical_specification_original[$a])) {
			$historylog = $historylog ." - \"". $edit_physical_specification[$a] ."\" Specification Info has been added to the Physical Testing section\n";
			$checkchanges++;
		}elseif ($errorremover2 == 0) {
			if ($edit_physical_specification[$a] != $edit_physical_specification_original[$a]) {
			$historylog = $historylog ." - Physical Testing Specification Info has been changed from \"". $edit_physical_specification_original[$a] ."\" to \"".$edit_physical_specification[$a] . "\"\n";
			$checkchanges++;
			}
		}

		if (empty($edit_physical_method[$a]) && !empty($edit_physical_method_original[$a])) {
			$historylog = $historylog ." - \"". $edit_physical_method_original[$a] ."\" Method Info has been removed to the Physical Testing section\n";
			$checkchanges++;
		}elseif (!empty($edit_physical_method[$a]) && empty($edit_physical_method_original[$a])) {
			$historylog = $historylog ." - \"". $edit_physical_method[$a] ."\" Method Info has been added to the Physical Testing section\n";
			$checkchanges++;
		}elseif ($errorremover3 == 0) {
			if ($edit_physical_method[$a] != $edit_physical_method_original[$a]) {
			$historylog = $historylog ." - Physical Testing Method Info has been changed from \"". $edit_physical_method_original[$a] ."\" to \"".$edit_physical_method[$a] . "\"\n";
			$checkchanges++;
			}
		}

		if (empty($edit_physical_results[$a]) && !empty($edit_physical_results_original[$a])) {
			$historylog = $historylog ." - \"". $edit_physical_results_original[$a] ."\" Results Info has been removed to the Physical Testing section\n";
			$checkchanges++;
		}elseif (!empty($edit_physical_results[$a]) && empty($edit_physical_results_original[$a])) {
			$historylog = $historylog ." - \"". $edit_physical_results[$a] ."\" Results Info has been added to the Physical Testing section\n";
			$checkchanges++;
		}elseif ($errorremover4 == 0) {
			if ($edit_physical_results[$a] != $edit_physical_results_original[$a]) {
			$historylog = $historylog ." - Physical Testing Results Info has been changed from \"". $edit_physical_results_original[$a] ."\" to \"".$edit_physical_results[$a] . "\"\n";
			$checkchanges++;
			}
		}
		
		if (empty($edit_physical_test[$a]) && empty($edit_physical_specification[$a]) && empty($edit_physical_method[$a]) && empty($edit_physical_results[$a])) {

			unset($edit_physical_test[$a]);
			unset($edit_physical_specification[$a]);
			unset($edit_physical_method[$a]);
			unset($edit_physical_results[$a]);
		}

	}

	$edit_chemical_test = $_POST['editchemicaltest'];
	$edit_chemical_test_original = $productedit['chemicaltest'];

	$edit_chemical_unit = $_POST['editchemicalunit'];
	$edit_chemical_unit_original = $productedit['chemicalunit'];

	$edit_chemical_min = $_POST['editchemicalmin'];
	$edit_chemical_min_original = $productedit['chemicalmin'];

	$edit_chemical_max = $_POST['editchemicalmax'];
	$edit_chemical_max_original = $productedit['chemicalmax'];

	$edit_chemical_input = $_POST['editchemicalinput'];
	$edit_chemical_input_original = $productedit['chemicalinput'];

	$edit_chemical_test = implode("|",$edit_chemical_test);
	$edit_chemical_test = explode("|",$edit_chemical_test);
	$edit_chemical_testarraylength = count($edit_chemical_test);
	$edit_chemical_test_original = explode("|",$edit_chemical_test_original);
	$edit_chemical_test_originalarraylength = count($edit_chemical_test_original);

	$edit_chemical_unit = implode("|",$edit_chemical_unit);
	$edit_chemical_unit = explode("|",$edit_chemical_unit);
	$edit_chemical_unitarraylength = count($edit_chemical_unit);
	$edit_chemical_unit_original = explode("|",$edit_chemical_unit_original);
	$edit_chemical_unit_originalarraylength = count($edit_chemical_unit_original);
	
	$edit_chemical_min = implode("|",$edit_chemical_min);
	$edit_chemical_min = explode("|",$edit_chemical_min);
	$edit_chemical_minarraylength = count($edit_chemical_min);
	$edit_chemical_min_original = explode("|",$edit_chemical_min_original);
	$edit_chemical_min_originalarraylength = count($edit_chemical_min_original);
	
	$edit_chemical_max = implode("|",$edit_chemical_max);
	$edit_chemical_max = explode("|",$edit_chemical_max);
	$edit_chemical_maxarraylength = count($edit_chemical_max);
	$edit_chemical_max_original = explode("|",$edit_chemical_max_original);
	$edit_chemical_max_originalarraylength = count($edit_chemical_max_original);
	
	$edit_chemical_input = implode("|",$edit_chemical_input);
	$edit_chemical_input = explode("|",$edit_chemical_input);
	$edit_chemical_inputarraylength = count($edit_chemical_input);
	$edit_chemical_input_original = explode("|",$edit_chemical_input_original);
	$edit_chemical_input_originalarraylength = count($edit_chemical_input_original);

	for ($b=0; $b < $edit_chemical_testarraylength || $b < $edit_chemical_test_originalarraylength ||  $b < $edit_chemical_unitarraylength || $b < $edit_chemical_unit_originalarraylength ||  $b < $edit_chemical_minarraylength || $b < $edit_chemical_min_originalarraylength ||  $b < $edit_chemical_maxarraylength || $b < $edit_chemical_max_originalarraylength ||  $b < $edit_chemical_inputarraylength || $b < $edit_chemical_input_originalarraylength; $b++) { 

		$errorremover1 = $errorremover2 = $errorremover3 = $errorremover4 = $errorremover5 = 0;
		if (isset($edit_chemical_test[$b])) {
			$edit_chemical_test[$b] = trim($edit_chemical_test[$b]);
		}
		if (isset($edit_chemical_test_original[$b])) {
			$edit_chemical_test_original[$b] = trim($edit_chemical_test_original[$b]);
		}
		if (isset($edit_chemical_unit[$b])) {
			$edit_chemical_unit[$b] = trim($edit_chemical_unit[$b]);
		}
		if (isset($edit_chemical_unit_original[$b])) {
			$edit_chemical_unit_original[$b] = trim($edit_chemical_unit_original[$b]);
		}
		if (isset($edit_chemical_min[$b])) {
			$edit_chemical_min[$b] = trim($edit_chemical_min[$b]);
		}
		if (isset($edit_chemical_min_original[$b])) {
			$edit_chemical_min_original[$b] = trim($edit_chemical_min_original[$b]);
		}
		if (isset($edit_chemical_max[$b])) {
			$edit_chemical_max[$b] = trim($edit_chemical_max[$b]);
		}
		if (isset($edit_chemical_max_original[$b])) {
			$edit_chemical_max_original[$b] = trim($edit_chemical_max_original[$b]);
		}
		if (isset($edit_chemical_input[$b])) {
			$edit_chemical_input[$b] = trim($edit_chemical_input[$b]);
		}
		if (isset($edit_chemical_input_original[$b])) {
			$edit_chemical_input_original[$b] = trim($edit_chemical_input_original[$b]);
		}

		if (isset($edit_chemical_test[$b]) && isset($edit_chemical_test_original[$b])) {
			
		}else {$errorremover1 = 1;}
		if (isset($edit_chemical_unit[$b]) && isset($edit_chemical_unit_original[$b])) {
			
		}else {$errorremover2 = 1;}
		if (isset($edit_chemical_min[$b]) && isset($edit_chemical_min_original[$b])) {
			
		}else {$errorremover3 = 1;}
		if (isset($edit_chemical_max[$b]) && isset($edit_chemical_max_original[$b])) {
			
		}else {$errorremover4 = 1;}
		if (isset($edit_chemical_input[$b]) && isset($edit_chemical_input_original[$b])) {
			
		}else {$errorremover5 = 1;}

		if (empty($edit_chemical_test[$b]) && !empty($edit_chemical_test_original[$b])) {
			$historylog = $historylog ." - \"". $edit_chemical_test_original[$b] ."\" Test Info has been removed to the Chemical Testing section\n";
			$checkchanges++;
		}elseif (!empty($edit_chemical_test[$b]) && empty($edit_chemical_test_original[$b])) {
			$historylog = $historylog ." - \"". $edit_chemical_test[$b] ."\" Test Info has been added to the Chemical Testing section\n";
			$checkchanges++;
		}elseif ($errorremover1 == 0) {
			if ($edit_chemical_test[$b] != $edit_chemical_test_original[$b]) {
			$historylog = $historylog ." - Chemical Testing Test Info has been changed from \"". $edit_chemical_test_original[$b] ."\" to \"".$edit_chemical_test[$b] . "\"\n";
			$checkchanges++;
			}
		}

		if (empty($edit_chemical_unit[$b]) && !empty($edit_chemical_unit_original[$b])) {
			$historylog = $historylog ." - \"". $edit_chemical_unit_original[$b] ."\" Unit Info has been removed to the Chemical Testing section\n";
			$checkchanges++;
		}elseif (!empty($edit_chemical_unit[$b]) && empty($edit_chemical_unit_original[$b])) {
			$historylog = $historylog ." - \"". $edit_chemical_unit[$b] ."\" Unit Info has been added to the Chemical Testing section\n";
			$checkchanges++;
		}elseif ($errorremover2 == 0) {
			if ($edit_chemical_unit[$b] != $edit_chemical_unit_original[$b]) {
			$historylog = $historylog ." - Chemical Testing Unit Info has been changed from \"". $edit_chemical_unit_original[$b] ."\" to \"".$edit_chemical_unit[$b] . "\"\n";
			$checkchanges++;
			}
		}

		if (empty($edit_chemical_min[$b]) && !empty($edit_chemical_min_original[$b])) {
			$historylog = $historylog ." - \"". $edit_chemical_min_original[$b] ."\" Minimum Value has been removed to the Chemical Testing section\n";
			$checkchanges++;
		}elseif (!empty($edit_chemical_min[$b]) && empty($edit_chemical_min_original[$b])) {
			$historylog = $historylog ." - \"". $edit_chemical_min[$b] ."\" Minimum Value has been added to the Chemical Testing section\n";
			$checkchanges++;
		}elseif ($errorremover3 == 0) {
			if ($edit_chemical_min[$b] != $edit_chemical_min_original[$b]) {
			$historylog = $historylog ." - Chemical Testing Minimum Value has been changed from \"". $edit_chemical_min_original[$b] ."\" to \"".$edit_chemical_min[$b] . "\"\n";
			$checkchanges++;
			}
		}

		if (empty($edit_chemical_max[$b]) && !empty($edit_chemical_max_original[$b])) {
			$historylog = $historylog ." - \"". $edit_chemical_max_original[$b] ."\" Maximum Value has been removed to the Chemical Testing section\n";
			$checkchanges++;
		}elseif (!empty($edit_chemical_max[$b]) && empty($edit_chemical_max_original[$b])) {
			$historylog = $historylog ." - \"". $edit_chemical_max[$b] ."\" Maximum Value has been added to the Chemical Testing section\n";
			$checkchanges++;
		}elseif ($errorremover4 == 0) {
			if ($edit_chemical_max[$b] != $edit_chemical_max_original[$b]) {
			$historylog = $historylog ." - Chemical Testing Maximum Value has been changed from \"". $edit_chemical_max_original[$b] ."\" to \"".$edit_chemical_max[$b] . "\"\n";
			$checkchanges++;
			}
		}

		if (empty($edit_chemical_input[$b]) && !empty($edit_chemical_input_original[$b])) {
			$historylog = $historylog ." - \"". $edit_chemical_input_original[$b] ."\" Input Value has been removed to the Chemical Testing section\n";
			$checkchanges++;
		}elseif (!empty($edit_chemical_input[$b]) && empty($edit_chemical_input_original[$b])) {
			$historylog = $historylog ." - \"". $edit_chemical_input[$b] ."\" Input Value has been added to the Chemical Testing section\n";
			$checkchanges++;
		}elseif ($errorremover5 == 0) {
			if ($edit_chemical_input[$b] != $edit_chemical_input_original[$b]) {
			$historylog = $historylog ." - Chemical Testing Input Value has been changed from \"". $edit_chemical_input_original[$b] ."\" to \"".$edit_chemical_input[$b] . "\"\n";
			$checkchanges++;
			}
		}
		
		if (empty($edit_chemical_test[$b]) && empty($edit_chemical_unit[$b]) && empty($edit_chemical_min[$b]) && empty($edit_chemical_max[$b]) && empty($edit_chemical_input[$b])) {

			unset($edit_chemical_test[$b]);
			unset($edit_chemical_unit[$b]);
			unset($edit_chemical_min[$b]);
			unset($edit_chemical_max[$b]);
			unset($edit_chemical_input[$b]);
		}
	}

	$edit_heavymetal_test = $_POST['editheavymetaltest'];
	$edit_heavymetal_test_original = $productedit['heavymetaltest'];

	$edit_heavymetal_ug = $_POST['editheavymetalug'];
	$edit_heavymetal_ug_original = $productedit['heavymetalug'];

	$edit_heavymetal_input = $_POST['editheavymetalinput'];
	$edit_heavymetal_input_original = $productedit['heavymetalinput'];

	$edit_heavymetal_test = implode("|",$edit_heavymetal_test);
	$edit_heavymetal_test = explode("|",$edit_heavymetal_test);
	$edit_heavymetal_testarraylength = count($edit_heavymetal_test);
	$edit_heavymetal_test_original = explode("|",$edit_heavymetal_test_original);
	$edit_heavymetal_test_originalarraylength = count($edit_heavymetal_test_original);

	$edit_heavymetal_ug = implode("|",$edit_heavymetal_ug);
	$edit_heavymetal_ug = explode("|",$edit_heavymetal_ug);
	$edit_heavymetal_ugarraylength = count($edit_heavymetal_ug);
	$edit_heavymetal_ug_original = explode("|",$edit_heavymetal_ug_original);
	$edit_heavymetal_ug_originalarraylength = count($edit_heavymetal_ug_original);

	$edit_heavymetal_input = implode("|",$edit_heavymetal_input); 
	$edit_heavymetal_input = explode("|",$edit_heavymetal_input);
	$edit_heavymetal_inputarraylength = count($edit_heavymetal_input);
	$edit_heavymetal_input_original = explode("|",$edit_heavymetal_input_original);
	$edit_heavymetal_input_originalarraylength = count($edit_heavymetal_input_original);

	for ($c=0; $c < $edit_heavymetal_testarraylength || $c < $edit_heavymetal_test_originalarraylength ||  $c < $edit_heavymetal_ugarraylength || $c < $edit_heavymetal_ug_originalarraylength ||  $c < $edit_heavymetal_inputarraylength || $c < $edit_heavymetal_input_originalarraylength; $c++) { 

		$errorremover1 = $errorremover2 = $errorremover3 = 0;
		if (isset($edit_heavymetal_test[$c])) {
			$edit_heavymetal_test[$c] = trim($edit_heavymetal_test[$c]);
		}
		if (isset($edit_heavymetal_test_original[$c])) {
			$edit_heavymetal_test_original[$c] = trim($edit_heavymetal_test_original[$c]);
		}
		if (isset($edit_heavymetal_ug[$c])) {
			$edit_heavymetal_ug[$c] = trim($edit_heavymetal_ug[$c]);
		}
		if (isset($edit_heavymetal_ug_original[$c])) {
			$edit_heavymetal_ug_original[$c] = trim($edit_heavymetal_ug_original[$c]);
		}
		if (isset($edit_heavymetal_input[$c])) {
			$edit_heavymetal_input[$c] = trim($edit_heavymetal_input[$c]);
		}
		if (isset($edit_heavymetal_input_original[$c])) {
			$edit_heavymetal_input_original[$c] = trim($edit_heavymetal_input_original[$c]);
		}

		if (isset($edit_heavymetal_test[$c]) && isset($edit_heavymetal_test_original[$c])) {
			
		}else {$errorremover1 = 1;}
		if (isset($edit_heavymetal_ug[$c]) && isset($edit_heavymetal_ug_original[$c])) {
			
		}else {$errorremover2 = 1;}
		if (isset($edit_heavymetal_input[$c]) && isset($edit_heavymetal_input_original[$c])) {
			
		}else {$errorremover3 = 1;}

		if (empty($edit_heavymetal_test[$c]) && !empty($edit_heavymetal_test_original[$c])) {
			$historylog = $historylog ." - \"". $edit_heavymetal_test_original[$c] ."\" Test Info has been removed to the Heavy Metal section\n";
			$checkchanges++;
		}elseif (!empty($edit_heavymetal_test[$c]) && empty($edit_heavymetal_test_original[$c])) {
			$historylog = $historylog ." - \"". $edit_heavymetal_test[$c] ."\" Test Info has been added to the Heavy Metal section\n";
			$checkchanges++;
		}elseif ($errorremover1 == 0) {
			if ($edit_heavymetal_test[$c] != $edit_heavymetal_test_original[$c]) {
			$historylog = $historylog ." - Heavy Metal Test Info has been changed from \"". $edit_heavymetal_test_original[$c] ."\" to \"".$edit_heavymetal_test[$c] . "\"\n";
			$checkchanges++;
			}
		}

		if (empty($edit_heavymetal_ug[$c]) && !empty($edit_heavymetal_ug_original[$c])) {
			$historylog = $historylog ." - \"". $edit_heavymetal_ug_original[$c] ."\" µg Info has been removed to the Heavy Metal section\n";
			$checkchanges++;
		}elseif (!empty($edit_heavymetal_ug[$c]) && empty($edit_heavymetal_ug_original[$c])) {
			$historylog = $historylog ." - \"". $edit_heavymetal_ug[$c] ."\" µg Info has been added to the Heavy Metal section\n";
			$checkchanges++;
		}elseif ($errorremover2 == 0) {
			if ($edit_heavymetal_ug[$c] != $edit_heavymetal_ug_original[$c]) {
			$historylog = $historylog ." - Heavy Metal µg Info has been changed from \"". $edit_heavymetal_ug_original[$c] ."\" to \"".$edit_heavymetal_ug[$c] . "\"\n";
			$checkchanges++;
			}
		}


		if (empty($edit_heavymetal_input[$c]) && !empty($edit_heavymetal_input_original[$c])) {
			$historylog = $historylog ." - \"". $edit_heavymetal_input_original[$c] ."\" Input Info has been removed to the Heavy Metal section\n";
			$checkchanges++;
		}elseif (!empty($edit_heavymetal_input[$c]) && empty($edit_heavymetal_input_original[$c])) {
			$historylog = $historylog ." - \"". $edit_heavymetal_input[$c] ."\" Input Info has been added to the Heavy Metal section\n";
			$checkchanges++;
		}elseif ($errorremover3 == 0) {
			if ($edit_heavymetal_input[$c] != $edit_heavymetal_input_original[$c]) {
			$historylog = $historylog ." - Heavy Metal Input Info has been changed from \"". $edit_heavymetal_input_original[$c] ."\" to \"".$edit_heavymetal_input[$c] . "\"\n";
			$checkchanges++;
			}
		}
		
		if (empty($edit_heavymetal_test[$c]) && empty($edit_heavymetal_ug[$c]) && empty($edit_heavymetal_input[$c])) {
			unset($edit_heavymetal_test[$c]);
			unset($edit_heavymetal_ug[$c]);
			unset($edit_heavymetal_input[$c]);
		}
	}

	$edit_microbiological_test = $_POST['editmicrobiologicaltest'];
	$edit_microbiological_test_original = $productedit['microbiologicaltest'];
	$edit_microbiological_cfu = $_POST['editmicrobiologicalcfu'];
	$edit_microbiological_cfu_original = $productedit['microbiologicalcfu'];
	$edit_microbiological_input = $_POST['editmicrobiologicalinput'];
	$edit_microbiological_input_original = $productedit['microbiologicalinput'];

	$edit_microbiological_test = implode("|",$edit_microbiological_test);
	$edit_microbiological_test = explode("|",$edit_microbiological_test);
	$edit_microbiological_testarraylength = count($edit_microbiological_test);
	$edit_microbiological_test_original = explode("|",$edit_microbiological_test_original);
	$edit_microbiological_test_originalarraylength = count($edit_microbiological_test_original);

	$edit_microbiological_cfu = implode("|",$edit_microbiological_cfu);
	$edit_microbiological_cfu = explode("|",$edit_microbiological_cfu);
	$edit_microbiological_cfuarraylength = count($edit_microbiological_cfu);
	$edit_microbiological_cfu_original = explode("|",$edit_microbiological_cfu_original);
	$edit_microbiological_cfu_originalarraylength = count($edit_microbiological_cfu_original);

	$edit_microbiological_input = implode("|",$edit_microbiological_input);
	$edit_microbiological_input = explode("|",$edit_microbiological_input); 
	$edit_microbiological_inputarraylength = count($edit_microbiological_input);
	$edit_microbiological_input_original = explode("|",$edit_microbiological_input_original);
	$edit_microbiological_input_originalarraylength = count($edit_microbiological_input_original);

	for ($d=0; $d < $edit_microbiological_testarraylength || $d < $edit_microbiological_test_originalarraylength ||  $d < $edit_microbiological_cfuarraylength || $d < $edit_microbiological_cfu_originalarraylength ||  $d < $edit_microbiological_inputarraylength || $d < $edit_microbiological_input_originalarraylength; $d++) { 

		$errorremover1 = $errorremover2 = $errorremover3 = 0;
		if (isset($edit_microbiological_test[$d])) {
			$edit_microbiological_test[$d] = trim($edit_microbiological_test[$d]);
		}
		if (isset($edit_microbiological_test_original[$d])) {
			$edit_microbiological_test_original[$d] = trim($edit_microbiological_test_original[$d]);
		}
		if (isset($edit_microbiological_cfu[$d])) {
			$edit_microbiological_cfu[$d] = trim($edit_microbiological_cfu[$d]);
		}
		if (isset($edit_microbiological_cfu_original[$d])) {
			$edit_microbiological_cfu_original[$d] = trim($edit_microbiological_cfu_original[$d]);
		}
		if (isset($edit_microbiological_input[$d])) {
			$edit_microbiological_input[$d] = trim($edit_microbiological_input[$d]);
		}
		if (isset($edit_microbiological_input_original[$d])) {
			$edit_microbiological_input_original[$d] = trim($edit_microbiological_input_original[$d]);
		}

		if (isset($edit_microbiological_test[$d]) && isset($edit_microbiological_test_original[$d])) {
			
		}else {$errorremover1 = 1;}
		if (isset($edit_microbiological_cfu[$d]) && isset($edit_microbiological_cfu_original[$d])) {
			
		}else {$errorremover2 = 1;}
		if (isset($edit_microbiological_input[$d]) && isset($edit_microbiological_input_original[$d])) {
			
		}else {$errorremover3 = 1;}

		if (empty($edit_microbiological_test[$d]) && !empty($edit_microbiological_test_original[$d])) {
			$historylog = $historylog ." - \"". $edit_microbiological_test_original[$d] ."\" Test Info has been removed to the Microbiological section\n";
			$checkchanges++;
		}elseif (!empty($edit_microbiological_test[$d]) && empty($edit_microbiological_test_original[$d])) {
			$historylog = $historylog ." - \"". $edit_microbiological_test[$d] ."\" Test Info has been added to the Microbiological section\n";
			$checkchanges++;
		}elseif ($errorremover1 == 0) {
			if ($edit_microbiological_test[$d] != $edit_microbiological_test_original[$d]) {
			$historylog = $historylog ." - Microbiological Test Info has been changed from \"". $edit_microbiological_test_original[$d] ."\" to \"".$edit_microbiological_test[$d] . "\"\n";
			$checkchanges++;
			}
		}

		if (empty($edit_microbiological_cfu[$d]) && !empty($edit_microbiological_cfu_original[$d])) {
			$historylog = $historylog ." - \"". $edit_microbiological_cfu_original[$d] ."\" cfu Info has been removed to the Microbiological section\n";
			$checkchanges++;
		}elseif (!empty($edit_microbiological_cfu[$d]) && empty($edit_microbiological_cfu_original[$d])) {
			$historylog = $historylog ." - \"". $edit_microbiological_cfu[$d] ."\" cfu Info has been added to the Microbiological section\n";
			$checkchanges++;
		}elseif ($errorremover2 == 0) {
			if ($edit_microbiological_cfu[$d] != $edit_microbiological_cfu_original[$d]) {
			$historylog = $historylog ." - Microbiological cfu Info has been changed from \"". $edit_microbiological_cfu_original[$d] ."\" to \"".$edit_microbiological_cfu[$d] . "\"\n";
			$checkchanges++;
			}
		}


		if (empty($edit_microbiological_input[$d]) && !empty($edit_microbiological_input_original[$d])) {
			$historylog = $historylog ." - \"". $edit_microbiological_input_original[$d] ."\" Input Info has been removed to the Microbiological section\n";
			$checkchanges++;
		}elseif (!empty($edit_microbiological_input[$d]) && empty($edit_microbiological_input_original[$d])) {
			$historylog = $historylog ." - \"". $edit_microbiological_input[$d] ."\" Input Info has been added to the Microbiological section\n";
			$checkchanges++;
		}elseif ($errorremover2 == 0) {
			if ($edit_microbiological_input[$d] != $edit_microbiological_input_original[$d]) {
			$historylog = $historylog ." - Microbiological Input Info has been changed from \"". $edit_microbiological_input_original[$d] ."\" to \"".$edit_microbiological_input[$d] . "\"\n";
			$checkchanges++;
			}
		}
		
		if (empty($edit_microbiological_test[$d]) && empty($edit_microbiological_cfu[$d]) && empty($edit_microbiological_input[$d])) {
			unset($edit_microbiological_test[$d]);
			unset($edit_microbiological_cfu[$d]);
			unset($edit_microbiological_input[$d]);
		}
	}

	$edit_coa = trim($_POST['editcoa']);
	if ($edit_coa != $productedit['coa']) {
		$historylog = $historylog ." - COA status has been changed from \"".$productedit['coa']."\" to \"".$edit_coa . "\"\n";
		$checkchanges++;
	}

	$edit_batchrecord = trim($_POST['editbatchrecord']);
	if ($edit_batchrecord != $productedit['batchrecord']) {
		$historylog = $historylog ." - Batch Record Status has been changed from \"".$productedit['batchrecord']."\" to \"".$edit_batchrecord . "\"\n";
		$checkchanges++;
	}

	$edit_ftir = trim($_POST['editftir']);
	if ($edit_ftir != $productedit['ftir']) {
		$historylog = $historylog ." - FTIR status has been changed from \"".$productedit['ftir']."\" to \"".$edit_ftir . "\"\n";
		$checkchanges++;
	}

	$edit_prepared_name = $_POST['editpreparedname'];
	$edit_prepared_name_original = $productedit['preparedname'];
	$edit_prepared_description = $_POST['editprepareddescription'];
	$edit_prepared_description_original = $productedit['prepareddescription'];
	$edit_reviewed_name = $_POST['editreviewedname'];
	$edit_reviewed_name_original = $productedit['reviewedname'];
	$edit_reviewed_description = $_POST['editrevieweddescription'];
	$edit_reviewed_description_original = $productedit['revieweddescription'];
	$edit_approved_name = $_POST['editapprovedname'];
	$edit_approved_name_original = $productedit['approvedname'];
	$edit_approved_description = $_POST['editapproveddescription'];
	$edit_approved_description_original = $productedit['approveddescription'];
	$edit_authorized_name = $_POST['editauthorizedname'];
	$edit_authorized_name_original = $productedit['authorizedname'];
	$edit_authorized_description = $_POST['editauthorizeddescription'];
	$edit_authorized_description_original = $productedit['authorizeddescription'];

	$edit_prepared_name = implode("|",$edit_prepared_name);
	$edit_prepared_name = explode("|",$edit_prepared_name);
	$edit_prepared_namearraylength = count($edit_prepared_name);

	$edit_prepared_name_original = explode("|",$edit_prepared_name_original);
	$edit_prepared_name_originalarraylength = count($edit_prepared_name_original);

	$edit_prepared_description = implode("|",$edit_prepared_description);
	$edit_prepared_description = explode("|",$edit_prepared_description);
	$edit_prepared_descriptionarraylength = count($edit_prepared_description);

	$edit_prepared_description_original = explode("|",$edit_prepared_description_original);
	$edit_prepared_description_originalarraylength = count($edit_prepared_description_original);

	$edit_reviewed_name = implode("|",$edit_reviewed_name);
	$edit_reviewed_name = explode("|",$edit_reviewed_name);
	$edit_reviewed_namearraylength = count($edit_reviewed_name);

	$edit_reviewed_name_original = explode("|",$edit_reviewed_name_original);
	$edit_reviewed_name_originalarraylength = count($edit_reviewed_name_original);

	$edit_reviewed_description = implode("|",$edit_reviewed_description);
	$edit_reviewed_description = explode("|",$edit_reviewed_description);
	$edit_reviewed_descriptionarraylength = count($edit_reviewed_description);

	$edit_reviewed_description_original = explode("|",$edit_reviewed_description_original);
	$edit_reviewed_description_originalarraylength = count($edit_reviewed_description_original);

	$edit_approved_name = implode("|",$edit_approved_name);
	$edit_approved_name = explode("|",$edit_approved_name);
	$edit_approved_namearraylength = count($edit_approved_name);

	$edit_approved_name_original = explode("|",$edit_approved_name_original);
	$edit_approved_name_originalarraylength = count($edit_approved_name_original);

	$edit_approved_description = implode("|",$edit_approved_description);
	$edit_approved_description = explode("|",$edit_approved_description);
	$edit_approved_descriptionarraylength = count($edit_approved_description);

	$edit_approved_description_original = explode("|",$edit_approved_description_original);
	$edit_approved_description_originalarraylength = count($edit_approved_description_original);

	$edit_authorized_name = implode("|",$edit_authorized_name);
	$edit_authorized_name = explode("|",$edit_authorized_name);
	$edit_authorized_namearraylength = count($edit_authorized_name);

	$edit_authorized_name_original = explode("|",$edit_authorized_name_original);
	$edit_authorized_name_originalarraylength = count($edit_authorized_name_original);

	$edit_authorized_description = implode("|",$edit_authorized_description);
	$edit_authorized_description = explode("|",$edit_authorized_description);
	$edit_authorized_descriptionarraylength = count($edit_authorized_description);

	$edit_authorized_description_original = explode("|",$edit_authorized_description_original);
	$edit_authorized_description_originalarraylength = count($edit_authorized_description_original);

	for ($i=0; $i < $edit_prepared_namearraylength || $i < $edit_prepared_name_originalarraylength ||  $i < $edit_prepared_descriptionarraylength || $i < $edit_prepared_description_originalarraylength; $i++) { 

		$errorremover1 = $errorremover2 = 0;
		if (isset($edit_prepared_name[$i])) {
			$edit_prepared_name[$i] = trim($edit_prepared_name[$i]);
		}
		if (isset($edit_prepared_name_original[$i])) {
			$edit_prepared_name_original[$i] = trim($edit_prepared_name_original[$i]);
		}
		if (isset($edit_prepared_description[$i])) {
			$edit_prepared_description[$i] = trim($edit_prepared_description[$i]);
		}
		if (isset($edit_prepared_description_original[$i])) {
			$edit_prepared_description_original[$i] = trim($edit_prepared_description_original[$i]);
		}

		if (isset($edit_prepared_name[$i]) && isset($edit_prepared_name_original[$i])) {
			
		}else {$errorremover1 = 1;}
		if (isset($edit_prepared_description[$i]) && isset($edit_prepared_description_original[$i])) {
			
		}else {$errorremover2 = 1;}

		if (empty($edit_prepared_name[$i]) && !empty($edit_prepared_name_original[$i])) {
			$historylog = $historylog ." - \"". $edit_prepared_name_original[$i] ."\" Name Info has been removed to the Prepared by section\n";
			$checkchanges++;
		}elseif (!empty($edit_prepared_name[$i]) && empty($edit_prepared_name_original[$i])) {
			$historylog = $historylog ." - \"". $edit_prepared_name[$i] ."\" Name Info has been added to the Prepared by section\n";
			$checkchanges++;
		}elseif ($errorremover1 == 0) {
			if ($edit_prepared_name[$i] != $edit_prepared_name_original[$i]) {
			$historylog = $historylog ." - Prepared Name Info has been changed from \"". $edit_prepared_name_original[$i] ."\" to \"".$edit_prepared_name[$i] . "\"\n";
			$checkchanges++;
			}
		}
		// elseif ($edit_prepared_name[$i] != $edit_prepared_name_original[$i]) {
		// 	$historylog = $historylog ." - Prepared Name Info has been changed from \"". $edit_prepared_name_original[$i] ."\" to \"".$edit_prepared_name[$i] . "\"\n";
		// 	$checkchanges++;
		// }

		if (empty($edit_prepared_description[$i]) && !empty($edit_prepared_description_original[$i])) {
			$historylog = $historylog ." - \"". $edit_prepared_description_original[$i] ."\" Description Info has been removed to the Prepared by section\n";
			$checkchanges++;
		}elseif (!empty($edit_prepared_description[$i]) && empty($edit_prepared_description_original[$i])) {
			$historylog = $historylog ." - \"". $edit_prepared_description[$i] ."\" Description Info has been added to the Prepared by section\n";
			$checkchanges++;
		}elseif ($errorremover2 == 0) {
			if ($edit_prepared_description[$i] != $edit_prepared_description_original[$i]) {
			$historylog = $historylog ." - Prepared Description Info has been changed from \"". $edit_prepared_description_original[$i] ."\" to \"".$edit_prepared_description[$i] . "\"\n";
			$checkchanges++;
			}
		}
		// elseif ($edit_prepared_description[$i] != $edit_prepared_description_original[$i]) {
		// 	$historylog = $historylog ." - Prepared Description Info has been changed from \"". $edit_prepared_description_original[$i] ."\" to \"".$edit_prepared_description[$i] . "\"\n";
		// 	$checkchanges++;
		// }
		
		if (empty($edit_prepared_name[$i]) && empty($edit_prepared_description[$i])) {
			unset($edit_prepared_name[$i]);
			unset($edit_prepared_description[$i]);
		}
		// "info name and description" has been added to the Prepare by section.
		// $edit_prepared_name[$i];
		// $edit_prepared_name_original[$i];
		// $edit_prepared_description[$i];
		// $edit_prepared_description_original[$i];
	}

	for ($j=0; $j < $edit_reviewed_namearraylength || $j < $edit_reviewed_name_originalarraylength ||  $j < $edit_reviewed_descriptionarraylength || $j < $edit_reviewed_description_originalarraylength; $j++) { 

		$errorremover1 = $errorremover2 = 0;
		if (isset($edit_reviewed_name[$j])) {
			$edit_reviewed_name[$j] = trim($edit_reviewed_name[$j]);
		}
		if (isset($edit_reviewed_name_original[$j])) {
			$edit_reviewed_name_original[$j] = trim($edit_reviewed_name_original[$j]);
		}
		if (isset($edit_reviewed_description[$j])) {
			$edit_reviewed_description[$j] = trim($edit_reviewed_description[$j]);
		}
		if (isset($edit_reviewed_description_original[$j])) {
			$edit_reviewed_description_original[$j] = trim($edit_reviewed_description_original[$j]);
		}

		if (isset($edit_reviewed_name[$j]) && isset($edit_reviewed_name_original[$j])) {
			
		} else {$errorremover1 = 1;}
		if (isset($edit_reviewed_description[$j]) && isset($edit_reviewed_description_original[$j])) {
			
		} else {$errorremover2 = 1;}

		if (empty($edit_reviewed_name[$j]) && !empty($edit_reviewed_name_original[$j])) {
			$historylog = $historylog ." - \"". $edit_reviewed_name_original[$j] ."\" Name Info has been removed to the Reviewed by section\n";
			$checkchanges++;
		}elseif (!empty($edit_reviewed_name[$j]) && empty($edit_reviewed_name_original[$j])) {
			$historylog = $historylog ." - \"". $edit_reviewed_name[$j] ."\" Name Info has been added to the Reviewed by section\n";
			$checkchanges++;
		}elseif ($errorremover1 == 0) {
			if ($edit_reviewed_name[$j] != $edit_reviewed_name_original[$j]) {
			$historylog = $historylog ." - Reviewed Name Info has been changed from \"". $edit_reviewed_name_original[$j] ."\" to \"".$edit_reviewed_name[$j] . "\"\n";
			$checkchanges++;
			}
		}
		// elseif ($edit_reviewed_name[$j] != $edit_reviewed_name_original[$j]) {
		// 	$historylog = $historylog ." - Reviewed Name Info has been changed from \"". $edit_reviewed_name_original[$j] ."\" to \"".$edit_reviewed_name[$j] . "\"\n";
		// 	$checkchanges++;
		// }

		if (empty($edit_reviewed_description[$j]) && !empty($edit_reviewed_description_original[$j])) {
			$historylog = $historylog ." - \"". $edit_reviewed_description_original[$j] ."\" Description Info has been removed to the Reviewed by section\n";
			$checkchanges++;
		}elseif (!empty($edit_reviewed_description[$j]) && empty($edit_reviewed_description_original[$j])) {
			$historylog = $historylog ." - \"". $edit_reviewed_description[$j] ."\" Description Info has been added to the Reviewed by section\n";
			$checkchanges++;
		}elseif ($errorremover2 == 0) {
			if ($edit_reviewed_description[$j] != $edit_reviewed_description_original[$j]) {
			$historylog = $historylog ." - Reviewed Description Info has been changed from \"". $edit_reviewed_description_original[$j] ."\" to \"".$edit_reviewed_description[$j] . "\"\n";
			$checkchanges++;
			}
		}

		// elseif ($edit_reviewed_description[$j] != $edit_reviewed_description_original[$j]) {
		// 	$historylog = $historylog ." - Reviewed Description Info has been changed from \"". $edit_reviewed_description_original[$j] ."\" to \"".$edit_reviewed_description[$j] . "\"\n";
		// 	$checkchanges++;
		// }
		
		if (empty($edit_reviewed_name[$j]) && empty($edit_reviewed_description[$j])) {
			unset($edit_reviewed_name[$j]);
			unset($edit_reviewed_description[$j]);
		}
		// $edit_reviewed_name[$j];
		// $edit_reviewed_name_original[$j];
		// $edit_reviewed_description[$j];
		// $edit_reviewed_description_original[$j];
	}

	for ($k=0; $k < $edit_approved_namearraylength || $k < $edit_approved_name_originalarraylength ||  $k < $edit_approved_descriptionarraylength || $k < $edit_approved_description_originalarraylength; $k++) { 

		$errorremover1 = $errorremover2 = 0;
		if (isset($edit_approved_name[$k])) {
			$edit_approved_name[$k] = trim($edit_approved_name[$k]);
		}
		if (isset($edit_approved_name_original[$k])) {
			$edit_approved_name_original[$k] = trim($edit_approved_name_original[$k]);
		}
		if (isset($edit_approved_description[$k])) {
			$edit_approved_description[$k] = trim($edit_approved_description[$k]);
		}
		if (isset($edit_approved_description_original[$k])) {
			$edit_approved_description_original[$k] = trim($edit_approved_description_original[$k]);
		}

		if (isset($edit_approved_name[$k]) && isset($edit_approved_name_original[$k])) {
			
		}else {$errorremover1 = 1;}
		if (isset($edit_approved_description[$k]) && isset($edit_approved_description_original[$k])) {
			
		}else {$errorremover2 = 1;}

		if (empty($edit_approved_name[$k]) && !empty($edit_approved_name_original[$k])) {
			$historylog = $historylog ." - \"". $edit_approved_name_original[$k] ."\" Name Info has been removed to the Approved by section\n";
			$checkchanges++;
		}elseif (!empty($edit_approved_name[$k]) && empty($edit_approved_name_original[$k])) {
			$historylog = $historylog ." - \"". $edit_approved_name[$k] ."\" Name Info has been added to the Approved by section\n";
			$checkchanges++;
		}elseif ($errorremover1 == 0) {
			if ($edit_approved_name[$k] != $edit_approved_name_original[$k]) {
			$historylog = $historylog ." - Approved Name Info has been changed from \"". $edit_approved_name_original[$k] ."\" to \"".$edit_approved_name[$k] . "\"\n";
			$checkchanges++;
			}
		}
		// elseif ($edit_approved_name[$k] != $edit_approved_name_original[$k]) {
		// 	$historylog = $historylog ." - Approved Name Info has been changed from \"". $edit_approved_name_original[$k] ."\" to \"".$edit_approved_name[$k] . "\"\n";
		// 	$checkchanges++;
		// }

		if (empty($edit_approved_description[$k]) && !empty($edit_approved_description_original[$k])) {
			$historylog = $historylog ." - \"". $edit_approved_description_original[$k] ."\" Description Info has been removed to the Approved by section\n";
			$checkchanges++;
		}elseif (!empty($edit_approved_description[$k]) && empty($edit_approved_description_original[$k])) {
			$historylog = $historylog ." - \"". $edit_approved_description[$k] ."\" Description Info has been added to the Approved by section\n";
			$checkchanges++;
		}elseif ($errorremover2 == 0) {
			if ($edit_approved_description[$k] != $edit_approved_description_original[$k]) {
			$historylog = $historylog ." - Approved Description Info has been changed from \"". $edit_approved_description_original[$k] ."\" to \"".$edit_approved_description[$k] . "\"\n";
			$checkchanges++;
			}
		}
		// elseif ($edit_approved_description[$k] != $edit_approved_description_original[$k]) {
		// 	$historylog = $historylog ." - Approved Description Info has been changed from \"". $edit_approved_description_original[$k] ."\" to \"".$edit_approved_description[$k] . "\"\n";
		// 	$checkchanges++;
		// }
		
		if (empty($edit_approved_name[$k]) && empty($edit_approved_description[$k])) {
			unset($edit_approved_name[$k]);
			unset($edit_approved_description[$k]);
		}
		// $edit_approved_name[$k];
		// $edit_approved_name_original[$k];
		// $edit_approved_description[$k];
		// $edit_approved_description_original[$k];
	}

	for ($l=0; $l < $edit_authorized_namearraylength || $l < $edit_authorized_name_originalarraylength ||  $l < $edit_authorized_descriptionarraylength || $l < $edit_authorized_description_originalarraylength; $l++) { 

		$errorremover1 = $errorremover2 = 0;
		if (isset($edit_authorized_name[$l])) {
			$edit_authorized_name[$l] = trim($edit_authorized_name[$l]);
		}
		if (isset($edit_authorized_name_original[$l])) {
			$edit_authorized_name_original[$l] = trim($edit_authorized_name_original[$l]);
		}
		if (isset($edit_authorized_description[$l])) {
			$edit_authorized_description[$l] = trim($edit_authorized_description[$l]);
		}
		if (isset($edit_authorized_description_original[$l])) {
			$edit_authorized_description_original[$l] = trim($edit_authorized_description_original[$l]);
		}

		if (isset($edit_authorized_name[$l]) && isset($edit_authorized_name_original[$l])) {
			
		} else {$errorremover1 = 1;}
		if (isset($edit_authorized_description[$l]) && isset($edit_authorized_description_original[$l])) {
			
		} else {$errorremover2 = 1;}
		
		if (empty($edit_authorized_name[$l]) && !empty($edit_authorized_name_original[$l])) {
			$historylog = $historylog ." - \"". $edit_authorized_name_original[$l] ."\" Name Info has been removed to the Authorized by section\n";
			$checkchanges++;
		}elseif (!empty($edit_authorized_name[$l]) && empty($edit_authorized_name_original[$l])) {
			$historylog = $historylog ." - \"". $edit_authorized_name[$l] ."\" Name Info has been added to the Authorized by section\n";
			$checkchanges++;
		}elseif ($errorremover1 == 0) {
			if ($edit_authorized_name[$l] != $edit_authorized_name_original[$l]) {
			$historylog = $historylog ." - Authorized Name Info has been changed from \"". $edit_authorized_name_original[$l] ."\" to \"".$edit_authorized_name[$l] . "\"\n";
			$checkchanges++;
			}
		}
		// elseif ($edit_authorized_name[$l] != $edit_authorized_name_original[$l]) {
		// 	$historylog = $historylog ." - Authorized Name Info has been changed from \"". $edit_authorized_name_original[$l] ."\" to \"".$edit_authorized_name[$l] . "\"\n";
		// 	$checkchanges++;
		// }

		if (empty($edit_authorized_description[$l]) && !empty($edit_authorized_description_original[$l])) {
			$historylog = $historylog ." - \"". $edit_authorized_description_original[$l] ."\" Description Info has been removed to the Authorized by section\n";
			$checkchanges++;
		}elseif (!empty($edit_authorized_description[$l]) && empty($edit_authorized_description_original[$l])) {
			$historylog = $historylog ." - \"". $edit_authorized_description[$l] ."\" Description Info has been added to the Authorized by section\n";
			$checkchanges++;
		}elseif ($errorremover2 == 0) {
			if ($edit_authorized_description[$l] != $edit_authorized_description_original[$l]) {
			$historylog = $historylog ." - Authorized Description Info has been changed from \"". $edit_authorized_description_original[$l] ."\" to \"".$edit_authorized_description[$l] . "\"\n";
			$checkchanges++;
			}
		}
		// elseif ($edit_authorized_description[$l] != $edit_authorized_description_original[$l]) {
		// 	$historylog = $historylog ." - Authorized Description Info has been changed from \"". $edit_authorized_description_original[$l] ."\" to \"".$edit_authorized_description[$l] . "\"\n";
		// 	$checkchanges++;
		// }
		
		if (empty($edit_authorized_name[$l]) && empty($edit_authorized_description[$l])) {
			unset($edit_authorized_name[$l]);
			unset($edit_authorized_description[$l]);
		}
		// $edit_authorized_name[$l];
		// $edit_authorized_name_original[$l];
		// $edit_authorized_description[$l];
		// $edit_authorized_description_original[$l];
	}


	$edit_physicaltest = implode("|", $edit_physical_test);
	$edit_physicalspecification = implode("|", $edit_physical_specification);
	$edit_physicalmethod = implode("|", $edit_physical_method);
	$edit_physicalresults = implode("|", $edit_physical_results);
	$edit_chemicaltest = implode("|", $edit_chemical_test);
	$edit_chemicalunit = implode("|", $edit_chemical_unit);
	$edit_chemicalmin = implode("|", $edit_chemical_min);
	$edit_chemicalmax = implode("|", $edit_chemical_max);
	$edit_chemicalinput = implode("|", $edit_chemical_input);
	$edit_heavymetaltest = implode("|", $edit_heavymetal_test);
	$edit_heavymetalug = implode("|", $edit_heavymetal_ug);
	$edit_heavymetalinput = implode("|", $edit_heavymetal_input);
	$edit_microbiologicaltest = implode("|", $edit_microbiological_test);
	$edit_microbiologicalcfu = implode("|", $edit_microbiological_cfu);
	$edit_microbiologicalinput = implode("|", $edit_microbiological_input);

	$edit_preparedname = implode("|",$edit_prepared_name);
	$edit_prepareddescription = implode("|",$edit_prepared_description);
	$edit_reviewedname = implode("|",$edit_reviewed_name);
	$edit_revieweddescription = implode("|",$edit_reviewed_description);
	$edit_approvedname = implode("|",$edit_approved_name);
	$edit_approveddescription = implode("|",$edit_approved_description);
	$edit_authorizedname = implode("|",$edit_authorized_name);
	$edit_authorizeddescription = implode("|",$edit_authorized_description);

	// $edit_comment = " - ".trim($_POST['editcomment']);
	$productcomment = $productedit['comment'];
	
	$currentDatetemp2 = date('Y-m-d h:i:s a');
	$currentDate2 = "[".$currentDatetemp2."]";
	$modifieddate = date('Y-m-d');

	if (empty(trim($_POST['editcomment']))) {
		$edit_comment = $productcomment ;
	}
	else {
		$edit_comment = "Comment - ".$currentDate2."\n";
		$edit_comment = $edit_comment ." - ". trim($_POST['editcomment']);
		$edit_comment = $edit_comment ."\n". $productcomment;
	}

	if ($checkchanges > 0) {
		$historylog = "History Log - ". $currentDate2 ."\n" . $historylog . $edit_comment;
		// $historylog = $historylog . $edit_comment;
	}
	else
	{
		$historylog = $historylog . $edit_comment;
	}

	$historylog = "\n" . $historylog;

	$sql = "UPDATE `productrelease` SET `product_name` = '$edit_product_name',`account` = '$edit_account',`manufactured_quantity` = '$edit_manufactured_quantity',`control_num` = '$edit_control_num',`created_by` = '$edit_created_by',`assign_to` = '$edit_assign_to',`po_num` = '$edit_po_num',`status` = '$edit_status',`customer_name` = '$edit_customer_name',`manufacture_date` = '$edit_manufacture_date',`rev_num` = '$edit_rev_num',`expiration_date` = '$edit_expiration_date',`lot_num` = '$edit_lot_num',`serving_size` = '$edit_serving_size',`item_num` = '$edit_item_num',`serving_per` = '$edit_serving_per',`physicaltest`='$edit_physicaltest',`physicalspecification`='$edit_physicalspecification',`physicalmethod`='$edit_physicalmethod',`physicalresults`='$edit_physicalresults',`chemicaltest`='$edit_chemicaltest',`chemicalunit`='$edit_chemicalunit',`chemicalmin`='$edit_chemicalmin',`chemicalmax`='$edit_chemicalmax',`chemicalinput`='$edit_chemicalinput',`heavymetaltest`='$edit_heavymetaltest',`heavymetalug`='$edit_heavymetalug',`heavymetalinput`='$edit_heavymetalinput',`microbiologicaltest`='$edit_microbiologicaltest',`microbiologicalcfu`='$edit_microbiologicalcfu',`microbiologicalinput`='$edit_microbiologicalinput',`comment` = '$historylog',`date_modified` = '$modifieddate',`coa` = '$edit_coa',`batchrecord` = '$edit_batchrecord',`ftir` = '$edit_ftir',`preparedname` = '$edit_preparedname',`prepareddescription` = '$edit_prepareddescription',`reviewedname` = '$edit_reviewedname',`revieweddescription` = '$edit_revieweddescription',`approvedname` = '$edit_approvedname',`approveddescription` = '$edit_approveddescription',`authorizedname` = '$edit_authorizedname',`authorizeddescription` = '$edit_authorizeddescription' WHERE id = $edit_id";

	$status = $_GET['status'];
	if (mysqli_query($link, $sql)) {
		// echo '<script> window.location.href="assigned.php?status='.$status.'"; </script>';
		echo '<script> window.location.href="assigned.php?status=All"; </script>';	
	} else {
   		echo "Error 'Can't Edit Product Release. Try again later. ". mysqli_error($link);
	}
}
if (isset($_POST['delete'])) {
	$sql = "";
	$deleteid = $_POST['deleteid'];

	$sql = "DELETE FROM productrelease WHERE id = $deleteid";
	$status = $_GET['status'];
	if (mysqli_query($link, $sql)) {
		// echo '<script> window.location.href="assigned.php?status='.$status.'"; </script>';
		echo '<script> window.location.href="assigned.php?status=All"; </script>';	
	} else {
   		echo "Error 'Can't Delete  Product Release. Try again later. ". mysqli_error($link);
	}
}
if (isset($_GET['approved']) && isset($_GET['status'])) {
	
	$approveid = $_GET['approved'];
	$userid = $_SESSION["id"];
	$displayname = $_SESSION["displayname"];
	$historytemp = $link->query("SELECT comment FROM `productrelease` WHERE id = '$approveid'") or die($link->error);
	$history = $historytemp->fetch_assoc();

	$currentDatetemp3 = date('Y-m-d h:i:s a');
	$currentDate3 = "[".$currentDatetemp3."]";
	$modified1date = date('Y-m-d');

	$newhistory = " - \"".$displayname."\" has Approved this Product Release \n ".$history['comment'];
	$newhistory = "\n" . "History Log - ".$currentDate3. "\n".$newhistory;

	$statusapprove = "Approved";

	$sql = "UPDATE `productrelease` SET `comment`= '$newhistory',`status` = '$statusapprove',`date_modified` = '$modified1date' WHERE id = '$approveid'";

	$status = $_GET['status'];
	if (mysqli_query($link, $sql)) {
		// echo '<script> window.location.href="assigned.php?status='.$status.'"; </script>';
		echo '<script> window.location.href="assigned.php?status=All"; </script>';	
	}
    else
    {
        echo "Something went wrong. Please try again later.";
    }

}
?>