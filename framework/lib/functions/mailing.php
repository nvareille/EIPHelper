<?php
function mailing($adress, $subject, $message, $arg = NULL)
{
	send_mail("nest@dragonstorm.fr", $adress, $subject, $message, $arg);
}
?>