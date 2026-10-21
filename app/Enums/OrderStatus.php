<?php

namespace App\Enums;

enum OrderStatus: string
{
    case Pending = 'pending';
    case Dispatched = 'dispatched';
    case Delivered = 'delivered';
    case Cancelled = 'cancelled';
}
