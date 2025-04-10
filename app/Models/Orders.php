<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Orders extends Model // Keep it plural if you prefer
{
    use HasFactory;
    protected $table = 'orders';

}
