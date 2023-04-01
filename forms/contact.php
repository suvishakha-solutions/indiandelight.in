<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;

	require "../vendor/autoload.php";

	$enquirerName = $_POST["name"];
	$enquirerEmail = $_POST["email"];
	$enquirerMessage = $_POST["message"];
	$enquirerSubject = $_POST["subject"];
	$enquirerMobile = $_POST["mobile"];

	$enquiryType = $_POST["typeOfEnquiry"];

	$mailBody =
	"
		<!DOCTYPE html>
		<html lang='en'>
			<head>
				<title>
					New Enquiry
				</title>

				<meta charset='utf-8'>
				<meta name='viewport' content='width=device-width, initial-scale=1'>

			</head>

			<body style='background: #eee; padding: 2%'>
				<div style='border-top: 3px solid #63BC46; background: #fff; padding: 2%; box-shadow: 0px 2px 4px #ddd'>
					<div>
						<b style='font-size: 120%'>
							NEW CONTACT ENQUIRY
						</b>

						<br />
						
						<p>
							Hello! Someone just knocked on your door. Please find the details below.
						</p>

						<div>
							<table border='1' style='width: 100%; text-align: center'>
								<thead>
									<th>
										Header
									</th>
									<th>
										Details
									</th>
								</thead>

								<tbody>
									<tr>
										<td>
											Name
										</td>
										<td>
											$enquirerName
										</td>
									</tr>
									<tr>
										<td>
											Email Address
										</td>
										<td>
											$enquirerEmail
										</td>
									</tr>
									<tr>
										<td>
											Mobile Number
										</td>
										<td>
											$enquirerMobile
										</td>
									</tr>
									<tr>
										<td>
											Subject
										</td>
										<td>
											$enquirerSubject
										</td>
									</tr>
									<tr>
										<td>
											Type of Enquiry
										</td>
										<td>
											$enquiryType
										</td>
									</tr>
									<tr>
										<td>
											Message
										</td>
										<td>
											$enquirerMessage
										</td>
									</tr>
								</tbody>
							</table>
						<div>
					<div>
				<div>
				<br>
				<i>
					This is a system generated mail. Please do not respond to this.
				</i>
			</body>
		</html>
	";

	$mail = new PHPMailer(true);

	// $mail -> IsSMTP(); // enable SMTP
	// $mail -> SMTPAuth = true; // authentication enabled
	// $mail -> SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
	// $mail -> Host = "smtp.gmail.com";
	// $mail -> Port = 587;
	// $mail -> IsHTML(true);

	// $mail -> Username = "knocknock.suvishakha@gmail.com";
	// $mail -> Password = "Vishakha@997";
	
	// $mail -> SetFrom("knocknock.suvishakha@gmail.com");
	// $mail -> Subject = "There is a knock on your door!";
	// $mail -> Body = $mailBody;
	// $mail -> AddAddress("gagansarda@gmail.com");
	
	// $mail -> isSMTP(); // enable SMTP
	$mail -> Host = "relay-hosting.secureserver.net";
	$mail -> SMTPAuth = false; // authentication enabled
	$mail -> SMTPAutoTLS = false; 

	// $mail -> Username = "knocknock@goldbake.in";
	// $mail -> Password = "U3u~S^+3~V=}";

	$mail -> SMTPSecure = "tls";
	$mail -> Port = 25;
	$mail -> IsHTML(true);
	
	$mail -> setFrom("knocknock@goldbake.in", "Knock Knock");

	if($enquiryType == "feedback")
	{
		$mail -> Subject = "Feedback: From $enquirerName";
	}
	else if($enquiryType == "complaint")
	{
		$mail -> Subject = "Complaint: From $enquirerName";
	}
	else
	{
		$mail -> Subject = "There is a knock on your email's door!";
	}
	
	$mail -> Body = $mailBody;
	$mail -> addAddress("care.goldbake@gmail.com");
	$mail -> addAddress("suvishakha@gmail.com");

	if(!$mail -> Send())
	{
		echo "Mailer Error: " . $mail -> ErrorInfo;
	}
	else
	{
		if($enquiryType == "feedback")
		{
			echo "Your feedback has been submitted successfully!";
		}
		else if($enquiryType == "complaint")
		{
			echo "Your complaint has been lodged. We'll get in touch with you soon!";
		}
		else
		{
			echo "Message submitted successfully!";
		}
	}
?>