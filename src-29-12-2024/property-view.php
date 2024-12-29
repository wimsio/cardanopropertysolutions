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
                                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap"><h3> NOTE: Property is same but transactions on sales and mints all have unique transaction hash ids!</h3>
                                            <thead>
                                                <tr>

                                                    <th>PID</th>
                                                    <th>Titile</th>
                                                    <th>Type</th>
                                                    <th>Price</th>
													<th>Image</th>
                                                    <th>Token Names</th>
                                                    <th>TxHash</th>
													<th>Status</th>
                                                    <th>Date Tokens Minted</th>
                                                    <th>UserID</th>
                                                    <th>Token Prices</th>
                                                    <th>Smart Contract Address</th>
                                                </tr>
                                            </thead>
                                            <tbody>
												<?php
													
													$sql="SELECT p.`pid` as pid,p.`title`,p.`type`,p.`price`,p.`pimage`, t.`tokenName`,t.`txh`, t.`status`, t.`dateTimeMinted`, t.`uid`, 
													t.sharesTokenPrice, t.scriptAddressBech32 FROM `tokenSaleDetails` t, property p WHERE t.pid = p.pid";  
													$result = mysqli_query($con,$sql);
													while($row=mysqli_fetch_array($result))
													{
													   
												?>
                                                <tr>
                                                    
                                                    <td><?php echo $row['pid']; ?></td>
                                                    <td><?php echo $row['title']; ?></td>
                                                    <td><?php echo $row['type']; ?></td>
                                                    <td><?php echo $row['price']; ?></td>
                                                    <td><img src="./property/<?=$row['pimage']?>" style="width:50px;height:50px;" /></td>
                                                    <td><?php echo $row['tokenName']; ?></td>
                                                    <td><a href="https://preprod.cexplorer.io/tx/<?=$row['txh']?>">TxHash Link</a></td>
                                                    <td><?php echo $row['status']; ?></td>
                                                    <td><?php echo $row['dateTimeMinted']; ?></td>
                                                    <td><?php echo $row['uid']; ?></td>
                                                    <td><?php echo $row['sharesTokenPrice']; ?></td>
                                                    <td><a href="https://preprod.cexplorer.io/address/<?=$row['scriptAddressBech32']?>">Script Address <?='...'.substr($row['scriptAddressBech32'],-5)?></a></td>
  
													
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
