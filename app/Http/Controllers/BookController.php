<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Requests\DeleteBookRequest;
use App\Http\Requests\GetBookRequest;
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

    public function getBook(GetBookRequest $request){
        $input = $request->validated();
        $book = Book::findorFail($input['id']);

        if($book){
            return response()->json([
                "status" => 200,
                "message" => "Book Found",
                "data" => [
                    "id" => $book->id,
                    "title" => $book->title,
                    "pages" => $book->pages,
                    "author" => $book->author
                ]

            ]);
        }else{
            return response()->json([
                "status" => 400,
                "message" => "Book does not exist"
            ]);
        }
    }


}
