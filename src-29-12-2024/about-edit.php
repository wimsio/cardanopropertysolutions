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
    
    include("config.php");
    
    if(!isset($_SESSION['auser']))
    {
    	header("location:index.php");
    }
    
    if(isset($_POST['update']))
    {
    	$aid = $_GET['id'];
    	
    	$title=$_POST['utitle'];
    	
    	$content=$_POST['ucontent'];
    	
    	$aimage=$_FILES['aimage']['name'];
    	
    	$temp_name1 = $_FILES['aimage']['tmp_name'];
    
    
    	move_uploaded_file($temp_name1,"upload/$aimage");
    	
    	$sql = "UPDATE about SET title = '{$title}' , content = '{$content}', image ='{$aimage}' WHERE id = {$aid}";
    	
    	$result=mysqli_query($con,$sql);
    	
    	if($result == true)
    	{
    		$msg="<p class='alert alert-success'>About Updated</p>";
    		
    		header("Location:about-view.php?msg=$msg");
    	}
    	else{
    		$msg="<p class='alert alert-warning'>About Not Updated</p>";
    		
    		header("Location:about-view.php?msg=$msg");
    	}
    }
} 
catch(Exception $e) 
{
  var_dump($e);
} 
include("./upper.php");?>
            <div class="page-wrapper">
			
				<div class="content container-fluid"> <?php include("include/header.php");include("include/breadcrumbs.php"); breadcrumbs("About Edit");?>
					
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h2 class="card-title">About Us</h2>
								</div>
								<?php 
								$aid = $_GET['id'];
								$sql = "SELECT * FROM about where id = {$aid}";
								$result = mysqli_query($con, $sql);
								while($row = mysqli_fetch_row($result))
								{
								?>
								<form method="post" enctype="multipart/form-data">
								<div class="card-body">
										<div class="row">
											<div class="col-xl-12">
													<div class="form-group row">
													<label class="col-lg-2 col-form-label">Title</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="utitle" value="<?php echo $row['1']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Content</label>
													<div class="col-lg-9">
														<textarea class="tinymce form-control" name="ucontent" rows="10" cols="30"><?php echo $row['2']; ?></textarea>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Image</label>
													<div class="col-lg-9">
														<img src="upload/<?php echo $row['3']; ?>" height="200px" width="200px"><br><br>
														<input class="form-control" name="aimage" type="file" required="">
													</div>
												</div>
											</div>
										</div>
										<div class="text-left">
											<input type="submit" class="btn btn-primary"  value="Submit" name="update" style="margin-left:200px;">
										</div>
									</form>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
					
					
				</div>
			</div>
			 <?php include("include/footer.php");?>