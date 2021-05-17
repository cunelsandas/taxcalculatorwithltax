<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Landuse_types extends Model
{
    protected $table = 'lu_type';


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
