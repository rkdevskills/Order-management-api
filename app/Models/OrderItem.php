<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Order;
use App\Models\Product;

#[Fillable(['order_id', 'product_id', 'quantity'])]
class OrderItem extends Model
{
    use HasFactory;
    protected function casts(): array
    {
        return [
            'unit_price' => 'decimal:2'
        ];
    }

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
