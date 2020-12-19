<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];

    public function purchased(){
        return $this->belongsTo('App\Purchased', 'purchased_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
