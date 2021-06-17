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
                            <li class="page_menu_item menu_mm"><a href="categories.html">Categories<i
                                        class="fa fa-angle-down"></i></a></li>
                            <li class="page_menu_item menu_mm"><a href="product.html">Product<i
                                        class="fa fa-angle-down"></i></a></li>
                            <li class="page_menu_item menu_mm"><a href="cart.html">Cart<i class="fa fa-angle-down"></i></a>
                            </li>
                            <li class="page_menu_item menu_mm"><a href="checkout.html">Checkout<i
                                        class="fa fa-angle-down"></i></a></li>
                            <li class="page_menu_item menu_mm"><a href="contact.html">Contact<i
                                        class="fa fa-angle-down"></i></a></li>
                        </ul>
                    </li>
                    <li class="page_menu_item has-children menu_mm">
                        <a href="categories.html">Categories<i class="fa fa-angle-down"></i></a>
                        <ul class="page_menu_selection menu_mm">
                            <li class="page_menu_item menu_mm"><a href="categories.html">Category<i
                                        class="fa fa-angle-down"></i></a></li>
                            <li class="page_menu_item menu_mm"><a href="categories.html">Category<i
                                        class="fa fa-angle-down"></i></a></li>
                            <li class="page_menu_item menu_mm"><a href="categories.html">Category<i
                                        class="fa fa-angle-down"></i></a></li>
                            <li class="page_menu_item menu_mm"><a href="categories.html">Category<i
                                        class="fa fa-angle-down"></i></a></li>
                        </ul>
                    </li>
                    <li class="page_menu_item menu_mm"><a href="index.html">Accessories<i class="fa fa-angle-down"></i></a>
                    </li>
                    <li class="page_menu_item menu_mm"><a href="#">Offers<i class="fa fa-angle-down"></i></a></li>
                    <li class="page_menu_item menu_mm"><a href="contact.html">Contact<i
                                class="fa fa-angle-down"></i></a></li>
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
                <div class="container  p-1 mt-2">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="p-2"><p>Form control: input</p></div>
                        </div>
                        <div class="col-md-6 col-sm-12 border">
                            <form action="{{route('personal.update', $user->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group mt-2">
                                    <label>Email:</label>
                                    <input type="text" class="form-control" disabled value="{{ $user->email }}">
                                </div>
                                <div class="form-group mt-2">
                                    <label>Name:</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name',$user->name) }}">
                                </div>
                                <div class="form-group">
                                    <label for="usr">Phone:</label>
                                    <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                                </div>
                                <button type="submit" class="btn btn-primary mb-2">Submit</button>
                            </form>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <hr>
                <div class="container  p-1 mt-2">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="p-2"><p>Form control: input</p></div>
                        </div>
                        <div class="col-md-6 col-sm-12 border">
                            <form action="{{ route('pass_update') }}" method="POST">
                                @csrf
                                <div class="form-group mt-2">
                                    <label>Old Password:</label>
                                    <input type="text" class="form-control" name="current_password">
                                </div>
                                <div class="form-group">
                                    <label for="usr">Name:</label>
                                    <input type="text" class="form-control" name="new_password">
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Password:</label>
                                    <input type="password" class="form-control" name="new_confirm_password">
                                </div>
                                <button type="submit" class="btn btn-primary mb-2">Submit</button>
                            </form>
                            @if(session()->has('errorMsg'))
                                {{ session('errorMsg') }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
