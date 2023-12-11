<?php

namespace App\DTO;

class NewsDataTransferObject
{
    public string $title;
    public string $text;
    public string $author;

    public function __construct(string $title, string $text, string $author)
    {
        $this->title = $title;
        $this->text = $text;
        $this->author = $author;
    }
}
