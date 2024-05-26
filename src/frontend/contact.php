
<?php include("include/upper.php");
$error="";
$msg="";
if(isset($_POST['send']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$subject=$_POST['subject'];
	$message=$_POST['message'];
	
	if(!empty($name) && !empty($email) && !empty($phone) && !empty($subject) && !empty($message))
	{
		
		$sql="INSERT INTO contact (name,email,phone,subject,message) VALUES ('$name','$email','$phone','$subject','$message')";
		   $result=mysqli_query($con, $sql);
		   if($result){
			   $msg = "<p class='alert alert-success'>Message Send Successfully</p> ";
		   }
		   else{
			   $error = "<p class='alert alert-warning'>Message Not Send Successfully</p> ";
		   }
	}else{
		$error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
	}
}
?>

<div id="page-wrapper">
    <div class="row"> 
		<?php include("include/header.php");include("include/breadcrumbs.php"); breadcrumbs("Contact Us");?>
		        
        <div class="full-row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-5 bg-secondary">
                        <div class="">
                            <h3 class="mb-4 mt-4 text-white">Contacts</h3>
                            <ul>
                                <li class="d-flex mb-4"> <i class="fas fa-map-marker-alt text-white mr-2 font-13 mt-1"></i>
                                    <div class="contact-address">
                                        <h5 class="text-white">Address</h5>
                                        <span class="text-white">7 Gold Reef Road, Ormonde 2190 Johannesburg South South Africa</span> <br>
										</div>
                                </li>
                                <li class="d-flex mb-4"> <i class="fas fa-phone-alt text-white mr-2 font-13 mt-1"></i>
                                    <div class="contact-address">
                                        <h5 class="text-white">Call Us</h5>
                                        <span class="d-table text-white">+27 73 182 0631</span>
										
									</div>
                                </li>
                                <li class="d-flex mb-4"> <i class="fas fa-envelope text-white mr-2 font-13 mt-1"></i>
                                    <div class="contact-address">
                                        <h5 class="text-white">Email Adderss</h5>
										<span class="d-table text-white">info@cardanopropertysolutions.co, admin@cardanopropertysolutions.co</span>
										</div>
                                </li>
                            </ul>
                        </div>
                    </div>
					<div class="col-lg-1"></div>
                    <div class="col-md-12 col-lg-7">
						<div class="container">
                        <div class="row">
							<div class="col-lg-12">
								<h2 class="text-secondary double-down-line text-center mb-5">Get In Touch</h2>
								<?php echo $msg; ?><?php echo $error; ?>
							</div>
						</div>
						 <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="lastName" placeholder="Enter Last Name">
                                    </div>
                                </div>
                                            <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="firstName" placeholder="Enter First Name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="email" placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="phone" placeholder="Enter Phone">
                                    </div>
                                </div>
								<div class="col-md-12">
                                    <div class="form-group">
										<textarea class="form-control" id="message" placeholder="Enter Message"></textarea>
                                    </div>
                                </div>
								
                                <div class="col-md-12">
                                    <div class="form-group mt-4">
                                        <button type="button" onclick="sendMessage()" id="submit" class="btn btn-success w-100">Send Message</button>
                                    </div>
                                     <script>
                                        function sendMessage()
                                        {
                                            const lastName = document.getElementById('lastName').value;
                                            const firstName = document.getElementById('firstName').value;
                                            const email = document.getElementById('email').value;
                                            const phone = document.getElementById('phone').value;
                                            const message = document.getElementById('message').value;
          
                                            if(lastName && firstName && email && phone && message)
                                            { 
                                                const xhr = new XMLHttpRequest();
                                                
                                                xhr.open('GET', 'messages.php?lastName=' + lastName + '&firstName=' + firstName + '&email=' + email + '&phone=' + phone + '&message=' + message);
                                                
                                                xhr.onreadystatechange = function() 
                                                {
                                                    if (this.readyState == 4 && this.status == 200)
                                                    {
                                                   
                                                        document.getElementById("submit").innerHTML = xhr.responseText;
                                                    }
                                                    else
                                                    {
                                                        //alert("Failed");
                                                    }
                                                };
                                                    
                                                xhr.send();
                                                
                                            }
                                            else
                                            {
                                                alert(" Complete all fields");
                                            }
                                        }
                                    </script>
                                </div>
                            </div>
						</div>
					</div>
                </div>
            </div>
        </div>
		<div style="width:100%;paddding:5px;text-align:center;"> Where to find us<br>
		    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3578.7264955030846!2d28.006874999999997!3d-26.238075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e95093aa780f2f9%3A0x80ab47f716ceaf0f!2s7%20Gold%20Reef%20Rd%2C%20Ormonde%2C%20Johannesburg%20South%2C%202091!5e0!3m2!1sen!2sza!4v1716659849200!5m2!1sen!2sza" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div><?php include("include/footer.php");?>
        <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 

    </div>
</div>
<?php include("include/lower.php");?>