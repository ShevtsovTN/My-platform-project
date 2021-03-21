@if(session('success'))
    <div class="alert mb-2 mt-2 alert-success" role="alert">
        {{session('success')}}
    </div>
@endif
@if(session('error'))
    <div class="alert mb-2 mt-2 alert-danger" role="alert">
        {{session('error')}}
    </div>
@endif

