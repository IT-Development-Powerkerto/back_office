<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'campaign_id',
        'product_id',
        'name',
        'whatsapp',
        'quantity',
        'total_price',
        'status_id',
        ];

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function campaign(){
        return $this->belongsTo(Campaign::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
