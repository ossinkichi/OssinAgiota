<?php

namespace App\Services;

use App\DTOs\RegisterTagDto;
use App\DTOs\TagDto;
use App\Models\Tags;

use function Laravel\Prompts\text;

class TagService
{
    public function getAll()
    {
        Tags::all()->map(fn($tag) => TagDto::make($tag->toArray()));
    }

    public function create(RegisterTagDto $tag)
    {
        Tags::create([
            "name" => $tag->name,
            "description" => $tag->description,
            "color-text" => $tag->text,
            "color-background" => $tag->background
        ]);
    }
}
