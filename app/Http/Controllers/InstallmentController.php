<?php

namespace App\Http\Controllers;

use App\Installment;
use App\Client;
use Illuminate\Http\Request;

class InstallmentController extends Controller
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
    public function create(Client $client)
    {
        return View('installments.create',['client' => $client]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Client $client, Request $request)
    {
        $request->validate([
            'productName' => 'required|min:3|max:250',
            'productPrice' => 'required|numeric',
            'advancePayment' => 'required|numeric',
            'installmentValue' => 'required|numeric',
            'installmentType' => 'required|in:month,qurter,halfYear,year',
            'startingDate' => 'required|date'
        ]);

        $installment = new Installment();
        $installment->client_id = $client->id;
        $installment->product_name = $request->productName;
        $installment->product_price = $request->productPrice;
        $installment->advance_payment = $request->advancePayment;
        $installment->installment_value = $request->installmentValue;
        $installment->installment_type = $request->installmentType;
        $installment->starting_date = $request->startingDate;
        $installment->save();
        return redirect()->route('clients.installments.show', [$client->id, $installment->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Installment  $installment
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client, Installment $installment)
    {
        return view('installments.show', ['client' =>  $client, 'installment' =>  $installment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Installment  $installment
     * @return \Illuminate\Http\Response
     */
    public function edit(Installment $installment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Installment  $installment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Installment $installment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Installment  $installment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Installment $installment)
    {
        //
    }
}
