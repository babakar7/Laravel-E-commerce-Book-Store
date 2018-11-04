<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Cart;

use App\Product;

use Session;

class ShoppingController extends Controller
{
    //
    
    
    public function add(Request $request){

        
        
        
        $product = Product::find($request->id);
        
    
         $cartItem =  Cart::add($request->id,   $product->name, $request->qty, $product->price);
        
        
        
        
       Cart::associate($cartItem->rowId, 'App\Product');
        
        
        

        return redirect()->route('cart');
    
    }
    
    
    public function cart(){
        
                
        
        
        return view('cart');
    }
    
    
    public function delete($id){

       
        
        
        Cart::remove($id);
        
        return redirect()->back();
        
    
    }
    
    
    public function increment($id, $qty){

        
        Cart::update($id, $qty +1);
    
    
        return redirect()->back();
    }
    
    
    
      
    public function decrement($id, $qty){

    
                Cart::update($id, $qty -1);

              return redirect()->back();

    }
    
    
    public function rapid_add($id){
        
        
          $product = Product::find($id);
        
    
         $cartItem =  Cart::add($id,   $product->name, 1, $product->price);
        
        
        
        Cart::associate($cartItem->rowId, 'App\Product');

        
        
        Session::flash('success', 'Item added successfully');

       
        return redirect()->back();


        
    }
    
    
    
    public function checkout(){
        
        
        return view('checkout')->with('products', Product::all());
        
    }
}

