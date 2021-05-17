<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Year_depreciations extends Model
{
    protected $table = 'year_depreciation';


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
