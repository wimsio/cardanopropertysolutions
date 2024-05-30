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
include("./upper.php");?>
            <div class="page-wrapper">
                <div class="content container-fluid">
                <?php include("./breadcrumbs.php");bc("Feedback");?>
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
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
                                                    <th>User</th>
                                                    <th>Feedback</th>
                                                </tr>
                                            </thead>
                                            <tbody>
											<?php
												$query=mysqli_query($con,"select (SELECT u.uname FROM user u WHERE u.uid = f.uid LIMIT 1 ) as username,fdescription from feedback f");
												$cnt=1;
												while($row=mysqli_fetch_array($query))
													{
											?>
                                                <tr>
                                                    <td><?php echo $cnt; ?></td>
                                                    <td><?php echo $row['username']; ?></td>
                                                    <td><?php echo $row['fdescription']; ?></td>

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
			</div>
		<?php include("./lower.php");?>	
