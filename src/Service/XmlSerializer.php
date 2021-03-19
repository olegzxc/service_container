<?php

namespace App\Service;

use App\Format\XmlFormatInterface;

class XmlSerializer {
    private $format;

    public function __construct(XmlFormatInterface $format) {
        $this->format = $format;
    }

    public function serialize($data): string {
        $this->format->setData($data);

        return $this->format->convert();
    }
}
