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
    
    include("cinfig/config.php"); 
    
    if(!isset($_SESSION['auser']))
    {
    	header("location:index.php");
    }

    $error="";
    
    $msg="";
    
    if(isset($_POST['insert']))
    {
    	$cid = $_GET['id'];
    	
    	$ustate=$_POST['ustate'];
    	
    	$ucity=$_POST['ucity'];
    	
    	if(!empty($ustate) && !empty($ucity))
    	{
    		$sql="UPDATE city SET cname = '{$ucity}' ,sid = '{$ustate}' WHERE cid = {$cid}";
    		
    		$result=mysqli_query($con,$sql);
    		
    		if($result)
    			{
    				$msg="<p class='alert alert-success'>City Updated</p>";
    				
    				header("Location:city-add.php?msg=$msg");
    			}
    			else
    			{
    				$msg="<p class='alert alert-warning'>City Not Updated</p>";
    				
    				header("Location:city-add.php?msg=$msg");
    			}
    	}
    	else
    	{
    		$error = "<p class='alert alert-warning'>* Please Fill all the Fields</p>";
    	}
    	
    }
} 
catch(Exception $e) 
{
  var_dump($e);
}include("./upper.php");?>
            <div class="page-wrapper">
                <div class="content container-fluid">
                <?php include("./breadcrumbs.php");bc("City List");?>
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Contact List</h4>
									<?php 
											if(isset($_GET['msg']))	
											echo $_GET['msg'];
											
										?>
								</div>
								<div class="card-body">

									<table id="basic-datatable" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
													<th>Subject</th>
                                                    <th>Message</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        
                                        
                                            <tbody>
											<?php
													
												$query=mysqli_query($con,"select * from contact");
												$cnt=1;
												while($row=mysqli_fetch_row($query))
													{
											?>
                                                <tr>
                                                    <td><?php echo $cnt; ?></td>
                                                    <td><?php echo $row['1']; ?></td>
                                                    <td><?php echo $row['2']; ?></td>
                                                    <td><?php echo $row['3']; ?></td>
                                                    <td><?php echo $row['4']; ?></td>
													<td><?php echo $row['5']; ?></td>
                                                    <td><a href="contactdelete.php?id=<?php echo $row['0']; ?>"><button class="btn btn-danger">Delete</button></a></td>
                                                </tr>
                                                <?php
												$cnt=$cnt+1;
												} 
												?>
                                               
                                            </tbody>
                                        </table>
								</div>
							</div>
						</div>
					</div>
				
				</div>			
			</div><?php include("./lower.php");?>	
