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
    
} 
catch(Exception $e) 
{
  var_dump($e);
}    

?>