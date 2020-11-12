@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h1> عرض تقسيط جديد </h1></div>

                <div class="card-body text-right">
                    <form action="{{ route('installments.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h5 class="mb-1">اسم المنتج</h5>
                        <div class="form-group">
                            <input type="text" class="form-control text-right @error('productName') is-invalid @enderror" placeholder="ادخل اسم المنتج" value="{{old('productName')}}" name="productName">
                        </div>
                        @error('productName')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                        <h5 class="mb-1">نوع العرض</h5>
                        <div class="form-group">
                            <select dir="rtl" class="form-control @error('installmentType') is-invalid @enderror" value="{{old('installmentType')}}" name="installmentType">
                                <option value="معروض للبيع" selected>معروض للبيع</option>
                                <option value="مطوب للشراء">مطلوب للشراء</option>
                            </select>
                        </div>
                        @error('installmentType')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <h5 class="mb-1">نوع العميل</h5>
                        <div class="form-group">
                            <select dir="rtl" class="form-control @error('clientType') is-invalid @enderror" value="{{old('clientType')}}" name="clientType">
                                <option value="user" selected>اونلاين</option>
                                <option value="offline_client">اوفلاين</option>
                            </select>
                        </div>
                        @error('clientType')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <h5 class="mb-1">سعر المنتج </h5>
                        <div class="form-group">
                            <input type="text" class="form-control text-right @error('productPrice') is-invalid @enderror" placeholder="ادخل سعر المنتج كاش" value="{{old('productPrice')}}" name="productPrice">
                        </div>
                        @error('productPrice')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <h5 class="mb-1">قيمة مقدم التقسيط</h5>
                        <div class="form-group">
                            <input type="text" class="form-control text-right @error('advancePayment') is-invalid @enderror" placeholder="ادخل قيمة مقدم التقسيط" value="{{old('advancePayment')}}" name="advancePayment">
                        </div>
                        @error('advancePayment')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <h5 class="mb-1">قيمة القسط</h5>
                        <div class="form-group">
                            <input type="text" class="form-control text-right @error('installmentValue') is-invalid @enderror" placeholder="ادخل قيمة القسط الواحد" value="{{old('installmentValue')}}" name="installmentValue">
                        </div>
                        @error('installmentValue')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <h5 class="mb-1">نوع القسط</h5>
                        <div class="form-group">
                            <select dir="rtl" class="form-control @error('installmentPartition') is-invalid @enderror" value="{{old('installmentPartition')}}" name="installmentPartition">
                                <option value="شهري" selected>شهري</option>
                                <option value="ربع سنوي">ربع سنوي</option>
                                <option value="نصف سنوي">نصف سنوي</option>
                                <option value="سنوي">سنوي</option>
                            </select>
                        </div>
                        @error('installmentPartition')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <h5 class="mb-1">تاريخ بداية القسط</h5>
                        <div class="form-group">
                            <input type="date" class="form-control @error('startingDate') is-invalid @enderror" value="{{old('startingDate')}}" name="startingDate">
                        </div>
                        @error('startingDate')
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