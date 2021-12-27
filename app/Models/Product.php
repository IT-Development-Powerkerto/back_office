<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'lead',
        'discount',
        'image',
        'product_link',
    ];

    public function campign(){
        return $this->hasMany(Campign::class);
    }
    public function client(){
        return $this->hasMany(Client::class);
    }
    public function crm(){
        return $this->hasMany(CRM::class);
    }
}
