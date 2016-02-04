<?php

    // Here we get all the information from the fields sent over by the form.

    $name = $_POST['user-name'];
    $email = $_POST['user-email'];
    $message = ( $_POST['user-message'] ) ? $_POST['user-message'] : '';
    $status = $_POST['user-status'];

    $to = 'dyderic@gmail.com';
    $message = 'Name: '.$name.'<br /> Email: '.$email.'<br />Message: '.$message;

    $subject = 'Subject';

    $headers = "From: You company <".$to.">". "\r\n" .
                  "Return-Path: You company <info@yousite.com>\r\n".
                  "Reply-To: You company <".$to.">" . "\r\n" .
                  "MIME-Version: 1.0\r\n".
                  "Content-type: text/html; charset=iso-8859-1\r\n".
                  "X-Priority: 3\r\n" .
                  'X-Mailer: PHP/' . phpversion();

    if (filter_var($email, FILTER_VALIDATE_EMAIL) && $status == "yes" ) { // shis line checks that we have a valid email address
        mail($to, $subject, $message, $headers); // this method sends the mail.
        echo "success"; // success message
        exit;
    }else{
        echo "error"; //error
    }

?>