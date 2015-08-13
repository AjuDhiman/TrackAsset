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
<?php  include('includes/main_header.php');?>
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
        <div class="tabbable tabbable-custom boxless tabbable-reversed">
            <div class="tab-content">                     
            <div class="portlet box blue">
                    <div class="portlet-title">
                            <div class="caption">
                                    <i class="fa fa-reorder"></i>Customer Data Information
                            </div>
                            <div class="tools">
                                    <a href="javascript:;" class="collapse"></a>                                            
                            </div>
                    </div>
<!--                        <script type="text/javascript">
                            function validate()
                                { 
                                    if( document.customer_data.cust_no.value == "" ||
                                    isNaN( document.customer_data.cust_no.value) ||
                                    document.customer_data.cust_no.value.length != 10 )
                                    {
                                        alert( "Please provide a Valid Contact no." );
                                        document.customer_data.cust_no.focus() ;
                                        return false;
                                    }
                                return( true );
                                }
                        </script>-->
                    <div class="portlet-body form">
                        
                        <?php
                            if(isset($_POST['save'])){
                                $cust_id = $_POST['cust_id'];
                                $cust_fname = $_POST['cust_fname'];
                                $cust_mname = $_POST['cust_mname'];
                                $cust_lname = $_POST['cust_lname'];
                                $cust_email = $_POST['cust_email'];
                                $cust_no = $_POST['cust_no'];
                                $plan = $_POST['plan'];
                                $sale_amount = $_POST['sale_amount'];
                                $reason = $_POST['reason'];
                                $refund = $_POST['refund'];
                                $address = $_POST['address'];
                                $agent_name = $_POST['agent_name'];
                                $technician = $_POST['technician'];
                                $date = date('Y-m-d').'<br>';
                                
                                if (!filter_var($cust_email, FILTER_VALIDATE_EMAIL)) {
                                    $emailErr = "Invalid email Address";
                                    echo '<span style="color:red; width:100%; margin-left:350px;">'.$emailErr.'</span>'.'<br>';
                                    
                                    }
                               
                                elseif(empty($cust_id) && empty($cust_fname) && empty($cust_email) && empty($cust_no) 
                                        && empty($plan) && empty($sale_amount) && empty($reason) && empty($address)  && empty($agent_name)){
                                    echo '<span style="color:red; width:100%; margin-left:350px;">Please fill all the mandatory fields</span>';
                                }
                                else{
//                                    echo "INSERT INTO `sales_data` SET 
//                                                        `cust_id`       = '".$cust_id."',
//                                                        `cust_fname`     = '".$cust_fname."',
//                                                        `cust_mname`     = '".$cust_mname."', 
//                                                        `cust_lname`     = '".$cust_lname."', 
//                                                        `email`         = '".$cust_email."',
//                                                        `contact_no`    = '".$cust_no."',
//                                                        `plan`          = '".$plan."',
//                                                        `amount`        = '".$sale_amount."',
//                                                        `reason`        = '".$reason."',
//                                                        `refund`        = '".$refund."',
//                                                        `address`       = '".$address."',
//                                                        `agent_name`    = '".$agent_name."',
//                                                        `tecnician`     = '".$technician."',
//                                                        `date`         = '".$date."'
//                                                        ";die();
                                $query = mysql_query("INSERT INTO `sales_data` SET 
                                                        `cust_id`       = '".$cust_id."',
                                                        `cust_fname`     = '".$cust_fname."',
                                                        `cust_mname`     = '".$cust_mname."', 
                                                        `cust_lname`     = '".$cust_lname."', 
                                                        `email`         = '".$cust_email."',
                                                        `contact_no`    = '".$cust_no."',
                                                        `plan`          = '".$plan."',
                                                        `amount`        = '".$sale_amount."',
                                                        `reason`        = '".$reason."',
                                                        `refund`        = '".$refund."',
                                                        `address`       = '".$address."',
                                                        `agent_name`    = '".$agent_name."',
                                                        `tecnician`     = '".$technician."',
                                                        `date`         = '".$date."'
                                                        ");
                                
                                 echo'<script>window.location="customer_data.php";</script>';
                                //echo "INSERT INTO `users` SET  `username` = '".$name."', `password` = '".$password."' ";
                                }
                            } 
                        ?>
                            <!-- BEGIN FORM-->
                            <form action="#" method="POST" name="customer_data" class="horizontal-form" onsubmit="return(validate());">
                                    <div class="form-body">
                                        <!--<span class="help-block"> Fields that have <span class="required"> * </span> are mandatory!  </span>-->
                                            <h3 class="form-section">Customer Information </h3>
                                            <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Customer ID <span class="required"> * </span></label>
                                                            <input name="cust_id" required="required" id="cust_id" class="form-control" type="text" placeholder="Customer ID">
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Customer First Name <span class="required"> * </span></label>
                                                            <input name="cust_fname" required="required" id="cust_fname" class="form-control" type="text" placeholder="Customer Name">
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                            </div>
                                            <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Customer Middle Name</label>
                                                            <input name="cust_mname" id="cust_mname" class="form-control" type="text" placeholder="Customer Middle Name">
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Customer Last Name</label>
                                                            <input name="cust_lname" id="cust_lname" class="form-control" type="text" placeholder="Customer Last Name">
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="control-label">Customer Email <span class="required"> * </span></label>
                                                        <input name="cust_email" required="required" id="cust_email" class="form-control" type="text" placeholder="Customer Email">
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Customer No. <span class="required"> * </span></label>
                                                            <input name="cust_no" required="required" id="cust_no" class="form-control" type="text" placeholder="Customer No.">
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Plan <span class="required"> * </span></label>
                                                                <select name="plan" class="form-control">
                                                                    <option value="custom plan">Custom Plan</option>
                                                                    <option value="SOHO">SOHO</option>
                                                                    <option value="One Time">One Time</option>
                                                                    <option value="Three Month">3 Month</option>
                                                                    <option value="Six Month">6 Month</option>
                                                                    <option value="One Year">One Year</option>
                                                                    <option value="Two Year">Two Year</option>
                                                                    <option value="Three Year">Three Year</option>
                                                                    <option value="Annual plan-3 PC + Norton360">Annual plan-3 PC + Norton360</option>
                                                                    <option value="Annual plan-2 PC + Norton360">Annual plan-2 PC + Norton360</option>
                                                                    <option value="Annual plan + Norton360">Annual plan + Norton360</option>
                                                                    <option value="Annual plan">Annual plan</option>
                                                                    <option value="Annual plan">Annual plan</option>
                                                                    <option value="Annual plan-2 PC">Annual plan-2 PC</option>
                                                                    <option value="Annual plan-3 PC">Annual plan-3 PC</option>
                                                                    <option value="Half-yearly Plan">Half-yearly Plan</option>
                                                                    <option value="Quarterly Plan">Quarterly Plan</option>
                                                                    <option value="Upgrade Incident/Add-on">Upgrade Incident/Add-on</option>
                                                                    <option value="Per Incident plan">Per Incident plan</option>
                                                                    <option value="Upgrade Quarterly">Upgrade Quarterly</option>
                                                                    <option value="Upgrade Half Yearly">Upgrade Half Yearly</option>
                                                                </select>
                                                            </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Sale Amount <span class="required"> * </span></label>
                                                                <input name="sale_amount" required="required" id="sale_amount" class="form-control" type="text" placeholder="Sale Amount">
                                                            </div>
                                                    </div>
                                                    <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Reason <span class="required"> * </span></label>
                                                                <input name="reason" required="required" id="reason" data-required="1" class="form-control" type="text" placeholder="Reason">
                                                            </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Customer Address <span class="required"> * </span></label>
                                                                <input name="address" required="required" id="address" data-required="1" class="form-control" type="text" placeholder="Customer Address">
                                                            </div>
                                                    </div>
                                                    <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                                    <label class="control-label">Refund</label>
                                                                    <input name="refund" id="refund" class="form-control" type="text" placeholder="Refund">
                                                            </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                            <div class="form-group">

                                                            </div>
                                                    </div>
                                                    <!--/span-->
                                            </div>
                                            <h3 class="form-section">Agent Information</h3>
                                            <div class="row">
                                                    <div class="col-md-6 ">
                                                        <div class="form-group">
                                                            <label class="control-label">Agent Name <span class="required"> * </span></label>
                                                            <input name="agent_name" required="required" value="<?php echo ucfirst($_SESSION['username']); ?>" readonly="readonly" id="agent_name" data-required="1" class="form-control" type="text" placeholder="Agent Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Technician</label>
                                                            <input name="technician" id="technician" class="form-control" type="text" placeholder="Technician">
                                                        </div>
                                                    </div>
                                            </div>
                                            <!--/row-->

                                    </div>
                                    <div class="form-actions right">
                                        <button type="submit" name="save" class="btn blue"><i class="fa fa-check"></i> Save</button>
                                    </div>
                            </form>
                            <!-- END FORM-->
                    </div>
            </div>
            </div>
        </div>
    </div>
    <!--<div class="col-md-12">
            <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption">
                                        <i class="fa fa-edit"></i>Add New Agent
                                </div>
                                <div class="tools">
                                        <a href="javascript:;" class="collapse">
                                        </a>
                                </div>
                            </div>
                            <div class="portlet-body form">
                               <form class="form-horizontal" id=""  method="POST"  action="#">
                                    <div class="form-body">
                                        <div class="alert alert-danger display-hide">
                                            <button class="close" data-close="alert"></button>
                                            You have some form errors. Please check below.
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Customer ID</label>
                                            <div class="col-md-4">
                                                <input name="cust_id" id="cust_id" class="form-control" type="text" placeholder="Customer ID">                                                          
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Customer Name</label>
                                            <div class="col-md-4">
                                                <input name="cust_name" id="cust_name" class="form-control" type="text" placeholder="Customer Name">

                                            </div>
                                        </div>                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Customer Email</label>
                                            <div class="col-md-4">
                                                <input name="cust_email" id="cust_email" class="form-control" type="text" placeholder="Customer Email">
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Customer No.</label>
                                            <div class="col-md-4">
                                                <input name="cust_no" id="cust_no" class="form-control" type="text" placeholder="Customer No.">
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Plan</label>
                                            <div class="col-md-4">
                                                <input name="plan" id="plan" class="form-control" type="text" placeholder="Plan">                                                          
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Sale Amount</label>
                                            <div class="col-md-4">
                                                <input name="sale_amount" id="sale_amount" class="form-control" type="text" placeholder="Sale Amount">

                                            </div>
                                        </div>                                      
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Reason</label>
                                            <div class="col-md-4">
                                                <input name="Reason" id="Reason" data-required="1" class="form-control" type="text" placeholder="Reason">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Reason</label>
                                            <div class="col-md-4">
                                                <input name="address" id="address" data-required="1" class="form-control" type="text" placeholder="Customer Address">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Agent Name</label>
                                            <div class="col-md-4">
                                                <input name="agent_name" id="agent_name" data-required="1" class="form-control" type="text" placeholder="Agent Name">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Technician</label>
                                            <div class="col-md-4">
                                                <input name="technician" id="technician" class="form-control" type="text" placeholder="Technician">                                                          
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Refund</label>
                                            <div class="col-md-4">
                                                
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="form-actions fluid">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button class="btn blue" name="add" type="submit">Add</button>
                                        </div>
                                    </div>
                                </form>
                            </div>    
                    </div>                                         
                            
            </div>-->
    
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