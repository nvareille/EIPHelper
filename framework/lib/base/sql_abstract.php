<?php
function last()
{
	return $GLOBALS['bdd']->lastInsertId();
}

function sql_abstract($string, $array = NULL)
{
	$req = $GLOBALS['bdd']->prepare($string);
	$req->execute($array);

	$rep = $req->fetchAll(PDO::FETCH_CLASS);

	/*if ($rep)
	{
		if (!isset($rep['1']))
		$rep = $rep[0];
	}*/

	return ($rep);
}
?>