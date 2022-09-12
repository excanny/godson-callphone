<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'getProfile']]);
    }
 
    public function login(Request $request){
    	$validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        if ($validator->fails()) return response()->json($validator->errors(), 422);
            
        if (! $token = auth()->attempt($validator->validated()))  return response()->json(['error' => 'Unauthorized'], 401);

        return $this->createNewToken($token);
    }
 
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);
    
        if ($validator->fails())  return response()->json(['error' => $validator->messages()], 400);

        $user = User::create([
            'user_id' => time(),
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['status' => true, 'message' => 'User successfully created']);
    }

    public function uploadPhoto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image_name' =>  ['required', 'image', 'max:2048'],
        ]);
    
        if ($validator->fails()) return response()->json(['error' => $validator->messages()], 400);

        if (!$request->hasFile('image_name')) return response()->json(['status' => false, 'message' => 'Sorry! Error occurred. Try again.']);
        
        $filepath = 'uploads'; $original_file_name = 'image_name';

        $uploaded_file_path = \App\Helpers\AppHelper::instance()->uploadFileToFolder($request, $original_file_name, $filepath);

        $updated = User::where('user_id', auth()->user()->user_id)
            ->update([
                'photo' => $uploaded_file_path,
            ]);

        if($updated <= 0) return response()->json(['status' => false, 'message' => 'Sorry! Error occurred. Try again.']);

        return response()->json(['status' => true, 'message' => 'Photo successfully uploaded']);
    }

    public function logout() {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }
    
    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }
  
    public function userProfile() {
        return response()->json(auth()->user());
    }
  
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token
        ]);
    }
}
