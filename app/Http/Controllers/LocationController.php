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
        $Location = Location::all()->where('is_deleted',0);
        return view("locatondetail", compact('Location'));
    }
    public function locationform(Request $request){

        $id = $request->id;

        $location = Location::find($id);

        $business = Business::all()->where('is_deleted',0);
        return view("locationform", compact('location','business'));
    }
    public function savelocationdata(Request $request){

        $user = Auth::user()->name;
        $id = $request->id;

        $request->validate([
            'name' => 'required',
            'business_name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        if($id){
            $Location = Location::find($id);
            $Location->name = $request->name;
            $Location->business_name = $request->business_name;
            $Location->email = $request->email;
            $Location->address = $request->address;
            $Location->created_user =  $user;
            $save_flag = $Location->save();
           
        }else{
            $Location =new Location();
            $Location->name = $request->name;
            $Location->business_name = $request->business_name;
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
            // $Location->delete();
            $updateData = [ 'is_deleted' => 1 ];
            $save_flag = DB::table('Locations')->where('id',$id)->update($updateData);
        }
        if($save_flag){
            return redirect()->route("locationdetail")->with('success','successfully Deleted');
        }else{
            return redirect()->route("locationdetail")->with('error','Something Wrong');
        }
    }
}
