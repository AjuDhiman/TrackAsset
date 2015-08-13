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
								<i class="fa fa-edit"></i>All Agent List
							</div>
							
						</div>
						<div class="portlet-body  flip-scroll">
							<div class="table-toolbar">
								<div class="btn-group">
                                                                    <a href="add_new_agent.php"><button id="sample_editable_1_new" class="btn green">
									Add New Agent <i class="fa fa-plus"></i>
                                                                        </button></a>
								</div>
								
							</div>
							<table class="table table-bordered table-striped table-condensed flip-content">
							<thead class="flip-content">
							<tr>
                                                            <th>Sno.</th>
                                                            <th>Name</th>
                                                            <th>Agent Type</th>
                                                            <th>Username</th>
                                                            <th>Password</th>
                                                            <th>Edit</th>
                                                            <th>Delete</th>
							</tr>
							</thead>
							<tbody>
                                                        <?php
                                                            //echo "SELECT * FROM `sales_data` WHERE `cust_name`  LIKE '%".$name."%'";
                                                            $query = mysql_query("SELECT * FROM `users` where `id` >1");
                                                            $result_count = mysql_num_rows($query);
                                                            if($result_count>0){
                                                            $i = 1;

                                                            while($result_data = mysql_fetch_array($query))
                                                             {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $i++; ?>.</td>
                                                            <td> <?php echo ucfirst($result_data['username']); ?> </td>
                                                            <td> <?php if($result_data['agent_type']==1)
															{ echo 'Technician'; }
															if($result_data['agent_type']==2)
															{ echo 'Sales';}
															if($result_data['agent_type']==3)
															{ echo 'Admin';} ?> </td>
                                                            <td> <?php echo $result_data['username']; ?> </td>
                                                            <td> <?php echo $result_data['password']; ?> </td>
                                                            <td><a id="pencil" href="edit_agent_new.php?id=<?php echo $result_data['id']?>">
                                                                <i class="fa fa-pencil"></i>[edit] </a>  </td>
                                                            <td><a class="delete" href="delete.php?id=<?php echo $result_data['id']?>" onClick = "javascript: return confirm('Are you SURE you wish to do this?');"><button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i></button></a> </td>
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