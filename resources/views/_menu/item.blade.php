@if (count($menu['sub-menu']) > 0)
    @if($menu['principal'] == null && count($menu['sub-menu'][0]) > 0)
        <li class="sidebar-item"><a class="sidebar-link" href="{{ url('menus') }}">Menus</a></li>
    @else
        
    @endif
    
    @if($menu['principal'])
    <li class="sidebar-item active">
        <a href="#subleft{{$menu['id']}}" data-toggle="collapse" class="sidebar-link collapsed">
            @if($menu['icone'] != "")
                <i class="align-middle mr-2 fas fa-fw {{$menu['icone']}}" ></i> <span class="align-middle">{{$menu['nome']}}</span>
            @else
                <i class="align-middle"></i> <span class="align-middle">{{$menu['nome']}}</span>
            @endif
        </a>
        
        <ul id="subleft{{$menu['id']}}" class="sidebar-dropdown list-unstyled collapse">
        @endif
        @foreach($menu['sub-menu'] as $menu)
            @include('_menu.item', $menu)
        @endforeach
        </ul>
    </li>
@else
    <li class="sidebar-item {{($menu['rota']==\Route::currentRouteName()?"active":"")}}">

        @if(!empty($menu['rota']) && Route::has($menu['rota']))
        <a class="sidebar-link" href="{{ route($menu['rota']) }}">
            @if($menu['icone'] != "")
                <i class="align-middle mr-2 fas fa-fw fa-{{$menu['icone']}}" ></i> <span class="align-middle">{{$menu['nome']}}</span>
            @else
                <i class="align-middle"></i> <span class="align-middle">{{$menu['nome']}}</span>
            @endif
        </a>
        @elseif(empty($menu['rota']))
        <a class="sidebar-link" href="#">
            @if($menu['icone'] != "")
                <i class="align-middle mr-2 fas fa-fw fa-{{$menu['icone']}}" ></i> <span class="align-middle">{{$menu['nome']}}</span>
            @else
                <i class="align-middle"></i> <span class="align-middle">{{$menu['nome']}}</span>
            @endif
        </a>
        @endif
    </li>
@endif