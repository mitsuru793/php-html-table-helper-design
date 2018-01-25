<?php

namespace PhpHtmlTableHelper;

use Mihaeu\HtmlFormatter;

final class Util
{
    public static function prettyHtml(string $html): string
    {
        return preg_replace('/^\s*\n/m', '', HtmlFormatter::format($html, '  '));
    }

    public static function puts(string $html): void
    {
        echo $html . PHP_EOL;
    }
}