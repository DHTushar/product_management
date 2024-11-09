<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::orderBy('created_at', 'DESC')->get();
        return view('products.index',[
            'products' => $products
        ]);
    }

    public function create(){
        
        return view('products.create');
    }

    public function store(Request $request){

        $validator = $request->validate([
            'product_id'=> 'required|unique:products,product_id|min:3',
            'name' => 'required|min:5',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);

        $imageName = null;
        if(isset($request->image)){
            $imageName = time().'.'. $request->image->extension(); 
            $request->image->move(public_path('images'), $imageName);
        }
        
        $product = new Product;

        $product->product_id = $request->product_id;
        $product->name = $request->name;
        $product->description= $request->description;
        $product->price= $request->price;
        $product->stock= $request->stock;
        $product->image= $imageName;

        $product->save();

        return redirect()->route('products')->with('success', 'Product added successfully');
        
    }

    public function edit($id){
        $product = Product::findOrFail($id);
        return view('products.edit', ['product' => $product]);       
    }

    public function update($id, Request $request){
        $product = Product::findOrFail($id);

        $validator = $request->validate([
            'product_id'=> 'required|unique:products,product_id|min:3',
            'name' => 'required|min:5',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);

          
        $product->product_id = $request->product_id;
        $product->name = $request->name;
        $product->description= $request->description;
        $product->price= $request->price;
        $product->stock= $request->stock;
        
        if(isset($request->image)){
            $imageName = time().'.'. $request->image->extension(); 
            $request->image->move(public_path('images'), $imageName);
            $product->image= $imageName;
        }

        $product->save();

        return redirect()->route('products')->with('success', 'Product updated successfully');
    }

    public function destroy($id){
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('products')->with('success', 'Product deleted permanently');
    }


}
