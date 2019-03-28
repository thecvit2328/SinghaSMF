	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<div class="row-fluid">
				<a class="brand span2 noBg" href="index.php"><span><?=$config['web_name'];?></span></a>
				</div>		
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-left" style="margin-left:130px;">
						<li><a class="btn dropdown-toggle" data-toggle="dropdown" href="#">Dashboard</a>  </li>
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								Partners <i class=" icon-caret-down"></i>
							</a>
							<ul class="dropdown-menu notifications">
								<li class="dropdown-menu-title"></li>	
								<li><a href="index.php?op=partners_bidding-index"><i class="icon-angle-right"></i> Bidding Information</a></li>
	
							</ul>
						</li>
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								Products and Business Lines <i class=" icon-caret-down"></i>
							</a>
							<ul class="dropdown-menu notifications">
								<li class="dropdown-menu-title"></li>	
								<li><a href="index.php?op=our_products-index"><i class="icon-angle-right"></i> Our Products </a></li>
								<li><a href="index.php?op=business_lines_category-index"><i class="icon-angle-right"></i> Business Lines </a></li>
							</ul>
						</li>
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								News Room <i class=" icon-caret-down"></i>
							</a>
							<ul class="dropdown-menu notifications">
								<li class="dropdown-menu-title"></li>	
								<li><a href="index.php?op=corporate_events-index"><i class="icon-angle-right"></i> Corporate Events </a></li>
								<li><a href="index.php?op=press_releases-index"><i class="icon-angle-right"></i> Press Releases </a></li>
								<li><a href="index.php?op=publications_category-index"><i class="icon-angle-right"></i> Publications </a></li>
							</ul>
						</li>
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								CSR <i class=" icon-caret-down"></i>
							</a>
							<ul class="dropdown-menu notifications">
								<li class="dropdown-menu-title"></li>	
								<li><a href="index.php?op=csr_national_project-index"><i class="icon-angle-right"></i> CSR National Project </a></li>
								<li><a href="index.php?op=csr_educational-index"><i class="icon-angle-right"></i> Educational & Cultural </a></li>
								<li><a href="index.php?op=csr_environmental-index"><i class="icon-angle-right"></i> Environmental & Public Welfare </a></li>
								<li><a href="index.php?op=csr_quality-index"><i class="icon-angle-right"></i> Quality of Life Development </a></li>
							</ul>
						</li>						
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								Careers <i class=" icon-caret-down"></i>
							</a>
							<ul class="dropdown-menu notifications">
								<li class="dropdown-menu-title"></li>	
								<li><a href="index.php?op=job_opportunity-index"><i class="icon-angle-right"></i> Job Opportunity </a></li>
								<li><a href="index.php?op=job_application-index"><i class="icon-angle-right"></i> Application Form </a></li>
							</ul>
						</li>						
					</ul>
					<ul class="nav pull-right">

						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn account dropdown-toggle" data-toggle="dropdown" href="#">
								<div class="user">
									<span class="name">Admin</span>
								</div>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
									
								</li>
								<li><a href="login.html"><i class="icon-off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
