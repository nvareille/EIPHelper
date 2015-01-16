<?php
include('lib/include.php');

$folder = post('request');
break_post('request');

$post = get_post();

foreach ($post as $key => $value)
{
	$folder = 'scripts/' . $folder . '/' . $key . '.php';
	break;
}

if (file_exists($folder))
{
	include ($folder);
}
else
{
	echo 'Missing file: ' . $folder;
}
?>