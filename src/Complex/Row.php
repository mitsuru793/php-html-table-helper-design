<?php

namespace PhpHtmlTableHelper\Complex;

use PhpHtmlTableHelper\Attributes;

final class Row
{
    /** @var Cell[] */
    private $cells;

    /** @var Attributes */
    private $attributes;

    public function __construct(array $cells, array $attributes = [])
    {
        $this->cells = $cells;
        $this->attributes = new Attributes($attributes);
    }

    public static function fromArrayHead(array $heads, array $attributes = []): self
    {
        return new self(Head::fromArray($heads), $attributes);
    }

    public static function fromArrayData(array $dataList, array $attributes = []): self
    {
        return new self(Data::fromArray($dataList), $attributes);
    }

    public function __toString(): string
    {
        ob_start();
        ?>
        <tr <?= $this->attributes ?>>
            <?php foreach ($this->cells as $cell): ?>
                <?= $cell ?>
            <?php endforeach ?>
        </tr>
        <?
        return ob_get_clean();
    }
}
