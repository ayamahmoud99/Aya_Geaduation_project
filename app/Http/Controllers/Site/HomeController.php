<?php

namespace App\Http\Controllers\Site;


use App\Models\Category;
use App\Models\Slider;
use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{

    public function home()
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

    public function ShowAbout()
    {

        return view('about');
    }
}
