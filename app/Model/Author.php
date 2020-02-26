<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //

    protected $fillable = ["first_name", "last_name", "email"];

    public function books(){
        return $this->hasMany(Book::class);
    }
}
