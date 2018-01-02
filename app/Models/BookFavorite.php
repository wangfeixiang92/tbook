<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookFavorite extends Model
{
    //
    protected $table='book_favorites';

    protected $guarded = [];

    public $timestamps = false;
}
