<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Customer;
use App\Models\OrderItem;
use App\Enums\OrderStatus;

#[Fillable(['customer_id', 'status'])]
class Order extends Model
{
    use HasFactory;
    protected function casts(): array
    {
        return [
            'total' => 'decimal:2',
            'status' => OrderStatus::class
        ];
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }
}
