@extends('page.index')
@section('content')
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản Phẩm Của Chúng Tôi</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*"><a href="{{ route('home') }}">Trái cây</a></li>
                            <li data-filter=".fresh-meat"><a href="{{ route('home.thit') }}">Thịt</a></li>
                            <li data-filter=".oranges"><a href="{{ route('home.haisan') }}">Hải sản</a></li>
                            <li data-filter=".fresh-meat"><a href="{{ route('home.donglanh') }}">Đông lạnh</a></li>
                            <li data-filter=".vegetables"><a href="{{ route('home.goihang') }}">Gói hàng</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-2">
                    <h2>Kết quả tìm kiếm : <span class="text-danger">{{$_GET['search']}}</span></h2>
                </div>
                @foreach ($data as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="{{ asset("/imgUploads/$item->img1")}}">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="{{ route('home.product', $item->id) }}"><i class="fa fa-eye blue-color"></i></a></li>
                                    {{-- <li><a href="#"><i class="fa fa-retweet"></i></a></li> --}}
                                    <li><a href="{{ route('home.themcart', [Auth::user()->id,$item->id]) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="{{ route('home.product', $item->id) }}"><b>{{$item->name}}</b></a></h6>
                                <h5 class="">Còn lại: <span class="text-primary">{{$item->amount}}</span>kg - <span class="text-primary">{{($item->price)}} VNĐ</span>/kg</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div style="display: flex; justify-content: center;" class=" mb-2">
        {{$data->appends(request()->all())->links()}}
    </div>
@endsection
