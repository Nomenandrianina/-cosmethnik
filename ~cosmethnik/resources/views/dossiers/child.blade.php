<ul class="nav nav-treeview">
    @foreach($childs as $child)
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="nav-icon fas fa-folder"></i>
                <p>
                    {{ $child->title }}
                </p>
            </a>
        @if(count($child->childs))
                @include('dossiers.child',['childs' => $child->childs])
            @endif
        </li>
    @endforeach
</ul>
