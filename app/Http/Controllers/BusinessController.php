<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Business;
use DB;

class BusinessController extends Controller
{

     public function index() {

        $business = Business::all()->where('is_deleted',0);
        return view('bussiness', compact('business'));
    }

    public function editform(Request $request){

        $id=$request->id;
        if($id){
            $business = Business::find($id);
            return view("businessform",compact('business'));
        }
        return view("businessform");
    }
  
    public function Addbusiness(Request $request){

        $id=$request->id;
        $name = Auth::user()->name;

        $request->validate([
            'name'=>"required",
            'email'=>"required|email",
            'address'=>"required",
        ]);
        if($id){
            $updateData = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
                'created_user'=> $name,
            ];
        
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('logos', 'public');
                $updateData['img'] = $logoPath;
                // if ($oldLogoPath && Storage::exists('public/' . $oldLogoPath)) {
                //     Storage::delete('public/' . $oldLogoPath);
                // }
            }
            $save_flag = DB::table('businesses')->where('id', $id)->update($updateData);
    
        }else{
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('logos', 'public');
            }

                $business =new Business();
                $business->name = $request->name;
                $business->email = $request->email;
                $business->address = $request->address;
                if (isset($logoPath)) {
                    $business->img = $logoPath;
                }
                $business->created_user = $name;
                $save_flag = $business->save();
            }
            if($save_flag){
                return redirect()->route("bussiness")->with('success','successfully saved');
            }else{
                return redirect()->route("bussiness")->with('error','Something Wrong');
            }
       
    }
    public function deletebussiness(Request $request){
       
        $id = $request->id;
        $business = Business::find($id); 
        if ($business) {
          
            $updateData = ['is_deleted' => 1];
            $save_flag = DB::table('businesses')->where('id', $id)->update($updateData);
            if($save_flag){
            return redirect()->route("bussiness")->with('success','successfully Deleted');
        }else{
            return redirect()->route("bussiness")->with('error','Something Wrong');
        }
        }
    }
}