<link rel="stylesheet" href="{{ asset('css/logo.css') }}">
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #f2f2f2;">
    <a href="{{ route('dashboard') }}" class="brand-link" style="border-bottom: 1px solid #4b545c22;">
        {{-- <img src="{{url('images/logo.png')}}"
             alt="{{ config('app.name') }} Logo"
             class="brand-image img-circle elevation-3"> --}}
        <span class="brand-text font-weight-light" style="display: block;
        width: 70%;
        margin: 0 10px;"><img src="{{asset('/logo.png')}}" class="logo" alt="Image"/></span>
    </a>


    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>


</aside>
