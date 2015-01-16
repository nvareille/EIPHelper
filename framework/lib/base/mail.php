<?php
function send_mail($sender, $adress, $subject, $message, $arg = NULL)
{
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: $sender" . "\r\n" . "Reply-To: $sender" . "\r\n";
	mail($adress, $subject, template_render($message, $arg), $headers);
}
?>