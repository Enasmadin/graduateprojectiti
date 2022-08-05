<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = auth()->user()->clients;
        return $clients;
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //   dd($request);
        $request->validate([
            "name" => 'required|max:100',
            "adress" => 'required|max:255',
            "phone_number" => 'required|numeric',

        ]);
        $client = new Client(request()->all());
        $client->user_id = Auth::user()->id;
        $client->save();
        return response()->json([
            "msg"=>"added succusfully"
        ]);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show( Client $client, User $user)
    {
    // dd($client);
    $this->authorize('view', [$client, $user]);
    return $client;
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        // dd($request);
        $this->authorize('update', [$client, $user]);
        $request->validate([
            "name" => 'required|max:100|string',
            "adress" => 'required|max:255|string',
            "phone_number" => 'required|numeric',

        ]);
        $client->update($request->all());
            return response()->json([
                "msg"=>"updated succusfully"
            ]);
           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $this->authorize('delete', [$client, $user]);
         $client->delete();
       
            return response()->json([
                "msg"=>"deleted succusfully",
                "code"=>200

            ]);
        
}
}