<!-- Menu -->
@extends('layouts.main')
@section('title', 'Home')

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="{{asset('/styles/product.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/styles/product_responsive.css')}}">
    @if($item==null)
    <style>
        body{
            overflow-y: hidden;
        }
        @if(Session::get('success_add_message'))
        .show_msg {
            display: block!important;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1050;
            width: 100%;
            height: 100%;
            overflow: hidden;
            outline: 0;
        }
        @endif
    </style>
    @endif
@endsection

@section('content')
    @if($item==null)
        <div class="home muh">
            <div class="container mt-5">
                <div class="alert alert-warning alert-block mt-5">
                    <strong>Տվյալ հայտարարությունը գոյություն չունի</strong>
                </div>
            </div>
        </div>
    @else
    <!-- Home -->
    <div class="home">
        <div class="home_container">
            <div class="home_background" style="background-image:url('/images/categories.jpg')"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="home_title">Smart Phones<span>.</span></div>
                                <div class="home_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <!-- Product Details -->
    <div class="product_details">
        <div class="container">
            <div class="row details_row">

                <!-- Product Image -->
                <div class="col-lg-6">
                    <div class="details_image">
                        @php
                            $image = '';

                              if(count($item->images)>0){
                                  $image = $item->images[0]['img'];
                              }else{
                                  $image = "no-image.png";
                              }
                        @endphp
                        <div class="details_image_large"><img src="/images/{{$image}}" alt="{{$item->name}}"></div>
                        <div class="details_image_thumbnails d-flex flex-row align-items-start justify-content-between">
                            @if($image == "no-image.png")
                            @else
                                @foreach($item->images as $img)
                                    @if($loop->first)
                                        <div class="details_image_thumbnail active" data-image="/images/{{$img['img']}}"><img src="/images/{{$img['img']}}" alt="{{$item->name}}"></div>
                                    @else
                                        <div class="details_image_thumbnail" data-image="/images/{{$img['img']}}"><img src="/images/{{$img['img']}}" alt="{{$item->name}}"></div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Product Content -->
                <div class="col-lg-6">
                    <div class="details_content">
                        <div class="details_name" data-id="{{$item->id}}">{{ $item->name }}</div>
                        <div class="product_price">${{ $item->price }}</div>
                        <div class="details_text">
                            <p>{{$item->description}}</p>
                        </div>
                        <!-- Share -->
                        <div class="details_share">
                            <div class="row">
                                <div class="col-md-6"><h3>{{$item->users[0]['name']}}</h3></div>
{{--                                <div class="col-md-3">--}}
{{--                                    <button type="button" class="btn btn-dark text-white" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Send message <i class="fa fa-envelope" aria-hidden="true"></i></button>--}}
{{--                                </div>--}}
                            </div>
                            <div class="row">
                                <div class="col-md-9"><h4>{{$item->users[0]['email']}}</h4></div>
                                <div class="col-md-3"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-9"><i class="fa fa-phone" aria-hidden="true"></i><tel>{{$item->users[0]['phone']}}</tel></div>
                                <div class="col-md-3"></div>
                            </div>
                            <div class="row"></div>
                            <div class="row"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Products -->

    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="products_title">Related Products</div>
                </div>
            </div>
            <div class="row">
                <div class="col">

                    <div class="product_grid row">
                        <!-- Product -->
                        <div class="product mx-auto">
                            <div class="product_image"><img src="/images/product_1.jpg" alt=""></div>
                            <div class="product_extra product_new px-4 py-2 text-white">
                                {{ __('product.product_type_'.$item->status) }}
                            </div>
                            <div class="product_content">
                                <div class="product_title"><a href="product.html">Smart Phone</a></div>
                                <div class="product_price">$670</div>
                            </div>
                        </div>

                        <!-- Product -->
                        <div class="product mx-auto">
                            <div class="product_image"><img src="/images/product_2.jpg" alt=""></div>
                            <div class="product_extra product_sale"><a href="categories.html">Sale</a></div>
                            <div class="product_content">
                                <div class="product_title"><a href="product.html">Smart Phone</a></div>
                                <div class="product_price">$520</div>
                            </div>
                        </div>

                        <!-- Product -->
                        <div class="product mx-auto">
                            <div class="product_image"><img src="/images/product_3.jpg" alt=""></div>
                            <div class="product_content">
                                <div class="product_title"><a href="product.html">Smart Phone</a></div>
                                <div class="product_price">$710</div>
                            </div>
                        </div>

                        <!-- Product -->
                        <div class="product">
                            <div class="product_image"><img src="/images/product_4.jpg" alt=""></div>
                            <div class="product_content">
                                <div class="product_title"><a href="product.html">Smart Phone</a></div>
                                <div class="product_price">$330</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal message_modal fade pt-5" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if($item->users[0]['id']==auth()->id())
                        <div class="alert alert-warning">
                            Դուք չեք կարող դեզ հաղորդագրությաուն ուղղարկել
                        </div>
                    @else
                            @csrf
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Message:</label>
                                <textarea class="form-control text-msg" name="message" col-5></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-msg d-flex justify-content-center">Send message</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
@section('custom_js')
    <script src="{{asset('/js/product.js')}}"></script>
    <script>
        $('.btn-msg').click(function (){
            var message = $('.text-msg').val()
            $.ajax({
                url: "{{ route('sendMessage') }}",
                type: "POST",
                data: {
                    message: message,
                    incoming_id: {{ $item->users[0]['id'] }},
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    console.log(data)
                    if(data=="yes"){
                        $('.message_modal .modal-body').html('<div class="alert alert-success">lava</div>')
                    }else{
                        $('.message_modal .modal-body').before('<div class="alert alert-danger">xndrum enq pordzeq krkin</div>')
                    }
                }
            })
        })
    </script>'
@endsection
