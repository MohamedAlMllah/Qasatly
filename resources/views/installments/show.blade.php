@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1> {{$installment->product_name}} </h1>
                </div>

                <div class="card-body">
                    <h3> Client Name : {{ $installment->client-> full_name }} </h3>
                    <h3> product price : {{ $installment-> product_price }} </h3>
                    <h3> advance payment : {{ $installment-> advance_payment }} </h3>
                    <h3> cash per {{ $installment-> installment_type }} : {{ $installment-> installment_value }} </h3>
                    <h3> number of installments : {{ ($installment->product_price - $installment->advance_payment) / $installment->installment_value }} </h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection