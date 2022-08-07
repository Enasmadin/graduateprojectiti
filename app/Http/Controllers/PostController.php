<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('is_vendor', ['except' => [
            'search', 'index', 'show'
        ]]);
    }

    public function search(Request $request)
    {
    }

    public function index(Request $request)
    {
        $search = $request['search'];
        if ($search) {
            $posts = Post::where('title', 'LIKE', '%' . $search . '%')->with('product')->orwhere('description', 'LIKE', '%' . $search . '%')->with('product')->orwhere('from', 'LIKE', '%' . $search . '%')->with('product')->orwhere('to', 'LIKE', '%' . $search . '%')->with('product')->orwhere('deliver_price', 'LIKE', '%' . $search . '%')->with('product')->get();
            return view("posts.index", compact('posts'));
        }
        $posts = Post::latest()->get();
        return view("posts.index", ["posts" => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = Auth::user();
        // dd($user);
        $products = Product::all()->where('user_id', $user->id);;
        $clients = $user->clients;
        return view("posts.create", ["products" => $products, "clients" => $clients]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            "title" => 'required|max:100|string',
            "description" => 'required|max:255|string',
            "from" => 'required|string',
            "to" => 'required|string',
            "deliver_price" => 'required|numeric|min:1',
            "product_id" => 'required',
            "client_id" => 'required'
        ]);
        $post = new Post(request()->all());
        $post->user_id = Auth::user()->id;
        $post->save();
        return redirect()->route("posts.index");
    }

    // public function storecomment(Request $request, Post $post)
    // {
    //     dd($post);
    //     $request->validate([
    //         "title" => 'required|max:100|string',
    //         "description" => 'required|max:255|string',
    //         "from" => 'required|string',
    //         "to" => 'required|string',
    //         "deliver_price" => 'required|numeric',
    //         "product_id" => 'required'
    //     ]);
    //     $post = new Post(request()->all());
    //     $post->user_id = Auth::user()->id;
    //     $post->save();
    //     return redirect()->route("posts.index");
    // }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // dd($post->comment);
        $userPosts = $post->user->posts->whereNotIn('id', $post->id)->take(3);
        $catPostId = $post->product->category->id;
        $posts = Post::all();
        $comments = Comment::all()->where('post_id', $post->id);
        // dd($posts);
        // $test = $posts->products->where('category_id', $catPostId);

        $favs = Wishlist::all();
        return view("posts.show", [
            "post" => $post,
            "UserPosts" => $userPosts,
            "favs" => $favs,
            "comments" => $comments
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, User $user)
    {

        $this->authorize('update', [$post, $user]);
        // dd($user);


        // $products = Product::all()->where('user_id', $user->id);
        $products = auth()->user()->products;


        return view('posts.edit', [
            'post' => $post,
            'products' => $products
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response $post
     */

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'max:255'],
            'from' => ['required', 'max:255'],
            'to' => ['required', 'max:255'],
            'deliver_price' => ['required', 'numeric', 'min:1'],
            'product_id' => ['required', 'numeric'],
        ]);

        $post->update($request->all());

        return redirect()->route("posts.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, User $user)
    {
        $this->authorize('delete', [$post, $user]);
        $post->delete();

        return redirect()->route('posts.index');
    }
}
