@extends('layouts.main')
@section('title', 'Add product')

@section('custom_css')
    <style>
        .dvPreview>img{
            width: 120px;
            margin: 10px;
        }
    </style>
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
                                        <form method="POST" action="{{ route('product.add_product.store') }}" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-4">
                                                        <label>{{ __('product.region') }}</label>
                                                        <select class="form-control">
                                                            <optgroup label="Label 1">
                                                                <option class="form-control" value="1">One</option>
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
                                                    <div class="col-md-4 col-sm-4">
                                                        <label>{{ __('product.status') }}</label>
                                                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                                                            <option value="gift">{{ __('product.product_type_gift') }}</option>
                                                            <option value="barter">{{ __('product.product_type_barter') }}</option>
                                                            <option value="sale">{{ __('product.product_type_sale') }}</option>
                                                        </select>
                                                        @error('status')
                                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4 col-sm-4">
                                                        <label>{{ __('product.category') }}</label>
                                                        <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
                                                        </select>
                                                        @error('status')
                                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            @csrf

                                            <div class="form-group">
                                                <label for="name">{{ __('product.name') }}</label>
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $item->name }}" required autocomplete="name" autofocus>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="price">{{ __('product.price') }}</label>
                                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $item->price }}" required autocomplete="name" autofocus>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="description">{{ __('product.description') }}</label>
                                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ $item->description }}</textarea>
                                                @error('description')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                            {{--<div class="form-group measure-fld">
                                                <input type="file" class="fileupload form-control" multiple="multiple" name="image[]" accept="image/x-png,image/gif,image/jpeg">
                                                <div class="dvPreview">
                                                    @forelse($item->images as $image)
                                                        <img width="100" src="/images/{{$image['img']}}" alt="{{$item->name}}">
                                                    @empty
                                                        duq chuneq nkarner
                                                    @endforelse
                                                </div>
                                            </div>--}}
                                            <div id="drag-drop-area"></div>
                                            <div class="">
                                            </div>
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
        jQuery(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {
                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };

            jQuery(document).on('change','.fileupload',function() {
                imagesPreview(this, 'div.dvPreview');
            });
        });

    </script>
    <script src="https://transloadit.edgly.net/releases/uppy/v1.6.0/uppy.min.js"></script>
    <script>
        var uppy = Uppy.Core()
            .use(Uppy.Dashboard, {
                inline: true,
                target: '#drag-drop-area'
            })
            .use(Uppy.Tus, {endpoint: 'https://master.tus.io/files/'}) //you can put upload URL here, where you want to upload images

        uppy.on('complete', (result) => {
            console.log('Upload complete! We’ve uploaded these files:', result.successful)
        })
    </script>
@endsection
