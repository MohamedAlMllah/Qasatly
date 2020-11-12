<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Client;
use App\Installment;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $installments = Installment::all()->where('created_by', Auth::id())->sortByDesc('updated_at');
        return view('home', ['installments'  => $installments]);
    }
}
