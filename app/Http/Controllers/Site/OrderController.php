<?php

namespace App\Http\Controllers\Site;

use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Http\Requests;
use App\Basket\Basket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exceptions\QuantityExceededException;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class OrderController extends Controller
{

    public function __construct()
    {}

    /**
     * Show all items in the Basket.
     *
     */

    public function getIndex()
    {
        $orders = Order::where('customer_id', Auth::id())->get();
        return view('front.order.index',compact('orders'));
    }
    public function getOrderDetails($id)
    {
        $products = OrderDetails::where('order_id', $id)->get();
        return view('front.order.details',compact('products'));
    }


}
