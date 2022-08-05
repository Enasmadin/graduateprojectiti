<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $orders = Order::where('vendor_id', $userId)->orWhere('delivery_id', $userId)->get();
        // dd($orders);
        return view("orders.index", [
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('orders.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // vendor_id, Dilevery_id, post_id, client_id
        $commentId = $request['commentid'];
        $comment = Comment::find($commentId);
        $vendorId = $comment->post->user->id;
        $deliveryId = $comment->user->id;
        $postId = $comment->post->id;
        $clientId = $comment->post->client->id;


        $order = new Order;
        $order->vendor_id = $vendorId;
        $order->delivery_id = $deliveryId;
        $order->post_id = $postId;
        $order->client_id = $clientId;
        $order->comment_id = $commentId;
        $order->save();
        return redirect()->route("orders.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        // dd($order);
        return view('orders.show', [
            'order' => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $order = Order::findOrFail($id);

        // dd($order);



        // if ($order) {
        //     return redirect()->route('orders.show');
        // }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        // $order->delete();

        // return redirect()->route('orders.index');
    }
}
