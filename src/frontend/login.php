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
    
    include("./config/config.php");
    
    $error="";
    
    $msg="";
    
    if(isset($_REQUEST['login']))
    {
    	$email=$_REQUEST['email'];
    	$pass=$_REQUEST['pass'];
    	$pass= sha1($pass); //echo $pass;
    	
    	if(!empty($email) && !empty($pass))
    	{
    		$sql = "SELECT * FROM user where uemail='$email' && upass='$pass'"; //echo $sql;
    		$result=mysqli_query($con, $sql);
    		$row=mysqli_fetch_array($result);
    		   if($row){
    			   
    				$_SESSION['uid']=$row['uid'];
    				$_SESSION['uemail']=$email;
    				$_SESSION['uname']=$row['uname'];
    				header("location:index.php");
    				
    		   }
    		   else{
    			   $error = "<p class='alert alert-warning'>Email or Password doesnot match!</p> ";
    		   }
    	}else{
    		$error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
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
		<?php include("include/header.php");include("include/breadcrumbs.php"); breadcrumbs("Login");?>
       
        <div class="page-wrappers login-body full-row bg-gray">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Login</h1>
								<p class="account-subtitle">Access to our dashboard</p>
								<?php echo $error; ?><?php echo $msg; ?>
								<!-- Form -->
								<form method="post">
									<div class="form-group">
										<input type="email"  name="email" class="form-control" placeholder="Your Email*">
									</div>
									<div class="form-group">
										<input type="password" name="pass"  class="form-control" placeholder="Your Password">
									</div>
									
										<button class="btn btn-success" style="width:140px;" name="login" value="Login" type="submit">Login</button>
								</form>
							
								<div class="login-or">
								<hr>
								Forgot password? 
								<a href="forgot-password.php">Get New Password</a>	<hr>
								Don't have an account? 
								<a href="register.php">Register</a></div>
								
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