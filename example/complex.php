<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Mihaeu\HtmlFormatter;
use PhpHtmlTableHelper\Complex\Table;

echo '<h1>complex.php</h1>';

$table = Table::fromHeadAndBody(
    ['id' => 'id', 'name' => '名前', 'sex' => '性別', 'age' => '年齢'],
    [
        (object)['id' => '1', 'name' => 'mike', 'sex' => 'man', 'age' => 25],
        (object)['id' => '2', 'name' => 'jane', 'sex' => 'woman', 'age' => 19],
    ]
);
echo '<h2>Table::fromHeadAndBody</h2>';
echo HtmlFormatter::format($table);

$table = Table::fromArrayWithoutHead(
    ['id', 'name', 'sex', 'age'],
    [
        (object)['id' => '1', 'name' => 'mike', 'sex' => 'man', 'age' => 25],
        ['id' => '2', 'name' => 'jane', 'sex' => 'woman', 'age' => 19],
    ]
);
echo '<h2>Table::fromArrayWithoutHead</h2>';
echo HtmlFormatter::format($table);
