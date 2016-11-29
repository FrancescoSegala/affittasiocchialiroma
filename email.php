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

<link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
     <!-- FONTAWESOME STYLE CSS -->
     <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />
<meta http-equiv="refresh" content="5;url=http://www.affittasiocchialiroma.it" />
<body style="background-image:url(/assets/img/send.gif);" >
 Grazie per averci contattato, leggeremo il suo messaggio al piu presto.<br>
<a href="http://www.affittasiocchialiroma.it/"><strong>torna al sito</strong> </a>


    
</body>

<?php
}
?>
