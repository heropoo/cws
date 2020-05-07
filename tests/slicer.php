<?php
/**
 * Date: 2020/5/7
 * Time: 3:44 下午
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Moon\CWS\Slicer;
use Moon\CWS\Dict;

$slicer = new Slicer();

$dict = new Dict(__DIR__ . '/dict1.1.json');
$dict2 = new Dict(__DIR__ . '/dict2.json');

//var_dump($dict);

$slicer->useDict($dict);
$slicer->useDict($dict2);

$res = $slicer->getWords('时光漫漫，何妨扬眉淡笑，心境从容？');
var_dump($res);