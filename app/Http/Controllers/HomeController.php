<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Product;
use App\Feature;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        // dd($categories);
        $feature = Feature::get()->random(1);
        $products = DB::table('products')
        ->join('assets','products.id','=','assets.product_id')
        ->select('products.*', 'assets.resource_path')
        ->get();
       // dd($products);

        return view('layouts.app',compact('categories','feature','products') );
       
    }
}
