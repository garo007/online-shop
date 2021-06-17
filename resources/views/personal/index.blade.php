<!-- Menu -->
@extends('layouts.main')
@section('title', 'Home')

@section('content')
    <div class="menu menu_mm trans_300">
        <div class="menu_container menu_mm">
            <div class="page_menu_content">

                <div class="page_menu_search menu_mm">
{{--                    <form action="#">--}}
{{--                        <input type="search" required="required" class="page_menu_search_input menu_mm" placeholder="Search for products...">--}}
{{--                    </form>--}}
                </div>
                <ul class="page_menu_nav menu_mm">
                    <li class="page_menu_item has-children menu_mm">
                        <a href="index.html">Home<i class="fa fa-angle-down"></i></a>
                        <ul class="page_menu_selection menu_mm">
                            <li class="page_menu_item menu_mm"><a href="categories.html">Categories<i class="fa fa-angle-down"></i></a></li>
                            <li class="page_menu_item menu_mm"><a href="product.html">Product<i class="fa fa-angle-down"></i></a></li>
                            <li class="page_menu_item menu_mm"><a href="cart.html">Cart<i class="fa fa-angle-down"></i></a></li>
                            <li class="page_menu_item menu_mm"><a href="checkout.html">Checkout<i class="fa fa-angle-down"></i></a></li>
                            <li class="page_menu_item menu_mm"><a href="contact.html">Contact<i class="fa fa-angle-down"></i></a></li>
                        </ul>
                    </li>
                    <li class="page_menu_item has-children menu_mm">
                        <a href="categories.html">Categories<i class="fa fa-angle-down"></i></a>
                        <ul class="page_menu_selection menu_mm">
                            <li class="page_menu_item menu_mm"><a href="categories.html">Category<i class="fa fa-angle-down"></i></a></li>
                            <li class="page_menu_item menu_mm"><a href="categories.html">Category<i class="fa fa-angle-down"></i></a></li>
                            <li class="page_menu_item menu_mm"><a href="categories.html">Category<i class="fa fa-angle-down"></i></a></li>
                            <li class="page_menu_item menu_mm"><a href="categories.html">Category<i class="fa fa-angle-down"></i></a></li>
                        </ul>
                    </li>
                    <li class="page_menu_item menu_mm"><a href="index.html">Accessories<i class="fa fa-angle-down"></i></a></li>
                    <li class="page_menu_item menu_mm"><a href="#">Offers<i class="fa fa-angle-down"></i></a></li>
                    <li class="page_menu_item menu_mm"><a href="contact.html">Contact<i class="fa fa-angle-down"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>

        <div class="menu_social">
            <ul>
                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>

    <!-- Home -->
    <div class="container mt-5" style="margin-top:1900px">

    </div>


    <div class="home">

    <!-- Products -->

    <div class="products">
        <div class="container">
            <a href="{{ route('personal.edit', auth()->id()) }}" class="btn btn-primary">
                edit password
            </a>
            <div class="row">

                <div class="col">
                    @if (session()->has('success_add_product'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ session('success_add_product') }}</strong>
                        </div>
                    @endif
                    <div class="product_grid row">
                        <!-- Product -->
                        @foreach($user->products as $product)
                            @php
                                  if(count($product->images)>0){
                                      $image = $product->images[0]['img'];
                                  }else{
                                      $image = "no-image.png";
                                  }
                            @endphp
                            <div class="product mx-auto">
                                <div class="product_image">
                                    <img src="images/{{$image}}" alt="{{ $product->name }}">
                                </div>
                                <div class="product_extra product_new px-4 py-2 text-white">
                                    {{ __('product.product_type_'.$product->status) }}
                                </div>
                                <div class="product_edit px-4 py-2 text-white end-0">
                                    <a href="{{ route('product.add_product.edit', $product->id) }}">edit</a>
                                </div>

                                <div class="product_content">
                                    <div class="product_title"><a href="{{ route('showProduct', [$product->category->alias, $product->id] ) }}">{{ $product->name }}</a></div>
                                    @if($product->new_price != null)
                                        <div style="text-decoration: line-through">${{ $product->price }}</div>
                                        <div class="product_price">${{ $product->price }}</div>
                                    @else
                                        <div class="product_price">${{ $product->price }}</div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
