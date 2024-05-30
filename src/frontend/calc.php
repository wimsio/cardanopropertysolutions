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
    ini_set('session.cache_limiter','public');
    
    session_cache_limiter(false);
    
    session_start();
    
    if(isset($_REQUEST['calc']))
    {
    	$amount=$_REQUEST['amount'];
    	
    	$mon=$_REQUEST['month'];
    	
    	$int=$_REQUEST['interest'];
    	
    	$interest = $amount * $int/100;
    	
    	$pay = $amount + $interest;
    	
    	$month = $pay / $mon;
    
    }	
    
} 
catch(Exception $e) 
{
  var_dump($e);
}
 include("include/upper.php");?>
<div id="page-wrapper">
    <div class="row"> 

			<?php include("include/header.php"); include("include/breadcrumbs.php"); breadcrumbs("Calculator");?> 
       
        <div class="full-row bg-gray">
            <div class="container">
                    <div class="row mb-5">
						<div class="col-lg-12">
							<h2 class="text-secondary double-down-line text-center">Estimate Bond Terms</h2>
                        </div>
					</div>
					<center>
					<table class="items-list col-lg-6 table-hover" style="border-collapse:inherit;">
                        <thead>
                             <tr  class="bg-secondary">
                                <th class="text-white font-weight-bolder">Term</th>
                                <th class="text-white font-weight-bolder">Amount</th>
                             </tr>
                        </thead>
                        <tbody>
						
						
                            <tr class="text-center font-18">
                                <td><b>Amount</b></td>
                                <td><b><?php echo '$'.$amount ; ?></b></td>
                            </tr>
							<tr class="text-center">
                                <td><b>Total Duration</b></td>
                                <td><b><?php echo $mon.' Months' ; ?></b></td>
                            </tr>
							<tr class="text-center">
                                <td><b>Interest Rate</b></td>
                                <td><b><?php echo $int.'%' ; ?></b></td>
                            </tr>
							<tr class="text-center">
                                <td><b>Total Interest</b></td>
                                <td><b><?php echo '$'.$interest ; ?></b></td>
                            </tr>
							<tr class="text-center">
                                <td><b>Total Amount</b></td>
                                <td><b><?php echo '$'.$pay ; ?></b></td>
                            </tr>
							<tr class="text-center">
                                <td><b>Pay Per Month (EMI)</b></td>
                                <td><b><?php echo '$'.round($month) ; ?></b></td>
                            </tr>
							
                        </tbody>
                    </table> 
					</center>
            </div>
        </div>

		<?php include("include/footer.php");?>

        <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 

    </div>
</div>
<?php include("include/upper.php");?>