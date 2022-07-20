<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Slider;
use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [];
        $data['sliders'] = Slider::get(['photo']);
        $data['categories'] = Category::parent()->select('id', 'slug')->with(['childrens' => function ($q) {
           $q->select('id', 'parent_id', 'slug');
           $q->with(['childrens' => function ($qq) {
               $qq->select('id', 'parent_id', 'slug');
           }]);
       }])->get();
       $data['products'] = Product::select()->take('18')->get();
       return view('front.home', $data);
    }
}
