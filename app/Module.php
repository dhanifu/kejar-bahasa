<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $guarded = [];

    public function class(){
        return $this->belongsTo('App\Classs', 'class_id');
    }
}
