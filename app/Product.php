<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'manufacterer_id', 'name', 'type', 'purchase_price', 'selling_price'
    ];

    public function manufacterer()
    {
        return $this->belongsTo('App\Manufacterer');
    }

    public function locations()
    {
        return $this->belongsToMany('App\Location', 'inventory')->withPivot('count', 'min_count');
    }

    public function inventory() {
        return $this->belongsTo('App\Inventory');
    }
}
