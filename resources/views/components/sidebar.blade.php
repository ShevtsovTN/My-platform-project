<!-- ========== Left Sidebar Start ========== -->
<div class="d-flex flex-column justify-content-start align-content-start">
    <div class="sidebar_auth-user mb-3 mt-3 ml-3 text-dark d-flex justify-content-start align-content-center">
        <span class="uil uil-user mr-1 text-dark"></span>
        {{$user->login}}
    </div>
    <div class="sidebar_user-menu d-flex justify-content-start align-content-center">
        <ul class="nav flex-column">
            @foreach($menu[$user->group] as $index => $item)
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{$item['route']}}"><span class="mr-1 {{$item['icon']}}"></span>{{$item['name']}}</a>
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
</div>
<!-- Left Sidebar End -->
