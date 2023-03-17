<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('invoice.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'phone_number' => 'required',
        //     'address' => 'required',
        //     'email' => 'required|email',
        // ]);
        
        // return Customer::create([
        //     'name' => $request['name'],
        //     'phone_number' => $request['phone_number'],
        //     'address' => $request['address'],
        //     'email' => $request['email'],
        // ]);

        // $request->validated($request->all());

        // Customer::create([
        //     'name'=> $request->name,
        //     'phone_number'=> $request->phone_number,
        //     'address' => $request->address,
        //     'email' => $request->email
        // ]);
        // return view('invoice.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'phone_number' => 'required',
            'address' => 'required',
            'email' => 'required|email|max:255|unique:users',
        ]);

        $input = $request->all();

        if ($validator->passes()) {

            // Store your user in database 
            $customer = new Customer;
            $customer->name = $request->input('name');
            $customer->phone_number = $request->input('phone_number');
            $customer->address = $request->input('address');
            $customer->email = $request->input('email');
            $customer->save();

            return Response::json(
                [
                    'success' => '1', 
                    'id' => $customer->id, 
                    'name' => $customer->name, 
                    'phone_number' => $customer->phone_number, 
                    'address' => $customer->address, 
                    'email' => $customer->email,
                    'URL' => '/invoice/create'
                ]
            )->with('customers', $customers);
            
        }
        return Response::json(['errors' => $validator->errors()]);

    }
    /**
     * Display the specified resource.
     */
    public function latestCustomer()
    {
        $customerVal = Customer::latest()->first();
        return response()->json($customerVal);
        // dd($customer);
        // return view('invoice.create')->with('cust', $customerVal);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
