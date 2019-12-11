@extends('layouts.default')
@section('style')
@endsection
@section('content')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
		<li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuarios</a></li>
		<li class="breadcrumb-item active">{{ucfirst(basename(request()->path()))}}</li>
	</ol>
</nav>
<div id="page-wrapper">

	<div class="row">

		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title mb-0">Informações do Usuario</h4>
				</div>
				<div class="card-body">
					{!! Form::open(['url' => route('users.store'), 'class' => 'ui form','files' => false]) !!}
					{!! Form::token()!!}

					<div class="form-row">   
						<div class="form-group col-md-5">
							<input type="hidden" name="_id" value="{{old('_id') ?? ''}}">  
							{!! Form::label('nome', 'Nome') !!}                                
							{!! Form::text('nome', old('nome'), array('placeholder' => '', 'class' => 'form-control')) !!}   
						</div>
						<div class="form-group col-md-5">
							{!! Form::label('email', 'Email') !!}                                
							{!! Form::text('email', old('email'), array('placeholder' => '', 'class' => 'form-control')) !!}
						</div>
					</div>

					<div class="form-row"> 
						<div class="form-group col-md-4">
							{!! Form::label('login', 'Login UFMG') !!}                                
							{!! Form::text('login', old('login'), array('placeholder' => '', 'class' => 'form-control')) !!}
						</div>   
						<div class="form-group col-md-3">
							{!! Form::label('departamento', 'Departamento') !!}                                
							{!! Form::select('departamento', \App\Models\Departamento::all()->pluck('nome','id'), old('departamento'), array('placeholder' => 'Selecione um departamento','class' => 'form-control')) !!}        
						</div> 
						<div class="form-group col-md-3">
							{!! Form::label('tipo', 'Tipo') !!}                                
							{!! Form::select('tipo', [''=>'Selecione um tipo','admin'=>'admin','usuario'=>'usuario'], old('tipo'), array('class' => 'form-control')) !!}        
						</div>
					</div>



					<div class="row submit col-md-12">
						<div class="mt-3">

							<button name="enviar" id="enviar" type="submit" class="btn btn-square btn-outline-success"><i class="fas fa-check"></i> Enviar</button>               

							<button name="cancelar" id="cancelar" type="submit" class="btn btn-square btn-outline-danger"><i class="fas fa-ban"></i> Cancelar</button>                

						</div>
					</div>
				</div>
				{!! Form::close() !!} 
			</div>
		</div>
	</div>
</div>
</div>
@endsection
@section('scripts')
@endsection