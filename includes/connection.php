<?php
$database = 'vrapur_sales';
$hostname = 'localhost';
$username = 'root';
$password = '';
$db = mysql_connect("$hostname", "$username", "$password") or die("Could not connect.");
        
    //$db = mysql_connect("$ho", "root", "") or die("Could not connect.");	 
    if(!$db)	 
        die("no db");
        if(!mysql_select_db("$database",$db))
            die("No database selected.");
?>