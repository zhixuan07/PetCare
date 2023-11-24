<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Service;
use App\Models\ServicePayment;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function serviceCheckout(Request $request){
        $data = $request ->validate([
            'user_id' =>'required',
            'total' => 'required',
            'status'=>'required',
            'appointmentDate'=>'required',
            'appointmentTime'=>'required',
            'typeService'=>'required',
            'typePet'=>'required',
            'numberPet'=>'required',
            'name'=>'required'

        ]);
        $service = Service::create([
            'user_id'=>$data['user_id'],
             'Type_service'=>$data['typeService'],
            'Date'=>$data['appointmentDate'],
            'Time'=>$data['appointmentTime'],
            'Type_pet'=>$data['typePet'],
            'Number_of_pet'=>$data['numberPet'],
            'Status' =>$data['status'],
            'Name' =>$data['name']
        ]);
        ServicePayment::create([
            'service_id'=>$service->id,
            'amount'=>$data['total']
        ]);
        return response()->json(['message','Service Appointment created successful'],201);
    }
    public function showAllService(){
        $services = Service::all();
        return response()->json(['services' => $services]);

    }
    public function updateAppointment(Request $request,$id){
        $service= Service::find($id);
        if(!$service)
        {
            return response() ->json(['message'=>'Order not found']);
        }

        $validatedData =$request-> validate([
            'status'=>'required|in:Pending,Processing,Completed',
        ]);

        $service ->Status =$validatedData['status'];
        $service ->save();
        return response() ->json(['message'=>'Appointment update successfully']);
    }
    public function cancelAppointment($id)
    {
        $service = Service::find($id);

        if($service)
        {

            $service->Status ='Cancelled';
            $service->save();



            return response(['message'=>'Appointment Cancelled']);

        }else{
            return response()->json(['message'=>'Appointment not Found']);
        }
    }
    public function getUserAppointment($id)
    {
        $appointment = Service::where('user_id',$id)->get();
        if (!$appointment){
            return respone()->json(['Message','Appointment not found']);
        }else{
            return response()->json(['Appointment'=>$appointment]);
        }

    }

}
