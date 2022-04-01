<?php

namespace App\Models;

use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";

    protected $fillable = [
        'user_id',
        'order_id',
        'Firma',
        'Vorname',
        'Nachname',
        'Email',
        'Straße',
        'Hausnummer',
        'Postleitzahl',
        'Ort',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}
