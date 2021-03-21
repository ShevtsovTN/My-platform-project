<a class="text-dark message-icon" href="{{route('messagesList')}}">
    <span class="mr-1 uil uil-envelope-alt">
        @if($count > 0)
        <span class="count-messages badge badge-success text-white">{{$count}}</span>
            @endif
    </span>
</a>
