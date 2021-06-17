@foreach($products as $product)
    @php
        $image = '';

          if(count($product->images)>0){
              $image = $product->images[0]['img'];
          }else{
              $image = "no-image.png";
          }
    @endphp

    <div class="product mx-auto">
        <div class="product_image"><img src="/images/{{$image}}" alt="{{ $product->name }}"></div>
        <div class="product_extra product_new px-4 py-2 text-white">
            {{ __('product.product_type_'.$product->status) }}
        </div>        <div class="product_content">
            <div class="product_title"><a href="{{ route('showProduct', ['category', $product->id]) }}">{{ $product->name }}</a></div>
            @if($product->new_price != null)
                <div style="text-decoration: line-through">${{ $product->price }}</div>
                <div class="product_price">${{ $product->price }}</div>
            @else
                <div class="product_price">${{ $product->price }}</div>
            @endif
        </div>
    </div>
@endforeach
