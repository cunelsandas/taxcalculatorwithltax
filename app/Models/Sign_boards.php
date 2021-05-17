<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sign_boards extends Model
{
    protected $table = 'sign_board';
    protected $primaryKey = 's_id';

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
}
