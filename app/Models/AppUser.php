<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppUser extends Model
{
    //
    protected $table='app_users';

    protected $guarded = [];

    public $timestamps = false;
}
