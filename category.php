<?php

	if ( preg_match("(\/foto)", $_SERVER['REQUEST_URI']) ) {
        include "category-foto.php";
    }

	if ( preg_match("(\/goryashhie-tury)", $_SERVER['REQUEST_URI']) ) {
        include "category-tury.php";
    } else {
        include "category-default.php";
    }
