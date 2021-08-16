<?php
// start session and initialize achieved number of points
session_start();

// Preset path to include folder
$incPaths = $_SERVER['DOCUMENT_ROOT'] . '/php';
$incPaths .= PATH_SEPARATOR;
$incPaths .= $_SERVER['DOCUMENT_ROOT'] . '/projects/quizK/php';
set_include_path($incPaths);

//include 'quizDataK.php';
include 'auth.php';
include 'db-access.php';

define ('TRACE_DB_ACCESS', false);

//$incPaths  = $_SERVER['DOCUMENT_ROOT'] . '/php'; // Site root includes
//$incPaths .= PATH_SEPARATOR; // $incPaths = $incPaths . PATH_SEPARATOR;
//$incPaths .= $_SERVER['DOCUMENT_ROOT'] . '/projects/quizzz-ckue/php';
//set_include_path($incPaths);

?>