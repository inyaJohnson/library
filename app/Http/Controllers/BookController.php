<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Model\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function addBook(BookRequest $request){
        $input = $request->validated();
        Book::create($input);
        return response()->json([
            "status" => 200,
            "message" => "Book added successfully"
        ]);
    }

}
