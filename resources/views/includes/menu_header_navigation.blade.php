@if(isset($item['_children']))

    @if($firstParentElement == true)
        <li class="shrift-normal">

            <a  href="{{ $item['id'] }}" class="menus" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $item['name'] }}</a>
                <ul>
                    @foreach($item['_children'] as $item)
                        @include('includes.menu_header_navigation', ['firstParentElement' => false])
                    @endforeach
                </ul>
        </li>
    @else
        <li class="shrift-normal">

            <a  href="{{ $item['id'] }}"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $item['name'] }}</a>
            <ul>
                    @foreach($item['_children'] as $item)
                        @include('includes.menu_header_navigation', ['firstParentElement' => false])
                    @endforeach
            </ul>
        </li>
    @endif
@else
    <li class="shrift-normal has-sub">
        <a  href="{{ $item['id'] }}">{{ $item['name'] }}</a>
    </li>
@endif
