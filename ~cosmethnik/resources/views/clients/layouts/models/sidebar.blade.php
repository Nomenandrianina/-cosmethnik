<link rel="stylesheet" href="{{ asset('css/logo.css') }}">
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #f2f2f2;">
    <a href="{{ route('dashboard') }}" class="brand-link" style="border-bottom: 1px solid #4b545c22;">
        <span class="brand-text font-weight-light" style="display: block;
        width: 70%;
        margin: 0 10px;"><img src="{{asset('/logo.png')}}" class="logo" alt="Image"/></span>
    </a>

    <ul class="list-group">
        <li class="list-group-item" style="background-color: #f2f2f2">{!!html_entity_decode($icon)!!} {{ $dossier_parent }}</li>
    </ul>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('clients.layouts.models.menu')
            </ul>
        </nav>
    </div>
</aside>
