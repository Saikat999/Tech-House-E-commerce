<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
   public function home(){
     $products=Product::orderBy('id','desc')->paginate(4);
    return view('frontend.pages.index',compact('products'));
   }
  

//    public function products(){
//        $items=Item_1::orderBy('id','desc')->get();
//     return view('product.index')->with('items',$items);
// }


public function search(Request $request){

   $search = $request->search;
   $products=Product::orWhere('title','like','%'.$search.'%')
   ->orWhere('description','like','%'.$search.'%')
   ->orWhere('slug','like','%'.$search.'%')
   ->orWhere('price','like','%'.$search.'%')
   ->orWhere('quantity','like','%'.$search.'%')
   ->orderBy('id','desc')
   ->paginate(4);

   return view('frontend.pages.product.search',compact('search','products'));
}


}