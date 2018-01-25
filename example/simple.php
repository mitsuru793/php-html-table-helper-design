<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PhpHtmlTableHelper\Simple\Table;
use PhpHtmlTableHelper\Util;

$table = Table::fromArray([
    ['id', 'name', 'sex', 'age'],
    ['1', 'mike', 'man', 25],
    ['2', 'jane', 'woman', 19],
]);

echo '<h1>Table::fromArray</h1>';
echo Util::prettyHtml($table);

$table = Table::fromArrayWithoutHead([
    ['1', 'mike', 'man', 25],
    ['2', 'jane', 'woman', 19],
]);
echo '<h1>Table::fromArrayWithoutHead</h1>';
echo Util::prettyHtml($table) . PHP_EOL;

$table = Table::fromHeadAndBody(
    ['id', 'name', 'sex', 'age'],
    [
        ['1', 'mike', 'man', 25],
        ['2', 'jane', 'woman', 19],
    ]
);
echo '<h1>Table::fromHeadAndBody</h1>';
echo Util::prettyHtml($table) . PHP_EOL;
