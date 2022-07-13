<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table ='orders';
    protected $fillable=[
        'user_id',
        'name',
        'email',
        'address',
        'number_phone',
        'total',
        'status',
        'payoff_method',
        'order_code',
        'created_at',
        'updated_at'
    ];
}
