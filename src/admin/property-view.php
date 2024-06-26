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
                <?php include("./breadcrumbs.php");bc("View Property");?>
					<div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

										<?php 
											if(isset($_GET['msg']))	
											echo $_GET['msg'];	
										?>
                                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>

                                                    <th>Title</th>
                                                    <th>Type</th>
                                                    <th>BHK</th>
                                                    <th>S/R</th>
													<th>Area</th>
                                                    <th>Price</th>
                                                    <th>Location</th>
													<th>Status</th>
                                                    <th>Added Date</th>
                                                    <th>Actions</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
												<?php
													
													$query=mysqli_query($con,"select * from property");
													while($row=mysqli_fetch_row($query))
													{
												?>
                                                <tr>
                                                    <!-- <td><?php echo $row['0']; ?></td> -->
                                                    <td><?php echo $row['1']; ?></td>
                                                    <td><?php echo $row['3']; ?></td>
                                                    <td><?php echo $row['4']; ?></td>
                                                    <td><?php echo $row['5']; ?></td>
                                                    <td><?php echo $row['12']; ?></td>
                                                    <td><?php echo $row['13']; ?></td>
                                                    <td><?php echo $row['14']; ?></td>
                                                    <td><?php echo $row['24']; ?></td>
                                                    <td><?php echo $row['29']; ?></td>
													<td><a href="property-edit.php?id=<?php echo $row['0'];?>"><button style="width:100px;" class="btn btn-info">Edit</button></a>
                                                    <a href="property-delete.php?id=<?php echo $row['0'];?>"><button  style="width:100px;" class="btn btn-danger">Delete</button></a></td>
                                                </tr>
                                               <?php
												} 
												?>
                                            </tbody>
                                        </table>
                                        
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->
					
				</div>			
			</div>
<?php include("./lower.php");?>	
