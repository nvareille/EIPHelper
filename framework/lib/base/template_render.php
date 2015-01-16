<?php
/*
** Micro gestionnaire de template par Izz
*/

function template_render($path, $vars = NULL)
{
	$lines = file( ($GLOBALS['env_template'] ? 'views/' : 'cache/') . $path);
	if ($lines == NULL)
		return ("/ THE FILE $path DOESN'T EXIST \\");
	$rendered = '';

	foreach($lines as $line)
	{
		$newpath = explode('include("', $line);
		if (count($newpath) > 1)
		{
			$newpath = explode('");', $newpath[1]);
			$rendered .= template_render($newpath[0]);
		}
		else
		{
			$rendered .= $line;
		}
	}
	if ($vars != NULL)
	{
		foreach ($vars as $key => $value)
		{
			$rendered = str_replace('$'.$key.';', $value, $rendered);
		}
	}
	foreach ($GLOBALS as $key => $value)
	{
		if (!is_array($value) && !is_object($value))
		{
			$rendered = str_replace('$GLOBALS_'.$key.';', $value, $rendered);
			//var_dump('$GLOBALS_'.$key.';');
		}
	}
	return ($rendered);	
}

function layout_render($layout, $view = NULL, $vars = NULL)
{
	$display = '';
	if ($view)
		$display = template_render($view, $vars);
	$vars['VIEW_CONTENT'] = $display;
	if ($layout)
		$display = template_render($layout, $vars);

	header('Content-Type: text/html');	
	echo $display;
}
?>