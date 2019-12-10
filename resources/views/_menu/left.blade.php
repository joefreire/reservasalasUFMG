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
      <a href="#salas" data-toggle="collapse" class="sidebar-link collapsed">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-monitor align-middle"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg> <span class="align-middle">Salas</span>
      </a>
      <ul id="salas" class="sidebar-dropdown list-unstyled collapse ">
        <li class="sidebar-item"><a class="sidebar-link" href="{{route('salas.create')}}">Cadastrar</a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="{{route('salas.index')}}">Gerenciar</a></li>
      </ul>
    </li>
    <li class="sidebar-item">
      <a href="#departamentos" data-toggle="collapse" class="sidebar-link collapsed">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid align-middle"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
        <span class="align-middle">Departamentos</span>
      </a>
      <ul id="departamentos" class="sidebar-dropdown list-unstyled collapse ">
        <li class="sidebar-item"><a class="sidebar-link" href="{{route('departamentos.create')}}">Cadastrar</a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="{{route('departamentos.index')}}">Gerenciar</a></li>
      </ul>
    </li>

  </ul>
</div>
<div class="sidebar-bottom d-none d-lg-block">

</div>
</nav>