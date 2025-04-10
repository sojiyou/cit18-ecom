<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = 'card';
    protected $fillable = [
        'email', 
        'card_number', 
        'expiry', 
        'cvc', 
        'card_name',
        'country', 
        'address', 
        'city', 
        'zip'
    ];
}
