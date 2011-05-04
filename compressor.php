<?php

/*

	This file takes all of our css files, compresses and combines them into 1 nice file
	
	This is not my original script, I found and modified it.
	I can't remember where I found it though, it's been a while :/
	
	Usage:
	
	    <link rel="stylesheet" href="/css/compressor.php?css=one.css,two.css" type="text/css" media="screen" />
	    
	In compressor.php
	
	Add all your css files you want to load after the ?css= as: compressor.php?css=one.css,two.css,thee.css ...
	relative to your compressor.php file
	
	Available on GIT: http://github.com/envex/CSS-Compressor

*/

header('Content-type: text/css');

function compress($buffer) {
	/* remove comments */
	$buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
	/* remove tabs, spaces, newlines, etc. */
	$buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
	return $buffer;
}

ob_start("compress");

foreach(explode(',', $_GET['css']) as $css)
{
	include($css);
}

ob_end_flush();
