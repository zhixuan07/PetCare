<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showAllOrders()
    {
        $orders = Order::with('user')->get();

        return response()->json(['orders' => $orders]);

    }
    public function showOrderDetails($order_id)
    {
        $orderDetails = OrderDetails::with('product')->where('order_id',$order_id) ->get();
        return response()->json(['order_details'=>$orderDetails]);
    }
    public function deleteOrder($order_id)
    {
        $order = Order::find($order_id);
        if($order)
        {
            $order->status ='Cancelled';
            $order->save();
            return response(['message'=>'Order Cancelled']);

        }else{
            return response()->json(['message'=>'Order not Found']);
        }

    }
}
