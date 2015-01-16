<?php
function rec_erase()
{
	$tab = scandir('.');
	foreach($tab as $value)
	{
		if (!is_dir($value))
		   unlink($value);
		else if (is_dir($value) && $value != '.' && $value != '..')
		{
		   chdir($value);
		   rec_erase();
		   rmdir($value);
		}
	}
	chdir('..');
}

function erase_cache()
{
	if (is_dir('cache'))
	{
		chdir('cache');
		rec_erase();
		rmdir('cache');
	}
	mkdir('cache');
	return (0);
}

function gen_file($value, $pwd, $pwd1)
{
	$content = '';
	$file = file($pwd . '/' . $value);
	foreach($file as $line)	
	{
		$content .= $line;
	}
	$content1 = str_replace('  ', ' ', $content);
	$content1 = str_replace("\t", '', $content1);
	$content1 = str_replace("\n", "", $content1); 
	$content1 = str_replace("\r\n", "", $content1); 
	$content1 = str_replace("\r", "", $content1); 
	while ($content != $content1)
	{
		$content = str_replace('  ', ' ', $content);
		$content = str_replace("\t", '', $content);
		$content = str_replace("\n", "", $content); 
		$content = str_replace("\r\n", "", $content); 
		$content = str_replace("\r", "", $content);
		$content1 = str_replace('  ', ' ', $content1);
		$content1 = str_replace("\t", '', $content1);
		$content1 = str_replace("\n", "", $content1); 
		$content1 = str_replace("\r\n", "", $content1); 
		$content1 = str_replace("\r", "", $content1); 
	}
	$content = str_replace("include(\"", "\ninclude(\"", $content);
	$content = str_replace("\");", "\");\n", $content);
	$fp = fopen($pwd1 . '/' . $value, 'w');
	fputs($fp, $content);
	fclose($fp);
}

function gen_js($value, $pwd, $pwd1)
{
	$content = '';
	$file = file($pwd . '/' . $value);
	foreach($file as $line)	
	{
		$content .= $line;
	}
	$content1 = str_replace('  ', ' ', $content);
	$content1 = str_replace("\t", '', $content1);
	$content1 = str_replace("\n", "", $content1); 
	$content1 = str_replace("\r\n", "", $content1); 
	$content1 = str_replace("\r", "", $content1); 
	while ($content != $content1)
	{
		$content = str_replace('  ', ' ', $content);
		$content = str_replace("\t", '', $content);
		$content = str_replace("\n", "", $content); 
		$content = str_replace("\r\n", "", $content); 
		$content = str_replace("\r", "", $content);
		$content1 = str_replace('  ', ' ', $content1);
		$content1 = str_replace("\t", '', $content1);
		$content1 = str_replace("\n", "", $content1); 
		$content1 = str_replace("\r\n", "", $content1); 
		$content1 = str_replace("\r", "", $content1); 
	}
	$content = str_replace("else", "else ", $content);
	$fp = fopen($pwd1 . '/' . $value, 'w');
	fputs($fp, $content);
	fclose($fp);
}

function gen_cache($value, $bool)
{
	$pwd = getcwd();
	$pwd2 = str_replace('views', 'cache', $pwd);
	var_dump($pwd2);
	if (!is_dir($pwd2))
	   mkdir($pwd2);
	if ($bool)
	{
		gen_file($value, $pwd, $pwd2);		
	}
}

function gen_cache_js($value, $bool)
{
	$pwd = getcwd();
	$pwd2 = str_replace('js', 'cache', $pwd);
	var_dump($pwd2);
	if (!is_dir($pwd2))
	   mkdir($pwd2);
	if ($bool)
	{
		gen_js($value, $pwd, $pwd2);		
	}
}

function create_cache()
{
	$tab = scandir('.');
	foreach($tab as $value)
	{
		if (!is_dir($value))
		   gen_cache($value, 1);
		else if (is_dir($value) && $value != '.' && $value != '..')
		{
		   chdir($value);
		   gen_cache($value, 0);
		   create_cache();
		}
	}
	chdir('..');
}

function create_cache_js()
{
	$tab = scandir('.');
	foreach($tab as $value)
	{
		if (!is_dir($value))
		   gen_cache_js($value, 1);
		else if (is_dir($value) && $value != '.' && $value != '..')
		{
		   chdir($value);
		   gen_cache_js($value, 0);
		   create_cache_js();
		}
	}
	chdir('..');
}

chdir('../');
erase_cache();
chdir('views');
create_cache();
chdir('../assets/js');
create_cache_js();
//var_dump(getcwd());
?>