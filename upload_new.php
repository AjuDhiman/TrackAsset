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

                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption">
                                        <i class="fa fa-edit"></i>Upload Daily Sales Data
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
                            <!-- upload file --> 
                            <?php
                                if ( isset($_GET['success']) && $_GET['success'] == 1 )
                                    {
                                         // treat the succes case ex:
                                         echo "<span style='color:green; margin-left:250px;'>"."File uploaded successfully.".'</span>'; 
                                    }
                                if ( isset($_GET['success']) && $_GET['success'] == 0 )
                                    {
                                         // treat the succes case ex:
                                         echo "<span style='color:red; margin-left:250px;'>".'Please Choose File First then click on upload'.'</span>'; 
                                    }
                             ?>
                                <form enctype='multipart/form-data' action='upload_file.php' method='post'>
                                    <div class="form-body">
                                        <div class="alert alert-danger display-hide">
                                            <button class="close" data-close="alert"></button>
                                            You have some form errors. Please check below.
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">File Upload</label>
                                            <div class="col-md-4">
                                                <input type='file' id="tags" name="filename">
                                            </div>
                                        </div>
                                                                                                      
                                    </div>
                                    <div class="form-actions fluid">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button  class="btn blue" name="upload" type="upload">Upload</button>
                                        </div>
                                    </div>
                                </form>
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