<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventPixel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'even_pixel',
        ];

    public function campign(){
        return $this->hasMany(Campign::class);
    }
}
