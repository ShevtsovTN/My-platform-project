<!-- Topbar Start -->
<div class="navbar navbar-expand w-100">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        <a class="navbar-brand d-flex align-items-center justify-content-center" href="#">
            <img src="#" class="text-dark" width="30" height="30" alt="AdminPanel">
        </a>
        <div class="w-50 d-flex align-items-center justify-content-around">
            <form class="form-inline" action="{{route('search')}}" method="post">
                @csrf
                <div class="search-input-content">
                    <input class="form-control @error('searchUser') is-invalid @enderror mr-sm-2" type="search" name="searchUser" placeholder="Search" aria-label="Search">
                    @error('searchUser')
                    <div class="search-error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
            </form>
            <x-messages />
        </div>
    </div>
</div>
<!-- end Topbar -->
