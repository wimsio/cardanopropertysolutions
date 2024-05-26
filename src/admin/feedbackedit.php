<?php include("./upper.php");?>
            <div class="page-wrapper">
			
				<div class="content container-fluid">
                <?php include("./breadcrumbs.php");bc("Feedback Edit");?>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h2 class="card-title">Update Feedback</h2>
								</div>
								<?php 
								$fid = $_GET['id'];
								$sql = "SELECT * FROM feedback where fid = {$fid}";
								$result = mysqli_query($con, $sql);
								while($row = mysqli_fetch_row($result))
								{
								?>
								<form method="post">
								<div class="card-body">
										<div class="row">
											<div class="col-xl-12">
												<h5 class="card-title">Update Feedback</h5>
												
												<?php echo $msg; ?>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Feedback Id</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="fid" value="<?php echo $row['0']; ?>" disabled>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Status</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="status" required="" value="<?php echo $row['3']; ?>">
														<small>Enter [1] to set as testimonial & [0] to cancel it.</small>
													</div>
												</div>
												
											</div>
										</div>
										<div class="text-left">
											<input type="submit" class="btn btn-primary"  value="Submit" name="update" style="margin-left:200px;">
										</div>
									</form>
									<?php } ?>
								</div>
								
							</div>
						</div>
					</div>
					
					
				</div>
			</div>
<?php include("./lower.php");?>	