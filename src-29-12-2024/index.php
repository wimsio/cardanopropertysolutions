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
	
	if(isset($_POST['login']))
	{
		$user=$_REQUEST['user'];
		
		$pass=$_REQUEST['pass'];
		
		$pass= sha1($pass);
		
		if(!empty($user) && !empty($pass))
		{
			$query = "SELECT auser, apass FROM admin WHERE (auser='$user' or aemail = '$user') AND apass='$pass'";// echo $query; exit;
			
			$result = mysqli_query($con,$query)or die(mysqli_error());
			
			$num_row = mysqli_num_rows($result);
			
			$row=mysqli_fetch_array($result);
			
			if( $num_row ==1 )
			{
				$_SESSION['auser']=$user;
				
				header("Location: dashboard.php");
			}
			else
			{
				$error='* Invalid User Name and Password';
			}
		}
		else
		{
			$error="* Please Fill all the Fileds!";
		}
		
	}   
} 
catch(Exception $e) 
{
  var_dump($e);
} 	
	 include("include/upper.php");
?>
        <div class="page-wrappers login-body">
           
            <div class="login-wrapper"> <?php include("include/header.php");include("include/breadcrumbs.php"); breadcrumbs("Admin Login");?>
            	<div class="container">
                	<div class="loginbox">
                        <div class="login-right">
							<div class="login-right-wrap">
								<p style="color:red;"><?php echo $error; ?></p>
								<form method="post">
									<div class="form-group">
										<input class="form-control" name="user" type="text" placeholder="User Name">
									</div>
									<div class="form-group">
										<input class="form-control" type="password" name="pass" placeholder="Password">
									</div>
									<div class="form-group">
										<button class="btn btn-primary btn-block" name="login" type="submit">Login</button>
									</div>
								</form>
									<div class="login-or">
								<hr>
								Forgot password? 
								<a href="./forgot-password.php">Get New Password</a>	<hr>
								Don't have an account? 
								<a href="./register.php">Register</a></div>
								
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include("include/footer.php");?>
         <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 
        <script src="assets/js/jquery-3.2.1.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/script.js"></script>
		<?php include("include/lower.php");?>
