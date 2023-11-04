<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;

class checkOutController
{
    public function checkout(Request $request)
    {
        $data = $request ->validate([
           'user_id' =>'required',
           'total' => 'required',
           'status'=>'required',
           'address'=>'required',
            'date'=>'required',
            'product' =>'required|array'
        ]);
        $order = Order::create([
            'user_id'=>$data['user_id'],
            'total'=>$data['total'],
            'status'=>$data['status'],
            'address'=>$data['address'],
            'date'=>$data['date'],
        ]);
        foreach ($data['product'] as $productData) {
            OrderDetails::create([
                'order_id' => $order->id, // Use the newly created order's ID
                'product_id' => $productData['id'],
                'quantity' => $productData['quantity'],
            ]);
        }
        foreach ($data['product'] as $orderItem){
            $productID =$orderItem['id'];
            $quantity = $orderItem['quantity'];

            $product = Product::find($productID);
            if($product){
                $newStock = $product->stock - $quantity;
                $product->stock = $newStock;
                $product->save();
            }
        }
         Payment::create([
            'order_id'=>$order->id,
            'amount' => $data['total']
        ]);
        return response()->json(['message','Order created successful'],201);
    }

}
