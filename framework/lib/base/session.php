<?php
session_start();

function get_session($key)
{
	if (isset($_SESSION[$key]))
		return ($_SESSION[$key]);
	else
		return (NULL);
}

function set_session($key, $value)
{
	$_SESSION[$key] = $value;
}
?>