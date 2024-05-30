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
 
 
 
 include("include/upper.php");?> 

<div id="page-wrapper">
    <div class="row"> 
	<?php include("include/header.php"); include("include/breadcrumbs.php"); breadcrumbs("My Properties");?> 
        <div class="full-row bg-gray">
            <div class="container">
                    <div class="row mb-5">
						<div class="col-lg-12">
							<h2 class="text-secondary double-down-line text-center">List of Properties</h2>
							<?php 
								if(isset($_GET['msg']))	
								echo $_GET['msg'];	
							?>
                        </div>
					</div>
					<table class="items-list col-lg-12 table-hover" style="border-collapse:inherit;">
                        <thead>
                             <tr  class="bg-dark">
                                <th class="text-white font-weight-bolder">Properties</th>
                                <th class="text-white font-weight-bolder">BHK</th>
                                <th class="text-white font-weight-bolder">Type</th>
                                <th class="text-white font-weight-bolder">Added Date</th>
								<th class="text-white font-weight-bolder">Status</th>
                                <th class="text-white font-weight-bolder">Update</th>
								<th class="text-white font-weight-bolder">Delete</th>
                             </tr>
                        </thead>
                        <tbody>

							<?php 
							
							$uid=$_SESSION['uid'];
							
							$id = $_GET["uid"];
							
							if(isset($id))
							{
							    $uid = $id;
							}
							$query=mysqli_query($con,"SELECT * FROM `property` WHERE uid='$uid'");
								while($row=mysqli_fetch_array($query))
								{
							?>
                            <tr>
                                <td>
									<img src="admin/property/<?php echo $row['18'];?>" alt="pimage">
                                    <div class="property-info d-table">
                                        <h5 class="text-secondary text-capitalize"><a href="property-detail.php?pid=<?php echo $row['0'];?>"><?php echo $row['1'];?></a></h5>
                                        <span class="font-14 text-capitalize"><i class="fas fa-map-marker-alt text-success font-13"></i>&nbsp; <?php echo $row['14'];?></span>
                                        <div class="price mt-3">
											<span class="text-success"> Rs. &nbsp;<?php echo $row['13'];?></span>
										</div>
                                    </div>
								</td>
                                <td><?php echo $row['4'];?></td>
                                <td class="text-capitalize">For <?php echo $row['5'];?></td>
                                <td><?php echo $row['29'];?></td>
								<td class="text-capitalize"><?php echo $row['24'];?></td>
                                <td><a class="btn btn-info" href="submit-property-update.php?id=<?php echo $row['0'];?>">Update</a></td>
								<td><a class="btn btn-danger" href="submit-property-delete.php?id=<?php echo $row['0'];?>">Delete</a></td>
                            </tr>
							<?php } ?>

                        </tbody>
                    </table>            
            </div>
        </div>
		<?php include("include/footer.php");?>
        <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 
    </div>
</div>
<?php include("include/lower.php");?>