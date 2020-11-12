@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h1> {{$installment->product_name}} </h1>
                </div>

                <div class="card-body text-right">
                    <h3> سعر المنتج : {{ $installment-> product_price }} جنيه </h3>
                    <h3> مقدم التقسيط : {{ $installment-> advance_payment }} جنيه </h3>
                    <h3> قسط {{ $installment-> installment_partition }} : {{ $installment-> installment_value }} جنيه </h3>
                    <h3> عدد الاقساط : {{ ($installment->product_price - $installment->advance_payment) / $installment->installment_value }} </h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection