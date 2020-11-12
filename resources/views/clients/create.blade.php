@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h1> عميل جديد </h1></div>

                <div class="card-body text-right">
                    <form action="{{ route('installments.clients.store', [$installment->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h5 class="mb-1">اسم العميل</h5>
                        <div class="form-group">
                            <input type="text" class="form-control text-right @error('name') is-invalid @enderror" placeholder="ادخل اسم العميل" value="{{old('name')}}" name="name">
                        </div>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <h5 class="mb-1">الرقم القومي</h5>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-right @error('nationalId') is-invalid @enderror" placeholder="ادخل الرقم القومي للعميل" value="{{old('nationalId')}}" name="nationalId">
                        </div>
                        @error('nationalId')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <h5 class="mb-1">رقم هاتف</h5>
                        <div class="form-group">
                            <input type="text" class="form-control text-right @error('phone') is-invalid @enderror" placeholder="ادخل رقم هاتف العميل" value="{{old('phone')}}" name="phone">
                        </div>
                        @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <h5 class="mb-1">العنوان</h5>
                        <div class="form-group">
                            <input type="text" class="form-control text-right @error('address') is-invalid @enderror" placeholder="ادخل عنوان العميل" value="{{old('address')}}" name="address">
                        </div>
                        @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-outline-success" style="width: 40%">تأكيد</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection