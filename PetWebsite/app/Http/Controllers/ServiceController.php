<?php

namespace App\Http\Controllers;

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

        ]);
        $service = Service::create([
            'user_id'=>$data['user_id'],
             'Type_service'=>$data['typeService'],
            'Date'=>$data['appointmentDate'],
            'Time'=>$data['appointmentTime'],
            'Type_pet'=>$data['typePet'],
            'Number_of_pet'=>$data['numberPet'],
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

}
