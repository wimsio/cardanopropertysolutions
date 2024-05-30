<?php
/*****
 * Title : Cardano Property Soltuions : Tokenization and Fractionalization
 * Description : This is a web3 Cardano based real estate application based on the most popular php, mysql, html, css, bootstrap, js, jquery. The primary focus is to prototype Cardano integration 
 * with real life use cases and show case endless usage opportunities for developers and ordinary users.
 * Authors : Suraj Kumar Vishwakarma, Bernard Sibanda
 * Github : https://github.com/wimsio/cardanopropertysolutions, https://cardanopropertysolutions.co, https://github.com/suraj25809/Real-Estate-Php
 * Date : 2021 - 2024
 * Licence : MIT
 * Communication Channels : cto@wims.io, admin@cardanopropertysolutions.co
 * Company : Women In Move Solutions
 *****/
 try
     {
    session_start();
    
    include("config/config.php"); 
    
    if(!isset($_SESSION['auser']))
    {
    	header("location:index.php");
    }
    
    $error="";
    
    $msg="";
    
    if(isset($_POST['insert']))
    {
    	$state=$_POST['state'];
    	
    	$city=$_POST['city'];
    	
    	if(!empty($state) && !empty($city))
    	{
    		$sql="insert into city (cname,sid) values('$city','$state')";
    		
    		$result=mysqli_query($con,$sql);
    		
    		if($result)
    			{
    				$msg="<p class='alert alert-success'>City Inserted Successfully</p>";
    						
    			}
    			else
    			{
    				$error="<p class='alert alert-warning'>* City Not Inserted</p>";
    			}
    	}
    	else
    	{
    		$error = "<p class='alert alert-warning'>* Fill all the Fields</p>";
    	}
    	
    }
} 
catch(Exception $e) 
{
  var_dump($e);
} 
include("./upper.php");?>
<div class="page-wrapper">
                <div class="content container-fluid">
                    <?php include("./breadcrumbs.php");bc("City List");?>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h1 class="card-title">Add City</h1>
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
													<h5 class="card-title">City Details</h5>
													<div class="form-group row">
														<label class="col-lg-3 col-form-label">State Name</label>
														<div class="col-lg-9" >	
															<select class="form-control" name="state">
																<option value="">Select</option>
																<?php
																		$query1=mysqli_query($con,"select * from state");
																		while($row1=mysqli_fetch_row($query1))
																			{
																	?>
																<option value="<?php echo $row1['0']; ?>" class="text-captalize"><?php echo $row1['1']; ?></option>
																<?php } ?>
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-lg-3 col-form-label">City Name</label>
														<div class="col-lg-9">
															<input type="text" class="form-control" name="city">
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
								
								</div>
								<div class="card-body">

									<table id="basic-datatable" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>City</th>
													<!-- <th>State ID</th> -->
													<th>State</th>
													<th>Actions</th>
                                                </tr>
                                            </thead>
                                        
                                        
                                            <tbody>
											<?php
													
												$query=mysqli_query($con,"select city.*,state.sname from city,state where city.sid=state.sid");
												$cnt=1;
												while($row=mysqli_fetch_array($query))
													{
											?>
                                                <tr>
                                                    
                                                    <td><?php echo $cnt; ?></td>
                                                    <td><?php echo $row['1']; ?></td>
													<!-- <td><?php echo $row['2']; ?></td> -->
													<td><?php echo $row['sname']; ?></td>
													<td><a href="city-edit.php?id=<?php echo $row['0']; ?>"><button class="btn btn-info">Edit</button></a>
                                                   <a href="city-delete.php?id=<?php echo $row['0']; ?>"><button class="btn btn-danger">Delete</button></a></td>
                                                </tr>
                                                <?php $cnt=$cnt+1; } ?>

                                            </tbody>
                                        </table>
								</div>
							</div>
						</div>
					</div>
				<!-- view City -->
				</div>			
			</div>	
<?php include("./lower.php");?>	

