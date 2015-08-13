
<!-- BEGIN HEADER -->
    <div class="header navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<button class="navbar-toggle btn navbar-btn" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- END RESPONSIVE MENU TOGGLER -->
				<!-- BEGIN LOGO (you can use logo image instead of text)-->
				<a class="navbar-brand logo-v1" href="index.php">
                                    <img src="assets/img/logo_blue.png" height="66px" id="logoimg" alt="">
				</a>
				<!-- END LOGO -->
			</div>
                         <?php if(@$_SESSION['email']!='' || @$_SESSION['username']!='')  {?>
                    <div style="float:right;">
                        <span style="color: green; font-size: 14px;">Welcome</span>    
                        <span style="text-transform: uppercase;"><?php echo @$_SESSION['username'];?></span>

                            </div>
                         <?php }?>
			<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
                                    <li class="active">
                                        <a href="http://www.hyadea.com/staging/sales/">
                                        Home
                                       </a>
                                    </li>
                                    <?php if(@$_SESSION['email']=='h.joshi@hyadea.com' && @$_SESSION['username']=='harish')  {?>
                                    <li>
                                        <a href="add_agent.php">Add Agent</a>
                                    </li>
                                    <li>
                                        <a href="agent_list.php">Agent List</a>
                                    </li>
                                    <li>
                                        <a href="upload.php">Upload</a>
                                    </li>
                                    <?php }?>
                                    <?php if(@$_SESSION['username']!='')  {?>
                                    <li>
                                        <a href="profile.php">Profile</a>
                                    </li>
                                    <li>
                                        <a href="includes/logout.php">Logout</a>
                                    </li>
                                    
                                    <li>
                                        <a href="search.php">Search <i class="fa fa-search search-btn"></i></a>
                                    </li>
                                    
                                    <?php } else{?>
                                    <li>
                                        <a href="login.php">Login</a>
                                    </li>
                                    
                                    <?php }?>
                                    
                                    <!--<li class="menu-search">
                                        <span class="sep"></span>
                                        <i class="fa fa-search search-btn"></i>

                                        <div class="search-box">
                                            
                                                <div class="input-group input-large">
                                                    <input class="form-control" type="text" placeholder="Search">
                                                    <span class="input-group-btn">
                                                        <button type="submit" class="btn theme-btn">Go</button>                                                    </span>
                                                </div>
                                            
                                        </div>  
                                    </li>-->
				</ul>                           
			</div>
			<!-- BEGIN TOP NAVIGATION MENU -->
		</div>
    </div>
    <!-- END HEADER -->
