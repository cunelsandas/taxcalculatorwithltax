<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ownertype extends Model
{
    protected $table = 'owner_types';
    public $timestamps = false;
    /**
     * Get the notes for the status.
     */
    public function notes()
    {
        return $this->hasMany('App\Models\Notes');
    }
}
