<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campign extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'operator',
        'message',
        'facebook_pixel',
        'even_pixel_id',
        ];
    
    public $table = "campigns";

    public function campign(){
        return $this->hasMany(Campign::class);
    }
}
