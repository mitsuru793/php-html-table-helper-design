<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use PhpHtmlTableHelper\Simple\Table;
use PhpHtmlTableHelper\Util;

echo '<h1>simple.php</h1>';

$table = Table::fromArray([
    ['id', 'name', 'sex', 'age'],
    ['1', 'mike', 'man', 25],
    ['2', 'jane', 'woman', 19],
]);

echo '<h2>Table::fromArray</h2>';
echo Util::prettyHtml($table);

$table = Table::fromArrayWithoutHead([
    ['1', 'mike', 'man', 25],
    ['2', 'jane', 'woman', 19],
]);
echo '<h2>Table::fromArrayWithoutHead</h2>';
echo Util::prettyHtml($table) . PHP_EOL;

$table = Table::fromHeadAndBody(
    ['id', 'name', 'sex', 'age'],
    [
        ['1', 'mike', 'man', 25],
        ['2', 'jane', 'woman', 19],
    ]
);
echo '<h2>Table::fromHeadAndBody</h2>';
echo Util::prettyHtml($table) . PHP_EOL;
