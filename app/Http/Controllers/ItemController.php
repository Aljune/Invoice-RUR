<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_type' => 'required|max:255',
            'price' => 'required',
            'unit_type' => 'nullable',
            'description' => 'nullable',
        ]);

        $input = $request->all();

        if ($validator->passes()) {

            // Store your user in database 
            $item = new Item();
            $item->name_type = $request->input('name_type');
            $item->price = $request->input('price');
            $item->unit_type = $request->input('unit_type');
            $item->description = $request->input('description');
            $item->save();
            return Response::json(['success' => '1', 'id', $item->id, 'name_type' => $item->name_type, 'price' => $item->price, 'unit_type' => $item->unit_type, 'description' => $item->description ]);
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
