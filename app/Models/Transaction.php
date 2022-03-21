<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = "transactions";

    protected $fillable = [
        'order_id',
        'status',
        'reference_number'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
