<?php 
    @ob_start();
    session_start(); 
    if(@$_SESSION['email']=='' && @$_SESSION['username']==''){
        header('location:index.php');
    }
    include('includes/l_header.php');
        $query = mysql_query("SELECT * FROM `sales_data` ORDER BY `date` DESC");
        $Query = mysql_query("SELECT  count(*) AS `total_sales` , SUM(amount) AS `total_amount` FROM `sales_data`");
        $Query1 = mysql_query("SELECT   count(refund) AS total_refund,  SUM(amount) AS `refund_amount`  FROM `sales_data` WHERE  (`refund` = 'Refund' OR `refund` = 'refund' OR `refund` = 'Partial Payment' OR `refund` = 'partial payment' OR `refund` = 'Chargeback' OR `refund` = 'chargeback') ");
        $result_count = mysql_num_rows($query); 
        $result = mysql_fetch_array($Query);
        $result1 = mysql_fetch_array($Query1);
        if(isset($_POST['search'])){
            print_r($_POST);
           $FromDate  = date("Y-m-d",strtotime($_POST['from']));
           $ToDate    = date("Y-m-d",strtotime($_POST['to'])); 
            if($FromDate!='' && $ToDate!= ''){

                $query = mysql_query("SELECT  * FROM `sales_data` WHERE `date` BETWEEN '".$FromDate."' AND '".$ToDate."' ORDER BY `date`");
                //echo "SELECT  count(*) AS `total_sales` , SUM(amount) AS `total_amount` FROM `sales_data` WHERE `date` BETWEEN '".$FromDate."' AND '".$ToDate."'";
                $Query = mysql_query("SELECT  count(*) AS `total_sales` , SUM(amount) AS `total_amount` FROM `sales_data` WHERE `date` BETWEEN '".$FromDate."' AND '".$ToDate."'");
                //echo "SELECT  count(*) AS total_refund,  SUM(amount) AS `refund_amount`  FROM `sales_data` WHERE `date` BETWEEN '".$FromDate."' AND '".$ToDate."' AND (`refund` = 'Refund' OR 'refund' OR 'Partial Payment' OR 'partial payment' OR 'Chargeback' OR 'chargeback')";  die();             
                $Query1 = mysql_query("SELECT  count(*) AS total_refund,  SUM(amount) AS `refund_amount`  FROM `sales_data` WHERE `date` BETWEEN '".$FromDate."' AND '".$ToDate."' AND (`refund` = 'Refund' OR `refund` = 'refund' OR `refund` = 'Partial Payment' OR `refund` = 'partial payment' OR `refund` = 'Chargeback' OR `refund` = 'chargeback') ");
                $result_count = mysql_num_rows($query);
                $result = mysql_fetch_array($Query);
                $result1 = mysql_fetch_array($Query1);

            }
            if($FromDate=='1970-01-01' && $ToDate== '1970-01-01'){
                $Query = mysql_query("SELECT  count(*) AS `total_sales` , SUM(amount) AS `total_amount` FROM `sales_data`");
                $Query1 = mysql_query("SELECT   count(refund) AS total_refund,  SUM(amount) AS `refund_amount`  FROM `sales_data` WHERE  (`refund` = 'Refund' OR `refund` = 'refund' OR `refund` = 'Partial Payment' OR `refund` = 'partial payment' OR `refund` = 'Chargeback' OR `refund` = 'chargeback') ");
                $result = mysql_fetch_array($Query);
                $result1 = mysql_fetch_array($Query1);
            }
        }


        if(@$_REQUEST['data']==='refund'){

             $query = mysql_query("SELECT * FROM `sales_data` WHERE (`refund` = 'Refund' OR `refund` = 'refund' OR `refund` = 'Partial Payment' OR `refund` = 'partial payment' OR `refund` = 'Chargeback' OR `refund` = 'chargeback') ");
             $result_count = mysql_num_rows($query);
            }
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
                                                    <div class="tools">
                                                        <!--<a class="config" data-toggle="modal" href="#portlet-config"> </a>
                                                        <a class="reload" href="javascript:;"> </a>
                                                        <a class="remove" href="javascript:;"> </a>-->
                                                        <span style="color: #000;">Total Sales =</span> <?php echo $result['total_sales']; ?>,
                                                        <span style="color: #000;">Total Amount =</span> $<?php echo number_format($result['total_amount'], 2); ?>,
                                                        <span style="color: #000;">Total Refunds =</span> <?php echo $result1['total_refund']; ?>,
                                                        <span style="color: #000;">Total Refund Amount =</span> $<?php echo number_format($result1['refund_amount'], 2); ?>
                                                        <a class="collapse" href="javascript:;"> </a>
                                                        
                                                    </div>
                                            </div>
                                            
                                            
                                            
                                            <!-- test data-->
                                            <div class="portlet-body flip-scroll">
                                                <div class="table-toolbar">
                                                    
                                                    <div style="float: right;" class="btn-group">
                                                       <a href="all_customer_data.php?data=refund"> <button id="sample_editable_1_new" class="btn green">
                                                        Refund
                                                           </button></a>
                                                    </div>
                                                </div>
                                                    <form class="form-horizontal"  method="POST"  action="all_customer_data.php">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="col-md-9 btn-search">
                                                                <div class="form-group">
                                                                    <div class="col-md-4">
                                                                        <div class="input-group input-large date-picker input-daterange" data-date-format="mm/dd/yyyy">
                                                                            <input class="form-control" placeholder="Start Date" type="text" name="from">
                                                                        <span class="input-group-addon"> to </span>
                                                                        <input class="form-control" placeholder="End Date" type="text" name="to">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                                </div>
                                                               <div class="col-md-3">
                                                                    <div class="btn-search">
                                                                        <button type="submit" name="search" class="btn blue"><i class="fa fa-check"></i>Search</button>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                         
                                                        </div>
                                                    </form>
							<table class="table table-bordered table-striped table-condensed flip-content">
							<thead class="flip-content">
							<tr>
								<th width="20%">
									 Name
								</th>
								<th>
									 Phone no.
								</th>
								<th class="numeric">
									 Customer Id
								</th>
								<th class="numeric">
									 Plan
								</th>
								<th class="numeric">
									 Amount
								</th>
								<th class="numeric">
									 Reason
								</th>
								<th class="numeric">
									 Agent Name
								</th>
								<th class="numeric">
									 Date
								</th>
								<th class="numeric">
									 Refund/Chargeback
								</th>
							</tr>
							</thead>
							<tbody>
                                                            <?php
                                                                
                                                                if(@$result_count>0){
                                                                     $i = 1;
                                                                    while($result_data = mysql_fetch_array($query))
                                                                      {
                                                            ?>
                                                            <tr>
								<td>
								<?php 
                                                                    $namedd = explode(' ', $result_data[3]);
                                                                    echo $namedd[0];
                                                                ?>
								</td>
                                                                <td> <?php if($result_data[6]==''){echo 'None';}else{echo chunk_split($result_data[6], 10);} ?> </td>
                                                                <td> <?php if($result_data[2]==''){ echo 'None';}else{echo $result_data[2];} ?> </td>
                                                                <td> <?php echo $result_data[8]; ?> </td>
                                                                <td> $<?php echo $result_data[7]; ?> </td>
                                                                <td> <?php if($result_data['reason']==''){echo 'None';}else{ echo $result_data['reason'];} ?> </td>
                                                                <td> <?php echo $result_data['agent_name']; ?> </td>
                                                                <td> <?php echo $result_data[1]; ?> </td>
                                                                <?php if($result_data[14]== 'refund' || $result_data[14]== 'Refund' || $result_data[14]== 'Chargeback' || $result_data[14]== 'chargeback' || $result_data[14]== 'Partial Payment' || $result_data[14]== 'partial payment'){ ?>
                                                                <td style="background-color: #E02222 !important; color:#FFFFFF;"> 
                                                                    <?php echo $result_data[14]; ?> 
                                                                </td>
                                                                <?php }else{?>
                                                                <td > 
                                                                    <?php echo 'None'; ?> 
                                                                </td> 
                                                                <?php }?>
                                                            </tr>	
                                                            <?php  } }else {?>
                                                            <tr>
                                                                <td colspan="10"> <?php echo 'No Record Found'; ?> </td>
                                                            </tr>
                                                        <?php }//}?> 
							</tbody>
							</table>
						</div>
					</div>
                                            <!-- test data-->
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