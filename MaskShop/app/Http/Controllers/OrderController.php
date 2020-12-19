<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function getAll()
    {
        try {
            $orders = Order::with(['products','user'])->get();
            return response($orders);
        } catch (\Exception $e) {
           return response($e,500);
        }
    }

    public function create()
    {
        //
    }

}
