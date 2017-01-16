<?php

include 'bibleDefs.php';

$outputDir = './output';
$resDir = './skeleton';

function packCssJs($html)
{
	global $resDir;

	preg_match_all('/<link rel="stylesheet" href="([^"]+)">/i', $html, $stylesheets);
	foreach ($stylesheets[0] as $i=>$invocation)
	{
		$html = str_replace($invocation, '<style type="text/css">' . file_get_contents($resDir . '/' . $stylesheets[1][$i]) . "</style>", $html);
	}

	preg_match_all('/<script src="([^"]+)"><\/script>/i', $html, $stylesheets);
	foreach ($stylesheets[0] as $i=>$invocation)
	{
		$html = str_replace($invocation, '<script>' . file_get_contents($resDir . '/' . $stylesheets[1][$i]) . '</script>', $html);
	}

	return $html;
}

function generateBible($bibleCode, $bibleDef)
{
	ob_start();
	include 'index.tpl.php';
	$html = ob_get_contents();
	ob_clean();

	$html = packCssJs($html);

	return $html;
}

if (empty($_GET['code']))
{
	foreach ($bibleDefs as $bibleCode=>$bibleDef)
	{
		$html = generateBible($bibleCode, $bibleDef);
		if (file_put_contents($outputDir . '/' . $bibleDef['outFile'], $html))
		{
			echo "[OK] Wrote " . $bibleDef['outFile'] . "\n";
		}
	}
}
else
{
	echo generateBible($_GET['code'], $bibleDefs[$_GET['code']]);
	die;
}