<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppUser extends Model
{
    /**
     * @var string
     */
    protected $table='app_users';
    /**
     * @var array
     */
    protected $guarded = [];
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * user
     * @Author: Yume
     * @Date:   ${DATE} ${TIME}
     * @Description:
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
}
