<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

use App\Models\Product;
use App\Models\ProductImage;

use Image;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
   public function index(){
       return view('admin.pages.index');
   }

   

}