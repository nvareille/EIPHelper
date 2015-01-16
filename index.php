<?php
include("framework/include.php");

$not_taken = sql_abstract("SELECT * FROM student WHERE taken = 0");

$tab = "<table id=\"studentTable\">";
$tab .= "<thead><tr><th>Login</th><th>GPA</th></tr></thead>";
$tab .= "<tbody>";

foreach ($not_taken as $key => $value)
{
	$tab .= "<tr><td><a href=\"https://intra.epitech.eu/user/" . $value->login . "\">";
	$tab .= $value->login;
	$tab .= "</a></td><td>";
	$tab .= $value->GPA . "</td></tr>";
}

$tab .= "</tbody></table>";

echo layout_render("index.html", null, array('tab' => $tab));
?>