<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $customers = Customer::all();
        $products = Product::all();

        Order::factory()
            ->count(30)
            ->recycle($customers)
            ->state(function () {
                $date = fake()->dateTimeBetween('-6 months', 'now');

                return [
                    'created_at' => $date,
                    'updated_at' => $date,
                ];
            })
            ->create()
            ->each(function (Order $order) use ($products) {
                OrderItem::factory()
                    ->count(fake()->numberBetween(1, 4))
                    ->recycle($products)
                    ->for($order)
                    ->create();

                $total = $order->orderItems()->get()
                    ->sum(fn ($item) => $item->quantity * $item->unit_price);

                $order->total = round($total, 2);
                $order->timestamps = false; // keep updated_at equal to created_at
                $order->save();
            });
    }
}