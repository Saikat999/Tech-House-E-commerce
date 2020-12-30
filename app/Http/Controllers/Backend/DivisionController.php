<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Division;
use App\Models\District;

class DivisionController extends Controller
{
    public function index(){

        $divisions=Division::orderBy('priority','asc')->get();
        return view('admin.pages.division.index',compact('divisions'));
        
        }
    
        public function create(){
          
            return view('admin.pages.division.create');
        }
    
        public function store(Request $request){
            $this->validate($request,[
                'name' => 'required',
                'priority' => 'required',
    
            ]);
    
            $division = new Division();
            $division->name=$request->name;
            $division->priority=$request->priority;
    
            $division->save();
    
            session()->flash('success','A new Division has added successfully !!!');
            return redirect()->route('admin.divisions');
    
        }
    
        public function edit($id){
            
            $division=Division::find($id);
            if(!is_null($division)){
                return view('admin.pages.division.edit',compact('division'));
            }
            else{
                return redirect()->rotute('admin.divisions');
            }
        }
    
        public function update(Request $request,$id){
            $this->validate($request,[
                'name' => 'required',
                'priority' => 'required',
    
            ]);
    
            $division =Division::find($id);
            $division->name=$request->name;
            $division->priority=$request->priority;
    
            $division->save();
    
            session()->flash('success','Division has updated successfully !!!');
            return redirect()->route('admin.divisions');
    
        }
    
        public function delete($id){
            $division=Division::find($id);
     
            if(!is_null($division)){
                
                //Delete all districts under this division
                $districts=District::where('division_id',$division->id)->get();
                foreach ($districts as $district) {
                    $district->delete();
                }
                
               $division->delete();
                  
            }
            session()->flash('success','Division has deleted successfully');
            return back();
        }
}
