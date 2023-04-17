<link rel="stylesheet" href="{{ asset('css/logo.css') }}">
@foreach($doc as $category)
<li class="nav-item menu-open">
    <a onclick="actions({{ $category->id }}, {{ $id }})" class="nav-link" style="cursor: pointer">
        <p>
            {{ $category->title }}
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    @if(count($category->childs))
        @include('dossiers.child',['childs' => $category->childs])
    @endif
</li>
@endforeach

