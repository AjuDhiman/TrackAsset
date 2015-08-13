<?php
$database = 'import';
$hostname = 'localhost';
$username = 'root';
$password = '';
$db = mysql_connect("$hostname", "$username", "$password") or die("Could not connect.");
        
    //$db = mysql_connect("$ho", "root", "") or die("Could not connect.");	 
    if(!$db)	 
        die("no db");
        if(!mysql_select_db("$database",$db))
            die("No database selected.");
			
	if(isset($_GET['term'])){
	$term = $_GET['term'];
$return_arr = array();
//print_r($return_arr);
//echo "SELECT DISTINCT(`agent_name`) FROM `sales_data` WHERE `agent_name` LIKE '%$term%'";
$query = mysql_query("SELECT DISTINCT(`agent_name`) FROM `sales_data` WHERE `agent_name` LIKE '$term%'");
while($result = mysql_fetch_array($query)){
$name[] = $result['agent_name'];
}
echo json_encode($name);
}	
?>