<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Model\Author;

class AuthorController extends Controller
{
    /**
     * @param AuthorRequest $request
     */
    public function addAuthor(AuthorRequest $request)
    {
        $input = $request->validated();
        Author::create($input);
        return response()->json([
            "status" => 200,
            "message" => "Author added successfully"
        ]);
    }
}
