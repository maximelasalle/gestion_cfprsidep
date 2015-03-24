<?php
$to = $_POST['vi.ber@outlook.com'];
$from = "test@test.ca"; //the email address you want it from (the address does not have to exist to work)
$headers = "From: $from";
$subject = "Autoreply";
$message = "Replace this with your custom email message";
$mailsent = mail($to, $subject, $message, $headers);
?>