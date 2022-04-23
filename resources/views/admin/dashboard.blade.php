@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card ">
                        <div class="header">
                            <h3 align="center">Hóa đơn</h3>
                        </div>
                        <div class="content">
                            <div class="row">
                                <div class="col-md-10">
                                    <h4 class="title">Tổng số đơn hàng {{ $total_invoice }}</h4>
                                    <h4 class="title">
                                        Số đơn hàng đã xử lý
                                        <a href="{{ URL::to('/invoice-processed') }}">{{ $total_invoice_processed }}</a>
                                    </h4>
                                    <h4 class="title">Số đơn hàng chưa xử lý <a
                                            href="{{ URL::to('/invoice-notprocessed') }}">{{ $total_invoice_notprocessed }}</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card ">
                        <div class="header">
                            <h3 align="center">Hóa đơn</h3>
                        </div>
                        <div class="content">
                            <div class="row">
                                <div class="col-md-10">
                                    <h4 class="title">Tổng số đơn hàng {{ $total_invoice }}</h4>
                                    <h4 class="title">
                                        Số đơn hàng đã xử lý
                                        <a href="{{ URL::to('/invoice-processed') }}">{{ $total_invoice_processed }}</a>
                                    </h4>
                                    <h4 class="title">Số đơn hàng chưa xử lý <a
                                            href="{{ URL::to('/invoice-notprocessed') }}">{{ $total_invoice_notprocessed }}</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Email Statistics</h4>
                            <p class="category">Last Campaign Performance</p>
                        </div>
                        <div class="content">
                            <div id="chartEmail" class="ct-chart "></div>
                        </div>
                        <div class="footer">
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i> Open
                                <i class="fa fa-circle text-danger"></i> Bounce
                                <i class="fa fa-circle text-warning"></i> Unsubscribe
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-clock-o"></i> Campaign sent 2 days ago
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
