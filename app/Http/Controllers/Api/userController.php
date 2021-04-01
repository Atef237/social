<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\registerUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\Hash;


class userController extends Controller
{
    use GeneralTrait;

    public function regiser(registerUser $request){


            $user = User::create([
                'name'       => $request->name,
                'email'      => $request->email,
                'password' => Hash::make($request->password)
            ]);
        return $this->returnData('don','user',$user);

    }


}
