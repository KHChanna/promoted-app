<?php

namespace App\Frontend\Models;

use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{
    public $fillable = [
        'user_id',
        'cat_id',
        'advertise_name',
        'quantity',
        'unit_price',
        'discount',
        'advertise_address',
        'advertise_avaliable',
        'advertise_description',
        'advertise_status',
        'image'
    ];

    public function user(){
        return $this->belongTo('Frontend\Models\User');
    }
}
