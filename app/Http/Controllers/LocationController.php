<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Location;
use App\Models\Business;
use DB;

class LocationController extends Controller
{
    //
    public function index(){
        $Location = Location::with('business')->get();

        return view("locatondetail", compact('Location'));
    }
    public function locationform(Request $request){

        $id = $request->id;

        $location = Location::find($id);

        $business = Business::all();    
        return view("locationform", compact('location','business'));
    }
    public function savelocationdata(Request $request){

        $user = Auth::user()->name;
        $id = $request->id;

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:locations,email,' . $id,
            'address' => 'required',
            'business' => 'required|exists:businesses,id',
        ]);

        if($id){
            $Location = Location::find($id);
            $Location->name = $request->name;
            $Location->business_id = $request->business;
            $Location->email = $request->email;
            $Location->address = $request->address;
            $Location->created_user =  $user;
            $Location->updated_at = now();
            $save_flag = $Location->save();
           
        }else{
            $Location =new Location();
            $Location->name = $request->name;
            $Location->business_id = $request->business;
            $Location->email = $request->email;
            $Location->address = $request->address;
            $Location->created_user =  $user;
            $save_flag = $Location->save();
        };
        if($save_flag){
            return redirect()->route("locationdetail")->with('success','Successfully saved');
        }else{
            return redirect()->route("locationdetail")->with('error','Something Wrong');
        }
      
    }
    public function deletelocationdata(Request $request){
        $id = $request->id;
        $Location = Location::find($id);

        if($Location){
          
            $save_flag = $Location->delete();
        
        }
        if($save_flag){
            return redirect()->route("locationdetail")->with('success','successfully Deleted');
        }else{
            return redirect()->route("locationdetail")->with('error','Something Wrong');
        }
    }
}
