<?php 
    @ob_start();
    session_start(); 
    if(@$_SESSION['email']=='' && @$_SESSION['username']==''){
        header('location:index.php');
    }
    include('includes/l_header.php');
    $an = @$_REQUEST['an'];    
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
                                                            <i class="fa fa-edit"></i><?php echo ucfirst($an); ?> Sales Report
							</div>
						</div>
                                            <style>
                                                .persale{
                                                    width:450px !important;
                                                }
                                                </style>
                                            <div class="portlet-body">
                                                <div class="table-toolbar">
<!--                                                    <div class="btn-group pull-right">
                                                        <button class="btn dropdown-toggle" data-toggle="dropdown">
                                                            Select Year
                                                            <i class="fa fa-angle-down"></i>
                                                         </button>
                                                        <ul class="dropdown-menu pull-right">
                                                        <?php   $year = 2013;
                                                                for($l = $year; $l<=date('Y'); $l++){?>
                                                            <li><a href="all_agents_sales.php?year=<?php echo $l;?>"><?php echo $l; ?></a></li>
                                                        <?php }?>
                                                        </ul>
                                                    </div>
                                                    <div class="btn-group pull-right">&nbsp;</div>-->
                                                    <div class="btn-group pull-right">
                                                        <button class="btn dropdown-toggle" data-toggle="dropdown">
                                                            Select Agent Name
                                                            <i class="fa fa-angle-down"></i>
                                                         </button>
                                                        <ul class="dropdown-menu pull-right">
                                                        <?php   
                                                            $agent = mysql_query("SELECT `username` FROM `users`");
                                                            while($agentlist = mysql_fetch_array($agent))
                                                        {?>
                                                            <li>
                                                                <a href="all_agents_sales.php?an=<?php echo $agentlist['username'];?>">
                                                                <?php echo ucfirst($agentlist['username']); ?>
                                                                </a>
                                                            </li>
                                                        <?php }?>
                                                        </ul>
                                                    </div>
                                                    
                                                    
                                                </div>
                                                <table class="persale table table-striped table-hover table-bordered" id="sample_editable_1">
                                                    <thead>
                                                        <?php if(!empty($an)){?>
                                                    <tr>
                                                            <th width="">Months</th>
                                                          <?php  if(!empty($ye))
                                                            {
                                                            echo '<th width="">'.$ye.'</th>';
                                                                }else{ ?>
                                                           <?php  
                                                                $Year = 2014;
                                                                for($i = $Year; $i<=date('Y'); $i++){
                                                                echo '<th width="">'.$i.'</th>';
                                                                } }
                                                            ?>						
                                                    </tr>
                                                        <?php }else{?>
                                                    <tr>
                                                        <th width="">Agent Name</th>
                                                        <th width="">Year</th>
                                                        <th width="">Total Amount </th>
                                                        <th width="">Total Sales</th>
                                                    </tr>
                                                        <?php }?>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    if(!empty($an))
                                                            {
                                                        for($m = 1;$m <= 12; $m++){
                                                        $month =  date("n", mktime(0, 0, 0, $m));
                                                        $mon   =  date("F", mktime(0, 0, 0, $m));
                                                        //echo "SELECT `agent_name`, MONTH(`date`)as 'month', YEAR(`date`) as 'year', ROUND(sum(`amount`),2) AS 'Total_sales_amount', COUNT(`amount`) AS Total_sales_count FROM `sales_data` WHERE `agent_name`= '".$an."' GROUP BY month, year, agent_name ORDER BY month"; 
                                                            //echo "SELECT `agent_name`, MONTH(`date`)as 'month', YEAR(`date`) as 'year', ROUND(sum(`amount`),2) AS 'Total_sales_amount', COUNT(`amount`) AS Total_sales_count FROM `sales_data` WHERE MONTH(`date`) = '".$month."' AND `agent_name`= '".$an."' GROUP BY month, year, agent_name ORDER BY month";
                                                            $Query = mysql_query( "SELECT `agent_name`, MONTH(`date`)as 'month', YEAR(`date`) as 'year', ROUND(sum(`amount`),2) AS 'Total_sales_amount', COUNT(`amount`) AS Total_sales_count FROM `sales_data` WHERE MONTH(`date`) = '".$month."' AND `agent_name`= '".$an."' GROUP BY month, year, agent_name ORDER BY month");
                                                            $QueryResult = mysql_fetch_array($Query);
                                                            $count = $QueryResult['Total_sales_count'];?>
                                                            <tr>
                                                                <td><?php echo $mon;?> <span style="color:#3399FF; font-size:12px; float: right;"><?php if(!empty($count))
                                                                    {echo '(Total Sales = '.$count.')';} ?></span> </td>
                                                                <td><?php echo $QueryResult['Total_sales_amount']; ?>  </td>
                                                            </tr>
                                                        <?php
                                                        }}
                                                        
                                                         else{   //echo "SELECT `agent_name`, YEAR(`date`) as 'year', ROUND(sum(`amount`),2) AS 'Total_sales_amount', COUNT(`amount`) AS Total_sales_count FROM `sales_data` GROUP BY  year, agent_name ORDER BY year";
                                                            $Query = mysql_query( "SELECT `agent_name`, YEAR(`date`) as 'year', ROUND(sum(`amount`),2) AS 'Total_sales_amount', COUNT(`amount`) AS Total_sales_count FROM `sales_data` GROUP BY  year, agent_name ORDER BY `agent_name`");
                                                            
                                                            while($QueryResult = mysql_fetch_array($Query)){?>
                                                            <tr>
                                                                <td> <?php echo $QueryResult['agent_name']; ?> </td>
                                                                <td> <?php echo $QueryResult['year'];?> </td>
                                                                <td> <?php echo $QueryResult['Total_sales_count']; ?>  </td>
                                                                <td> <?php echo $QueryResult['Total_sales_amount']; ?>  </td>
                                                            </tr> 
                                                        <?php  } } 
                                                        if(!empty($an)){?>
                                                            
                                                            <tr>
                                                                <td style=" background-color:#4285F4; color: #FFF; padding-left: 55px;">Grand Total</td>
                                                                <?php 
                                                                    $grand = mysql_query("SELECT round(sum(amount),2) as total FROM `sales_data` WHERE `agent_name` = '".$an."'"); 
                                                                    $grandtotal = mysql_fetch_array($grand);
                                                                ?>
                                                                <td>$<?php echo $grandtotal['total'];?></td>
                                                            </tr>
                                                            <?php } ?>
                                                    <!--<tr>
                                                        <td colspan="10"> <?php echo 'No Record Found'; ?> </td>
                                                   </tr>-->
                                                        
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