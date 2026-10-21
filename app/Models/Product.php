<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\OrderItem;

#[Fillable(['name','sku','description', 'price', 'stock'])]
class Product extends Model
{
    use HasFactory;
    protected function casts(): array
    {
        return [
            'price' => 'decimal:2'
        ];
    }

    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }
}
