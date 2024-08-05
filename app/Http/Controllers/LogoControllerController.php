<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogoController;

class LogoControllerController extends Controller
{

    public function index(){

        return view('backend.components.logo.logo_form');
    } 

   public function store(Request $request){

    $request->validate([

        'image' => 'required',
      
    ]);

    $imageName = null;
    if ($request->hasFile('image')) {
        $imageName = date('YmdHis').'.'.$request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('uploads', $imageName, 'public');
    }

 
    LogoController::create([

        'image' => $imageName,
       
    ]);

    return redirect()->back()->with('success', 'Logo created successfully');
   }

   public function logo_list(){

    $logos = LogoController::all();

    return view('backend.components.logo.logo_list',compact('logos'));
   }

   public function logo_delete($id){

    $delete =  LogoController::find($id);

    $delete->delete();

    return redirect()->back()->with('success', 'Logo deleted successfully');;
   }
}
