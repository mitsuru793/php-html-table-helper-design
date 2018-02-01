<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Filesystem\Filesystem;

$fs = new Filesystem();

$files = scandir(__DIR__, 0);

?>

<ul>
    <? foreach ($files as $file): ?>
        <? if (preg_match("/^(\.\.?|index.php)/", $file)): ?>
            <? continue ?>
        <? endif ?>
        <li>
            <a href="<?= $file ?>"><?= $file ?></a>
        </li>
    <? endforeach ?>
</ul>
