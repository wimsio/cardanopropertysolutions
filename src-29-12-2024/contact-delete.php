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
    
    $cid = $_GET['id'];
    
    $sql = "DELETE FROM contact WHERE cid = {$cid}";
    
    $result = mysqli_query($con, $sql);
    
    if($result == true)
    {
    	$msg="<p class='alert alert-success'>Contact Deleted</p>";
    	
    	header("Location:contact-view.php?msg=$msg");
    }
    else{
    	$msg="<p class='alert alert-warning'>Contact Not Deleted</p>";
    	
    	header("Location:contact-view.php?msg=$msg");
    }
    mysqli_close($con);
} 
catch(Exception $e) 
{
  var_dump($e);
}
?>
