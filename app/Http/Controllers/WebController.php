<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MajorCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $major_categories = MajorCategory::all();

        $recommend_products = Product::where('recommend_flag', true)->take(3)->get();

        $recently_products = Product::orderBy('created_at', 'desc')->take(4)->get();

        return view('web.index', compact('major_categories', 'categories', 'recently_products', 'recommend_products'));
    }
}
