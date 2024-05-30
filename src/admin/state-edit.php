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
    	$sid = $_GET['id'];
    	
    	$ustate=$_POST['ustate'];
    
    	$sql="UPDATE state SET sname = '{$ustate}'  WHERE sid = {$sid}";
    	
    	$result=mysqli_query($con,$sql);
    	
    	if($result)
    		{
    			$msg="<p class='alert alert-success'>State Updated</p>";
    			
    			header("Location:state-add.php?msg=$msg");
    		}
    		else
    		{
    			$msg="<p class='alert alert-warning'>State Not Updated</p>";
    			
    			header("Location:state-add.php?msg=$msg");
    		}	
    }
} 
catch(Exception $e) 
{
  var_dump($e);
}
	 include("./upper.php");
?>
            <div class="page-wrapper">
                <div class="content container-fluid"><?php include("./breadcrumbs.php");bc("State Edit");?>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
								</div>
								<?php 
								$sid = $_GET['id'];
								$sql = "SELECT * FROM state where sid = {$sid}";
								$result = mysqli_query($con, $sql);
								while($row = mysqli_fetch_row($result))
								{
								?>
								<form method="post">
									<div class="card-body">
											<div class="row">
												<div class="col-xl-6">
													<h5 class="card-title">State Details</h5>
													<div class="form-group row">
														<label class="col-lg-3 col-form-label">State Name</label>
														<div class="col-lg-9">
															<input type="text" class="form-control" name="ustate" value="<?php echo $row['1']; ?>">
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
			</div>
		<?php include("./footer.php");?>
