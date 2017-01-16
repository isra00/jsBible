<?php

$flat = include 'sw.php';

$struct = [];

foreach ($flat as $verse)
{
	list($book, $chapter, $verse, $text) = $verse;

	if (!isset($struct[$book])) $struct[$book] = [];
	if (!isset($struct[$book][$chapter])) $struct[$book][$chapter] = [];

	$struct[$book][$chapter][$verse] = $text;
}

file_put_contents('bible-suv.js', 'var bibleText = ' . json_encode($struct) . ';');