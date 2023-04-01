<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;

	require "../vendor/autoload.php";

	date_default_timezone_set("Asia/Kolkata");

	$enquirerName = "Name";
	$enquirerEmail = "gagansarda@gmail.com";
	$enquirerMessage = "The time is " . date("h:i:sa");
	$enquirerSubject = "subject";
	$enquirerMobile = "mobile";

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
			</body>
		</html>
	";

	try
	{
		$mail = new PHPMailer(true);
	
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
		$mail -> Subject = "There is a knock on your email's door!";
		$mail -> Body = $mailBody;
		$mail -> addAddress("gagansarda@gmail.com");
	
		if(!$mail -> Send())
		{
			echo "Mailer Error: " . $mail -> ErrorInfo;
		}
		else
		{
			echo 'Message has been sent. Thank you!';
		}
	}
	catch(exception $ex)
	{
		echo($ex);
	}
?>