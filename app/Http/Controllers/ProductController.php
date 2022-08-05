<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // $user = Auth::user();
        // ddd();
        $products = auth()->user()->products;
        // $products = Product::all()->where('user_id', $user->id);


        if ($request['search']) {
            $searchedProducts = $products->where('name', $request['search']);
            return view('products.index', [
                'products' => $searchedProducts,
            ]);
        }

        return view('products.index', [
            'products' => $products,
        ]);
        // if ($user->role === 'delivery') {
        //     // return redirect()->route('/');
        //     abort(403);
        //     // return view('home');
        // }
        // where('user_id', $user->id)->get();

        // dd($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $auth = Auth::user();
        $cats = Category::all();

        return view('products.create', [
            'user' => $auth,
            'cats' => $cats
        ]);
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
            'name' => ['required', 'min:3', 'max:255'],
            'price' => ['required', 'numeric', 'min:1'],
            'weight' => ['numeric', 'min:1'],
            'quantity' => ['required', 'numeric', 'min:1'],
            'category_id' => ['required'],
            'product_pic' => ['required', 'mimes:jpg,png,jpeg,max:5048'],
        ]);

        $productPic = $request['product_pic'];
        $productExt = $productPic->guessExtension();
        $productPicName = time() . '-' . trim($request['name']) . 'Product' . '.' . $productExt;
        $productPic->move(public_path('productpic'), $productPicName);


        $product = new Product($request->except('product_pic'));
        $product->user_id = Auth::user()->id;
        $product->product_pic = $productPicName;
        $product->save();
        return redirect()->route('products.index');
        // $user = new User();
        // dd($request);
        // $user->product()->create([$request]);
        // $product->name = $request->get('name');
        // $product->price = $request->get('price');
        // $product->weight = $request->get('weight');
        // $product->quantity = $request->get('quantity');
        // $product->user_id = Auth::user()->id;
        // $product->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Product $product)
    {
        $this->authorize('view', [$product, $user]);
        // $product = Product::findOrFail($id);
        return view('products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, User $user)
    {
        // $user = auth()->user();
        $this->authorize('update', [$product, $user]);
        // $product = Product::findOrFail($id);
        $cats = Category::all();
        return view('products.edit', [
            'product' => $product,
            'cats' => $cats
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    public function update(Product $product, Request $request)
    {

        $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'price' => ['required', 'numeric', 'min:1'],
            'weight' => ['numeric', 'min:1'],
            'quantity' => ['required', 'numeric', 'min:1'],
            'category_id' => ['required'],
            'product_pic' => ['mimes:jpg,png,jpeg,max:5048'],
        ]);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->weight = $request->weight;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;

        if ($request->hasFile('product_pic')) {

            File::delete(public_path("productpic/" . $product->product_pic));

            //            upload new photo
            $newName =  time() . '-' . trim($request['name']) . 'Product' . '.' . $request['product_pic']->guessExtension();
            $request->file('product_pic')->move(public_path('productpic'), $newName);

            //            save to table
            $product->product_pic = $newName;
        }

        $product->update();



        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, User $user)
    {
        $this->authorize('delete', [$product, $user]);
        File::delete(public_path("productpic/" . $product->product_pic));
        $product->delete();

        return redirect()->route('products.index');
    }
}
