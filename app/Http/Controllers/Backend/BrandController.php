<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Brand;
use Image;
use File;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index(){

    $brands=Brand::orderBy('id','desc')->get();
    return view('admin.pages.brand.index',compact('brands'));
    
    }

    public function create(){
      
        return view('admin.pages.brand.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'image' => 'nullable|image',

        ]);

        $brand = new Brand();
        $brand->name=$request->name;
        $brand->description=$request->description;
        

        if(count((array)$request->image) > 0){
            
        $image=$request->file('image');
        $img=time() .'.'.$image->getClientOriginalExtension();
        $location=public_path('images/brands/'.$img);
        Image::make($image)->save($location);
        $brand->image=$img;
                
        }

        $brand->save();

        session()->flash('success','A new Brand has added successfully !!!');
        return redirect()->route('admin.brands');

    }

    public function edit($id){
        
        $brand=Brand::find($id);
        if(!is_null($brand)){
            return view('admin.pages.brand.edit',compact('brand'));
        }
        else{
            return redirect()->rotute('admin.brands');
        }
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'name' => 'required',
            'image' => 'nullable|image',

        ]);

        $brand =Brand::find($id);
        $brand->name=$request->name;
        $brand->description=$request->description;
        

        if(count((array)$request->image) > 0){

         //Delete old image
            if(File::exists('images/brands/'.$brand->image)){
                File::delete('images/brands/'.$brand->image);
            }
         //End

        $image=$request->file('image');
        $img=time() .'.'.$image->getClientOriginalExtension();
        $location=public_path('images/brands/'.$img);
        Image::make($image)->save($location);
        $brand->image=$img;
                
        }

        $brand->save();

        session()->flash('success','Brand has updated successfully !!!');
        return redirect()->route('admin.brands');

    }

    public function delete($id){
        $brand=Brand::find($id);
 
        if(!is_null($brand)){
           
            //Delete brand image
            if(File::exists('images/brands/'.$brand->image)){
                File::delete('images/brands/'.$brand->image);
            }
            
           $brand->delete();
              
        }
        session()->flash('success','Brand has deleted successfully');
        return back();
    }
}