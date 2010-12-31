<?php

/*

	This file takes all of our css files, compresses and combines them into 1 nice file
	
	This is not my original script, I found and modified it.
	I can't remember where I found it though, it's been a while :/

	Usage:
	
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/inc/css/compress.php" type="text/css" media="screen" />
	
	or Single File
	
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/inc/css/compress.php?single=file" type="text/css" media="screen" />
	
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

/*

	Main CSS

*/

include('your-css.css');

ob_end_flush();
