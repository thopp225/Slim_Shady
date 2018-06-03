<?php
//Email to receive file

$contact_email_to = "customerservice@aerodiagnostics.com";

if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    die('Sorry Request must be Ajax POST'); 
}

if( isset($_POST) ) {

    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST["subject"], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);
    
    if(strlen($name)<4){ 
        die($contact_error_name);
    }
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){  
        die($contact_error_email);
    }
    
    if(strlen($message)<3){ 
        die($contact_error_subject);
    }
    
    if(strlen($message)<3){ 
        die($contact_error_message);
    }

    $sendemail = mail($contact_email_to, $contact_subject_prefix . $subject, $message,
         "From: ".$name." <".$email.">" . PHP_EOL
        ."Reply-To: ".$email . PHP_EOL
        ."X-Mailer: PHP/" . phpversion()
    );
    
    if( $sendemail ) {
        echo 'OK';
    } else {
        echo 'Could not send mail! Please check your PHP mail configuration.';
    }
}
?>
?>
