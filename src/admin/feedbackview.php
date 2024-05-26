<?php include("./upper.php");?>
            <div class="page-wrapper">
                <div class="content container-fluid">
                <?php include("./breadcrumbs.php");bc("Feedback");?>
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
								
									<small>Here, user can select feedbacks for displaying as testimonial. Note: Status "1" sets the feedback as testimonial.</small>
									<?php 
											if(isset($_GET['msg']))	
											echo $_GET['msg'];
											
										?>
								</div>
								<div class="card-body">

									<table id="basic-datatable" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Feedback</th>
													<th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                        
                                        
                                            <tbody>
											<?php
													
												$query=mysqli_query($con,"select feedback.*, user.* from feedback,user where feedback.uid=user.uid");
												$cnt=1;
												while($row=mysqli_fetch_array($query))
													{
											?>
                                                <tr>
                                                    <td><?php echo $cnt; ?></td>
                                                    <td><?php echo $row['uname']; ?></td>
                                                    <td><?php echo $row['uemail']; ?></td>
                                                    <td><?php echo $row['2']; ?></td>
                                                    <td><?php echo $row['3']; ?></td>
													<td><a href="feedbackedit.php?id=<?php echo $row['0']; ?>"><button class="btn btn-info">Edit</button></a>
                                                    <a href="feedbackdelete.php?id=<?php echo $row['0']; ?>"><button class="btn btn-danger">Delete</button></a></td>
                                                </tr>
                                                <?php
												$cnt=$cnt+1;
												} 
												?>
                                               
                                            </tbody>
                                        </table>
								</div>
							</div>
						</div>
					</div>
				
				</div>			
			</div><?php include("./lower.php");?>	
