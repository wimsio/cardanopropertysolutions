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
         
    include("config.php");
    
    $uid = $_GET['id'];

    $sql = "SELECT * FROM user where uid='$uid'";
    
    $result = mysqli_query($con, $sql);
    
    while($row = mysqli_fetch_array($result))
	{
	  $img=$row["uimage"];
	}
	
    @unlink('user/'.$img);

    $msg="";
    
    $sql = "DELETE FROM user WHERE uid = {$uid}";
    
    $result = mysqli_query($con, $sql);
    
    if($result == true)
    {
    	$msg="<p class='alert alert-success'>User Deleted</p>";
    	
    	header("Location:user-list.php?msg=$msg");
    }
    else
    {
    	$msg="<p class='alert alert-warning'>User not Deleted</p>";
    	
    		header("Location:user-list.php?msg=$msg");
    }
    
    mysqli_close($con);
} 
catch(Exception $e) 
{
  var_dump($e);
}
?>
