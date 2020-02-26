<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ["title", "pages", "author_id"];

    public function author(){
        return $this->belongsTo(Author::class);
    }

}

