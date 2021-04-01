<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\registerAdmin;
use App\Models\Admin;
use App\Models\user;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    use GeneralTrait;

    public function register(registerAdmin $request){

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return $this->returnData('done','admin',$admin);

    }

    public function login(Request $request){

        if(Auth::guard('admin')->attempt($request->only('email','password'))){
            $admin = Auth::guard('admin');
            $token = $admin->createToken('token')->accessToken;
            $admin['token'] = $token;
            return $this->returnData('done','admin',$admin);
        }
        return $this->returnError('1','حدث خطاء');
    }
}
