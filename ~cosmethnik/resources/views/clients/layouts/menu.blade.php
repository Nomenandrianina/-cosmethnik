<link rel="stylesheet" href="{{ asset('css/logo.css') }}">
@foreach($doc as $category)
<li class="nav-item">
    <a onclick="site_info({{ $category->id }}, {{ $id }})" class="nav-link" style="cursor: pointer">
        <p>
            <i class="fas fa-info-circle"></i>
            Information du site
        </p>
    </a>
</li>

<li class="nav-item">
    <a onclick="actions({{ $category->id }}, {{ $id }})" class="nav-link" style="cursor: pointer">
        <p>
            <i class="fas fa-folder"></i>
            {{ $category->title }}
        </p>
    </a>
</li>
@endforeach
