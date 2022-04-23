@extends('layout')
@section('content')
    @if ($cash)
        <div class="review-payment">
            <h2>Cảm ơn bạn đã đặt hàng bên phía chúng tôi</h2>
            <h2>Đã đặt hàng thành công, chúng tôi sẽ xử lý đơn hàng của bạn sớm nhất có thể</h2>
            <h2>Bạn có thể xem lại đơn hàng của mình tại <a href="{{ URL::to('/invoice-history-detail', $id) }}">đây</a>
            </h2>

        </div>
    @else
        <div class="review-payment">
            <h2>Cảm ơn bạn đã đặt hàng bên phía chúng tôi</h2>
            <h2>Đã đặt hàng thành công,bạn vui lòng chuyển khoản theo số tài khoản dưới đây, chúng tôi sẽ xử lý đơn hàng của
                bạn sớm nhất có thể</h2>
            <div class="row">
                <div class="col-xs-12 col-md-6" style="border-style: solid;border-width: medium;border-color: red">
                    <strong>
                        <p style="margin: 10px 0 10px">Số tài khoản: 0201000720198</p>
                        <p>Ngân hàng: Ngân hàng TMCP Ngoại thương Việt Nam(Vietcombank )</p>
                        <p>Tên tài khoản: Nguyễn Minh Hiếu</p>
                    </strong>
                </div>
            </div>
            <h2>Bạn có thể xem lại đơn hàng của mình tại <a href="{{ URL::to('/invoice-history-detail', $id) }}">đây</a>
            </h2>
    @endif
@endsection
