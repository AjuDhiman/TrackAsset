<?php
session_start();
if(@$_SESSION['email']=='' && @$_SESSION['username']==''){
        header('location:index.php');
    }
include('includes/connection.php');
if (isset($_POST['upload'])) 
    {
    
        if(!empty($_FILES["filename"]['tmp_name'])){
            //echo '<pre>';
            //print_r( $_FILES["filename"]);
            //echo 'hgdfidshgfkhgsdfhdsf'; die();
            if (is_uploaded_file($_FILES['filename']['tmp_name'])) 
                {
                     $msg =   "<span style='color:green; margin-left:250px;'>"."File uploaded successfully.".'</span>'; 
                     
                     header('location:upload_new.php?success=1');
                    //readfile($_FILES['filename']['tmp_name']);
                }

            //Import uploaded file to Database
            $handle = fopen($_FILES['filename']['tmp_name'], "r");
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
                {
                    $dated = explode('/', $data[0]);
                    $datenew = "$dated[2]-$dated[1]-$dated[0]";
                    $timestamp = strtotime($datenew);
                    $date_d = date(`Y-m-d`,$timestamp);
                    $import="INSERT INTO `sales_data`(`date`,`cust_id`,`cust_fname`,`cust_mname`,`cust_lname`,`contact_no`,`amount`,`plan`,`email`,`agent_name`,`tecnician`,`reason`,`address`,`refund`) "
                       . "values('$datenew','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]','$data[12]','$data[13]')";

                    mysql_query($import) or die(mysql_error());
                }

            fclose($handle);

            //print "Data Import done";
        }
        else{
           $msg =  "<span style='color:red; margin-left:250px;'>".'Please Choose File First then click on upload'.'</span>';
           header('location:upload_new.php?success=0');
        }
    }
    ?>