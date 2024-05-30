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
    include("./config/config.php");
    
    $error="";
    
    $msg="";
    
    if(isset($_REQUEST['reg']))
    {
    	$name=$_REQUEST['name'];
    	$email=$_REQUEST['email'];
    	$phone=$_REQUEST['phone'];
    	$pass=$_REQUEST['pass'];
    	$utype=$_REQUEST['utype'];
    	
    	$uimage=$_FILES['uimage']['name'];
    	$temp_name1 = $_FILES['uimage']['tmp_name'];
    	$pass= sha1($pass);
    	
    	$query = "SELECT * FROM user where uemail='$email'";
    	$res=mysqli_query($con, $query);
    	$num=mysqli_num_rows($res);
    	
    	if($num == 1)
    	{
    		$error = "<p class='alert alert-warning'>Email Id already Exist</p> ";
    	}
    	else
    	{
    		
    		if(!empty($name) && !empty($email) && !empty($phone) && !empty($pass) && !empty($uimage))
    		{
    			
    			$sql="INSERT INTO user (uname,uemail,uphone,upass,utype,uimage) VALUES ('$name','$email','$phone','$pass','$utype','$uimage')";
    			$result=mysqli_query($con, $sql);
    			move_uploaded_file($temp_name1,"admin/user/$uimage"); sleep(1000);
    			   if($result){
    				   $msg = "<p class='alert alert-success'>Register Successfully</p> ";
    			   }
    			   else{
    				   $error = "<p class='alert alert-warning'>Register Not Successfully</p> ";
    			   }
    		}else{
    			$error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
    		}
    	}
    	
    }
    
} 
catch(Exception $e) 
{
  var_dump($e);
}    
include("include/upper.php");?>

<div id="page-wrapper">
    <div class="row"> 
		<?php include("include/header.php");include("include/breadcrumbs.php"); breadcrumbs("Register");?>
		      
        <div class="page-wrappers login-body full-row bg-gray">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                        <div class="login-right">
							<div class="login-right-wrap">
								<?php echo $error; ?><?php echo $msg; ?>
								<form method="post" enctype="multipart/form-data">
									<div class="form-group">
										<input type="text"  name="name" class="form-control" placeholder="Your Name*">
									</div>
									<div class="form-group">
										<input type="email"  name="email" class="form-control" placeholder="Your Email*">
									</div>
									<div class="form-group">
										<input type="text"  name="phone" class="form-control" placeholder="Your Phone*" maxlength="10">
									</div>
									<div class="form-group">
										<input type="password" name="pass"  class="form-control" placeholder="Your Password*">
									</div>

									 <div class="form-check-inline">
									  <label class="form-check-label">
										<input type="radio" class="form-check-input" name="utype" value="user" checked>Buyer
									  </label>
									</div>
									
									<div class="form-check-inline">
									  <label class="form-check-label">
										<input type="radio" class="form-check-input" name="utype" value="team">Agent
									  </label>
									</div>
									<div class="form-group">
										<label class="col-form-label"><b>User Image</b></label>
										<input class="form-control" name="uimage" type="file">
									</div>
									<button class="btn btn-success" name="reg" value="Register" type="submit">Register</button>
								</form>
								
								<div class="login-or">
								<hr>
								Already have an account? 
								<a href="login.php">Login</a></div>
								
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php include("include/footer.php");?>
        <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 
    </div>
</div>

<?php include("include/lower.php");?>