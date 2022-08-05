<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class RegisterController extends BaseController
{
    public function store(Request $request)
    {
        // dd($request->all());
        $userData = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number' => ['required', 'numeric', 'min:11',  'unique:users',],
            'city' => ['required', 'string'],
            'role' => ['required'],
            'profile_pic' => ['required', 'image', 'mimes:jpg,png,jpeg,max:5048'],
            'national_id_first_pic' => ['required', 'mimes:jpg,png,jpeg,max:5048'],
            'national_id_second_pic' => ['required', 'mimes:jpg,png,jpeg,max:5048'],
            'gender' => ['required', 'string']
        ]);

        // dd($userData);

        if ($userData) {
            $profilePic = $request['profile_pic'];
            $profileExt = $profilePic->guessExtension();
            $profilePicName = time() . '-' . trim($request['name']) . 'Profile' . '.' . $profileExt;
            $profilePic->move(public_path('profilepic'), $profilePicName);


            $firstNationalId = $request['national_id_first_pic'];
            $firstNationalIdExt = $firstNationalId->guessExtension();
            $firstNationalIdName = time() . '-' . trim($request['name']) . 'First' . '.' . $firstNationalIdExt;
            $firstNationalId->move(public_path('nationalIdPic'), $firstNationalIdName);


            $secondNationalId = $request['national_id_second_pic'];
            $secondNationalIdExt = $secondNationalId->guessExtension();
            $secondNationalIdName = time() . '-' . trim($request['name']) . 'Second' . '.' . $secondNationalIdExt;
            $secondNationalId->move(public_path('nationalIdPic'), $secondNationalIdName);
            // dd($request['name']);
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'role' => $request['role'],
                'phone_number' => $request['phone_number'],
                'city' => $request['city'],
                'gender' => $request['gender'],
                'profile_pic' => $profilePicName,
                'national_id_first_pic' => $firstNationalIdName,
                'national_id_second_pic' => $secondNationalIdName,
            ]);

            if ($user) {
                return response()->json([
                    'msg' => 'user added succusfully',
                    'token' => $user->createToken('token')->plainTextToken
                ]);
            }
        } else {
            return response()->json([
                'error' => $userData
            ]);
        }
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            dd($user);
            $success['token'] =  $user->createToken('token')->plainTextToken;
            $success['name'] =  $user->name;

            return $this->sendResponse($success, 'User login successfully.');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }

    public function logout()
    {
        $user = auth()->user();
        dd($user);
        return [
            'message' => 'user logged out'
        ];
    }
}
