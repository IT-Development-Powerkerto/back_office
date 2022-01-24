<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        ];

    public function user(){
        return $this->hasMany(User::class);
    }
    public function budgeting(){
        return $this->hasMany(Budgeting::class);
    }
}
