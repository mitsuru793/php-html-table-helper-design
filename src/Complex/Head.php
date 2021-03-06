<?php
declare(strict_types=1);

namespace PhpHtmlTableHelper\Complex;

use PhpHtmlTableHelper\Attributes;

final class Head implements Cell
{
    /**
     * @var string
     */
    private $content;

    /**
     * @var Attributes
     */
    private $attributes;

    public function __construct(string $content, array $attributes = [])
    {
        $this->content = $content;
        $this->attributes = new Attributes($attributes);
    }

    public static function fromArray(array $contents, $attributes = []): array
    {
        $heads = [];
        foreach ($contents as $content) {
            $heads[] = new self($content, $attributes);
        }
        return $heads;
    }

    public function __toString(): string
    {
        ob_start();
        ?>
        <th <?= $this->attributes ?>>
            <?= $this->content ?>
        </th>
        <?
        return ob_get_clean();
    }
}
