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
     
    require("config/config.php"); 
    
    if(!isset($_SESSION['auser']))
    {
    	header("location:index.php");
    }
    
    $error="";
    
    $msg="";
    
    if(isset($_POST['insert']))
    {
    	$state=$_POST['state'];
    	
    	if(!empty($state))
    	{
    		$sql="insert into state (sname) values('$state')";
    		
    		$result=mysqli_query($con,$sql);
    		
    		if($result)
    			{
    				$msg="<p class='alert alert-success'>State Inserted Successfully</p>";
    						
    			}
    			else
    			{
    				$error="<p class='alert alert-warning'>* State Not Inserted</p>";
    			}
    	}
    	else{
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
                     <?php include("./breadcrumbs.php");bc("Add State");?>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
								    	<h1 class="card-title">Add State</h1>
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
													<h5 class="card-title">State/Province Details</h5>
													<div class="form-group row">
														<label class="col-lg-3 col-form-label">State/Province Name</label>
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
									<h4 class="card-title">State/Province List</h4>
									
								</div>
								<div class="card-body">

									<table id="basic-datatable " class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>State/Province</th>
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
													<td><a href="state-edit.php?id=<?php echo $row['0']; ?>"><button class="btn btn-info">Edit</button></a>
                                                    <a href="state-delete.php?id=<?php echo $row['0']; ?>"><button class="btn btn-danger">Delete</button></a></td>
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
