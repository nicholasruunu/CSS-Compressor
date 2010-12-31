This file takes all of our css files, compresses and combines them into 1 nice file

This is not my original script, I found and modified it.
I can't remember where I found it though, it's been a while :/

Usage (in template file):

    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/inc/css/compress.php" type="text/css" media="screen" />
    
In compressor.php

Add all your css files as separate includes (relative to current folder)