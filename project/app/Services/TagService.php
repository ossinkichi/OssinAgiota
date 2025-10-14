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
        return Tags::all()->map(fn($tag) => TagDto::make($tag->toArray()));
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

    public function delete($id)
    {
        try {

            $tag = Tags::find($id);

            if (!$tag) {
                throw new \Exception("Tag não encontrada", 404);
            }

            $tag->delete();
        } catch (\Throwable $th) {
            throw new \Exception("Erro ao deletar tag: " . $th->getMessage(), 500);
        }
    }
}
