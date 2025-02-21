<?php 
  	// This code lives on my server at https://files.000webhost.com/
  	// This allows us to send data back to Unity
  	header("Access-Control-Allow-Origin: *");

    	// Evaluate data are all present
	if (isset($_REQUEST["name"])    && isset($_REQUEST["fromEmail"]) 
     && isset($_REQUEST["toEmail"]) && isset($_REQUEST["message"])) 
	{
		echo "Trying to send...";
	} 
	else
	{
		echo "Bad data, exiting...";
		exit("");
	}

	//Define the $_POST variables...
	$name =      $_REQUEST['name'];
	$toEmail =   $_REQUEST['toEmail'];
	$message =   $_REQUEST['message'];
	$fromEmail = $_REQUEST['fromEmail'];
	
	$headers = "MIME-Version: 1.0" . "\r\n";
    	$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
    	$headers .= "From: " . $fromEmail . "\r\n" .
        "Reply-To: " . $fromEmail . "\r\n" .
	"X-Mailer: PHP/" . phpversion();

	//Send the email and print sender confirmation...
   	$success = mail( $toEmail, "Fancy Title", $message, $headers); 
	if ($success)
	{
  		echo('Your message has been sent successfully!');
	}
	else
	{
		echo(error_get_last()['message']);
	}
?>
