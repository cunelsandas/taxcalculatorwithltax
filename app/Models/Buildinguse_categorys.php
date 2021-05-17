<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buildinguse_categorys extends Model
{
    protected $table = 'bu_cate';


    /**
     * Get the User that owns the Notes.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'users_id')->withTrashed();
    }
    /**
     * Get the Status that owns the Notes.
     */



}
