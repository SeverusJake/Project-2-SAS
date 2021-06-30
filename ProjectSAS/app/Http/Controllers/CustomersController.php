<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomersRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomersController extends Controller
{

    public function index()
    {
        $customers = DB::table('customers')->get();
        return view('customers.index')->with([
            'customers'=>$customers
        ]);

    }

    public function create(){
        return view('customers.create')->with([
            'customers'=> '',
        ]);;
    }
    public function store(CustomersRequest $request){
        $name = $request->input('txtname');
        $tax = $request->input('txttax');
        $address = $request->input('txtaddress');
        $phone = $request->input('txtphone');
        $email = $request->input('txtemail');
        $unpaid = $request->input('txtunpaid');
        $description = $request->input('txtdescription');
        DB::table('customers')->insert([
            'customerName' => $name,
            'TaxNumber' => $tax,
            'address'=> $address,
            'phone'=> $phone,
            'email'=> $email,
            'unpaid'=> $unpaid,
            'status'=>true,
            'description'=>$description
        ]);
        return redirect()->action('CustomersController@index');
    }
    public function update($id){
        $customers = DB::table('customers')
                ->where(['customerID'=> $id])
                ->first();
        return view('customers.update')->with([
            'customers'=> $customers,
        ]);
    }
    public function destroy($id){
        DB::table('customers')
        ->where('customerID',intval($id))
        ->delete();
        return redirect()->action('CustomersController@index');
    }
}
