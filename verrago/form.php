<?php
	// define variables and set to empty values
  $emailErr = $inquiryErr = "";
	$email = $message = $inquiry = $email_message = "";
	$submitted = 0;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	   if (empty($_POST["name"])) {
		 $nameErr = "Name is required";
	   } else {
		 $name = clean_data($_POST["name"]);
		 $fill["name"] = $name;
		 // check if name only contains letters and whitespace
		 if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
		   $nameErr = "Only letters and white space allowed"; 
		 }
	   }
	   
	   if (empty($_POST["email"])) {
		 $emailErr = "Email is required";
	   } else {
		 $email = clean_data($_POST["email"]);
		 $fill["email"] = $email;
		 // check if e-mail address is well-formed
		 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		   $emailErr = "Invalid email format"; 
		 }
	   }
		 
	   if (empty($_POST["message"])) {
		 $message = "";
	   } else {
		 $message = clean_data($_POST["message"]);
		 $fill["message"] = $message;
		 // check if message number format is valid
		 if (ctype_alpha(preg_replace('/[0-9]+/', '',$message))) {
		   $messageErr = "message Number Cannot Include Letters"; 
		 }
		 if (!ctype_digit(preg_replace('~[^0-9]~', '',$message))) {
		   $messageErr = "Your message Number Does Not Include Digits"; 
		 }
	   }

	   if (empty($_POST["inquiry"])) {
		 $inquiryErr = "You Cannot Submit an Empty Inquiry";
	   } else {
		 $inquiry = clean_data($_POST["inquiry"]);
		 $fill["inquiry"] = $inquiry;
	   }
	}

	function clean_data($data) {
		// Strip whitespace (or other characters) from the beginning and end of string
		$data = trim($data);
		// Un-quotes quoted string
		$data = stripslashes($data);
		// Convert special characters to HTML entities
		$data = htmlspecialchars($data);
		return $data;
	}
	// Send email if no errors
	if (isset($fill)) {
		if (empty($nameErr) && empty($emailErr) && empty($messageErr) && empty($inquiryErr)) {
			// Inquiry sent from address below
			$email_from = "no-reply@emailadress.com";
			
			// Send form contents to address below
			$email_to = "info@emailadress.com";
			
			// Email message subject
			$today = date("j F, Y. H:i:s");
			$email_subject = "Website Submission [$today]";
			
			function clean_string($string) {

				$bad = array("content-type","bcc:","to:","cc:","href");

				return str_replace($bad,"",$string);

			}

			$email_message .= "Name: ".clean_string($name)."\n";

			$email_message .= "Email: ".clean_string($email)."\n";

			$email_message .= "message: ".clean_string($message)."\n";

			$email_message .= "Inquiry: ".clean_string($inquiry)."\n";
			
			// create email headers
			$headers = 'From: '.$email_from."\r\n".
			 
			'Reply-To: '.$email_from."\r\n" .
			 
			'X-Mailer: PHP/' . phpversion();
			 
			@mail($email_to, $email_subject, $email_message, $headers);
			
			$submitted = 1;
		}
	}
?>
<div>
	<form name="contactus" method="post" action="contact.php">
		<div>
			<span>* Name, Email and Inquiry are required fields.</span>
		</div>
		<div>
			<div>
				<span>Name</span>
			</div>
			<div>
				<input type="text" name="name" placeholder="Name" value="<?php
					if (isset($fill["name"]) && $submitted == 0) {
						echo $fill["name"];
					}?>">
				<span class="<?php
					if (empty($nameErr)) {
						 echo "hidden";
					   } else {
						 echo "error";
					}
				?>"><?php echo $nameErr;?></span>
			</div>
		</div>
		<div>
			<div>
				<span>Email</span>
			</div>
			<div>
				<input type="text" name="email" placeholder="Email Address" value="<?php
					if (isset($fill["email"]) && $submitted == 0) {
						echo $fill["email"];
					}?>">
				<span class="<?php
					if (empty($emailErr)) {
						 echo "hidden";
					   } else {
						 echo "error";
					}
				?>"><?php echo $emailErr;?></span>
			</div>
		</div>
		<div>
			<div>
				<span class="prefix">message</span>
			</div>
			<div>
				<input type="text" name="message" placeholder="message Number" value="<?php
					if (isset($fill["message"]) && $submitted == 0) {
						echo $fill["message"];
					}?>">
				<span class="<?php
					if (empty($messageErr)) {
						 echo "hidden";
					   } else {
						 echo "error";
					}
				?>"><?php echo $messageErr;?></span>
			</div>
		</div>
		<div>
			<div>
				<span>Inquiry</span>
			</div>
			<div>
				<textarea name="inquiry" placeholder="Enter Your Inquiry Here"><?php
					if (isset($fill["inquiry"]) && $submitted == 0) {
						echo $fill["inquiry"];
					}?></textarea>
				<span class="<?php
					if (empty($inquiryErr)) {
						 echo "hidden";
					   } else {
						 echo "error";
					}
				?>"><?php echo $inquiryErr;?></span>
				<div>
					<input type="submit" value="Submit" class="small button" />
				</div>
			</div>
		</div>
	</form>
			
	<!-- Success message -->
	<span class="success <?php if ($submitted == 0) { echo "hidden"; } ?>" >Inquiry <strong>Successfully sent</strong></span>
</div>