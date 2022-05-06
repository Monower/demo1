<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use Illuminate\Support\Facades\Hash;

class UserRegistration extends Controller
{
    public function register(Request $r){
        /* return ['email'=>$r->email,'password'=>$r->password]; */

        $user=Register::where('email','=',$r->email)->first();

        if($user){
            return ['result'=>'user already exists. please login'];
        }else{
            $reg= new Register;
            $reg->email=$r->email;
            $reg->password=Hash::make($r->password);
            $reg->save();

            return ['result'=>'user added successfully'];
        }
    }
}
