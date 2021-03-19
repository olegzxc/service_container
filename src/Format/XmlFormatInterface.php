<?php

namespace App\Format;

interface XmlFormatInterface
{
    public function convert(): string;

    public function setData(array $data): void;
}
