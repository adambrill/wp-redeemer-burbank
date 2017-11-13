<?php

require("inc/sendgrid-php/sendgrid-php.php");

$from = new SendGrid\Email(null, "ryanbrill@gmail.com");
$subject = "Hello World from the SendGrid PHP Library!";
$to = new SendGrid\Email(null, "ryanbrill@gmail.com");
$content = new SendGrid\Content("text/plain", "Hello, Email!");
$mail = new SendGrid\Mail($from, $subject, $to, $content);

$apiKey = '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';
$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);
echo $response->statusCode();
echo $response->headers();
echo $response->body();

?>