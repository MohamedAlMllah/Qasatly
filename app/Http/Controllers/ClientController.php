<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Resources\clientResource;
use App\Http\Resources\clientResourceCollection;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): clientResourceCollection
    {
        return new clientResourceCollection(Client::paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('clients.create');
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
            'name' => 'required|min:3|max:250',
            'nationalId' => 'required|digits:14',
            'phone' => 'required|digits:11|starts_with:010,011,012,015',
            'address' => 'required|min:3|max:250',
        ]);

        $client = new Client();
        $client->full_name = $request->name;
        $client->national_id = $request->nationalId;
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->save();
        return new clientResource($client);
        //return redirect()->route('clients.installments.create', $client->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client): clientResource
    {
        return new clientResource($client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|min:3|max:250',
            'nationalId' => 'required|digits:14',
            'phone' => 'required|digits:11|starts_with:010,011,012,015',
            'address' => 'required|min:3|max:250',
        ]);

        $request->name?$client->full_name = $request->name:"";
        $request->nationalId?$client->national_id = $request->nationalId:"";
        $request->phone?$client->phone = $request->phone:"";
        $request->address?$client->address = $request->address:"";
        $client->save();
        return new clientResource($client);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return response()->json();
    }
}
