<?php
	if( preg_match("(\/foto)", $_SERVER['REQUEST_URI']) ) { include "single-foto.php"; }
	if( preg_match("(\/goryashhie-tury\/)", $_SERVER['REQUEST_URI']) ) { include "single-tury.php"; }
	else { include "single-default.php"; }
?>