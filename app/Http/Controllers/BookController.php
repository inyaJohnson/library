<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Requests\DeleteBookRequest;
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

    public function deleteBook(DeleteBookRequest $request){
        $input = $request->validated();
        $book = Book::findorFail($input['id']);

        if($book->delete()){
            return response()->json([
                "status" => 200,
                "message" => "Book Deleted"
            ]);
        }else{
            return response()->json([
                "status" => 400,
                "message" => "Unable to delete book"
            ]);
        }

    }

}
