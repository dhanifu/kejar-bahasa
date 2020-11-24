<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryClass extends Model
{
    protected $guarded = [];

    public function class(){
        return $this->hasMany(Classs::class);
    }
}
