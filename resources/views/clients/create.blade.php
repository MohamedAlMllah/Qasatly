@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1> new Client </h1></div>

                <div class="card-body">
                    <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h5 class="mb-1">Client Name</h5>
                        <div class="form-group">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Client Name" value="{{old('name')}}" name="name">
                        </div>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <h5 class="mb-1">Client National ID</h5>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control @error('nationalId') is-invalid @enderror" id="basic-url" aria-describedby="basic-addon3" placeholder="Enter Client National ID" value="{{old('nationalId')}}" name="nationalId">
                        </div>
                        @error('nationalId')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <h5 class="mb-1">Client Phone Number</h5>
                        <div class="form-group">
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="basic-url" aria-describedby="basic-addon3" placeholder="Enter Client Phone Number" value="{{old('phone')}}" name="phone">
                        </div>
                        @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <h5 class="mb-1">Client Address</h5>
                        <div class="form-group">
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="basic-url" aria-describedby="basic-addon3" placeholder="Enter Client Address" value="{{old('address')}}" name="address">
                        </div>
                        @error('address')
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