<?php

namespace PhpHtmlTableHelper\Complex;

final class Table
{
    /** @var ?Row */
    private $headerRow;

    /** @var Row[] */
    private $bodyRows;

    public function __construct(?Row $headerRow, array $bodyRows)
    {
        $this->headerRow = $headerRow;
        $this->bodyRows = $bodyRows;
    }

    /**
     * @param array $columns ['property name', ...]
     * @param array $bodyRows
     * @return Table
     */
    public static function fromArrayWithoutHead(array $columns, array $bodyRows): self
    {
        return new self(
            null,
            self::createRowsOfColumns($bodyRows, $columns)
        );
    }

    /**
     * @param array $headerColumns ['key' => 'label', ...]
     * @param array $bodyRows
     * @return Table
     */
    public static function fromHeadAndBody(array $headerColumns, array $bodyRows): self
    {
        return new self(
            Row::fromArrayHead($headerColumns),
            self::createRowsOfColumns($bodyRows, array_keys($headerColumns))
        );
    }

    /**
     * @param array $bodyRows
     * @param array $columns
     * @return Row[]
     */
    private static function createRowsOfColumns(array $bodyRows, array $columns): array
    {
        $rows = [];
        foreach ($bodyRows as $row) {
            $dataList = [];
            foreach ($columns as $column) {
                $dataList[] = new Data(is_object($row) ? $row->{$column} : $row[$column]);
            }
            $rows[] = new Row($dataList);
        }
        return $rows;
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
            <?php if (!is_null($this->headerRow)): ?>
                <thead>
                <tr>
                    <?= $this->headerRow ?>
                </tr>
                </thead>
            <?php endif ?>
            <tbody>
            <?php foreach ($this->bodyRows as $row): ?>
                <?= $row ?>
            <?php endforeach ?>
            </tbody>
        </table>
        <?
    }
}
