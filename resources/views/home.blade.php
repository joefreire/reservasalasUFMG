@extends('layouts.default')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          You are logged in!
        </div>
      </div>
    </div>        
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Próximos Eventos</div>

        <div class="card-body">
         
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
