<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Omset extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'omset',
        'omset_point',
        ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
