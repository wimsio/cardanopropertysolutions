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
include("./config/config.php");

$error="";

$msg="";

function generateRandomString($length = 10) 
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) 
    {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}

if(isset($_REQUEST['reg']))
{
	$email=$_REQUEST['email'];
	$passn=generateRandomString();
	$pass= sha1($passn);
	$query = "SELECT aid FROM admin where aemail='$email'";
	$res=mysqli_query($con, $query);
	$num=mysqli_num_rows($res);
	
	if($num != 1)
	{
		$error = "<p class='alert alert-warning'>Email was not found</p> ";
	}
	else
	{
		
		if(!empty($email) && !empty($pass))
		{
			
			$sql="UPDATE admin SET apass = '$pass' WHERE aemail = '$email'";
			$result=mysqli_query($con, $sql);

			   if($result)
			   {
                    
                    $subject = "New Password";
                    $txt = "New password generated for Cardano Property Solutions: ".$passn;
                    $headers = "From: admin@cardanopropertysolutions.co";
                    mail($email,$subject,$txt,$headers);
                    
				   $msg = "<p class='alert alert-success'> Check email.</p> ";
				   
				   echo $msg;
			   }
			   else{
				   $error = "<p class='alert alert-warning'>Password Update Not Successful</p> ";
				   
				   echo $error;
			   }
		}else{
			$error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
			
			 echo $error;
		}
	}
	
}
include("include/upper.php");?>

<div id="page-wrapper">
    <div class="row"> 
		<?php include("include/header.php");include("include/breadcrumbs.php"); breadcrumbs("Forgot Password");?>
        <div class="page-wrappers login-body full-row bg-gray">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                        <div class="login-right">
							<div class="login-right-wrap">
								<?php echo $error; ?><?php echo $msg; ?>
								<form method="post" enctype="multipart/form-data">
									<div class="form-group">
										<input type="email"  name="email" class="form-control" placeholder="Your Email*">
									</div>
									<button class="btn btn-success" name="reg" value="Send Me New Password" type="submit">Send Me New Password</button>
								</form>
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