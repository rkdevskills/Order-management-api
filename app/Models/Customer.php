<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Order;

#[Fillable(['name', 'email', 'phone'])]
class Customer extends Model
{
    use HasFactory;
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
