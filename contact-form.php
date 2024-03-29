<?php
/*
Name: 			Contact Form
Written by: 	Okler Themes - (http://www.okler.net)
Theme Version:	7.5.0
*/


namespace PortoContactForm;

session_cache_limiter('nocache');
header('Expires: ' . gmdate('r', 0));

header('Content-type: application/json');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'php/php-mailer/src/PHPMailer.php';
require 'php/php-mailer/src/SMTP.php';
require 'php/php-mailer/src/Exception.php';
require($_SERVER["DOCUMENT_ROOT"].'/wp-load.php');
$all_options = get_option('true_options');
//var_dump($all_options);

// Step 1 - Enter your email address below.
//$email = 'skobelkinsa@yandex.ru';
$email = $all_options["mail_to"];

// If the e-mail is not working, change the debug option to 2 | $debug = 2;
$debug = 0;

// If contact form don't has the subject input change the value of subject here
$subject = ( isset($_POST['subject']) ) ? $_POST['subject'] : 'Сообщение с сайта: '.$_SERVER['HTTP_HOST'];

$message = '';

foreach($_POST as $label => $value) {
	$label = ucwords($label);

	// Use the commented code below to change label texts. On this example will change "Email" to "Email Address"

    switch ($label) {
        case "Name":
            $label = "Имя";
            break;
        case "Email":
            $label = "Эл. почта";
            break;
        case "Phone":
            $label = "Телефон";
            break;
        case "Checkboxes":
            $label = "Мероприятия";
            break;
        case "Message":
            $label = "Комментарий";
            break;

    }

	// Checkboxes
	if( is_array($value) ) {
		// Store new value
		$value = implode(', ', $value);
	}

	$message .= $label.": " . htmlspecialchars($value, ENT_QUOTES) . "<br>\n";
}

$mail = new PHPMailer(true);

try {

	$mail->SMTPDebug = $debug;                                 // Debug Mode

	// Step 2 (Optional) - If you don't receive the email, try to configure the parameters below:

	//$mail->IsSMTP();                                         // Set mailer to use SMTP
	//$mail->Host = 'mail.yourserver.com';				       // Specify main and backup server
	//$mail->SMTPAuth = true;                                  // Enable SMTP authentication
	//$mail->Username = 'user@example.com';                    // SMTP username
	//$mail->Password = 'secret';                              // SMTP password
	//$mail->SMTPSecure = 'tls';                               // Enable encryption, 'ssl' also accepted
	//$mail->Port = 587;   								       // TCP port to connect to
    $mail->AddBCC('spam@mmentor.ru', 'Market Mentor');
	$mail->AddAddress($email);	 						       // Add another recipient

	//$mail->AddAddress('person2@domain.com', 'Person 2');     // Add a secondary recipient
	//$mail->AddCC('person3@domain.com', 'Person 3');          // Add a "Cc" address. 
	//$mail->AddBCC('person4@domain.com', 'Person 4');         // Add a "Bcc" address. 

	// From - Name
	$fromName = ( isset($_POST['name']) ) ? $_POST['name'] : 'Website User';
	$mail->SetFrom('no-replay@'.$_SERVER['HTTP_HOST'], $fromName);
    //$mail->SetFrom($email, $fromName);
	// Repply To
	if( isset($_POST['email']) ) {
		$mail->AddReplyTo($_POST['email'], $fromName);
	}

	$mail->IsHTML(true);                                       // Set email format to HTML

	$mail->CharSet = 'UTF-8';

	$mail->Subject = $subject;
	$mail->Body    = $message;

	$mail->Send();
	$arrResult = array ('response'=>'success');

} catch (Exception $e) {
	$arrResult = array ('response'=>'error','errorMessage'=>$e->errorMessage());
} catch (\Exception $e) {
	$arrResult = array ('response'=>'error','errorMessage'=>$e->getMessage());
}

if ($debug == 0) {
	echo json_encode($arrResult);
}