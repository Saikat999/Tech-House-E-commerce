<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;
use Image;
use File;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index(){

    $categories=Category::orderBy('id','desc')->get();
    return view('admin.pages.category.index',compact('categories'));
    
    }

    public function create(){
        $main_categories=Category::orderBy('id','desc')->where('parent_id',NULL)->get();
        return view('admin.pages.category.create',compact('main_categories'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'image' => 'nullable|image',

        ]);

        $category = new Category();
        $category->name=$request->name;
        $category->description=$request->description;
        $category->parent_id=$request->parent_id;

        if(count((array)$request->image) > 0){
            
        $image=$request->file('image');
        $img=time() .'.'.$image->getClientOriginalExtension();
        $location=public_path('images/categories/'.$img);
        Image::make($image)->save($location);
        $category->image=$img;
                
        }

        $category->save();

        session()->flash('success','A new Category has added successfully !!!');
        return redirect()->route('admin.categories');

    }

    public function edit($id){
        $main_categories=Category::orderBy('id','desc')->where('parent_id',NULL)->get();
        $category=Category::find($id);
        if(!is_null($category)){
            return view('admin.pages.category.edit',compact('category','main_categories'));
        }
        else{
            return redirect()->rotute('admin.categories');
        }
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'name' => 'required',
            'image' => 'nullable|image',

        ]);

        $category =Category::find($id);
        $category->name=$request->name;
        $category->description=$request->description;
        $category->parent_id=$request->parent_id;

        if(count((array)$request->image) > 0){

         //Delete old image
            if(File::exists('images/categories/'.$category->image)){
                File::delete('images/categories/'.$category->image);
            }
         //End

        $image=$request->file('image');
        $img=time() .'.'.$image->getClientOriginalExtension();
        $location=public_path('images/categories/'.$img);
        Image::make($image)->save($location);
        $category->image=$img;
                
        }

        $category->save();

        session()->flash('success','Category has updated successfully !!!');
        return redirect()->route('admin.categories');

    }

    public function delete($id){
        $category=Category::find($id);
 
        if(!is_null($category)){
            //If it is parent category, then delete all sub category
            if($category->parent_id == NULL){
               //Delete sub category
               $sub_categories=Category::orderBy('id','desc')->where('parent_id',$category->id)->get();
               
            foreach($sub_categories as $sub){
                    //Delete sub-category image
            if(File::exists('images/categories/'.$sub->image)){
                File::delete('images/categories/'.$sub->image);
            }
            
                $sub->delete();
               }
            }

            //Delete category image
            if(File::exists('images/categories/'.$category->image)){
                File::delete('images/categories/'.$category->image);
            }
            
           $category->delete();
              
        }
        session()->flash('success','Category has deleted successfully');
        return back();
    }
}