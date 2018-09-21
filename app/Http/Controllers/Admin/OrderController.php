<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Http\Requests\Admin\EditOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::withCount('orderDetails')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pages.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $order = Order::with(['user','orderDetails.product:id,name,price'])->find($id);
        return view('admin.pages.orders.show', compact('order'));
    }

    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Http\Requests\CreateUserRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param App\Models\User $user user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     * @param App\Models\User          $user    user
     *
     * @return \Illuminate\Http\Response
     */
    public function update(EditOrderRequest $request, Order $order)
    {
        // $data = $request->all();
        // dd($data);
        try {
                $order->status = $request->status;
            
            $order->save();
            return redirect()->route('admin.orders.show', $order->id)->with('message', __('order.admin.message.edit'));
        } catch (Exception $ex) {
            return redirect()->route('admin.orders.show', $order->id)->with('message', __('order.admin.message.edit_fail'));
        }
    }
    
    /**
      * Remove the specified resource from storage.
      *
      * @param App\Models\User $user user
      *
      * @return \Illuminate\Http\Response
      */
    public function destroy(Order $order)
    {
        try {
            $order->orderDetails()->delete();
            $order->delete();
            return redirect()->route('admin.orders.index')->with('message', __('order.admin.message.del'));
        } catch (Exception $ex) {
            return redirect()->route('admin.orders.index')->with('message', __('order.admin.message.del_fail'));
        }
    }
}
