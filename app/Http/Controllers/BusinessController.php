<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Business;
use Illuminate\Support\Facades\Storage;
use DB;

class BusinessController extends Controller
{

     public function index() {
        $business = Business::all();
        $trashedata = Business::onlyTrashed()->get();
        return view('bussiness', compact('business','trashedata'));
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
                'updated_at' => now(),
                'created_user'=> $name,
            ];
        
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('logos', 'public');
                $updateData['img'] = $logoPath;
                // if ($oldLogoPath && Storage::exists('public/' . $oldLogoPath)) {
                //     Storage::delete('public/' . $oldLogoPath);
                // }
                if (!empty($oldLogoPath) && Storage::disk('public')->exists($oldLogoPath)) {
                    Storage::disk('public')->delete($oldLogoPath);
                }
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
            $save_flag = $business->delete(); 
            if($save_flag){
            return redirect()->route("bussiness")->with('success','successfully Trash');
        }else{
            return redirect()->route("bussiness")->with('error','Something Wrong');
        }
        }
    }
    public function forcedelete(Request $request){
       
        $id = $request->id;
        $business = Business::withTrashed()->find($id); 
        if ($business) {
            $save_flag = $business->forceDelete();
            if($save_flag){
                return redirect()->route("bussiness")->with('success','successfully Deleted');
            }else{
                return redirect()->route("bussiness")->with('error','Something Wrong');
            }
        }
    }
    public function restore(Request $request){
       
        $id = $request->id;
        $business = Business::withTrashed()->find($id);  
        if ($business) {
            $save_flag = $business->restore(); 
            if($save_flag){
                 return redirect()->route("bussiness")->with('success','successfully Restore');
            }else{
                return redirect()->route("bussiness")->with('error','Something Wrong');
            }
        }
    }
}
