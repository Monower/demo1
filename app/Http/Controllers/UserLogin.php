<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use Illuminate\Support\Facades\Hash;

class UserLogin extends Controller
{
    public function login(Request $r){
        $user= Register::where(['email'=>$r->email])->first();


        
        if(!$user || !Hash::check($r->password, $user->password)){
            return ['result'=>'email or password is incorrect'];
        }else{
            return ['result'=>'welcome '.$user->email];
        }
    }
}
