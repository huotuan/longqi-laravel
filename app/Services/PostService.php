<?php

namespace App\Services;

class PostService
{
    public mixed $id;
    public function __construct($id = 2)
    {
        $this->id = $id;
    }
    public function find()
    {
        dump($this->id);
    }
}
