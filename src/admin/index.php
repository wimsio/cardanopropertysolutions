<?php 
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
			$query = "SELECT auser, apass FROM admin WHERE auser='$user' AND apass='$pass'";
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
		}else{
			$error="* Please Fill all the Fileds!";
		}
		
	}   
	 include("include/upper.php");
?>
        <div class="page-wrappers login-body">
           
            <div class="login-wrapper"> <?php include("include/breadcrumbs.php"); breadcrumbs("Admin Login");?>
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
