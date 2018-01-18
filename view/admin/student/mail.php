<?php

echo 'This is mail page';

$to = "fahim52510@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: webmaster@example.com" . "\r\n" .
    "CC: somebodyelse@example.com";

mail($to,$subject,$txt,$headers);