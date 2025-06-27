<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function create(Request $req)
    {
        $form = Validator::make($req->all(), [
            'name' => 'required|string|min:3',
            'email' => 'nullable',
            'password' => 'string|min:6'
        ]);

        if ($form->fails()) {
            return \response()->json([
                'message' => 'Dados inválidos',
                'errors' => $form->errors()
            ], 422);
        }
    }

    public function update() {}
}
