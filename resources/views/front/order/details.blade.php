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
                    <h1 class="page-title">Products Order</h1>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <table
                                class="table display nowrap table-striped table-bordered scroll-horizontal">
                                <thead class="">
                                <tr>
                                    <th>ID</th>
                                    <th>Product name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @isset($products)
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{$product->product -> id}}</td>
                                            <td>{{$product->product -> name }}</td>
                                            <td>{{$product -> price}}</td>
                                            <td>{{$product -> quantity}}</td>
                                            <td>{{$product -> total}}</td>
                                        </tr>
                                    @endforeach
                                @endisset


                                </tbody>
                            </table>
                            <div class="justify-content-center d-flex">

                            </div>
                        </div>
                    </div>
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
