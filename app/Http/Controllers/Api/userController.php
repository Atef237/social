<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\addComment;
use App\Http\Requests\addLike;
use App\Http\Requests\addPost;
use App\Http\Requests\addReply;
use App\Http\Requests\registerUser;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

            $user->save();

            if($user){
                return $this->returnData('don','user',$user);
            }else{
                return $this->returnError('1','an error occurred');
            }

    }

    public function login(Request $request){

        if(Auth::attempt($request->only('email','password'))){

            $user = Auth::user();
            $token = $user->createToken('token')->accessToken;
            $user['token'] = $token;
            return $this->returnData('done','admin',$user);
        }
        return $this->returnError('1','حدث خطاء');
    }

    public function Post(addPost $request){

        $post = Post::create([
            'text' => $request->text,
            'user_id' => $request->user_id,
        ]);
        $post->save();
        if($post){
            return $this->returnData('Done','post',$post);
        }else{
            return $this->returnError('1','حدث خطاء');
        }

    }

    public function addCmment(addComment $request){
        $comment = Comment::create([
            'text' => $request->text,
            'user_id' => $request->user_id,
            'post_id' => $request->post_id,
        ]);
        $comment->save();
        if($post){
            return $this->returnData('Done','post',$comment);
        }else{
            return $this->returnError('1','حدث خطاء');
        }

    }

    public function addLike(addLike $request){

    }

    public function addReply(addReply $request){

    }

}
