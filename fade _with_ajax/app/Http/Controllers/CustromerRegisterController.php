<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CustomerLogin;
use Carbon\Carbon;

class CustromerRegisterController extends Controller
{
    public function custromer_register(){
        return view('frontend.custromer_register');
    }

    public function custromer_register_store(Request $request){
        CustomerLogin::insert([

            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'password'=>bcrypt($request->password),
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('register', 'Customer registered success!');
    }
}
