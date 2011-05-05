<?php

/*

	This file takes all of our css files, compresses and combines them into 1 nice file
	
	This is not my original script, I found and modified it.
	I can't remember where I found it though, it's been a while :/
	
	Usage:
	
	    <link rel="stylesheet" href="/css/compressor.php?css=one.css,two.css" type="text/css" media="screen" />
	    
	In compressor.php
	
	Add all your css files after ?css= seperated by comma, ex. compress.php?css=one.css,two.css,three.css ...
	relative to your compress.php
	
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

if(isset($_GET['css']))
{
	/* remove %, /, \, ' and " from query string */
	$_GET['css'] = preg_replace('/[%\/\\\'\"]/', '', $_GET['css']);
	
	foreach(explode(',', $_GET['css']) as $css)
	{
		/* file extension must be css */
		if(file_exists($css) AND pathinfo($css, PATHINFO_EXTENSION) == 'css')
		{
			ob_start("compress");
			include($css);
			ob_end_flush();
		}
		else
		{
			echo "File: {$css} does not exist.";
		}
	}
}