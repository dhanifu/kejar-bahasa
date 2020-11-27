<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classs extends Model
{
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(CategoryClass::class);
    }

    public function module(){
        return $this->hasMany('App\Module', 'class_id');
    }

    public function purchased(){
        return $this->hasMany('App\Purchased', 'class_id');
    }
}
