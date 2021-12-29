<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'message',
        'product_id',
        'facebook_pixel',
        'event_pixel_id',
        'event_wa',
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

    public function event_wa(){
        return $this->belongsTo(EventWa::class);
    }
}
