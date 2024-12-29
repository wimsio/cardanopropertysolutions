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

require("config/config.php");

if(!isset($_SESSION['auser']))
{
	header("location:index.php");
}
} 
catch(Exception $e) 
{
  var_dump($e);
} 

include("./upper.php");?>
            <div class="page-wrapper">
                <div class="content container-fluid">
                     <?php include("./breadcrumbs.php");bc("About View");?>
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<?php 
											if(isset($_GET['msg']))	
											echo $_GET['msg'];
											
									?>
								</div>
								<div class="card-body">

									<div class="table-responsive">
										<table class="table table-stripped table-bordered table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th>Title</th>
													<th>Content</th>
													
													<th>Actions</th>
													
												</tr>
											</thead>
											<?php
													
													$query=mysqli_query($con,"select * from about");
													$cnt=1;
													while($row=mysqli_fetch_row($query))
														{
											?>
											<tbody>
												<tr>
													<td><?php echo $cnt; ?></td>
													<td><?php echo $row['1']; ?></td>
													<td><?php echo $row['2']; ?></td>
												
													<td><a href="about-edit.php?id=<?php echo $row['0']; ?>"><button class="btn btn-info" style="width:100px;">Edit</button></a>
													<a href="about-delete.php?id=<?php echo $row['0']; ?>"><button class="btn btn-danger" style="width:100px;">Delete</button></a></td>
												</tr>
											</tbody>
												<?php
												$cnt=$cnt+1;
												} 
												?>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				
				</div>			
			</div>
				 <?php include("./footer.php");?>