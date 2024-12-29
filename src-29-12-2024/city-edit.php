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
    
    include("cinfig/config.php"); 
    
    if(!isset($_SESSION['auser']))
    {
    	header("location:index.php");
    }

    $error="";
    
    $msg="";
    
    if(isset($_POST['insert']))
    {
    	$cid = $_GET['id'];
    	
    	$ustate=$_POST['ustate'];
    	
    	$ucity=$_POST['ucity'];
    	
    	if(!empty($ustate) && !empty($ucity))
    	{
    		$sql="UPDATE city SET cname = '{$ucity}' ,sid = '{$ustate}' WHERE cid = {$cid}";
    		
    		$result=mysqli_query($con,$sql);
    		
    		if($result)
    			{
    				$msg="<p class='alert alert-success'>City Updated</p>";
    				
    				header("Location:city-add.php?msg=$msg");
    			}
    			else
    			{
    				$msg="<p class='alert alert-warning'>City Not Updated</p>";
    				
    				header("Location:city-add.php?msg=$msg");
    			}
    	}
    	else
    	{
    		$error = "<p class='alert alert-warning'>* Please Fill all the Fields</p>";
    	}
    	
    }
} 
catch(Exception $e) 
{
  var_dump($e);
}include("./upper.php");?>
            <div class="page-wrapper">
                <div class="content container-fluid">
                <?php include("./breadcrumbs.php");bc("City List");?>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h1 class="card-title">Edit City</h1>
									<?php echo $error;?>
									<?php echo $msg;?>
									<?php 
										if(isset($_GET['msg']))	
										echo $_GET['msg'];	
									?>
								</div>
								<?php 
								$cid = $_GET['id'];
								$sql = "SELECT * FROM city where cid = {$cid}";
								$result = mysqli_query($con, $sql);
								while($row = mysqli_fetch_row($result))
								{
								?>
								<form method="post">
									<div class="card-body">
											<div class="row">
												<div class="col-xl-6">
													<h5 class="card-title">City Details</h5>
													<div class="form-group row">
														<label class="col-lg-3 col-form-label">State Name</label>
														<div class="col-lg-9" >	
															<select class="form-control" name="ustate">
																<option value="">Select State/Province</option>
																<?php
																		$query1=mysqli_query($con,"select * from state");
																		while($row1=mysqli_fetch_row($query1))
																			{
																	?>
																<option value="<?php echo $row1['0']; ?>">
																<?php echo $row1['1']; ?></option>
																<?php } ?>
															</select>
														</div>
													</div>
													<div class="form-group row">
														<label class="col-lg-3 col-form-label">City Name</label>
														<div class="col-lg-9">
															<input type="text" class="form-control" name="ucity" value="<?php echo $row['1']; ?>">
														</div>
													</div>
												</div>
											</div>
											<div class="text-left">
												<input type="submit" class="btn btn-primary"  value="Submit" name="insert" style="margin-left:200px;">
											</div>
									</div>
								</form>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>			
			</div><?php include("./lower.php");?>	
