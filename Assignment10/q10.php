<?php
$to = "rajaramlalitha73@gmail.com";
$subject = "Test Email with Attachment";
$message = "This is a test email with an attachment sent from PHP.";
$from = "gokulkrishna.a2023@vitstudent.ac.in";
$file = "/opt/lampp/htdocs/23MIS1096_week_10/sometext.txt"; 

$separator = md5(time());
$eol = PHP_EOL;

$headers = "From: " . $from . $eol;
$headers .= "MIME-Version: 1.0" . $eol;
$headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;

$body = "--" . $separator . $eol;
$body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
$body .= "Content-Transfer-Encoding: 7bit" . $eol;
$body .= $message . $eol;

$body .= "--" . $separator . $eol;
$body .= "Content-Type: application/octet-stream; name=\"" . basename($file) . "\"" . $eol;
$body .= "Content-Transfer-Encoding: base64" . $eol;
$body .= "Content-Disposition: attachment; filename=\"" . basename($file) . "\"" . $eol;
$body .= $eol;
$body .= chunk_split(base64_encode(file_get_contents($file))) . $eol;
$body .= "--" . $separator . "--";

if (mail($to, $subject, $body, $headers)) {
    echo "Mail sent successfully.";
} else {
    echo "Mail failed.";
}
?>
