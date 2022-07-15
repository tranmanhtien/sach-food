<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table ='bill';
    protected $fillable=[
        'idUser',
        'name',
        'email',
        'numberPhone',
        'address',
        'price',
        'genaral',
        'created_at',
        'updated_at',
        'idProduct',
        'quantity',
        'price_product'
    ];
    public function scopeSearch($queryData)
    {
        if($searchData = request()->search){
            $queryData = $queryData->where('name','like','%'.$searchData.'%');
        }
        return $queryData;
    }
    public function users()
    {
        return $this->hasOne(Users::class);
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'idProduct','id');
    }
}
