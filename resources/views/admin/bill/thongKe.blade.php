@extends('admin.index')
@section('content')
    <!-- MAIN CONTENT-->
    <div style="display: flex; justify-content: space-between;">
        <h2 class="title-5 m-b-35 bg-primary">Danh sách thống kê doang thu sản phảm bán chạy nhất</h2>
    </div>
    <form action="{{ route('admin.thongKe') }}" method="GET" role="search">
        <div class="input-group">
            <div class="row">
                <div class="col-4">
                    <input type="date" class="form-control mr-2" name="start_date" placeholder="Ngày bắt đầu" id="start_date" style="width: 160px" value="{{request('start_date')}}">
                </div>
                <div class="col-4">
                    <input type="date" class="form-control mr-2" name="end_date" placeholder="Ngày kết túc" id="end_date" style="width: 160px" value="{{request('end_date')}}">
                </div>
                <div class="col-2">
                    <span class="input-group-btn mr-5 mt-1">
                        <button class="btn btn-info" type="submit" title="Search projects">
                            <span class="fas fa-search"></span>
                        </button>
                    </span>
                </div>
                <div class="col-2">
                    <a class="clear btn btn-dark float-left text-white" onclick="myFunction()">clear</a>
                </div>
            </div>
        </div>
    </form>

    <table class="table table-data2">
        <thead>
        <tr>
            <th>top sản phẩm bán chạy</th>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>số lượng nhập</th>
            <th>số lượng bán</th>
            <th>Tổng tiền sản phẩm đã bán</th>
        </tr>
        </thead>
        <tbody>
        @php
        $stt = 1;
        @endphp
        @foreach ($data as $item)
            <tr class="tr-shadow">
                <td>{{$stt++}}</td>
                <td>{{$item->idProduct}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->amount}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->total_product}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div style="display: flex; justify-content: space-between;margin-top: 30px">
        <h2 class="title-5 m-b-35 bg-primary">Danh sách tổng thu nhập</h2>
    </div>

    <table class="table table-data2">
        <thead>
        <tr>
            <th>Tổng số lượng bill</th>
            <th>Tổng số lượng sản phẩm đã bán</th>
            <th>Tổng số tiền đã bán</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($dataTotal as $item)
            <tr class="tr-shadow">
                <td>{{$item->total_quantity}}</td>
                <td>{{$item->total_quantity}}</td>
                <td>{{$item->total_price_bill}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
    <script>
        function myFunction() {
            $('.start_date').val('');
            $('.end_date').val('');
            window.location.href =  window.location.href.split("?")[0];
        }
    </script>
@stop()
