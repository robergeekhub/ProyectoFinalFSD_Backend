<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users=User::all();
        return $users;
    }

    public function store(Request $request){
        $input=$request->all();
        $input['password']=bcrypt($input['password']);

        $rules=[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ];

        $messages=[
            'name.required'=>'Enter your name',
            'email.required'=>'Enter your name',
            'password.required'=>'Enter your password'
        ];

        $validator = Validator::make($input,$rules,$messages);

        if ($validator->fails()) {
            return response()->json([$validator->errors()],400);
        }else{
            $user=User::create($input);
            return $user;
        } 
    }

    public function login(Request $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            $user = Auth::user();
            $token = $user->createToken('TokenUser')->accessToken;

            $respuesta=[];
            $respuesta['name']=$user->name;
            $respuesta['token']= 'Bearer '.$token;
            return response()->json($respuesta,200);
        }else{
            return response()->json(['error'=>'Not authenticated.'],401);
        }
    }

    public function logout(Request $request){
        $token = $request->user()->token();
        $token ->revoke();

        return response()->json('Logout done successfully.',200);
}

    public function show(User $id)
    {
        $user = User::find($user->id);
         return $user;
    }

}
