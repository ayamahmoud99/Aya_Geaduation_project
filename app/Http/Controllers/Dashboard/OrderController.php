<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\MainCategoryRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::all();
        return view('dashboard.orders.index', compact('orders'));
    }

    public function details($id)
    {
        $products = OrderDetails::where('order_id', $id)->paginate(PAGINATION_COUNT);
        return view('dashboard.orders.details', compact('products'));
    }
}
