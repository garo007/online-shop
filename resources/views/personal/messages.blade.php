<!-- Menu -->
@extends('layouts.main')
@section('title', 'Home')
@section('custom_css')
    <link rel="stylesheet" type="text/css" href="{{asset('/styles/product.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/product_responsive.css')}}">
    <style>
        .details_text {
            margin-top: 20px;
        }
        .confirm_img{
            max-width: 40%;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="row muh">
                <div class="col-md-3 col-sm-12">
                    <div class="row">
                        @foreach($users_msg as $i => $user)
                            <div class="col-md-12 p-1">
                                <button data-id="{{$user->user[0]['id']}}" class="btn btn-warning btn-user">{{$user->user[0]['name']}}</button>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="messages h-100"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_js')
    <script src="{{asset('/js/product.js')}}"></script>
    <script>
        var user_id = '';
        $('.btn-user').click(function (){
            user_id = $(this).data('id')

            $.ajax({
                url: "{{ route('sendIdForMessages') }}",
                type: "POST",
                data: {
                    id: user_id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    $('.messages').html(data)
                }
            })

        })
    </script>
@endsection
