<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campign extends Model
{
    use HasFactory;
    protected $fillable = [
        'tittle',
        'message',
        'facebook_pixel',
        'even_pixel_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
