<?php

namespace App\Http\Controllers;

use App\DTOs\RegisterTagDto;
use App\Exceptions\ControllerExceptions;
use App\Http\Requests\RegisterTagRequest;
use App\Services\TagService;

class TagsController extends Controller
{

    public function getAll(TagService $service)
    {
        try {
            $response = $service->getAll();
            return \response()->json(data: [
                "message" => "Tags encontradas",
                "data" => $response->map(fn($tag) => $tag->jsonSerialize())
            ], status: 200);
        } catch (\Throwable $th) {
            return ControllerExceptions::fromMessage($th);
        }
    }

    public function create(RegisterTagRequest $tag, TagService $service)
    {
        try {
            $service->create($tag->toDTO());

            return \response()->json(data: [], status: 201);
        } catch (\Throwable $th) {
            return ControllerExceptions::fromMessage($th);
        }
    }

    public function delete($tag, TagService $service)
    {
        try {
            $service->delete($tag);

            return \response()->json(data: [], status: 201);
        } catch (\Throwable $th) {
            return ControllerExceptions::fromMessage($th);
        }
    }
}
