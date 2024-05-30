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

include("include/upper.php");

?>
<div id="page-wrapper">
    <div class="row"> 
		<?php include("include/header.php");include("include/breadcrumbs.php"); breadcrumbs("Team");?>
        <div class="full-row">
            <div class="container">
				<div class="row">
                </div>
                <div class="row">
                    <?php 
                        $query=mysqli_query($con,"SELECT u.`uid`,u.uname,uimage,u.uemail, p.pid FROM user u, property p WHERE utype='team' and u.uid = p.pid;");
                        while($row=mysqli_fetch_assoc($query))
                        {
                    ?>
                                <div class="col-md-6 col-lg-4">
                                    <div class="hover-zoomer bg-white shadow-one mb-4">
                                        <div class="py-3 text-center"> 
                                            <img style="width:100px;height:100px;" src="admin/user/<?php echo $row['uimage'];?>" alt="Agents"> 
                                        </div>
                                        <div class="py-3 text-center"> 
                                            <span class="text-secondary hover-text-success"><a href="#"><?php echo $row['uname'];?> (Sales Agent)</a></span>
                                        </div>
                                        <div class="py-3 text-center">
                                            <span class="text-secondary hover-text-success"><a href="#"><?php echo $row['uemail'];?></a></span>
                                        </div>
                                        <div class="py-3 text-center">
                                            <span class="text-secondary hover-text-success"><a href="./feature.php?uid=<?php echo $row['pid'];?>">Properties Listed</a></span>
                                        </div>
                                    </div>
                                </div>
                    <?php } ?>
                </div>
            </div>
        </div>

		<?php include("include/footer.php");?>
        <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 
    </div>
</div>

<?php include("include/lower.php");?>