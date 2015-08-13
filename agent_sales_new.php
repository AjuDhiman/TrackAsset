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
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                                <i class="fa fa-edit"></i>Agent Sales Details
                        </div>
                        <div class="tools">
                                <a href="javascript:;" class="collapse">
                                </a>
                                <!--<a href="#portlet-config" data-toggle="modal" class="config">
                                </a>
                                <a href="javascript:;" class="reload">
                                </a>
                                <a href="javascript:;" class="remove">
                                </a>-->
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal"  method="POST"  action="#">
                                <div class="form-body">
                                    <div class="alert alert-danger display-hide">
                                                    <button class="close" data-close="alert"></button>
                                                    You have some form errors. Please check below.
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Agent Username</label>
                                        <div class="col-md-4">
                                            <select name="agentname" class="form-control">
                                                <?php $que = mysql_query("SELECT DISTINCT(`agent_name`) FROM sales_data ORDER BY `agent_name`");
                                                        while($res = mysql_fetch_array($que)){
                                                        ?>
                                                            <option value="<?php echo $res['agent_name']; ?>"><?php echo $res['agent_name']; ?></option>
                                                        <?php } ?>
                                            </select>
                                           <!-- <input name="agentname" id="tags" data-required="1" class="form-control" type="text" placeholder="Agent Username">
                                                            <span class="help-block"> A block of help text. </span>-->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Date Range</label>
                                        <div class="col-md-4">
                                        <div class="input-group input-large date-picker input-daterange" data-date-format="mm/dd/yyyy">
                                            <input class="form-control" placeholder="Start Date" type="text" name="from">
                                        <span class="input-group-addon"> to </span>
                                        <input class="form-control" placeholder="End Date" type="text" name="to">
                                        </div>
                                        <span class="help-block"> Please select date range </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions fluid">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button class="btn blue" name="submit" type="submit">Submit</button>

                                    </div>
                                </div>
                            </form>
                    </div>    
            </div>  
             <!-- END EXAMPLE TABLE PORTLET-->
             
	</div>
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-edit"></i>Agent Sales Result
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse">
                        </a>
                        <!--<a href="#portlet-config" data-toggle="modal" class="config">
                        </a>
                        <a href="javascript:;" class="reload">
                        </a>
                        <a href="javascript:;" class="remove">
                        </a>-->
                    </div>
                </div>
                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
			<thead class="flip-content">
                        <tr>
                            <th>Name</th>
                            <th>Total Sales</th>
                            <th>Total Amount</th>
                            <th>Total Refund</th>
                            <th>Refund Amount</th>
                            <th>Grand Total Sale</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(isset($_POST['submit'])){
                            //echo '<pre>';
                            //print_r($_POST); 
                            $AgentName = $_POST['agentname'];
                            $FromDate  = date("Y-m-d",strtotime($_POST['from']));
                            $ToDate    = date("Y-m-d",strtotime($_POST['to'])); 
                            
                            if(empty($AgentName) && $FromDate!='1969-12-31' && $ToDate!='1969-12-31'){
                                //echo 'Search by date';
                                //echo "SELECT  count(*) AS `total_sales` , SUM(amount) AS `total_amount` FROM `sales_data` WHERE `date` BETWEEN '".$FromDate."' AND '".$ToDate."'";
                                $Query = mysql_query("SELECT  count(*) AS `total_sales` , SUM(amount) AS `total_amount` FROM `sales_data` WHERE `date` BETWEEN '".$FromDate."' AND '".$ToDate."'");
                                $Query1 = mysql_query("SELECT  count(refund) AS total_refund,  SUM(amount) AS `refund_amount`  FROM `sales_data` WHERE `date` BETWEEN '".$FromDate."' AND '".$ToDate."' AND (`refund` = 'Refund' OR `refund` = 'refund' OR `refund` = 'Partial Payment' OR `refund` = 'partial payment' OR `refund` = 'Chargeback' OR `refund` = 'chargeback')");
                                
                            }
                            elseif(empty($AgentName) && $FromDate =='1969-12-31' && $ToDate =='1969-12-31'){
                                //echo 'All Emmpty';
                                $Query = mysql_query("SELECT  count(*) AS `total_sales` , SUM(amount) AS `total_amount` FROM `sales_data`");
                                $Query1 = mysql_query("SELECT  count(refund) AS total_refund,  SUM(amount) AS `refund_amount`  FROM `sales_data` WHERE (`refund` = 'Refund' OR `refund` = 'refund' OR `refund` = 'Partial Payment' OR `refund` = 'partial payment' OR `refund` = 'Chargeback' OR `refund` = 'chargeback')");
                            }
                            elseif(!empty($AgentName) && $FromDate=='1969-12-31' && $ToDate =='1969-12-31'){
                                //echo 'search by agent name';
                                //echo "SELECT  DISTINCT(count(*)) AS `total_sales` , agent_name, SUM(amount) AS `total_amount` FROM `sales_data` WHERE `agent_name`= '".$AgentName."' "; 
                                $Query = mysql_query("SELECT  DISTINCT(count(*)) AS `total_sales` , agent_name, SUM(amount) AS `total_amount` FROM `sales_data` WHERE `agent_name`= '".$AgentName."' ");
                                $Query1 = mysql_query("SELECT  agent_name, count(refund) AS total_refund,  SUM(amount) AS `refund_amount`  FROM `sales_data` WHERE `agent_name` = '".$AgentName."' AND (`refund` = 'Refund' OR `refund` = 'refund' OR `refund` = 'Partial Payment' OR `refund` = 'partial payment' OR `refund` = 'Chargeback' OR `refund` = 'chargeback') GROUP BY `agent_name`, `refund`");
                                
                            }
                            elseif(!empty($AgentName) && !empty($FromDate) && !empty($ToDate)){
                                //echo 'search by all';
                                //echo "SELECT  DISTINCT(count(*)) , SUM(amount) FROM `sales_data` WHERE `agent_name`= '".$AgentName."' and `date` BETWEEN '".$FromDate."' AND '".$ToDate."'";
                                $Query = mysql_query("SELECT  DISTINCT(count(*)) AS `total_sales` , agent_name, SUM(amount) AS `total_amount` FROM `sales_data` WHERE `agent_name`= '".$AgentName."' and `date` BETWEEN '".$FromDate."' AND '".$ToDate."'");
                                $Query1 = mysql_query("SELECT  agent_name, count(refund) AS total_refund,  SUM(amount) AS `refund_amount`  FROM `sales_data` WHERE `agent_name` = '".$AgentName."' AND `date` BETWEEN '".$FromDate."' AND '".$ToDate."' AND (`refund` = 'Refund' OR `refund` = 'refund' OR `refund` = 'Partial Payment' OR `refund` = 'partial payment' OR `refund` = 'Chargeback' OR `refund` = 'chargeback') GROUP BY `agent_name`, `refund`");
                                }
                            
                            else{
                                //echo 'all empty';
                                //echo "SELECT  DISTINCT(count(*)) AS `total_sales` , agent_name, SUM(amount) AS `total_amount` FROM `sales_data` GROUP BY `agent_name` ";
                                $Query = mysql_query("SELECT  DISTINCT(count(*)) AS `total_sales` , agent_name, SUM(amount) AS `total_amount` FROM `sales_data`");
                                $Query1 = mysql_query("SELECT  count(refund) AS total_refund,  SUM(amount) AS `refund_amount`  FROM `sales_data` WHERE (`refund` = 'Refund' OR `refund` = 'refund' OR `refund` = 'Partial Payment' OR `refund` = 'partial payment' OR `refund` = 'Chargeback' OR `refund` = 'chargeback')");
                                
                            }  
                            
                            $result = mysql_fetch_array($Query);
                            
                            $result1 = mysql_fetch_array($Query1);
                            //print_r($result).'<br>';
                            //print_r($result1);
                            $grand_total = $result['total_amount'] - $result1['refund_amount'];
                             
                        ?>
                        <tr>
                            <?php if(empty($AgentName) && $FromDate='1969-12-31' && $ToDate= '1969-12-31'){?>
                            <td> <?php echo 'All Sales'; ?> </td>
                           <?php  }else{?>
                            <td> <?php echo ucfirst($result['agent_name']); ?> </td>
                           <?php } ?>
                            <td> <?php echo $result['total_sales']; ?> </td>
                            <td> $<?php echo number_format($result['total_amount'],2); ?> </td>
                            <td> <?php echo $result1['total_refund'] ?></td>
                            <td> $<?php echo number_format($result1['refund_amount'],2); ?></td>
                            <td> $<?php echo number_format($grand_total,2); ?></td>
                        </tr>	
                        <?php }?> 
                        </tbody>
                    </table>
                </div>
            </div>
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