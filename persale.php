<?php 
    @ob_start();
    session_start(); 
    if(@$_SESSION['email']=='' && @$_SESSION['username']==''){
        header('location:index.php');
    }
    include('includes/l_header.php');
    $ye = @$_REQUEST['year'];    
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
								<i class="fa fa-edit"></i>Your Performance
							</div>
						</div>
                                            <style>
                                                .persale{
                                                    width:250px !important;
                                                }
                                                </style>
                                            <div class="portlet-body">
                                                <div class="table-toolbar">
                                                <div class="btn-group pull-right">
                                                    <button class="btn dropdown-toggle" data-toggle="dropdown">
                                                        Select Year
                                                        <i class="fa fa-angle-down"></i>
                                                     </button>
                                                    <ul class="dropdown-menu pull-right">
                                                    <?php   $year = 2013;
                                                            for($l = $year; $l<=date('Y'); $l++){?>
                                                        <li><a href="persale.php?year=<?php echo $l;?>"><?php echo $l; ?></a>
                                                    <?php }?>
                                                    </div>
                                                </div>
                                                <table class="persale table table-striped table-hover table-bordered" id="sample_editable_1">
                                                    <thead>
                                                    <tr>
                                                            <th width=""></th>
                                                          <?php  if(!empty($ye))
                                                            {
                                                            echo '<th width="">'.$ye.'</th>';
                                                                }else{ ?>
                                                           <?php  
                                                                $Year = 2015;
                                                                for($i = $Year; $i<=date('Y'); $i++){
                                                                echo '<th width="">'.$i.'</th>';
                                                                } }
                                                            ?>						
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        for($m = 1;$m <= 12; $m++){
                                                        $month =  date("n", mktime(0, 0, 0, $m));
                                                        $mon   =  date("F", mktime(0, 0, 0, $m));
                                                        if(!empty($ye))
                                                            {
                                                            $Query = mysql_query(   "SELECT 
                                                                                YEAR(`date`) as 'year', 
                                                                                MONTH(`date`)as 'month', 
                                                                                ROUND(sum(`amount`),2) AS 'Total_sales_amount', 
                                                                                COUNT(`amount`) AS Total_sales_count  
                                                                                FROM `sales_data` 
                                                                                WHERE MONTH(`date`) = '".$month."' AND YEAR(`date`) = '".$ye."' AND`agent_name`= '".$_SESSION['username']."' 
                                                                                GROUP BY month, year ORDER BY  month");
                                                            }
                                                        else{
                                                                                                                        
                                                            $Query = mysql_query(   "SELECT 
                                                                                YEAR(`date`) as 'year', 
                                                                                MONTH(`date`)as 'month', 
                                                                                ROUND(sum(`amount`),2) AS 'Total_sales_amount', 
                                                                                COUNT(`amount`) AS Total_sales_count  
                                                                                FROM `sales_data` 
                                                                                WHERE MONTH(`date`) = '".$month."' AND YEAR(`date`) = '2015'  AND`agent_name`= '".$_SESSION['username']."' 
                                                                                GROUP BY month, year ORDER BY  month");
                                                            
                                                        }
                                                        
                                                        $QueryResult = mysql_fetch_array($Query);
                                                        $count = $QueryResult['Total_sales_count'];

                                                    ?>
                                                    <tr>
                                                        <td><?php echo $mon;?> <span style="color:#3399FF; font-size:12px; float: right;"><?php if(!empty($count))
                                                            {echo '(Total Sales = '.$count.')';} ?></span> </td>
                                                        
                                                        <td><?php echo $QueryResult['Total_sales_amount']; ?>  </td>
                                                        
                                                    </tr>	
                                                        <?php }?>
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