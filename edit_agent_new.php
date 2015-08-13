<?php 
    @ob_start();
    session_start();  
    if(@$_SESSION['email']=='' && @$_SESSION['username']==''){
        header('location:index.php');
    }
    include('includes/l_header.php');
    $Id = $_REQUEST['id'];
    include_once('includes/header.php');
    include_once('includes/menu.php');
    $query = mysql_query("SELECT * FROM `users` WHERE `id` = $Id");
    $result = mysql_fetch_array($query);
   
    if(isset($_POST['edit'])){
        $agent_type = $_POST['agent_type'];
        $newpassword = $_POST['newpassword'];
        $cnewpassword = $_POST['cnewpassword'];
        if($cnewpassword!=$newpassword){
            echo "Confirm New Password Not Matched!";
        }
        elseif(empty($newpassword) || empty($cnewpassword)){
            $query = mysql_query("UPDATE `users` SET `agent_type` = '".$agent_type."', `password` = '".$result['password']."' WHERE `id` = $Id");
            echo'<script>window.location="agent_list_new.php";</script>';
        }
        else{
            $query = mysql_query("UPDATE `users` SET `agent_type` = '".$agent_type."', `password` = '".$newpassword."' WHERE `id` = $Id");
            echo'<script>window.location="agent_list_new.php";</script>';
        
        }

    
    }
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
                                    <i class="fa fa-edit"></i>Edit <?php echo ucfirst($result['username']); ?> Profile
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
                                <form class="form-horizontal" id=""  method="POST"  action="#">
                                    <div class="form-body">
                                        <div class="alert alert-danger display-hide">
                                            <button class="close" data-close="alert"></button>
                                            You have some form errors. Please check below.
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Name</label>
                                            <div class="col-md-4">
                                                <input name="name" id="name" data-required="1" value="<?php echo ucfirst($result['username']); ?>" class="form-control" type="text" readonly="readonly">
<!--                                             <span class="help-block"> A block of help text. </span>-->
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Agent Type</label>
                                            <div class="col-md-4">
                                                <select name="agent_type" class="form-control">
                                                    <option value="">Select Agent Type</option>
                                                    <option value="1" <?php if ($result['agent_type'] === '1'){ echo 'selected="selected"';}?> >Technician </option>
                                                    <option value="2" <?php if ($result['agent_type'] === '2'){echo 'selected="selected"';}?> >Sales</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Username</label>
                                            <div class="col-md-4">
                                                <input name="username" id="username" class="form-control" value="<?php echo $result['username']; ?>" type="text" readonly="readonly">                                                          
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Old Password</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </span>
                                                    <input name="oldpassword" id="oldpassword" class="form-control" value="<?php echo $result['password']; ?>" type="text" readonly="readonly">
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">New Password</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </span>
                                                    <input name="newpassword" id="newpassword" class="form-control" type="password" placeholder="New Password">
                                                </div>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Confirm New Password</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </span>
                                                    <input name="cnewpassword" id="cnewpassword" class="form-control" type="password" placeholder="Confirm New Password">
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                    
                                    <div class="form-actions fluid">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button class="btn blue" name="edit" type="submit">Edit</button>
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