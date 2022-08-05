<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $users = User::where('role', 'vendor')->get();
        $cats = Category::all();
        return view('admin.pages.products.index', [
            'products' => $products,
            'users' => $users,
            'cats' => $cats
        ]);
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
            'name' => ['required', 'min:3', 'max:255'],
            'price' => ['required', 'numeric'],
            'weight' => ['numeric'],
            'quantity' => ['required', 'numeric'],
            'quantity' => ['required'],
            'category_id' => ['required'],
            'product_pic' => ['required', 'mimes:jpg,png,jpeg,max:5048'],
        ]);

        $productPic = $request['product_pic'];
        $productExt = $productPic->guessExtension();
        $productPicName = time() . '-' . trim($request['name']) . 'Product' . '.' . $productExt;
        $productPic->move(public_path('productpic'), $productPicName);


        $product = new Product($request->except('product_pic'));
        $product->user_id = $request->user_id;
        $product->product_pic = $productPicName;
        $product->save();
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'price' => ['required', 'numeric'],
            'weight' => ['numeric'],
            'quantity' => ['required', 'numeric'],
            'quantity' => ['required'],
            'category_id' => ['required'],
            'product_pic' => ['required', 'mimes:jpg,png,jpeg,max:5048'],
        ]);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->weight = $request->weight;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;
        $product->user_id = $request->user_id;

        if ($request->hasFile('product_pic')) {

            File::delete(public_path("productpic/" . $product->product_pic));

            //            upload new photo
            $newName =  time() . '-' . trim($request['name']) . 'Product' . '.' . $request['product_pic']->guessExtension();
            $request->file('product_pic')->move(public_path('productpic'), $newName);

            //            save to table
            $product->product_pic = $newName;
        }

        $product->update();



        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        File::delete(public_path("productpic/" . $product->product_pic));
        $product->delete();

        return redirect()->route('admin.products.index');
    }
}
