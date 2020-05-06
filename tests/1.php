<?php
/**
 * Date: 2020/5/6
 * Time: 11:22 上午
 */

require_once __DIR__.'/../vendor/autoload.php';

use Moon\CWS\Dict;

$dict = new Dict();
$dict->add('张三');
$dict->add('李四');

$dict->export('dict1.json');

$dict2 = new Dict();
$dict2->import('dict1.json');
$dict2->add('王五');
$dict2->export('dict1.1.json');
