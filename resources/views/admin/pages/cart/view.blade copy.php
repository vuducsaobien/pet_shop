@extends('admin.main')
@php
    use App\Helpers\Template;

    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttr = config('zvn.template.form_label');
    $formCkeditor  = config('zvn.template.form_ckeditor');
@endphp

@section('content')
    @include ('admin.templates.page_header', ['pageIndex' => false])
    @include ('admin.templates.error')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.templates.x_title', ['title' => 'Thông tin khách hàng'])
                <div class="x_content">

                    <div class="col-md-8 col-lg-8 col-sm-7">
                        <blockquote>
                           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
                              posuere erat a ante Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
                           </p>
                           <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>
                        <blockquote class="blockquote-reverse">
                           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
                              posuere erat a ante Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
                           </p>
                           <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>
                     </div>
                     <div class="col-md-4 col-lg-4 col-sm-5">
                        <h1>h1. Bootstrap heading</h1>
                        <h2>h2. Bootstrap heading</h2>
                        <h3>h3. Bootstrap heading</h3>
                        <h4>h4. Bootstrap heading</h4>
                        <h5>h5. Bootstrap heading</h5>
                        <h6>h6. Bootstrap heading</h6>
                     </div>
                     <div class="clearfix"></div>
                     <div class="col-md-12">
                        <h4>Labels and badges</h4>
                        <span class="badge badge-primary">Primary</span>
                        <span class="badge badge-secondary">Secondary</span>
                        <span class="badge badge-success">Success</span>
                        <span class="badge badge-danger">Danger</span>
                        <span class="badge badge-warning">Warning</span>
                        <span class="badge badge-info">Info</span>
                        <span class="badge badge-light">Light</span>
                        <span class="badge badge-dark">Dark</span>
                        <span class="badge bg-green">42</span>
                     </div>
                 
                    {{-- <div class="table-responsive">

                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th class="column-title">Name </th>
                                    <th class="column-title">Phone </th>
                                    <th class="column-title">Email </th>
                                    <th class="column-title">Address </th>
                                    <th class="bulk-actions" colspan="7">
                                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( 
                                            <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i>
                                        </a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="even pointer">
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    {{-- <td>{{$item->customer->name}}</td>
                                    <td>{{$item->customer->phone}}</td>
                                    <td>{{$item->customer->email}}</td>
                                    <td>{{$item->customer->address}}</td> --}}
                                </tr>
                            </tbody>
                        </table>

                        

                        {{-- <p style="margin-top: 10px">Phương thức thanh toán: {{$item->payment->type}}</p>
                        <p style="margin-left: 800px;">Tổng số tiền: {{Template::format_price($total)}}</p> --}}

                        <p style="margin-top: 10px">Phương thức thanh toán: </p>
                        <p style="margin-left: 800px;">Tổng số tiền: </p>

                        @include('admin.templates.x_title', ['title' => 'Chi tiết đơn hàng'])
                        
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th class="column-title">Name </th>
                                    <th class="column-title">Thumb </th>
                                    <th class="column-title">price </th>
                                    <th class="column-title">quantity </th>
                                    <th class="column-title">Total </th>
                                    <th class="bulk-actions" colspan="7">
                                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( 
                                            <span class="action-cnt"> </span> ) 
                                            <i class="fa fa-chevron-down"></i>
                                        </a>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @include ('admin.pages.cart.view_detail')
                            </tbody>
                        </table>

                    </div> --}}

                </div>
            </div>
        </div>
    </div>
@endsection


{{-- <div class="x_content">
    <div class="col-md-8 col-lg-8 col-sm-7">
       <blockquote>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
             posuere erat a ante Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
          </p>
          <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
       </blockquote>
       <blockquote class="blockquote-reverse">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
             posuere erat a ante Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
          </p>
          <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
       </blockquote>
    </div>
    <div class="col-md-4 col-lg-4 col-sm-5">
       <h1>h1. Bootstrap heading</h1>
       <h2>h2. Bootstrap heading</h2>
       <h3>h3. Bootstrap heading</h3>
       <h4>h4. Bootstrap heading</h4>
       <h5>h5. Bootstrap heading</h5>
       <h6>h6. Bootstrap heading</h6>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12">
       <h4>Labels and badges</h4>
       <span class="badge badge-primary">Primary</span>
       <span class="badge badge-secondary">Secondary</span>
       <span class="badge badge-success">Success</span>
       <span class="badge badge-danger">Danger</span>
       <span class="badge badge-warning">Warning</span>
       <span class="badge badge-info">Info</span>
       <span class="badge badge-light">Light</span>
       <span class="badge badge-dark">Dark</span>
       <span class="badge bg-green">42</span>
    </div>
 </div> --}}