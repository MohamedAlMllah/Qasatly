@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1> new installment </h1></div>

                <div class="card-body">
                    <form action="{{ route('clients.installments.store',$client->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h5 class="mb-1">Product Name</h5>
                        <div class="form-group">
                            <input type="text" class="form-control @error('productName') is-invalid @enderror" placeholder="Enter Product Name" value="{{old('productName')}}" name="productName">
                        </div>
                        @error('productName')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                        <h5 class="mb-1">Product Price</h5>
                        <div class="form-group">
                            <input type="text" class="form-control @error('productPrice') is-invalid @enderror" id="basic-url" aria-describedby="basic-addon3" placeholder="Enter Product Price" value="{{old('productPrice')}}" name="productPrice">
                        </div>
                        @error('productPrice')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <h5 class="mb-1">Advance Payment</h5>
                        <div class="form-group">
                            <input type="text" class="form-control @error('advancePayment') is-invalid @enderror" id="basic-url" aria-describedby="basic-addon3" placeholder="Enter Advance Payment" value="{{old('advancePayment')}}" name="advancePayment">
                        </div>
                        @error('advancePayment')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <h5 class="mb-1">Installment Value</h5>
                        <div class="form-group">
                            <input type="text" class="form-control @error('installmentValue') is-invalid @enderror" id="basic-url" aria-describedby="basic-addon3" placeholder="Enter Installment Vaalue" value="{{old('installmentValue')}}" name="installmentValue">
                        </div>
                        @error('installmentValue')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <h5 class="mb-1">Installment Type</h5>
                        <div class="form-group">
                            <select class="form-control @error('installmentType') is-invalid @enderror" value="{{old('installmentType')}}" name="installmentType">
                                <option value="month" selected>Month</option>
                                <option value="qurter">Quarter</option>
                                <option value="halfYear">Half-Year</option>
                                <option value="year">Year</option>
                            </select>
                        </div>
                        @error('installmentType')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <h5 class="mb-1">Starting Date</h5>
                        <div class="form-group">
                            <input type="date" class="form-control @error('startingDate') is-invalid @enderror" value="{{old('startingDate')}}" name="startingDate">
                        </div>
                        @error('startingDate')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-outline-success" style="width: 40%">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection