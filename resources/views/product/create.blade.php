@extends('layouts.main')
@section('title', 'Add product')
@section('custom_css')
    <style>
        .dvPreview > img {
            width: 120px;
            margin: 10px;
        }
        .dropdown-menu > .dropdown {
            position: relative;
        }

        .dropdown-menu > .dropdown a::after {
            transform: rotate(-90deg);
            position: absolute;
            right: .9rem;
            top: .9rem;
        }

        .dropdown-menu > .dropdown .dropdown-menu {
            top: -.7rem;
            left: 100%;
            border-radius: 0 .25rem .25rem .25rem;
        }
        .dropdown-menu {
            background: #9ed5df !important;
        }
        .dropdown-item{
            color:rgb(19,57,96) !important;
            font-family: "Tahoma Regular", serif !important;
            padding-top: 7px !important;
            padding-bottom: 7px !important;
        }
        .dropdown-item:hover{
            background:rgb(110,164,174) !important;

        }
    </style>
    {{--<link href="{{ asset('css/jquery.growl.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/fileup.css') }}" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>--}}

@endsection
@section('content')
    <div class="home muh">
        <div class="home_container">

            @if ($message = Session::get('key'))
                {{--                @dd($message)--}}
            @endif
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="card">
                                    <div class="card-header bg-dark text-white">
                                        <h3>{{__('index.add_product')}}</h3>
                                    </div>
                                    <div class="card-body">
                                        @if ($message = Session::get('success'))
                                            <div class="alert alert-success alert-block">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @elseif($message = Session::get('error'))
                                            <div class="alert alert-danger alert-block">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @endif
                                        <form method="POST" action="{{ route('product.add_product.store') }}"
                                              name="form-example-1" id="form-example-1" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-4 border">
                                                    <ul class="navbar-nav nav-pills nav-fill" id="nav-ul">
                                                        <li class="nav-item dropdown" >
                                                            <a class="nav-link dropdown-toggle" id="nav-products" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Products
                                                            </a>
                                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                                <li class="dropdown">
                                                                    <a class="dropdown-item" href="">Checklists</a>
                                                                    <ul class="dropdown-menu">
                                                                        <li class="dropdown">
                                                                            <a class="dropdown-item s_type" href="#">Baseball</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item nav_dr_item" href="#" name="checklist">1900-1949</a></li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                    <div class="form-group">
                                                        <label>{{ __('product.region') }}</label>
                                                        <select class="form-control">
                                                            <optgroup label="Label 1">
                                                                <option class="form-control" value="1">One
                                                                </option>
                                                                <option value="2">Two</option>
                                                                <option value="3">Three</option>
                                                            </optgroup>
                                                            <optgroup label="Label 2">
                                                                <option value="4">Four</option>
                                                                <option value="5">Five</option>
                                                                <option value="6">Six</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ __('product.status') }}</label>
                                                        <select name="status"
                                                                class="form-control @error('status') is-invalid @enderror">
                                                            <option
                                                                value="gift">{{ __('product.product_type_gift') }}</option>
                                                            <option
                                                                value="barter">{{ __('product.product_type_barter') }}</option>
                                                            <option
                                                                value="sale">{{ __('product.product_type_sale') }}</option>
                                                        </select>
                                                        @error('status')
                                                        <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ __('product.category') }}</label>
                                                        <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                                            <option></option>
                                                            @foreach($categories as $category)
                                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('status')
                                                        <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                        @enderror
                                                    </div>
                                                    {{--<div class="form-group">
                                                        <label>{{ __('product.category') }}</label>
                                                        <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                                            <option></option>
                                                            @foreach($categories as $category)
                                                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('status')
                                                        <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                        @enderror
                                                    </div>--}}
                                                </div>
                                                <div class="col-8 border">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('product.name') }}</label>
                                                        <input id="name" type="text"
                                                               class="form-control @error('name') is-invalid @enderror"
                                                               name="name" value="{{ old('name') }}" required
                                                               autocomplete="name" autofocus>
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="price">{{ __('product.price') }}</label>
                                                        <input id="price" type="text"
                                                               class="form-control @error('price') is-invalid @enderror"
                                                               name="price" value="{{ old('price') }}" required
                                                               autocomplete="name" autofocus>
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="description">{{ __('product.description') }}</label>
                                                        <textarea name="description" id="description"
                                                                  class="form-control @error('description') is-invalid @enderror"
                                                                  rows="5">{{ old('description') }}</textarea>
                                                        @error('description')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                            <input type="file" class="fileupload form-control" multiple="multiple"
                                                                   name="image[]" accept="image/x-png,image/gif,image/jpeg">
                                                            <div class="dvPreview"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--<div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-12 p-3">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label>{{ __('product.region') }}</label>
                                                                <select class="form-control">
                                                                    <optgroup label="Label 1">
                                                                        <option class="form-control" value="1">One
                                                                        </option>
                                                                        <option value="2">Two</option>
                                                                        <option value="3">Three</option>
                                                                    </optgroup>
                                                                    <optgroup label="Label 2">
                                                                        <option value="4">Four</option>
                                                                        <option value="5">Five</option>
                                                                        <option value="6">Six</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                            <div class="row">
                                                                <label>{{ __('product.status') }}</label>
                                                                <select name="status"
                                                                        class="form-control @error('status') is-invalid @enderror">
                                                                    <option
                                                                        value="gift">{{ __('product.product_type_gift') }}</option>
                                                                    <option
                                                                        value="barter">{{ __('product.product_type_barter') }}</option>
                                                                    <option
                                                                        value="sale">{{ __('product.product_type_sale') }}</option>
                                                                </select>
                                                                @error('status')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <div class="row">
                                                                <label>{{ __('product.category') }}</label>
                                                                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                                                    @foreach($categories as $category)
                                                                        <option
                                                                            value="{{ $category->name }}">{{ $category->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('status')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bg-dark" style="height:100%;width:2px"></div>
                                                    <div class="col-md-8 col-sm-12 p-3">
                                                        <div class="form-group">
                                                        <div class="row">
                                                            <label for="name">{{ __('product.name') }}</label>
                                                            <input id="name" type="text"
                                                                   class="form-control @error('name') is-invalid @enderror"
                                                                   name="name" value="{{ old('name') }}" required
                                                                   autocomplete="name" autofocus>
                                                            @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="row">
                                                            <label for="price">{{ __('product.price') }}</label>
                                                            <input id="price" type="text"
                                                                   class="form-control @error('price') is-invalid @enderror"
                                                                   name="price" value="{{ old('price') }}" required
                                                                   autocomplete="name" autofocus>
                                                            @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="row">
                                                            <label for="description">{{ __('product.description') }}</label>
                                                            <textarea name="description" id="description"
                                                                      class="form-control @error('description') is-invalid @enderror"
                                                                      rows="5">{{ old('description') }}</textarea>
                                                            @error('description')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="row measure-fld">
                                                            <input type="file" class="fileupload form-control" multiple="multiple"
                                                                   name="image[]" accept="image/x-png,image/gif,image/jpeg">
                                                            <div class="dvPreview"></div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>--}}
                                            @csrf





                                            {{--<button type="button" class="btn btn-success fileup-btn">
                                                Select files
                                                <input type="file" id="upload-2" multiple name="image[]">
                                            </button>

                                            <a class="control-button btn btn-link" style="display: none"
                                               href="javascript:$.fileup('upload-2', 'upload', '*')">Upload all</a>
                                            <a class="control-button btn btn-link" style="display: none"
                                               href="javascript:$.fileup('upload-2', 'remove', '*')">Remove all</a>

                                            <div id="upload-2-queue" class="queue"></div>
--}}



                                            @if (count($errors) > 0)
                                                <div class="alert alert-danger">
                                                    <strong>Whoops!</strong> There were some problems with your input.
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("custom_js")
    <script type="text/javascript">
        jQuery(function () {
            // Multiple images preview in browser
            var imagesPreview = function (input, placeToInsertImagePreview) {
                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function (event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };

            jQuery(document).on('change', '.fileupload', function () {
                imagesPreview(this, 'div.dvPreview');
            });
        });

    </script>
    {{--<script src="{{asset('js/jquery.growl.js')}}"></script>
    <script src="{{asset('js/fileup.js')}}"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        $.fileup({
            url: 'example.com/your/path?file_upload=1',
            inputID: 'upload-1',
            queueID: 'upload-1-queue',
            onSuccess: function(response, file_number, file) {
                $.growl.notice({ title: "Upload success!", message: file.name });
            },
            onError: function(event, file, file_number) {
                $.growl.error({ message: "Upload error!" });
            }
        });
        $.fileup({
            url: 'example.com/your/path?file_upload=1',
            inputID: 'upload-2',
            dropzoneID: 'upload-2-dropzone',
            queueID: 'upload-2-queue',
            onSelect: function(file) {
                $('#multiple .control-button').show();
            },
            onRemove: function(file, total) {
                if (file === '*' || total === 1) {
                    $('#multiple .control-button').hide();
                }
            },
            onSuccess: function(response, file_number, file) {
                $.growl.notice({ title: "Upload success!", message: file.name });
            },
            onError: function(event, file, file_number) {
                $.growl.error({ message: "Upload error!" });
            }
        });
        $.fileup({
            url: 'https://github.com?file_upload=1',
            inputID: 'upload-3',
            queueID: 'upload-3-queue',
            autostart: true,
            onSelect: function(file) {
                $('#types .control-button').show();
            },
            onRemove: function(file, total) {
                if (file === '*' || total === 1) {
                    $('#types .control-button').hide();
                }
            },
            onSuccess: function(response, file_number, file) {
                $.growl.notice({ title: "Upload success!", message: file.name });
            },
            onError: function(event, file, file_number) {
                $.growl.error({ message: "Upload error!" });
            }
        });
        $.fileup({
            url: 'https://github.com?file_upload=1',
            inputID: 'upload-4',
            queueID: 'upload-4-queue',
            dropzoneID: 'upload-4-dropzone'
        })
            .select(function(file) {
                $('#dropzone .control-button').show();
            })
            .remove(function(file, total) {
                if (file === '*' || total === 1) {
                    $('#dropzone .control-button').hide();
                }
            })
            .success(function(response, file_number, file) {
                $.growl.notice({ title: "Upload success!", message: file.name });
            })
            .error(function(event, file, file_number) {
                $.growl.error({ message: "Upload error!" });
            })
            .dragEnter(function(event) {
                $(event.target).addClass('over');
            })
            .dragLeave(function(event) {
                $(event.target).removeClass('over');
            })
            .dragEnd(function(event) {
                $(event.target).removeClass('over');
            });

    </script>
    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script>--}}
    <script>
        $('.dropdown-menu > .dropdown > a').addClass('dropdown-toggle');

        $('.dropdown-menu a.dropdown-toggle').on('mouseover', function(e) {

            if (!$(this).next().hasClass('show')) {
                $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
            }
            var $subMenu = $(this).next(".dropdown-menu");
            $subMenu.toggleClass('show');
            $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
                $('.dropdown-menu > .dropdown .show').removeClass("show");
            });
            return false;
        });

    </script>
@endsection
