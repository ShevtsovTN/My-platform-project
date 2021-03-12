<ul class="app-menu" id="menu-bar">
    @foreach($menu as $item)
        <li>
            <a href="#">{{$item['title']}}</a>
        </li>
        @endforeach
</ul>
