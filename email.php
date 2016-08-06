<?php
if(isset($_POST['email'])) {

    $email_to = "affittasiocchialiroma@gmail.com";

    $email_subject = "contact-us";

    function died($error) {
        echo $error."<br /><br />";
        die();
    }

    if( !isset($_POST['nome']) || !isset($_POST['email']) || !isset($_POST['messaggio']) ) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $name = $_POST['nome'];
    $email_from = $_POST['email'];
    $messaggio = $_POST['messaggio'];
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }

  if(strlen($messaggio) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }

  if(strlen($error_message) > 0) {
    died($error_message);
  }

$headers = 'From: '.$email_from."\r\n".

'Reply-To: '.$email_from."\r\n" .

'X-Mailer: PHP/' . phpversion();

@mail($email_to, $email_subject, $messaggio, $headers);
?>



<!-- include your own success html here -->



grazie per averci contattato, leggeremo il suo messaggio al piu presto.
<a href="http://www.affittasiocchialiroma.it/">torna al sito </a>



<?php
}
?>
