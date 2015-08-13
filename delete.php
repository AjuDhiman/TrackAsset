<?php

   include_once 'includes/connection.php';
   //echo $_REQUEST['id'];die();
   $id = $_REQUEST['id'];
   echo "DELETE FROM `users` WHERE `id` = $id";
   $del = mysql_query("DELETE FROM `users` WHERE `id` = $id");
   header("location:agent_list_new.php");
   
?>
