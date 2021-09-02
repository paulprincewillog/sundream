<?php

    require "../../../initialize.php";
    require '../_lib/db.php';
    require '../_lib/mail.php';

    $x = [];


    $full_name = $db->sanitize($_POST['full_name']);
    $phone_number = $db->sanitize($_POST['phone_number']);
    

    // Send notification to my email
    $mail->subject = "$full_name submitted contact details to Sundream's website";

    $mail->body    = "Someone just submitted his/her details on Sundream's website. <br>
        Full name : $full_name
        <br>
        Phone number
        <br>
        <h1> $phone_number </h1>
        <br>
        <br>
        Please <a href='tel: $phone_number'> Call this person</a> right away.
    "; 
    
    $mail->AltBody = "Someone just submitted his/her details on your website.
    Full name : $full_name, 
    Phone number : $phone_number

    Please all this person right away." ; 

    $mail->receiver = "meetthedigitalmechanic@gmail.com";
    $mail->send();

    $mail->receiver = "otwopaul@gmail.com";
    $mail->send();


    if ($mail->isSuccessful) {
            
        $x['dd_success'] = true;
        $x['dd_feedback'] = "We've received your phone number and would call you soon. Thank you for reaching out."; 

    } else {
        $x['dd_success'] = false;
        $x['dd_feedback'] = "An error occured, please use the call button to call us instead";//$db->feedback; 
    }
    
    echo json_encode($x);