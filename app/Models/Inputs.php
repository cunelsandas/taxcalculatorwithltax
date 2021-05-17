<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inputs extends Model
{
    protected $table = 'inputs';
    protected $primaryKey = 'id';

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
    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id');
    }

    public function owner_types()
    {
        return $this->belongsTo('App\Models\Ownertype', 'owner_types');
    }

    public function inputs(){
        return $this->hasMany(Inputs::class,'id');
    }

    public function lands()
    {
        return $this->hasMany(Lands::class);
    }



}
