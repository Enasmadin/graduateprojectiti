<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Auth\Access\Response;



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
        dd($users);
        return view('profiles.index', [
            'users' => $users
        ]);
    }


    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('profiles.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    static function checkingAuth($userid, $model)
    {
        return $userid === $model->id ? Response::allow() :
            abort(503);
    }

    public function edit($id)
    {
        $onlineUser = auth()->user()->id;
        $user = User::findOrFail($id);

        $this::checkingAuth($onlineUser, $user);

        // $this->authorize('update', [$onlineUser, $user]);
        // if ($onlineUser->id != $user->id) {
        //     Response::deny(403);
        // }

        // dd($user);
        return view('profiles.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);
        // dd($user);

        $request->validate([
            'city' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'phone_number' => ['numeric'],
            'profile_pic' => ['mimes:jpg,png,jpeg,max:5048'],
        ]);

        $user->city = $request->city;
        if ($user->email != $request['email']) {
            $user->email = $request->email;
        }
        $user->phone_number = $request->phone_number;


        if ($request->hasFile('profile_pic')) {

            File::delete(public_path("profilepic/" . $user->profile_pic));

            //            upload new photo
            $newName =  time() . '-' . trim($request['email']) . 'Profile' . '.' . $request['profile_pic']->guessExtension();
            $request->file('profile_pic')->move(public_path('profilepic'), $newName);

            //            save to table
            $user->profile_pic = $newName;
        }

        $user->update();
        return redirect()->route('profiles.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
