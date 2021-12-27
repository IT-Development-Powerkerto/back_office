<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CRM extends Model
{
    use HasFactory;
    protected $table = 'crms';
    protected $primaryKey = 'id';

    protected $fillable = [
        'advertiser',
        'operator',
        'product',
        'quantity',
        'price',
        'total_price',
        'status_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function campign(){
        return $this->hasMany(Campign::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
