<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Installment;
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
    public function create()
    {
        return View('installments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'productName' => 'required|min:3|max:250',
            'installmentType' => 'required|in:معروض للبيع,مطلوب للشراء',
            'clientType' => 'required|in:user,offline_client',
            'productPrice' => 'required|numeric',
            'advancePayment' => 'required|numeric',
            'installmentValue' => 'required|numeric',
            'installmentPartition' => 'required|in:شهري,ربع سنوي,نصف سنوي,سنوي',
            'startingDate' => 'required|date'
        ]);

        $installment = new Installment();
        $installment->created_by = Auth::user()->id;
        $installment->installment_type = $request->installmentType;
        $installment->client_type = $request->clientType;
        $installment->product_name = $request->productName;
        $installment->product_price = $request->productPrice;
        $installment->advance_payment = $request->advancePayment;
        $installment->installment_value = $request->installmentValue;
        $installment->installment_partition     = $request->installmentPartition;
        $installment->starting_date = $request->startingDate;
        $installment->save();
        if ($installment->client_type == 'offline_client') {
        return redirect()->route('installments.clients.create', [$installment->id]);
        }
        return redirect()->route('installments.show', [$installment->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Installment  $installment
     * @return \Illuminate\Http\Response
     */
    public function show(Installment $installment)
    {
        return view('installments.show', ['installment' =>  $installment]);
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
