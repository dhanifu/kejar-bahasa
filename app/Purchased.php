<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchased extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function class(){
        return $this->belongsTo('App\Classs', 'class_id');
    }
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
