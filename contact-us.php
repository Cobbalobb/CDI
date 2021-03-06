<?php
//include('inc/connect.php');
include('header.php');
?>
	
<section id="contact">
	<div class="container">
		<div class="row">
			<div class="span12">		
				<!-- Form -->
				<form id="contact-form" action="send_mail.php" method="post" enctype="multipart/form-data" style="width:450px;">
					<h2>GET IN TOUCH</h2>
					<p>Fill in the form below, and we'll get back to you within 24 hours.</p>
					<div>
						<label>
							<span><h3>Name:</h3></span>
							<input style = "border-radius: 4px; width 90%; " name="name" placeholder="Please enter your name" type="text" tabindex="1" required autofocus>
						</label>
					</div>
					<div>
						<label>
							<span><h3>Email:</h3></span>
							<input style = "border-radius: 4px;" name="email" placeholder="Please enter your email address" type="email" tabindex="2" required>
						</label>
					</div>
					<div>
						<label>
							<span><h3>Telephone:</h3></span>
							<input style = "border-radius: 4px;"  name="telephone" placeholder="Please enter your number" type="tel" tabindex="3" required>
						</label>
					</div>
					<div>
						<label>
							<span><h3>Message:</h3></span>
							<textarea style = "border-radius: 4px;" name="message" placeholder="Include all the details you can" tabindex="5" required></textarea>
						</label>
					</div>
					<div>
						<button  name="submit" type="submit" id="contact-submit">SEND EMAIL</button>
					</div>
				</form>
				<!-- /Form -->
			</div>
		</div>
	</div>
</section>

	<script src
	="js/contact.js"></script>
	
<?php include('footer.php'); ?>