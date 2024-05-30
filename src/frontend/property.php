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
		<?php include("include/header.php");include("include/breadcrumbs.php"); breadcrumbs("Property");?>
		       
        <div class="full-row">
            <div class="container">
                <div class="row">
				
					<div class="col-lg-12">
                        <div class="row">
						
							<?php 
							$query=mysqli_query($con,"SELECT property.*, user.uname,user.utype,user.uimage FROM `property`,`user` WHERE property.uid=user.uid");
								while($row=mysqli_fetch_array($query))
								{
							?>
									
                            <div class="col-md-4">
                                <div class="featured-thumb hover-zoomer mb-4">
                                   <a href="property-detail.php?pid=<?php echo $row['0'];?>"> <div class="overlay-black overflow-hidden position-relative"> 
                                        <img style="width:300px;height:300px;" src="admin/property/<?php echo $row['18'];?>" alt="Property">
                                        <?php if(strcmp($row['24'],"sold out") == 0)
                                        {
                                            echo '<div class="sale bg-danger text-white">Sale/Rent Status :';echo $row['24']; echo '</div>';
                                        }
                                        else
                                        { 
                                             echo '<div class="sale bg-success text-white">Sale/Rent Status :';echo $row['24']; echo '</div>';
                                        }
                                        ?>
                                        <div class="price text-primary text-capitalize">Price($): <?php echo $row['13'];?> <span class="text-white"><?php echo $row['12'];?> Sqft</span></div>
                                        
                                    </div></a>
                                    <div class="featured-thumb-data shadow-one">
                                        <div class="p-4">
                                            <h5 class="text-secondary hover-text-success mb-2 text-capitalize"><a href="property-detail.php?pid=<?php echo $row['0'];?>"><?php echo $row['1'];?></a></h5>
                                            <span class="location text-capitalize"><i class="fas fa-map-marker-alt text-success"></i> <?php echo $row['14'];?></span> </div>
                                        <div class="px-4 pb-4 d-inline-block w-100">
                                            <div class="float-left text-capitalize"><i class="fas fa-user text-success mr-1"></i>By : <?php echo $row['uname'];?></div>
                                            <div class="float-right"><i class="far fa-calendar-alt text-success mr-1"></i> <?php echo date('d-m-Y', strtotime($row['date']));?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?> 
                        <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center mt-4">
                                        <li class="page-item disabled"> <span class="page-link">Previous</span> </li>
                                        <li class="page-item active" aria-current="page"> <span class="page-link"> 1 <span class="sr-only">(current)</span> </span> </li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">...</li>
                                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                                        <li class="page-item"> <a class="page-link" href="#">Next</a> </li>
                                    </ul>
                                </nav>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php include("include/footer.php");?>
        <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 
    </div>
</div>

<?php include("include/lower.php");?>