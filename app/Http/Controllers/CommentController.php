<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $comments=Comment::all();

        // return view("posts.index",["comments"=> $comments]);
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
    public function store(Request $request, Post $post)
    {
        $request->validate([

            "description" => 'required|max:255',
            "delivery_date" => 'required|after:yesterday',
            "deliver_price" => 'required|numeric|min:1',

        ]);
        $url = request()->headers->get('referer');
        $urlArr = explode('/', $url);
        $postId =  end($urlArr);
        $comment = new Comment(request()->all());
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $postId;
        $comment->save();
        return redirect()->route("posts.show", $postId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
    public function update(Request $request, Comment $comment, User $user)
    {
        // $this->authorize('update', [$user, $comment]);
        // dd($request->all());
        $request->validate([

            "description" => 'required|max:255',
            "delivery_date" => 'required',
            "deliver_price" => 'required|numeric',

        ]);
        $comment->update($request->all());
        $comment->save();
        return redirect()->route("posts.show", $comment->post_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Comment $comment)
    {
        $user = auth()->user();
        // dd($user);
        // $this->authorize('delete', [$user, $comment]);
        $comment->delete();

        return redirect()->route('posts.index');
    }
}
