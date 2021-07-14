<?php 

$accountsedit = $link->query("SELECT accounts.account_id,accounts.account_name,productrelease.account,COUNT(productrelease.id) FROM `accounts` LEFT JOIN `productrelease` ON accounts.account_name = productrelease.account GROUP BY accounts.account_name DESC") or die($link->error);

$accountsview = $link->query("SELECT accounts.account_id,accounts.account_name,productrelease.account,COUNT(productrelease.id) FROM `accounts` LEFT JOIN `productrelease` ON accounts.account_name = productrelease.account GROUP BY accounts.account_name DESC") or die($link->error);

$accountsdelete = $link->query("SELECT accounts.account_id,accounts.account_name,productrelease.account,COUNT(productrelease.id) FROM `accounts` LEFT JOIN `productrelease` ON accounts.account_name = productrelease.account GROUP BY accounts.account_name DESC") or die($link->error);

if (isset($_POST['save'])) {
	$editid = trim($_POST['editid']);
	$editaccount = trim($_POST['editaccount']);

	$editinfotemp = $link->query("SELECT * FROM `accounts` WHERE account_id = $editid") or die($link->error);
	$editinfo = $editinfotemp->fetch_assoc();
	$previousaccount = $editinfo['account_name'];

	$sql1 = "UPDATE `accounts` SET `account_name` = '$editaccount' WHERE `account_id` = $editid";
	$sql2 = "UPDATE `productrelease` SET `account` = '$editaccount' WHERE `account` = '$previousaccount'";
	
	if (mysqli_query($link, $sql1) && mysqli_query($link, $sql2)) {
		echo '<script> window.location.href="manageaccounts.php"; </script>';
	} else {
   		echo "Error 'Can't Delete Account. Try again later. ". mysqli_error($link);
	}

}
if (isset($_POST['addnewaccount'])) {
	$newaccount = trim($_POST['account']);
	
	$sql = "";
	$sql = "INSERT INTO accounts (`account_name`) VALUES ('$newaccount')";

	if (mysqli_query($link, $sql)) {
		// echo '<script> window.location.href="productrelease.php?account='.$account.'&status='.$status.'"; </script>';
		echo '<script> window.location.href="manageaccounts.php"; </script>';
	} else {
   		echo "Error 'Can't Add Account. Try again later. ". mysqli_error($link);
	}
}

if (isset($_POST['delete'])) {
	$sql = "";
	$deletename = $_POST['deletename'];

	$sql1 = "DELETE FROM `productrelease` WHERE account = '$deletename'";
	$sql2 = "DELETE FROM `accounts` WHERE account_name = '$deletename'";
	if (mysqli_query($link, $sql1) && mysqli_query($link, $sql2)) {
		echo '<script> window.location.href="manageaccounts.php"; </script>';
	} else {
   		echo "Error 'Can't Delete Account. Try again later. ". mysqli_error($link);
	}
}
 ?>