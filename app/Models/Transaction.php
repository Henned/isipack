<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
