<?php
function post($key)
{
	if (isset($_POST[$key]))
		return ($_POST[$key]);
	else
		return (NULL);
}

function break_post($key)
{
	if (isset($_POST[$key]))
		unset($_POST[$key]);
}

function get_post()
{
	return ($_POST);
}

function get($key)
{
	if (isset($_GET[$key]))
		return ($_GET[$key]);
	else
		return (NULL);
}

function get_get()
{
	return ($_GET);
}
?>