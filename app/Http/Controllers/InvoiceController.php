<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller
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
        return view('invoice.index');
    }

     /**
     * Display a listing of the resource.
     */
    public function getSelectedCustomer($id)
    {
        // $id = $request->id;
        $customer = Customer::find($id);
        return response()->json($customer);

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        $customers->fresh();

        return view('invoice.create')->with('customers', $customers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'invoice_id_number' => 'required|unique:invoices',
            'due_date' => 'nullable',
            'item_id' => 'nullable',
            'customer_id' => 'nullable',
            'description' => 'nullable',
        ]);

        $input = $request->all();

        if ($validator->passes()) {

            // Store your user in database 
            $invoice = new Invoice;
            $invoice->title = $request->input('title');
            $invoice->invoice_id_number = $request->input('invoice_id_number');
            $invoice->due_date = $request->input('due_date');
            $invoice->item_id = $request->input('item_id');
            $invoice->customer_id = $request->input('customer_id');
            $invoice->description = $request->input('description');

            $invoice->save();
            
            
            $invoiceLater = Invoice::latest()->first();

            return Response::json(
                [
                    'success' => '1', 
                    'id' => $invoiceLater->id, 
                    'title' => $invoiceLater->title, 
                    'invoice_id_number' => $invoiceLater->invoice_id_number, 
                    'due_date' => $invoiceLater->due_date, 
                    'item_id' => $invoiceLater->item_id, 
                    'customer_id' => $invoiceLater->customer_id, 
                    'description' => $invoiceLater->description,
                    'URL' => '/invoice/edit/'.$invoiceLater->id,
                ]
            );
        }
        return Response::json(['errors' => $validator->errors()]);
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
    public function edit($id)
    {
        $invoice = Invoice::find($id);
        $customers = Customer::all();
        $customers->fresh();
        $seletedCustomer = Customer::find($invoice->customer_id);
        return view('invoice.edit')->with('customers', $customers)->with('invoice', $invoice)->with('selectedCustomer', $seletedCustomer);
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
