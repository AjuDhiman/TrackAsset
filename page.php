<?php

include("includes/connection.php"); //include config file

//sanitize post value
$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

//validate page number is really numaric
if(!is_numeric($page_number)){die('Invalid page number!');}

//get current starting point of records
$position = ($page_number * $item_per_page);

//Limit our results within a specified range. 
$results = mysqli_query($connecDB,"SELECT * FROM `sales_data` ORDER BY id ASC LIMIT $position, $item_per_page");

//output results from database
echo '<ul class="page_result">';
while($row = mysqli_fetch_array($results))
{
	echo '<li id="item_'.$row["id"].'">'.$row["id"].'. <span class="page_name">'.$row["cust_name"].'</span><span class="page_message">'.$row["agent_name"].'</span></li>';
}
echo '</ul>';
?>

