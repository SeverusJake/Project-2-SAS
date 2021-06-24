<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomersRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomersController extends Controller
{

    public function listCustomer()
    {
        $customers = DB::table('customers')->get();
        return view('customers.index')->with([
            'customers'=>$customers
        ]);

    }
    public function searchCustomer(Request $request){
        $searchParam = $request->input('txtSearch');
        $customers = DB::table('customers')
                ->where('customerName', 'LIKE', '%'.$searchParam.'%')
                ->get();
        return view('customers.index')->with(['customers'=>$customers]);
    }

    public function addCustomer(){
        return view('customers.create')->with([
            // 'isUpdate'=>false,
            'customers'=> '',
        ]);;
    }
    public function createCustomer(CustomersRequest $request){
        $name = $request->input('txtname');
        $tax = $request->input('txttax');
        $address = $request->input('txtaddress');
        $phone = $request->input('txtphone');
        $email = $request->input('txtemail');
        // $role = $request->input('txtrole');
        $unpaid = $request->input('txtunpaid');
        $description = $request->input('txtdescription');
        DB::table('customers')->insert([
            'customerName' => $name,
            'TaxNumber' => $tax,
            'address'=> $address,
            'phone'=> $phone,
            'email'=> $email,
            // 'role'=> $role,
            'unpaid'=> $unpaid,
            'status'=>true,
            'description'=>$description
        ]);
        return redirect()->action('CustomersController@listCustomer');
    }
    public function update($id){
        $customers = DB::table('customers')
                ->where(['customerID'=> $id])
                ->first();
        return view('customers.update')->with([
            // 'isUpdate'=>true,
            'customers'=> $customers,
        ]);
    }
    public function delete($id){
        DB::table('customers')
        ->where('customerID',intval($id))
        ->delete();
        return redirect()->action('CustomersController@listCustomer');
    }
}
