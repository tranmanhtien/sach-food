@extends('page.index')
@section('content')
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('./homepage/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Thông tin đặt hàng</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Nhập Thông Tin Để Đặt Hàng</h4>
            <form action="{{ route('home.postthanhtoan') }}" method="POST" enctype="multipart/form-data" class="form-horizontal" id="form-payment">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Họ Và Tên Của Bạn<span>*</span></p>
                                    <input type="text" name="name" id="name-payment">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Địa chỉ chi tiết người nhận<span>*</span></p>
                            <input type="text" name="sonha" id="apartment-number-payment" placeholder="Số nhà - Tên đường" class="checkout__input__add">
                            @error('sonha')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                            <input type="text" name="xa" id="address-payment" placeholder="Thôn - xã - thị trấn">
                            @error('xa')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="checkout__input">
                            <p>Quận/Huyện<span>*</span></p>
                            <input type="text" name="huyen" id="district-payment">
                            @error('huyen')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="checkout__input">
                            <p>Tỉnh/Thành phố<span>*</span></p>
                            <input type="text" name="tinh" id="city-payment">
                            @error('tinh')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Số Điện Thoại (<span>Ví dụ: 0372868***</span>)</p>
                                    <input type="text" name="numberPhone" id="phone-payment">
                                    @error('numberPhone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" name="email" id="email-payment" value="{{Auth::user()->email}}">
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Sản Phẩm Của Bạn</h4>
                            <div class="checkout__order__products">Sản phẩm <span>Tiền</span></div>
                            <ul>
                                @foreach ($data as $item)
                                @foreach ($products as $pro)
                                @if ($pro->id == $item->idProduct)
                                <li>{{$pro->name}}: {{$item->amount}} <span>{{($item->amount*$pro->price)}} vnđ</span></li>
                                @endif
                                @endforeach
                                @endforeach
                            </ul>
                            <div class="checkout__order__total">Tổng tiền <span>{{($total)}} vnđ</span></div>
                            <input type="hidden" name="price" value="{{$total}}" id="total-payment">
                            <input type="hidden" name="data" value="{{ $data }}" id="data-payment-detail">
                            <input type="radio" name="payoff_method" value="0" checked>
                            <label for="html">Thanh toán khi nhận hàng</label><br>
                            <input type="radio"  name="payoff_method" value="1">
                            <label for="html">Thanh toán Paypal</label><br>
                            <div id="paypal-button-container"></div>
                            <div id="message-error" style="color: red"></div>        
                    

                            <button type="submit" class="site-btn" id="btn-payment">Thanh toán</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<form method="POST" action="" id="formDelete">
    @csrf @method('DELETE')
</form>
<!-- Blog Section End -->
@endsection