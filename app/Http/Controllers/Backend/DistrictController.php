<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\District;
use App\Models\Division;

class DistrictController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index(){

        $districts=District::orderBy('name','asc')->get();
        return view('admin.pages.district.index',compact('districts'));
        
        }
    
        public function create(){

            $divisions=Division::orderBy('priority','asc')->get();
            return view('admin.pages.district.create',compact('divisions'));
        }
    
        public function store(Request $request){
            $this->validate($request,[
                'name' => 'required',
                'division_id' => 'required',
    
            ]);
    
            $district = new District();
            $district->name=$request->name;
            $district->division_id=$request->division_id;
    
            $district->save();
    
            session()->flash('success','A new District has added successfully !!!');
            return redirect()->route('admin.districts');
    
        }
    
        public function edit($id){

            $divisions=Division::orderBy('priority','asc')->get();
            $district=District::find($id);
            if(!is_null($district)){
                return view('admin.pages.district.edit',compact('district','divisions'));
            }
            else{
                return redirect()->rotute('admin.districts');
            }
        }
    
        public function update(Request $request,$id){
            $this->validate($request,[
                'name' => 'required',
                'division_id' => 'required',
    
            ]);
    
            $district =District::find($id);
            $district->name=$request->name;
            $district->division_id=$request->division_id;
    
            $district->save();
    
            session()->flash('success','District has updated successfully !!!');
            return redirect()->route('admin.districts');
    
        }
    
        public function delete($id){
            $district=District::find($id);
     
            if(!is_null($district)){
                  
               $district->delete();
                  
            }
            session()->flash('success','District has deleted successfully');
            return back();
        }
}
