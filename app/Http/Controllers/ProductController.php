<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // rp = Result per Page 
    var $rp = 2;
    
    public function index() {
        $products = Product::paginate($this->rp); 
        // $products = Product::all(); //ตัวแปร products เป็นผลมาจากการดึงข้อมูลทั้งหมดขึ้นมา
        // $products = Product::where('category_id', '=', 1)->whereHas('category', function($query) {$query->where('name', 'อะไหล่');})->get(); 
        // $categorys = Category::where('id', 1)->get();
        return view('product/index', compact('products')); // ส่งตัวแปร products ไปที่ view
    }
    
    public function search(Request $request) {
        $query = $request->q;
        if($query) {
            $products = Product::where('code', 'like', '%'.$query.'%')
            ->orWhere('name', 'like', '%'.$query.'%')
            ->paginate($this->rp);
            // ->get();
        } else {
            // $products = Product::all();
            $products = Product::paginate($this->rp);
        }

        return view('product/index', compact('products'));
        
    }
       
}
