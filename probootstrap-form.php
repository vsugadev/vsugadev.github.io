<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "contact@tfoundationindia.com";
    $email_subject = "{Contact Us} - PHP";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['subject']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $name_form = $_POST['name']; // required
    $email_form = $_POST}['email']; // required
    $subject_from = $_POST['subject']; // not required
    $message_form = $_POST['message']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($email_exp,$email_form)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
   
  if(!preg_match($string_exp,$name_form)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }
 
 if(!preg_match($string_exp,$subject_from)) {
    $error_message .= 'The Subject you entered does not appear to be valid.<br />';
  }
   
    if(!preg_match($string_exp,$message_form)) {
    $error_message .= 'The Message you entered does not appear to be valid.<br />';
  }
 
  if(strlen($comments_form) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "First Name: ".clean_string($name_form)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Subject: ".clean_string($subject_from)."\n";
    $email_message .= "Message: ".clean_string($message_form)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 
Thank you for contacting us. We will be in touch with you very soon.
 
<?php
 
}
?>
