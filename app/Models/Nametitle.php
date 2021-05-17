<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nametitle extends Model
{
    protected $table = 'name_titles';
    public $timestamps = false;
    /**
     * Get the notes for the status.
     */
    public function notes()
    {
        return $this->hasMany('App\Models\Notes');
    }
}
