<!-- ========== Left Sidebar Start ========== -->
<div class="d-flex flex-column justify-content-start align-content-start">
    <div class="sidebar_auth-user mb-4 mt-3 ml-3 text-dark d-flex justify-content-start align-content-center">
        <span class="uil uil-user mr-1 text-dark"></span>
        {{\Illuminate\Support\Facades\Auth::user()->login}}
    </div>
    <x-menu />
</div>
<!-- Left Sidebar End -->
