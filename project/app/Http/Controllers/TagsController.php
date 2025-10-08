<?php

namespace App\Http\Controllers;

use App\DTOs\RegisterTagDto;
use App\Exceptions\ControllerExceptions;
use App\Services\TagService;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class TagsController extends Controller
{
    public function getAll(TagService $service)
    {
        try {
            $response = $service->getAll();
            return \response()->json(data: [
                "message" => "Tags encontradas",
                "data" => $response . map(fn($tag) => $tag->jsonSerialize())
            ], status: 200);
        } catch (\Throwable $th) {
            return new ControllerExceptions($th);
        }
    }

    public function create(RegisterTagDto $tag, TagService $service)
    {
        try {
            $service->create($tag);

            return \response()->json(data: [], status: 201);
        } catch (\Throwable $th) {
            return new ControllerExceptions($th);
        }
    }
}
