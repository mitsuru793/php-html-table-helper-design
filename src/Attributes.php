<?php

namespace PhpHtmlTableHelper;

final class Attributes
{
    /**
     * @var array
     */
    private $attributes;

    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
    }

    public function __toString(): string
    {
        $combinedAttr = '';
        foreach($this->attributes as $name => $value) {
            $combinedAttr .= "$name=\"$value\" ";
        }
        return trim($combinedAttr);
    }
}

