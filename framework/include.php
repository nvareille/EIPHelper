<?php
ini_set ("display_errors", "On");

if (!isset($path))
{
	$path = './';
}

// Config
include('config/config.php');

chdir($path . 'framework/lib');

// Bdd
include('bdd.php');

// Sessions
include('base/session.php');

// Abstracteur SQL
include('base/sql_abstract.php');

// Moteur de template
include('base/template_render.php');

// Fonctions
include('base/redirect.php');
include('base/mdp.php');
include('base/post.php');
include('base/mail.php');

// Fonctions du site
include('functions/mailing.php');

chdir('../');

// Events
include('lib/events.php');
?>