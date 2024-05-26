<?php include("./upper.php");?>
            <div class="page-wrapper">
                <div class="content container-fluid">
					<?php include("./breadcrumbs.php");bc("Profile");?>
					<div class="row">
						<?php
						
						$id=$_SESSION['auser'];
						$sql="select * from admin where auser='$id'";
						$result=mysqli_query($con,$sql);
						while($row=mysqli_fetch_array($result))
						{
						?>
						<div class="col-md-12">
							<div class="profile-header">
								<div class="row align-items-center">
									<div class="col-auto profile-image">
										<a href="#">
											<img class="rounded-circle" alt="User Image" src="assets/img/profiles/avatar-01.png">
										</a>
									</div>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-2 text-uppercase"><?php echo $row['1']; ?></h4>
										<h6 class="text-muted"><?php echo $row['2']; ?></h6>
										<div class="user-Location"><i class="fa fa-id-badge" aria-hidden="true"></i>
											<?php echo $row['4']; ?></div>
										<div class="about-text"></div>
									</div>

								</div>
							</div>
							<div class="profile-menu">
								<ul class="nav nav-tabs nav-tabs-solid">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
									</li>
								<!--	<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
									</li>  -->
								</ul>
							</div>	
							<div class="tab-content profile-tab-cont">
								
								<!-- Personal Details Tab -->
								<div class="tab-pane fade show active" id="per_details_tab">
								
									<!-- Personal Details -->
									<div class="row">
										<div class="col-lg-9">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
														<p class="col-sm-9"><?php echo $row['1']; ?></p>
													</div>
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
														<p class="col-sm-9"><?php echo $row['4']; ?></p>
													</div>
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
														<p class="col-sm-9"><a href="#"><?php echo $row['2']; ?></a></p>
													</div>
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
														<p class="col-sm-9"><?php echo $row['5']; ?></p>
													</div>
													
												</div>
											</div>
										</div>

										<div class="col-lg-3">

											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>Account Status</span>
													</h5>
													<button class="btn btn-success" type="button"><i class="fe fe-check-verified"></i> Active</button>
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				<?php } ?>
				</div>			
			</div><?php include("./lower.php");?>	