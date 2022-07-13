<h5>Đơn xác nhận mua hàng</h5>
<p>Cảm ơn bạn đã mua hàng tại cửa hàng, bạn hãy kiểm tra lại đơn hàng của mình</p>
<table style="border: 1px solid black">
    <tr style="border: 1px solid black">
        <th style="border: 1px solid black">Tên mặt hàng</th>
        <th style="border: 1px solid black">Số lượng</th>
        <th style="border: 1px solid black">Đơn giá</th>
        <th style="border: 1px solid black">Thành tiền</th>
    </tr>
    @foreach($arrCart['cart'] as $item)
    <tr style="border: 1px solid black">
        <td style="border: 1px solid black">{{ $item['name'] }}</td>
        <td style="border: 1px solid black">{{ $item['quantity'] }}</td>
        <td style="border: 1px solid black">{{ $item['price'] }}</td>
        <td style="border: 1px solid black">{{$item['sum']}}</td>
    </tr>
    @endforeach
</table>
<p>Tổng tiền: {{ $arrCart['sum'] }} vnđ</p>
