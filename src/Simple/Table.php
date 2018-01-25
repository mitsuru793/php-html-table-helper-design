<?php

namespace PhpHtmlTableHelper\Simple;

final class Table
{
    /** @var array */
    private $headerRow;

    /** @var array */
    private $bodyRows;

    public function __construct(array $headerRow, array $bodyRows)
    {
        $this->headerRow = $headerRow;
        $this->bodyRows = $bodyRows;
    }

    public static function fromArray(array $rows): self
    {
        return new self($rows[0], array_slice($rows, 1));
    }

    public static function fromArrayWithoutHead(array $bodyRows): self
    {
        return new self([], $bodyRows);
    }

    public static function fromHeadAndBody(array $headRow, array $bodyRows): self
    {
        return new self($headRow, $bodyRows);
    }

    public function __toString(): string
    {
        ob_start();
        $this->render();
        return ob_get_clean();
    }

    private function render(): void
    {
        ?>
        <table>
            <?php if (!empty($this->headerRow)): ?>
                <thead>
                <tr>
                    <?php foreach ($this->headerRow as $data): ?>
                        <th><?= $data ?></th>
                    <?php endforeach ?>
                </tr>
                </thead>
            <?php endif ?>
            <tbody>
            <?php foreach ($this->bodyRows as $rows): ?>
                <tr>
                    <?php foreach ($rows as $data): ?>
                        <td><?= $data ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
        <?
    }
}
