<?php

namespace PhpHtmlTableHelper\Object;

final class Table
{
    /** @var array */
    private $headerRow;

    /** @var array */
    private $bodyRows;

    /** @var array */
    private $columns;

    public function __construct(array $headerRow, array $bodyRows, array $columns)
    {
        $this->headerRow = $headerRow;
        $this->bodyRows = $bodyRows;
        $this->columns = $columns;
    }

    /**
     * @param array $columns ['property name', ...]
     * @param array $bodyRows
     * @return Table
     */
    public static function fromArrayWithoutHead(array $columns, array $bodyRows): self
    {
        return new self([], $bodyRows, $columns);
    }

    /**
     * @param array $headerColumns ['key' => 'label', ...]
     * @param array $bodyRows
     * @return Table
     */
    public static function fromHeadAndBody(array $headerColumns, array $bodyRows): self
    {
        return new self(array_values($headerColumns), $bodyRows, array_keys($headerColumns));
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
        <table border="1">
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
            <?php foreach ($this->bodyRows as $row): ?>
                <tr>
                    <?php if (is_object($row)): ?>
                        <?php foreach ($this->columns as $column): ?>
                            <td><?= $row->{$column} ?></td>
                        <?php endforeach ?>
                    <?php else: ?>
                        <?php foreach ($this->columns as $column): ?>
                            <td><?= $row[$column] ?></td>
                        <?php endforeach ?>
                    <?php endif ?>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
        <?
    }
}
