<?php 
@session_start();
include_once('includes/l_header.php') ;
?>
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="http://www.hyadea.com/staging/sales/">
            <img width="20%" src="assets/img/logo-big.png" alt=""/>
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form" action="#" method="post">
		<h3 class="form-title">Login to your account</h3>
                <?php 
                    if(isset($_POST['submit'])){
                        //echo 'yes';
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                       //echo "SELECT `username`, `email`, `password` FROM `users` WHERE `email` = '".$username."' OR `username` = '".$username."' AND `password` = '".$password."' ";
                        $query = mysql_query("SELECT `username`, `password` FROM `users` WHERE `username` = '".$username."' AND `password` = '".$password."' ");
                        $result_count = mysql_num_rows($query);
                        $result_data = mysql_fetch_row($query);
                        if($result_count==1){
                            //echo '<pre>'; 
                          //print_r($result_data); die();
                          $_SESSION['email'] = $result_data[1];
                          $_SESSION['username'] = $result_data[0];
                          $_SESSION['agent_type'] =  $result_data[2];
                          if($_SESSION['email'] == 'h.joshi@hyadea.com' && $_SESSION['username'] == 'harish')
                           {
                             echo'<script>window.location="search_new.php";</script>';
                           }
                          else
                           {
                             echo'<script>window.location="search_new.php";</script>';}
                           }
                        else{
                            echo '<div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button>
                                        <span>Try Again</span></div>';
                        }
                    }

                ?>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
                        <span>
                                
                        </span>
			<span>
				 Enter Your Correct username and password.
			</span>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
                                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username/Email" name="username" id="username"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
                                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" id="password"/>
			</div>
		</div>
		<div class="form-actions" style="text-align: center;">
			<label class="checkbox">
			<!--<input type="checkbox" name="remember" value="1"/> Remember me </label>-->
                            <button type="submit" name="submit" class="btn blue pull-right">
			Login <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
<!--		<div class="login-options">
			<h4>Or login with</h4>
			<ul class="social-icons">
				<li>
					<a class="facebook" data-original-title="facebook" href="#">
					</a>
				</li>
				<li>
					<a class="twitter" data-original-title="Twitter" href="#">
					</a>
				</li>
				<li>
					<a class="googleplus" data-original-title="Goole Plus" href="#">
					</a>
				</li>
				<li>
					<a class="linkedin" data-original-title="Linkedin" href="#">
					</a>
				</li>
			</ul>
		</div>
		<div class="forget-password">
			<h4>Forgot your password ?</h4>
			<p>
				 no worries, click
				<a href="javascript:;" id="forget-password">
					 here
				</a>
				 to reset your password.
			</p>
		</div>
		<div class="create-account">
			<p>
				 Don't have an account yet ?&nbsp;
				<a href="javascript:;" id="register-btn">
					 Create an account
				</a>
			</p>
		</div>-->
	</form>
	<!-- END LOGIN FORM -->
        <?php include_once('includes/l_footer.php') ;?>