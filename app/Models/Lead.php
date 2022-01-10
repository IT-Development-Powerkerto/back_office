<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $table = 'leads';
    protected $primaryKey = 'id';

    protected $fillable = [
        'advertiser',
        'operator',
        'client_id',
        'product_id',
        'quantity',
        'price',
        'total_price',
        'status_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function operator(){
        return $this->belongsTo(Operator::class);
    }
    public function campaign(){
        return $this->belongsTo(Campaign::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function status(){
        return $this->belongsTo(Status::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }

}
