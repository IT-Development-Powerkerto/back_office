<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campign extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tittle',
        'message',
        'product_id',
        'facebook_pixel',
        'even_pixel_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function event_pixel(){
        return $this->belongsTo(EventPixel::class);
    }

    public function operator(){
        return $this->hasMany(Operator::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function client(){
        return $this->hasMany(Client::class);
    }
}
