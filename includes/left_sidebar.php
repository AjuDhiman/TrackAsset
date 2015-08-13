<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- add "navbar-no-scroll" class to disable the scrolling of the sidebar menu -->
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone">
					</div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
                                <li class="sidebar-search-wrapper" style="margin-bottom: 12px;">
					 <!--BEGIN RESPONSIVE QUICK SEARCH FORM -->
                                        
					 <!--END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<li>
					<a href="search_new.php">
						<i class="fa fa-search"></i>
						<span class="title">
							Search
						</span>
					</a>
					
				</li>
                                 <?php if( @$_SESSION['agent_type'] == '3' || @$_SESSION['email']=='t.gupta@hyadea.com' && @$_SESSION['username']=='super@dmin')  {?>
                                <li>
                                    <a href="all_customer_data.php">
                                            <i class="fa fa-gift"></i>
                                            <span class="title">
                                                    All Customer Data
                                            </span>
                                    </a>
                                </li>
                                 <?php } if(@$_SESSION['username']!='super@dmin'){?>
                                <li>
                                    <a href="persale.php">
                                            <i class="fa fa-gift"></i>
                                            <span class="title">
                                                    Your Performance
                                            </span>
                                    </a>
					
								</li>
								<?php }?>
                                <li>
                                    <a href="customer_data.php">
                                            <i class="fa fa-gift"></i>
                                            <span class="title">
                                                    Add New Customer
                                            </span>
                                    </a>
				</li>
                                <?php if( @$_SESSION['agent_type'] == '3' || @$_SESSION['email']=='t.gupta@hyadea.com' && @$_SESSION['username']=='super@dmin')  {?>
				<li>
                                    <a href="javascript:;">
                                            <i class="fa fa-gift"></i>
                                            <span class="title">
                                                    Agents Data
                                            </span>
                                            <span class="arrow ">
                                            </span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="add_new_agent.php">
                                                    <i class="fa fa-gift"></i>
                                                    Add New Agent
                                            </a>
                                        </li>
                                        <li>
                                            <a href="agent_sales_new.php">
                                                    <i class="fa fa-gift"></i>
                                                    Agent Sales
                                            </a>
                                        </li>
                                        <li>
                                            <a href="agent_list_new.php">
                                                    <i class="fa fa-gift"></i>
                                                    Agent List
                                            </a>
                                        </li>
                                        <li>
                                            <a href="all_agents_sales.php">
                                                    <i class="fa fa-gift"></i>
                                                    All Agents Sales
                                            </a>
                                        </li>
                                    </ul>
				</li>
				<li>
                                    <a href="upload_new.php">
                                        <i class="fa fa-gift"></i>
                                        <span class="title">
                                                Upload Sales Data
                                        </span>
                                    </a>
				</li>
                                <?php }?>
                                
				
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>