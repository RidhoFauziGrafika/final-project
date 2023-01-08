<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $field = Field::findOrFail($id);
        return view('order/create', compact('field'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fields_id' => 'required|numeric|exists:fields,id',
            'total_harga' => 'required',
            'tanggal_pemesanan' => 'required|date|after:yesterday',
            'nama' => 'max:255',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required|after:waktu_mulai',
        ]);

        $validatedData['users_id'] = Auth::id();

        $validatedData['total_harga'] =  $request->total_harga * (Carbon::createFromFormat('H:i:s', $request->waktu_selesai)->format('H') - Carbon::createFromFormat('H:i:s', $request->waktu_mulai)->format('H'));

        Order::create($validatedData);
        return redirect('/')->with('success', 'Order Successfully Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
