<?php 
    @ob_start();
    session_start(); 
    if(@$_SESSION['email']=='' && @$_SESSION['username']==''){
        header('location:index.php');
    }
    include('includes/l_header.php');
         
   ?>
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<!-- BEGIN HEADER -->
<?php include('includes/main_header.php');?>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<?php include_once('includes/left_sidebar.php');?>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN STYLE CUSTOMIZER -->
			<?php include_once('includes/setting.php'); ?>
			<!-- END STYLE CUSTOMIZER -->
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
                                            Welcome <small><?php echo ucfirst($_SESSION['username']);?></small>
					</h3>
					
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS -->
			<div class="row">							
                            <div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Result Table
							</div>
							
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
							<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Phone No.</th>
								<th>Customer Id.</th>
								<th>Plan</th>
								<th>Amount</th>
                                                                <th>Reason</th>
                                                                <th>Agent Name</th>
                                                                <th>Date</th>
                                                                <th>Refund/Cashback</th>
							</tr>
							</thead>
							<tbody>
                                                        <?php
                                                            if(isset($_POST['submit'])){
                                                             $custId = $_POST['custId'];   
                                                             $email = $_POST['email'];
                                                             $phone = $_POST['phone'];
                                                             $name  = $_POST['name'];

                                                             if($email!=''){
                                                                 //echo "SELECT * FROM `sales_data` WHERE `email` = '".$email."'";
                                                                 $query = mysql_query("SELECT * FROM `sales_data` WHERE `email` LIKE '%".$email."%'");
                                                                 $result_count = mysql_num_rows($query);
                                                                 
                                                             }
                                                             if($custId!=''){
                                                                 //echo "SELECT * FROM `sales_data` WHERE `email` = '".$email."'";
                                                                 $query = mysql_query("SELECT * FROM `sales_data` WHERE `cust_id` LIKE '%".$custId."%'");
                                                                 $result_count = mysql_num_rows($query);
                                                             }
                                                             if($phone!=''){
                                                                 //echo "SELECT * FROM `sales_data` WHERE `contact_no` LIKE'%".$phone."%' ORDER BY `id` ASC LIMIT 0 , 30"; 

                                                                 $query = mysql_query("SELECT * FROM `sales_data` WHERE `contact_no` LIKE '%".$phone."%' ORDER BY `id` ASC LIMIT 0 , 30");
                                                                 $result_count = mysql_num_rows($query);
                                                             }
                                                             if($name!=''){
                                                                 //echo "SELECT * FROM `sales_data` WHERE `cust_name`  LIKE '%".$name."%'";
                                                                 $query = mysql_query("SELECT * FROM `sales_data` WHERE `cust_fname`  LIKE '%".$name."%'");
                                                                 $result_count = mysql_num_rows($query);
                                                                 $result_data = mysql_fetch_array($query);
                                                                 //print_r($result_data);die();
                                                             }
                                                             //echo "SELECT * FROM `sales_data` WHERE `contact_no` = '".$phone."' OR `email` = '".$email."' OR `cust_name`  LIKE '%".$name."%' ORDER BY `date` DESC";
                                                             //$query = mysql_query("SELECT * FROM `sales_data` WHERE `contact_no` = '".$phone."' OR `email` = '".$email."' OR `cust_name`  LIKE '%".$name."%' ORDER BY `date` DESC");

                                                             if(@$result_count>0){
                                                                 $i = 1;

                                                                 while($result_data = mysql_fetch_array($query))
                                                                  {
                                                        ?>
                                                            
                                                       <tr style="background-color: #F2DEDE !important;">  
                                                            
                                                        <tr>
                                                            
                                                            <td> <?php echo $result_data['cust_fname']; ?> </td>
                                                            <td> <?php echo $result_data['email']; ?> </td>
                                                            <td> <?php echo $result_data['contact_no']; ?> </td>
                                                            <td> <?php echo $result_data['cust_id']; ?> </td>
                                                            <td> <?php echo $result_data['plan']; ?> </td>
                                                            <td> <?php echo $result_data['amount']; ?> </td>
                                                            <td> <?php echo $result_data['reason']; ?> </td>
                                                            <td> <?php echo $result_data['agent_name']; ?> </td>
                                                            <td> <?php echo $result_data['date']; ?> </td>
                                                            <?php if($result_data['refund']== 'refund' || $result_data['refund']== 'Refund' || $result_data['refund']== 'Chargeback' || $result_data['refund']== 'chargeback' || $result_data['refund']== 'Partial Payment' || $result_data['refund']== 'partial payment'){ ?>
                                                            <td style="background-color: #E02222 !important; color:#FFFFFF;"> 
                                                                <?php echo $result_data['refund']; ?> 
                                                            </td>
                                                            <?php }else{?>
                                                            <td > 
                                                                <?php echo $result_data['refund']; ?> 
                                                            </td> 
                                                            <?php }?>
							</tr>	
                                                        <?php  } }else {?>
                                                        <tr>
                                                            <td colspan="10"> <?php echo 'No Record Found'; ?> </td>
                                                       </tr>
                                                        <?php }}?> 
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>

          </div>
        </div>	
				
				
			</div>
			<!-- END DASHBOARD STATS -->
			<div class="clearfix"></div>
			
			
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<?php include('includes/footer.php');?>