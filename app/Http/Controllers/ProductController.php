<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all(); //ตัวแปร products เป็นผลมาจากการดึงข้อมูลทั้งหมดขึ้นมา
        // $products = Product::where('category_id', '=', 1)->whereHas('category', function($query) {$query->where('name', 'อะไหล่');})->get(); 
        // $categorys = Category::where('id', 1)->get();
        return view('product/index', compact('products')); // ส่งตัวแปร products ไปที่ view
    }
       
}
