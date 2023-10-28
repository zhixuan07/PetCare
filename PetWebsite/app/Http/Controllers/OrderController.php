<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

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
    public function updateStatus(Request $request, $order_id)
    {
        $order = Order::find($order_id);
        if(!$order)
        {
            return response() ->json(['message'=>'Order not found']);
        }

        $validatedData =$request-> validate([
            'status'=>'required|in:Pending,Processing,Shipped,Delivered',
        ]);

        $order ->status =$validatedData['status'];
        $order ->save();
        return response() ->json(['message'=>'Order update successfully']);
    }
    public function getTodayOrder()
    {
        $today = Carbon::today();
        $today_order = Order::whereDate('date',$today)->count();
        return response() ->json(['today_order'=>$today_order]);
    }

    public function getTotalOrder()
    {
        $order = Order::count();
        return response() ->json(['total_order'=> $order]);
    }
    public function getTodayRevenue()
    {
        $today = Carbon::today();
        $order = Order::whereDate('date',$today)->get();
        $today_revenue = $order->sum('total');
        return response() ->json(['today_revenue'=> $today_revenue]);
    }
    public function getTotalRevenue()
    {
        $currentYear = Carbon::now()->year;

        $order = Order::whereYear('date',$currentYear)->get();
        $order_total = $order->sum('total');
        return response()->json(['total_revenue' =>$order_total]);

    }
    public function getTodayOrderChart()
    {
        $today = Carbon::today();
        $categories =DB::table('orders')
        ->join('order_details','order_details.order_id','=','orders.id')
            ->join('products','order_details.product_id','=','products.id')
            ->select('products.category',DB::raw('sum(order_details.quantity) as total'))
            ->whereDate('orders.date',$today)
            ->groupBy('products.category')
            ->get();
        if($categories ->isNotEmpty() ){
            return $categories;
        }else{
            return response()->json(['Message'=>'No order today']);
        }


    }

    public function  getTotalRevenueChart()
    {
        $revenue_by_year = Order::select(
            DB::raw('YEAR(date) as years'),
            DB::raw('SUM(total) as total')

        )-> groupby('years')->get();
        return $revenue_by_year;
    }
    public  function getTotalSalesByCategoryYearChart()
    {
        $total_sales_by_categories_year = DB ::table('orders')
            ->join('order_details','order_details.order_id','=','orders.id')
            ->join('products','products.id','=','order_details.product_id')
            ->select('order_details.quantity','products.category',DB::raw('YEAR(orders.date) as years'))
            ->get();
        return $total_sales_by_categories_year;
    }




}
