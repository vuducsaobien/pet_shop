@extends('admin.main')

@section('content')
    {!! Charts::styles() !!}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Thống kê số đơn đặt hàng</div>

                    <div class="panel-body">
                        {!! $chart->html() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Thống kê số lượng bài viết mỗi table</div>

                    <div class="panel-body">
                        {!! $chart2->html() !!}
                    </div>
                </div>
            </div>
        </div>

    {!! Charts::scripts() !!}
    {!! $chart->script() !!}
    {!! $chart2->script() !!}
@endsection