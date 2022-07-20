@extends('layouts.site')

@section('content')
    <nav data-depth="1" class="breadcrumb-bg">
        <div class="container no-index">
            <div class="breadcrumb">

                <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{route('order.index')}}">
                            <span itemprop="name">Home</span>
                        </a>
                        <meta itemprop="position" content="1">
                    </li>
                </ol>

            </div>
        </div>
    </nav>

    <div class="container no-index">
        <div class="row">
            <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <section id="main">
                    <h1 class="page-title">Order history</h1>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <table
                                class="table display nowrap table-striped table-bordered scroll-horizontal">
                                <thead class="">
                                <tr>
                                    <th>ID</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Details</th>
                                </tr>
                                </thead>
                                <tbody>
                                @isset($orders)
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order -> id}}</td>
                                            <td>{{$order -> payment_method }}</td>
                                            <td>{{$order -> status}}</td>
                                            <td>{{$order -> total}}</td>
                                            <td><a href="{{'order/details/'.$order->id}}">show</a> </td>
                                        </tr>
                                    @endforeach
                                @endisset


                                </tbody>
                            </table>
                            <div class="justify-content-center d-flex">

                            </div>
                        </div>
                    </div>
{{--                    <div class="cart-grid row">--}}
{{--                        <div class="cart-grid-body col-xs-12 col-lg-9">--}}
{{--                            <!-- cart products detailed -->--}}
{{--                            <div class="cart-container">--}}
{{--                                <div class="cart-overview js-cart"--}}
{{--                                     data-refresh-url="">--}}
{{--                                        <ul class="cart-items">--}}
{{--                                            @foreach($orders as $order)--}}
{{--                                                <li class="cart-item">--}}
{{--                                                    <div class="product-line-grid row spacing-10">--}}
{{--                                                        <!--  product left content: image-->--}}
{{--                                                        <div class="product-line-grid-left col-sm-2 col-xs-4">--}}
{{--                                                        <span class="product-image media-middle">--}}
{{--                                                            {{ $order->id }}--}}
{{--                                                        </span>--}}
{{--                                                        </div>--}}

{{--                                                        <!--  product left body: description -->--}}
{{--                                                        <div class="product-line-grid-body col-sm-10 col-xs-8">--}}
{{--                                                            <div class="row">--}}
{{--                                                                <div class="col-sm-6 col-xs-12">--}}
{{--                                                                    <div class="product-line-info">--}}
{{--                                                                     {{ $order->payment_method }}--}}
{{--                                                                    </div>--}}

{{--                                                                    <div class="product-line-info product-price">--}}
{{--                                                                       <span itemprop="price"--}}
{{--                                                                             class="price">{{$order->status}}</span>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="product-line-info product-price">--}}
{{--                                                                       <span itemprop="price"--}}
{{--                                                                             class="price">{{$order->total}}</span>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}

{{--                                                </li>--}}
{{--                                            @endforeach--}}
{{--                                        </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </section>
            </div>
        </div>
    </div>
@stop


@section('scripts')
    <script>


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.remove-from-cart', function (e) {
            e.preventDefault();

            $.ajax({
                type: 'post',
                url: $(this).attr('data-url-product'),
                data: {
                    'product_id': $(this).attr('data-id-product'),
                 },
                success: function (data) {

                }
            });
        });

        $(document).on('click', '.increase', function (e) {
            e.preventDefault();

            $.ajax({
                type: 'post',
                url: $(this).attr('data-url-product'),
                data: {
                    'product_id': $(this).attr('data-id-product'),
                },
                success: function (data) {

                }
            });
        });
    </script>
    @stop
