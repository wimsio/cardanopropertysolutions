<?php include("./include/upper.php");?>
<div id="page-wrapper">
    <div class="row"> 
		<?php include("include/header.php");include("include/breadcrumbs.php"); breadcrumbs("Profile");?>
        
        <div class="full-row">
            <div class="container">
                    <div class="row">
						<div class="col-lg-12">
							<h2 class="text-secondary double-down-line text-center">Profile</h2>
                        </div>
					</div>
                <div class="dashboard-personal-info p-5 bg-white">
                    <form action="#" method="post">
                        <h5 class="text-secondary border-bottom-on-white pb-3 mb-4">Feedback Form</h5>
						<?php echo $msg; ?><?php echo $error; ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="user-id">Full Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Full Name">
                                </div>                
                                
                                <div class="form-group">
                                    <label for="phone">Contact Number</label>
                                    <input type="number" name="phone"  class="form-control" placeholder="Enter Phone" maxlength="10">
                                </div>

                                <div class="form-group">
                                    <label for="about-me">Your Feedback</label>
                                    <textarea class="form-control" name="content" rows="7" placeholder="Enter Text Here...."></textarea>
                                </div>
                                <input type="submit" class="btn btn-info mb-4" name="insert" value="Send Feedback">
                            </div>
							</form>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-5 col-md-12">
								<?php 
									$uid=$_SESSION['uid'];
									$query=mysqli_query($con,"SELECT * FROM `user` WHERE uid='$uid'");
									while($row=mysqli_fetch_array($query))
									{
								?>
                                <div class="user-info mt-md-50"> <img src="admin/user/<?php echo $row['6'];?>" alt="userimage">
                                    <div class="mb-4 mt-3">
                                        
                                    </div>
									
                                    <div class="font-18">
                                        <div class="mb-1 text-capitalize"><b>Name:</b> <?php echo $row['1'];?></div>
                                        <div class="mb-1"><b>Email:</b> <?php echo $row['2'];?></div>
                                        <div class="mb-1"><b>Contact:</b> <?php echo $row['3'];?></div>
										<div class="mb-1 text-capitalize"><b>Role:</b> <?php echo $row['5'];?></div>
                                    </div>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                    
                </div>            
            </div>
        </div>
		<?php include("./include/footer.php");?>
        <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 
    </div>
</div>
<?php include("./include/lower.php");?>