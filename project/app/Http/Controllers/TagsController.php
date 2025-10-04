<?php

namespace App\Http\Controllers;

use App\DTOs\RegisterTagDto;
use App\Services\TagService;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function getAll(TagService $service) {}

    public function create(RegisterTagDto $reg, TagService $service) {}
}
