<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('product', compact('products'));
    }

    public function store(Request $request){
        Product::create($request->all());
        return redirect()->back();
    }

    public function edit($id){
        $product = Product::find($id);
        return view('edit_product', compact('product'));
    }

    public function update(Request $request, $id){
        $product = Product::find($id);
        $product->update(['name' => $request->name, 'price' => $request->price]);
        return redirect()->back()->with('success', 'Data berhasil di update');
    }
}
