<link rel="stylesheet" href="{{ asset('css/logo.css') }}">
@foreach($menu as $item)
<li class="nav-item ">
    <a  class="nav-link" style="cursor: pointer">
        <p>
            {{ $item }}
        </p>
    </a>
</li>
@endforeach
