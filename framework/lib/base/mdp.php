<?php
function mdp($string)
{
	return (hash('whirlpool', $string));
}
?>