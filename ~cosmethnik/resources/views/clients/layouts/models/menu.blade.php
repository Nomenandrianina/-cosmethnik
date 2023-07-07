<link rel="stylesheet" href="{{ asset('css/logo.css') }}">
@foreach($menu as $item)
<li class="nav-item">
        <a  class="nav-link" id="{{ $item['menu']['scripts'] }}" href="{{  route($item['menu']['link'],['id_model'=>$data[0],'id_site'=>$data[1],'id_dossier'=>$data[2],'dossier_parent'=>$data[3]]) }}" style="cursor: pointer">
        <p>
            {{ $item['menu']['props'] }}
        </p>
    </a>
</li>
@endforeach
@include('clients.layouts.scripts.scripts_menu_active')
{{-- @if ($item['menu']['link'])
@else
    <a  class="nav-link" style="cursor: pointer">
@endif --}}
