<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products = auth()->user()->products;
        $products = Product::all();
        return $products;
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
            'category_id' => ['required'],
            'product_pic' => ['required', 'mimes:jpg,png,jpeg,max:5048'],
        ]);


        $productPic = $request->file('product_pic');
        $productExt = $productPic->guessExtension();
        $productPicName = time() . '-' . trim($request['name']) . 'Product' . '.' . $productExt;
        // dd($productPicName);
        // $path = $productPic->storeAs(
        //     'testingimage',
        //     $productPicName
        // );
        // dd($path);
        $productPic->move(public_path('productpic'), $productPicName);
        // dd($productPic);

        $product = new Product($request->except('product_pic'));
        $product->user_id = 1;
        $product->product_pic = $productPicName;
        // dd($product);
        $product->save();
        return response()->json([
            "msg" => "created succusfully",
            'product' => $product
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, $id)
    {
        $sProduct = Product::findOrFail($id);
        return  $sProduct;
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

    public function testss(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        // dd($request->all());

        $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'price' => ['required', 'numeric'],
            'weight' => ['numeric'],
            'quantity' => ['required', 'numeric'],
            'category_id' => ['required'],
            'product_pic' => ['required', 'mimes:jpg,png,jpeg,max:5048'],
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



        return response()->json([
            "msg" => "updated succusfully"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $product = Product::findOrFail($id);
        // dd($request->all());
        // dd($request->hasFile('product_pic'));
        $test = file_get_contents('php://input');
        var_dump($test);

        $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'price' => ['required', 'numeric'],
            'weight' => ['numeric'],
            'quantity' => ['required', 'numeric'],
            'category_id' => ['required'],
            'product_pic' => ['required', 'mimes:jpg,png,jpeg,max:5048'],
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



        return response()->json([
            "msg" => "updated succusfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)

    {
        $sProduct = Product::findOrFail($id);
        $deleted = $sProduct->delete();


        if ($deleted) {
            return response()->json([
                "msg" => "deleted succusfully",
                "code" => 200
            ]);
        };
    }
}
