<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', '');
// define('DB_NAME', 'coa');


//  Attempt to connect to MySQL database

$link = mysqli_connect('localhost','root','','coa');

// $product_name = $manufactured_quantity = $control_num = $created_by = $assign_to = $po_num = $status = $customer_name = $manufactured_date = $rev_num = $expiration_date = $lot_num = $serving_size = $item_num = $serving_per = $appearance1 = $appearance2 = $appearance3 = $order_n_taste1 = $order_n_taste2 = $order_n_taste3 = $identification1 = $identification2 = $identification3 = $hydrated1 = $hydrated2 = $hydrated3 = $gluten1 = $gluten2 = $gluten3 = $soy1 = $soy2 = $soy3 = $protein = $vita_a = $vita_c = $vita_d = $vita_e = $vita_b1 = $vita_b2 = $vita_b3 = $vita_b6 = $folate = $vita_b12 = $biotin = $pantothenic = $calcium = $iron = $phosphorus = $iodine = $magnesium = $zinc = $selenium = $copper = $manganese = $chromium = $molybdenum = $chloride = $sodium = $potassium = $yellow_pea = $organic_pure = $organic_coconut = $organic_maca = $organic_beet = $inulin = $amylase = $arsenic = $cadmium = $lead = $mercury = $total_plate = $yeast_n_mold = $comment = "";
// Check connection

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

session_start();
// SQL statement sample

//  INSERT A DATA INTO TABLE 

// $sqlstatement = "INSERT INTO table (column1, column2, column3) VALUES ('$sample1', '$sample2', '$sample3')";
// $sqlstatement = "INSERT table SET column1 = '$sample1',column2 = '$sample2',column3 = '$sample3'";

// if (mysqli_query($link, $sqlstatement)) {
//   echo "Success";
// } else {
//   echo "Error 'additional message here' ": " . mysqli_error($link);
// }

//  READ A TABLE 

// Declare an ID first
// $ID = 1;

// if single data is displayed

// $getdata = $link->query("SELECT * FROM table where id = '$ID' ") or die($link->error);
// viewdata = getdata->fetch_assoc()
// viewdata['column2'];
// viewdata['column2'];
// viewdata['column2'];

// if multiple data is displayed

// $getdata = $link->query("SELECT * FROM table where id = '$ID' ") or die($link->error);
// while(viewdata = getdata->fetch_assoc())
// {
// 	viewdata['column2'];
// 	viewdata['column2'];
// 	viewdata['column2'];
// }

//  UPDATE A DATA INTO TABLE 

// Declare an ID first
// $ID = 1;
// $sqlstatement = "UPDATE table SET column1 = '$sample1',column2 = '$sample2',column3 = '$sample3' WHERE id = $ID";
// if (mysqli_query($link, $sqlstatement)) {
//   echo "Success";
// } else {
//   echo "Error 'additional message here' ": " . mysqli_error($link);
// }

//  DELETE A ROW 

// Declare an ID first
// $ID = 1;
// $sqlstatement = "DELETE FROM table WHERE id = $ID";
// if (mysqli_query($link, $sqlstatement)) {
//   echo "Success";
// } else {
//   echo "Error 'additional message here' ": " . mysqli_error($link);
// }

//  PUT THIS LINE IF YOU INSERT OR UPDATE A TABLE
// mysqli_close($link);
?>