<?php

namespace App\Controller;

use App\Service\XmlSerializer;

class PostController {
    public function __construct(XmlSerializer $serializer)
    {
        $this->serializer = $serializer;
    }

    public function index()
    {
        return $this->serializer->serialize([
            'Action' => 'Post',
            'Time' => time()
        ]);
    }
}
