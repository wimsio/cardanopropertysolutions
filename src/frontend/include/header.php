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
?>
<header id="header" class="transparent-header-modern fixed-header-bg-white w-100">
            <div class="top-header bg-secondary">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <ul class="top-contact list-text-white  d-table">
                                <li><a href="#"><i class="fas fa-phone-alt text-success mr-1"></i>+27 73 182 0631</a></li>
                                <li><a href="#"><i class="fas fa-envelope text-success mr-1"></i>admin@cardanopropertysolutions.co</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="top-contact float-right">
                                <ul class="list-text-white d-table">
								<li><i class="fas fa-user text-success mr-1"></i>
								<?php  if(isset($_SESSION['uemail']))
								{ ?>
								<a href="logout.php">Logout</a>&nbsp;&nbsp;<?php } else { ?>
								<a href="index.php">Login</a>&nbsp;&nbsp;
								
								| </li>
								<li><i class="fas fa-user-plus text-success mr-1"></i><a href="register.php"> Register</li><?php } ?>
								</ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-nav secondary-nav hover-success-nav py-2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <nav class="navbar navbar-expand-lg navbar-light p-0"> 
                            
                            <a class="navbar-brand position-relative" href="index.php"><img class="nav-logo" style="width:135px;height:56px;" src="images/logo/logo.jpeg" alt=""></a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item dropdown"> <a class="nav-link" href="../index.php" role="button" aria-haspopup="true" aria-expanded="false">Customer Home</a></li>
                                        <li class="nav-item dropdown"> <a class="nav-link" href="./index.php" role="button" aria-haspopup="true" aria-expanded="false">Admin Home</a></li>
                                        <li class="nav-item"> <a class="nav-link" href="../property.php">List Properties</a> </li>
                                        <li class="nav-item"> <a class="nav-link" href="../team.php">Team</a> </li>
                                        <li class="nav-item"> <a class="nav-link" href="../contact.php">Contact Us</a> </li>		
                                        <li class="nav-item"> <a class="nav-link" href="../about.php">About</a> </li>
										
										<?php  if(isset($_SESSION['uemail']))
										{ ?>
										<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a>
											<ul class="dropdown-menu">
												<li class="nav-item"> <a class="nav-link" href="profile.php">Profile</a> </li>
												<li class="nav-item"> <a class="nav-link" href="feature.php">Your Property</a> </li>
												<li class="nav-item"> <a class="nav-link" href="logout.php">Logout</a> </li>	
											</ul>
                                        </li>
                                        <a class="btn btn-success d-none d-xl-block" style="border-radius:30px;" href="submit-property.php">Post Property</a> 
										<?php } else { ?>
									
										<?php } ?>
										
                                    </ul>
									
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>