<? include("include/upper.php");?>
<div id="page-wrapper">
    <div class="row"> 
		<?php include("include/header.php");include("include/breadcrumbs.php"); breadcrumbs("Team");?>
		        
        <div class="full-row">
            <div class="container">
				<div class="row">
                    <div class="col-lg-12">
                        <h2 class="text-secondary double-down-line text-center mb-5">Team</h2>
                        </div>
                </div>
                <div class="row">
                    <?php 
							$query=mysqli_query($con,"SELECT * FROM user WHERE utype='team'");
								while($row=mysqli_fetch_array($query))
								{
                            ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="hover-zoomer bg-white shadow-one mb-4">
                            <div class="overflow-hidden"> <img src="admin/user/<?php echo $row['6'];?>" alt="aimage"> </div>
                            <div class="py-3 text-center">
                                <h5 class="text-secondary hover-text-success"><a href="#"><?php echo $row['1'];?></a></h5>
                                <span>Developers</span> </div>
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