<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacterer extends Model
{
    protected $fillable = [
        'name', 'phone'
    ];

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
