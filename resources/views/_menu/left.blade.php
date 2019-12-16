<nav id="menuLeft" class="sidebar">
  <div class="sidebar-content ">
    <a class="sidebar-brand" href="{{route('home')}}">
      <img src="{{asset('img/logo_mini.png')}}" style="width: 24px;height: 24px;">
      <span class="align-middle">Reservas</span>
    </a>
    <ul class="sidebar-nav">
      <li class="sidebar-header">
        Menus
      </li>
      <li class="sidebar-item">
        <a href="#reservas_menu" data-toggle="collapse" class="sidebar-link collapsed">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar align-middle mr-2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line> </svg>
          <span class="align-middle">Reservas</span>

        </a>
        <ul id="reservas_menu" class="sidebar-dropdown list-unstyled collapse ">
          <li class="sidebar-item"><a class="sidebar-link" href="{{route('reservas.create')}}">Cadastrar</a></li>
          <li class="sidebar-item"><a class="sidebar-link" href="{{route('reservas.index')}}">Gerenciar</a></li>
        </ul>
      </li>
      <li class="sidebar-item">
        <a href="#salas_menu" data-toggle="collapse" class="sidebar-link collapsed">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-monitor align-middle"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg> 
          <span class="align-middle">Salas</span>
        </a>
        <ul id="salas_menu" class="sidebar-dropdown list-unstyled collapse ">
          <li class="sidebar-item"><a class="sidebar-link" href="{{route('salas.create')}}">Cadastrar</a></li>
          <li class="sidebar-item"><a class="sidebar-link" href="{{route('salas.index')}}">Gerenciar</a></li>
        </ul>
      </li>
      <li class="sidebar-item">
        <a href="#departamentos_menu" data-toggle="collapse" class="sidebar-link collapsed">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid align-middle"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
          <span class="align-middle">Departamentos</span>
        </a>
        <ul id="departamentos_menu" class="sidebar-dropdown list-unstyled collapse ">
          <li class="sidebar-item"><a class="sidebar-link" href="{{route('departamentos.create')}}">Cadastrar</a></li>
          <li class="sidebar-item"><a class="sidebar-link" href="{{route('departamentos.index')}}">Gerenciar</a></li>
        </ul>
      </li>
      <li class="sidebar-item">
        <a href="#disciplinas_menu" data-toggle="collapse" class="sidebar-link collapsed">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square align-middle mr-2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
          <span class="align-middle">Disciplinas</span>
        </a>
        <ul id="disciplinas_menu" class="sidebar-dropdown list-unstyled collapse ">
          <li class="sidebar-item"><a class="sidebar-link" href="{{route('disciplinas.create')}}">Cadastrar</a></li>
          <li class="sidebar-item"><a class="sidebar-link" href="{{route('disciplinas.index')}}">Gerenciar</a></li>
        </ul>
      </li>
      <li class="sidebar-item">
        <a href="#users_menu" data-toggle="collapse" class="sidebar-link collapsed">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users align-middle mr-2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
          <span class="align-middle">Usuarios</span>
        </a>
        <ul id="users_menu" class="sidebar-dropdown list-unstyled collapse ">
          <li class="sidebar-item"><a class="sidebar-link" href="{{route('users.create')}}">Cadastrar</a></li>
          <li class="sidebar-item"><a class="sidebar-link" href="{{route('users.index')}}">Gerenciar</a></li>
        </ul>
      </li>

    </ul>
  </div>
  <div class="sidebar-bottom d-none d-lg-block">

  </div>
</nav>