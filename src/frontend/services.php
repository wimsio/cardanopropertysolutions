
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
		<?php include("include/header.php");include("include/breadcrumbs.php"); breadcrumbs("Services");?>
		        
        <div class="full-row">
            <div class="container">
				
				<?php 
					
					$query=mysqli_query($con,"SELECT * FROM services");
					while($row=mysqli_fetch_array($query))
					{ 
				?>
				<div class="row">
                    <div class="col-md-12 col-lg-12">
                        <h3 class="double-down-line-left text-secondary position-relative pb-4 mb-4"><?php echo $row['1'];?></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="about-content">
                            <?php echo $row['2'];?>
                        </div>
                    </div>
                </div>
				
				<?php } ?>
            </div>
        </div>
		<?php include("include/footer.php");?>
        <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 
    </div>
</div>

<?php include("include/lower.php");?>