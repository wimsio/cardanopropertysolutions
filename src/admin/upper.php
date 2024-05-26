<?php

session_start();

require("./config/config.php");

if(!isset($_SESSION['auser']))
{
	header("location:index.php");
}

echo '
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Cardano Property Solutions</title>
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
		<link rel="stylesheet" href="assets/plugins/morris/morris.css">
        <link rel="stylesheet" href="assets/css/style.css">

    </head>
    <body>
			';
			
    include("header.php"); 
?>