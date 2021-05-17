<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lands extends Model
{
    protected $table = 'lands';
    protected $primaryKey = 'id';



    /**
     * Get the User that owns the Notes.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'users_id')->withTrashed();
    }

    public function inputs(){
        return $this->hasMany(Inputs::class,'owner_id');
    }

    public function lands()
    {
        return $this->hasMany(Lands::class);
    }
    /**
     * Get the Status that owns the Notes.
     */


//    public function inputs()
//    {
//        return $this->belongsTo(Inputs::class);
//    }

}
