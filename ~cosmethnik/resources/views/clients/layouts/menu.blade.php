<link rel="stylesheet" href="{{ asset('css/logo.css') }}">
@foreach($doc as $category)
<li class="nav-item ">
    <a href="#" class="nav-link">
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

