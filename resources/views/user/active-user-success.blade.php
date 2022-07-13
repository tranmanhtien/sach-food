@extends('page.index')
@section('title','Sạch food - Kích hoạt tài khoản thành công')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="active-success" style="text-align: center">
                    <p>Tài khoản của bạn đã kích hoạt thành công</p>
                    <a href="{{route('home')}}" class="btn btn-primary">Trang chủ</a>
                </div>
            </div>
        </div>
    </div>
@endsection