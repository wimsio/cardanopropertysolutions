<?php 
    
    include("./config/config.php");
    
    $error="";
    
    $msg="";
    
    $lastName=$_GET['lastName']; 
    
    $firstName=$_GET['firstName'];
    
    $email=$_GET['email'];
    
    $phone=$_GET['phone'];
    
    $message=$_GET['message'];

	if(!empty($lastName) && !empty($firstName) && !empty($email) && !empty($phone) && !empty($message))
	{
	   $sql="INSERT INTO messages (lastName,firstName,email,phone,message) VALUES ('$lastName','$firstName','$email','$phone','$message')";
		
	   $result=mysqli_query($con, $sql);

	   if($result)
	   {
		   $msg = "<p class='alert alert-success'>Message Successfully Sent!</p> ";
	   }
	   else{
		   $error = "<p class='alert alert-warning'>Message sending failed, sorry.</p> ";
	   }
	}
	else
	{
		$error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
	}
	
	echo $msg.$error;
    

?>