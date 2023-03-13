<link rel="stylesheet" href="{{ asset('css/logo.css') }}">
@php
$urlAdmin=config('fast.admin_prefix');
@endphp

@can('dashboard')
@php
$isDashboardActive = Request::is($urlAdmin);
@endphp
<li class="nav-item">
    <a href="{{ route('dashboard') }}" class="nav-link {{ $isDashboardActive ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>@lang('menu.dashboard')</p>
    </a>
</li>
@endcan

@can('generator_builder.index')
@php
$isUserActive = Request::is($urlAdmin.'*generator_builder*');
@endphp
<li class="nav-item">
    <a href="{{ route('generator_builder.index') }}" class="nav-link {{ $isUserActive ? 'active' : '' }}">
        <i class="nav-icon fas fa-coins"></i>
        <p>@lang('menu.generator_builder.title')</p>
    </a>
</li>
@endcan

@can('attendances.index')
@php
$isUserActive = Request::is($urlAdmin.'*attendances*');
@endphp

<li class="nav-item">
    <a href="{{ route('attendances.index') }}" class="nav-link {{ $isUserActive ? 'active' : '' }}">
        <i class="nav-icon fas fa-calendar-alt"></i>

        <p>@lang('menu.attendances.title')</p>
    </a>
</li>
@endcan

@canany(['users.index','roles.index','permissions.index'])
@php
$isUserActive = Request::is($urlAdmin.'*users*');
$isRoleActive = Request::is($urlAdmin.'*roles*');
$isPermissionActive = Request::is($urlAdmin.'*permissions*');
@endphp
<li class="nav-item {{($isUserActive||$isRoleActive||$isPermissionActive)?'menu-open':''}} ">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-shield-virus"></i>
        <p>
            @lang('menu.user.title')
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        @can('users.index')
        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link {{ $isUserActive ? 'active' : '' }}">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    @lang('menu.user.users')
                </p>
            </a>
        </li>
        @endcan
        @can('roles.index')
        <li class="nav-item">
            <a href="{{ route('roles.index') }}" class="nav-link {{ $isRoleActive ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>
                    @lang('menu.user.roles')
                </p>
            </a>
        </li>
        @endcan
        @can('permissions.index')
        <li class="nav-item ">
            <a href="{{ route('permissions.index') }}" class="nav-link {{ $isPermissionActive ? 'active' : '' }}">
                <i class="nav-icon fas fa-shield-alt"></i>
                <p>
                    @lang('menu.user.permissions')
                </p>
            </a>
        </li>
        @endcan
    </ul>
</li>
@endcan
@can('fileUploads.index')
<li class="nav-item">
    <a href="{{ route('fileUploads.index') }}" class="nav-link {{ Request::is('fileUploads*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-file-alt"></i>
        <p>@lang('models/fileUploads.plural')</p>
    </a>
</li>
@endcan


<li class="nav-item">
    <a href="{{ route('commentaires.index') }}"
       class="nav-link {{ Request::is('commentaires*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-comment"></i>
        <p>@lang('models/commentaires.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('familles.index') }}"
       class="nav-link {{ Request::is('familles*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-layer-group"></i>
        <p>@lang('models/familles.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('marques.index') }}"
       class="nav-link {{ Request::is('marques*') ? 'active' : '' }}">
       <i class="nav-icon fab fa-maxcdn"></i>
        <p>@lang('models/marques.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('monnaies.index') }}"
       class="nav-link {{ Request::is('monnaies*') ? 'active' : '' }}">
       <i class="nav-icon fab fa-monero"></i>
        <p>@lang('models/monnaies.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('precautionEmplois.index') }}"
       class="nav-link {{ Request::is('precautionEmplois*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-prescription"></i>
        <p>@lang('models/precautionEmplois.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('conditionConservations.index') }}"
       class="nav-link {{ Request::is('conditionConservations*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-exclamation"></i>
        <p>@lang('models/conditionConservations.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('unites.index') }}"
       class="nav-link {{ Request::is('unites*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-universal-access"></i>
        <p>@lang('models/unites.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('geographiques.index') }}"
       class="nav-link {{ Request::is('geographiques*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-globe-europe"></i>
        <p>@lang('models/geographiques.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('usines.index') }}"
       class="nav-link {{ Request::is('usines*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-industry"></i>
        <p>@lang('models/usines.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('filiales.index') }}"
       class="nav-link {{ Request::is('filiales*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-hospital-user"></i>
        <p>@lang('models/filiales.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('etatProduits.index') }}"
       class="nav-link {{ Request::is('etatProduits*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-user-md"></i>
        <p>@lang('models/etatProduits.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('pays.index') }}"
       class="nav-link {{ Request::is('pays*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-flag"></i>
        <p>@lang('models/pays.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('clients.index') }}"
       class="nav-link {{ Request::is('clients*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-user"></i>
        <p>@lang('models/clients.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('emballages.index') }}"
       class="nav-link {{ Request::is('emballages*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-box-open"></i>
        <p>@lang('models/emballages.plural')</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('listeProcesses.index') }}"
       class="nav-link {{ Request::is('listeProcesses*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-asterisk"></i>
        <p>@lang('models/listeProcesses.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('ressources.index') }}"
       class="nav-link {{ Request::is('ressources*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-user-cog"></i>
        <p>@lang('models/ressources.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('ingredients.index') }}"
       class="nav-link {{ Request::is('ingredients*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-filter"></i>
        <p>@lang('models/ingredients.plural')</p>
    </a>
</li>



<li class="nav-item">
    <a href="{{ route('compositions.index') }}"
       class="nav-link {{ Request::is('compositions*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-vial"></i>
        <p>@lang('models/compositions.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('allergenes.index') }}"
       class="nav-link {{ Request::is('allergenes*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-skull-crossbones"></i>
        <p>@lang('models/allergenes.plural')</p>
    </a>
</li>

{{-- <li class="nav-item">
    <a href="{{ route('modeleAllergenes.index') }}"
       class="nav-link {{ Request::is('modeleAllergenes*') ? 'active' : '' }}">
        <p>@lang('models/modeleAllergenes.plural')</p>
    </a>
</li> --}}

<li class="nav-item">
    <a href="{{ route('couts.index') }}"
       class="nav-link {{ Request::is('couts*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-yen-sign"></i>
        <p>@lang('models/couts.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('organoleptiques.index') }}"
       class="nav-link {{ Request::is('organoleptiques*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-bacterium"></i>
        <p>@lang('models/organoleptiques.plural')</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('physicoChimiques.index') }}"
       class="nav-link {{ Request::is('physicoChimiques*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-vial"></i>
        <p>@lang('models/physicoChimiques.plural')</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('allegations.index') }}"
       class="nav-link {{ Request::is('allegations*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-viruses"></i>
        <p>@lang('models/allegations.plural')</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('materiauxes.index') }}"
       class="nav-link {{ Request::is('materiauxes*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-wrench"></i>
        <p>@lang('models/materiauxes.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('activites.index') }}"
       class="nav-link {{ Request::is('activites*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-file-alt"></i>
        <p>@lang('models/activités.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('casEmploies.index') }}"
       class="nav-link {{ Request::is('casEmploies*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-signature"></i>
        <p>@lang('models/casEmploies.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('produitFinis.index') }}"
       class="nav-link {{ Request::is('produitFinis*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-box"></i>
        <p>@lang('models/produitFinis.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('produitSemiFinis.index') }}"
       class="nav-link {{ Request::is('produitSemiFinis*') ? 'active' : '' }}">
       <i class="nav-icon fas fa-box"></i>
        <p>@lang('models/produitSemiFinis.plural')</p>
    </a>
</li>

