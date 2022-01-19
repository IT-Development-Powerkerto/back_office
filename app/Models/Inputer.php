<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inputer extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin_id',
        'lead_id',
        'adv_name',
        'operator_name',
        'customer_name',
        'customer_number',
        'customer_address',
        'product_name',
        'product_price',
        'quantity',
        'total_price',
        'warehouse',
        'courier',
        'payment_method',
        'total_payment',
        'payment_proof'
        ];
    public function lead() {
        return $this->belongsTo(Lead::class);
    }
}