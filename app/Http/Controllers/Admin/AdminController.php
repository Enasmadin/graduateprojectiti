<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('status', 'accepted')->simplePaginate(10);
        return view("admin.pages.allusers", ["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number' => ['required', 'numeric', 'min:11',  'unique:users,phone_number',],
            'city' => ['required', 'string'],
            'role' => ['required'],
            'profile_pic' => ['required', 'image', 'mimes:jpg,png,jpeg,max:5048'],
            'national_id_first_pic' => ['required', 'image', 'mimes:jpg,png,jpeg,max:5048'],
            'national_id_second_pic' => ['required', 'image', 'mimes:jpg,png,jpeg,max:5048'],
            'gender' => ['required', 'string'],
            'is_admin' => ['required', 'string']
        ]);

        $profilePic = $request->profile_pic;
        $profileExt = $profilePic->guessExtension();
        $profilePicName = time() . '-' . trim($request->name) . 'Profile' . '.' . $profileExt;
        $profilePic->move(public_path('profilepic'), $profilePicName);


        $firstNationalId = $request->national_id_first_pic;
        $firstNationalIdExt = $firstNationalId->guessExtension();
        $firstNationalIdName = time() . '-' . trim($request->name) . 'First' . '.' . $firstNationalIdExt;
        $firstNationalId->move(public_path('nationalIdPic'), $firstNationalIdName);


        $secondNationalId = $request->national_id_second_pic;
        $secondNationalIdExt = $secondNationalId->guessExtension();
        $secondNationalIdName = time() . '-' . trim($request->name) . 'Second' . '.' . $secondNationalIdExt;
        $secondNationalId->move(public_path('nationalIdPic'), $secondNationalIdName);


        $user =   User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => $request['role'],
            'phone_number' => $request['phone_number'],
            'city' => $request['city'],
            'gender' => $request['gender'],
            'is_admin' => $request['is_admin'],
            'status' => 'accepted',
            'profile_pic' => $profilePicName,
            'national_id_first_pic' => $firstNationalIdName,
            'national_id_second_pic' => $secondNationalIdName,
        ]);
        $user->save();
        return redirect()->route('admines.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],

            'phone_number' => ['required', 'numeric', 'min:11'],
            'city' => ['required', 'string'],
            'role' => ['required'],
            'profile_pic' => ['image', 'mimes:jpg,png,jpeg,max:5048'],
            'national_id_first_pic' => ['image', 'mimes:jpg,png,jpeg,max:5048'],
            'national_id_second_pic' => ['image', 'mimes:jpg,png,jpeg,max:5048'],
            'gender' => ['required', 'string'],
            'is_admin' => ['required', 'string']
        ]);



        $user = User::findOrFail($id);

        if ($request->hasFile('profile_pic')) {

            File::delete(public_path("profilePic/" . $user->profile_pic));

            //            upload new photo
            $newName =  time() . '-' . trim($request['name']) . 'Profile' . '.' . $request['profile_pic']->guessExtension();
            $request->file('profile_pic')->move(public_path('profilePic'), $newName);

            //            save to table
            $user->profile_pic = $newName;
        }
        if ($request->hasFile('national_id_first_pic')) {

            File::delete(public_path("nationalIdPic/" . $user->national_id_first_pic));

            //            upload new photo
            $newName =  time() . '-' . trim($request['name']) . 'First' . '.' . $request['national_id_first_pic']->guessExtension();
            $request->file('national_id_first_pic')->move(public_path('nationalIdPic'), $newName);

            //            save to table
            $user->national_id_first_pic = $newName;
        }
        if ($request->hasFile('national_id_second_pic')) {

            File::delete(public_path("nationalIdPic/" . $user->national_id_second_pic));

            //            upload new photo
            $newName =  time() . '-' . trim($request['name']) . 'Second' . '.' . $request['national_id_second_pic']->guessExtension();
            $request->file('national_id_second_pic')->move(public_path('nationalIdPic'), $newName);

            //            save to table
            $user->national_id_second_pic = $newName;
        }


        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->city = $request->city;
        $user->role = $request->role;
        $user->gender = $request->gender;
        $user->is_admin = $request->is_admin;

        $user->update();



        return redirect()->route('admines.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {
        $user = User::findOrFail($id);

        File::delete(public_path("profilepic/" . $user->profile_pic));
        File::delete(public_path("nationalIdPic/" . $user->national_id_first_pic));
        File::delete(public_path("nationalIdPic/" . $user->national_id_second_pic));

        $user->delete();
        return redirect()->route('admines.index');
    }
}
