<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        ];

        public function announcement() {
            return $this->hasMany(Announcement::class);
        }
}
