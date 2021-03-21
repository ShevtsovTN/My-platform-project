<div class="sidebar_user-menu mt-2 d-flex justify-content-start align-content-center">
    <ul class="nav flex-column">
        @foreach($menu as $index => $item)
            <li class="nav-item">
                @if($item['route'] == 'userSettings')
                    <a class="nav-link text-dark" href="{{route($item['route'], $id)}}"><span class="mr-1 {{$item['icon']}}"></span>{{$item['name']}}</a>
                @else
                    <a class="nav-link text-dark" href="{{route($item['route'])}}"><span class="mr-1 {{$item['icon']}}"></span>{{$item['name']}}</a>
                @endif
            </li>
        @endforeach
        <li class="nav-item mt-3">
            <a class="nav-link text-dark" href="{{route('logout')}}">
                <span class="mr-1 uil uil-sign-out-alt"></span>
                Logout
            </a>
        </li>
    </ul>
</div>
