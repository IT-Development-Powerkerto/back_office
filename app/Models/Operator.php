<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id',
        'user_id'];

        public function campign() {
            return $this->hasMany(Campign::class);
        }

        public function user() {
            return $this->belongsTo(User::class);
        }
}
