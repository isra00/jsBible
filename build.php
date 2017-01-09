<?php

/**
 * Inline CSS and JS in the HTML file, in order to have it all in one single file
 */

$sourceFile = 'index.html'; //Must be in the current directory (./)
$destFile 	= 'JerusalemBible.html';

$html = file_get_contents($sourceFile);

preg_match_all('/<link rel="stylesheet" href="([^"]+)">/i', $html, $stylesheets);
foreach ($stylesheets[0] as $i=>$invocation)
{
	$html = str_replace($invocation, '<style type="text/css">' . file_get_contents($stylesheets[1][$i]) . "</style>", $html);
}

preg_match_all('/<script src="([^"]+)"><\/script>/i', $html, $stylesheets);
foreach ($stylesheets[0] as $i=>$invocation)
{
	$html = str_replace($invocation, '<script>' . file_get_contents($stylesheets[1][$i]) . '</script>', $html);
}

if (file_put_contents($destFile, $html))
{
	echo "Compiled in $destFile\nEnjoy it!\n";
}