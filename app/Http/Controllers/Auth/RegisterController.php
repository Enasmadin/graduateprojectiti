<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number' => ['required', 'numeric', 'digits:11',  'unique:users,phone_number',],
            'city' => ['required', 'string'],
            'role' => ['required'],
            'profile_pic' => ['required', 'image', 'mimes:jpg,png,jpeg,max:5048'],
            'national_id_first_pic' => ['required', 'mimes:jpg,png,jpeg,max:5048'],
            'national_id_second_pic' => ['required', 'mimes:jpg,png,jpeg,max:5048'],
            'gender' => ['required', 'string']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // foreach ($data as $key => $value) {
        //     echo $key . $value;
        // }
        // $ayman = $data['image']['size'];
        // echo ($ayman);
        // return

        $profilePic = $data['profile_pic'];
        $profileExt = $profilePic->guessExtension();
        $profilePicName = time() . '-' . trim($data['name']) . 'Profile' . '.' . $profileExt;
        $profilePic->move(public_path('profilepic'), $profilePicName);


        $firstNationalId = $data['national_id_first_pic'];
        $firstNationalIdExt = $firstNationalId->guessExtension();
        $firstNationalIdName = time() . '-' . trim($data['name']) . 'First' . '.' . $firstNationalIdExt;
        $firstNationalId->move(public_path('nationalIdPic'), $firstNationalIdName);


        $secondNationalId = $data['national_id_second_pic'];
        $secondNationalIdExt = $secondNationalId->guessExtension();
        $secondNationalIdName = time() . '-' . trim($data['name']) . 'Second' . '.' . $secondNationalIdExt;
        $secondNationalId->move(public_path('nationalIdPic'), $secondNationalIdName);

        // $path = $profilePic->storePubliclyAs('mariam', "ayman3.$exxt");
        // $url = Storage::url("mariam/ayman1.$exxt");
        // $path = $profilePic->storeAs(
        //     'ayman',
        //     "ayman1.$exxt"
        // );
        // $storingPath = $data['profile_pic']->store('profiles');
        // dd($path);


        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'phone_number' => $data['phone_number'],
            'city' => $data['city'],
            'gender' => $data['gender'],
            'profile_pic' => $profilePicName,
            'national_id_first_pic' => $firstNationalIdName,
            'national_id_second_pic' => $secondNationalIdName,
        ]);
    }
}
