<?php include("./upper.php");?>
            <div class="page-wrapper">
                <div class="content container-fluid">
                     <?php include("./breadcrumbs.php");bc("Add State");?>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<?php echo $error;?>
									<?php echo $msg;?>
									<?php 
										if(isset($_GET['msg']))	
										echo $_GET['msg'];	
									?>
								</div>
								<form method="post" id="insert product" enctype="multipart/form-data">
									<div class="card-body">
											<div class="row">
												<div class="col-xl-6">
													<h5 class="card-title">State Details</h5>
													<div class="form-group row">
														<label class="col-lg-3 col-form-label">State Name</label>
														<div class="col-lg-9">
															<input type="text" class="form-control" name="state">
														</div>
													</div>
												</div>
											</div>
											<div class="text-left">
												<input type="submit" class="btn btn-primary"  value="Submit" name="insert" style="margin-left:200px;">
											</div>
									</div>
								</form>
							</div>
						</div>
					</div>

				<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">State List</h4>
									
								</div>
								<div class="card-body">

									<table id="basic-datatable " class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>State</th>
													<th>Actions</th>
                                                </tr>
                                            </thead>
                                        
                                        
                                            <tbody>
											<?php
													
												$query=mysqli_query($con,"select * from state");
												$cnt=1;
												while($row=mysqli_fetch_row($query))
													{
											?>
                                                <tr>
                                                    
                                                    <td><?php echo $cnt; ?></td>
                                                    <td><?php echo $row['1']; ?></td>
													<td><a href="stateedit.php?id=<?php echo $row['0']; ?>"><button class="btn btn-info">Edit</button></a>
                                                    <a href="statedelete.php?id=<?php echo $row['0']; ?>"><button class="btn btn-danger">Delete</button></a></td>
                                                </tr>
                                                <?php $cnt=$cnt+1; } ?>

                                            </tbody>
                                        </table>
								</div>
							</div>
						</div>
					</div>
				</div>			
			</div>
		<?php include("./lower.php");?>	
