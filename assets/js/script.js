$(document).ready(function ()
{
	$("#divEmailAlerts").hide();
	$("#btnSubmitForm").on("click", sendEmail);

	$('.carousel').carousel({
		interval: 2000
	});
});

async function sendEmail()
{
	const url = SEND_EMAIL_URL;

	let recipient = {};

	const enquirerName = $("#txtEnquirerName").val();
	const sender = "goldbake";
	recipient.email = $("#txtEmail").val();
	const enquirerSubject = $("#txtSubject").val();
	const enquirerMobile = $("#txtEnquirerMobile").val();
	const enquiryType = $("#ddlTypeOfEnquiry").val();
	const enquirerMessage = $("#txtMessage").val();

	// const enquirerName = "Name";
	// const sender = "suvishakha.tech@gmail.com";
	// recipient.email = "suvishakha@gmail.com";
	// const enquirerSubject = "Subject";
	// const enquirerMobile = "8100318714";
	// const enquiryType = "Enquiry Type";
	// const enquirerMessage = "Message";

	const emailContent = `
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
						<b style='font-size: 50%'>
							NEW CONTACT ENQUIRY
						</b>

						<br />

						<p style='font-size: 70%'>
							Hello! Someone just knocked on your door. Please find the details below.
						</p>

						<div>
							<table border='1' style='width: 100%; text-align: center'>
								<thead style='font-size: 80%'>
									<th>
										Header
									</th>

									<th>
										Details
									</th>
								</thead>

								<tbody style='font-size: 60%'>
									<tr>
										<td>
											Name
										</td>
				
										<td>
											${enquirerName}
										</td>
									</tr>
				
									<tr>
										<td>
											Email Address
										</td>
				
										<td>
											${recipient.email}
										</td>
									</tr>
				
									<tr>
										<td>
											Mobile Number
										</td>
				
										<td>
											${enquirerMobile}
										</td>
									</tr>
				
									<tr>
										<td>
											Subject
										</td>
				
										<td>
											${enquirerSubject}
										</td>
									</tr>
				
									<tr>
										<td>
											Type of Enquiry
										</td>
				
										<td>
											${enquiryType}
										</td>
									</tr>
				
									<tr>
										<td>
											Message
										</td>
				
										<td>
											${enquirerMessage}
										</td>
									</tr>
								</tbody>
							</table>
						<div>
					<div>
				<div>

				<i style='font-size: 50%'>
					This is a system generated mail. Please do not respond to this.
				</i>
			</body>
		</html>
	`;

	var params = ["sender", "recipient", "subject", "body"];
	var values = [sender, recipient, enquirerSubject, emailContent];

	var dataString = createJSON(params, values);

	await promisingAjaxCall(url, "POST", dataString, "application/json")
		.then((data) =>
		{
			$("#divEmailAlerts").show();
			$("#divLoading").hide();
			$("#divErrorMessage").hide();
			$("#divMessageSent").show().slideUp();
		})
		.catch((data) =>
		{
			$("#divEmailAlerts").show();
			$("#divLoading").hide();
			$("#divErrorMessage").show().slideUp();
			$("#divMessageSent").hide();
		});
}