<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Rate;
use Illuminate\Http\File;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        // dd($users);

        return response()->json([
            $users
        ]);

    }

   
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(User $user,$id )
    {
        // dd($user);
        $user = User::findOrFail($id);
        $vendorRatings = Rate::where('vendor_id', $user->id)->get();
        $deliveryRatings = Rate::where('delivery_id', $user->id)->get();
        return response()->json([
            $user
        ]);

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $profile)
    {
    //    dd($request->all());
        $user = User::findOrFail($profile);
        // dd($user);
        
       $validation = $request->validate([
            'city' => ['required', 'min:3'],
            'email' => [ 'email'],
            'phone_number' => ['numeric'],
            'profile_pic' => ['mimes:jpg,png,jpeg,max:5048'],
        ]);
        
        // $user->city = $request->city;
        // if ($user->email != $request['email']) {
        //     $user->email = $request->email;
        // }
        // if ($user->phone_number != $request->phone_number){
        //     $user->phone_number = $request->phone_number;

        // }


        if ($request->hasFile('profile_pic')) {

            File::delete(public_path("profilepic/" . $user->profile_pic));

            //            upload new photo
            $newName =  time() . '-' . trim($request['email']) . 'Profile' . '.' . $request['profile_pic']->guessExtension();
            $request->file('profile_pic')->move(public_path('profilepic'), $newName);

            //            save to table
            $user->profile_pic = $newName;
        }

        $user->update($validation);
        return response()->json([
            'msg'=>'created'
        ]);    
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
    public function updating(Request $request, $profile)
    {
        // dd($request->all());
        $user = User::findOrFail($profile);
        // dd($user);
        $pic= $request['profile_pic'];
        dd($pic);
       $validation = $request->validate([
            'city' => ['required', 'min:3'],
            'email' => [ 'email'],
            'phone_number' => ['numeric'],
            'profile_pic' => ['mimes:jpg,png,jpeg,max:5048'],
        ]);
        
        // $user->city = $request->city;
        // if ($user->email != $request['email']) {
        //     $user->email = $request->email;
        // }
        // if ($user->phone_number != $request->phone_number){
        //     $user->phone_number = $request->phone_number;

        // }
          $pic= $request['profile_pic'];
        dd($pic);
        if ($request->hasFile('profile_pic')) {

            File::delete(public_path("profilepic/" . $user->profile_pic));

            //            upload new photo
            $newName =  time() . '-' . trim($request['email']) . 'Profile' . '.' . $request['profile_pic']->guessExtension();
            $request->file('profile_pic')->move(public_path('profilepic'), $newName);

            //            save to table
            $user->profile_pic = $newName;
            // dd($user);
        }

        $user->update($validation);
        return response()->json([
            'msg'=>'created'
        ]);    
    }
}
