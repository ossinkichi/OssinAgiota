<?php

namespace App\Services;

use App\DTOs\RegisterTagDto;
use App\DTOs\TagDto;
use App\Models\Tags;

class TagService
{
    public function getAll()
    {
        Tags::all()->map(fn($tag) => TagDto::make($tag->toArray()));
    }

    public function create(RegisterTagDto $tag) {}
}
