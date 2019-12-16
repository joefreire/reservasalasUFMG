@extends('layouts.default')
@section('style')
<style type="text/css">
</style>
@endsection
@section('content')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
		<li class="breadcrumb-item"><a href="{{route('disciplinas.index')}}">Disciplinas</a></li>
		<li class="breadcrumb-item active">{{ucfirst(basename(request()->path()))}}</li>
	</ol>
</nav>
<div id="page-wrapper">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title mb-0">Informações da Disciplina</h4>
				</div>
				<div class="card-body">
					{!! Form::open(['url' => route('disciplinas.store'), 'class' => 'ui form','files' => false]) !!}

					<div class="row">
						<div class="col-md-12">

							{!! Form::token()!!}
							<div class="form-group form-linha">
								<input type="hidden" name="_id" value="{{(old('_id'))}}" id="_id">
								<label for="nome" class="required">Nome da Disciplina</label>
								<input type="text" name="nome" id="nome" value="{{(old('nome'))}}" class="form-control">          
							</div>
							<div class="form-group form-linha">
								<label for="codigo" class="required">Código da Disciplina</label>
								<input type="text" name="codigo" id="codigo" value="{{(old('codigo'))}}" class="form-control">          
							</div>
							<div class="form-group">
								{!! Form::label('departamentos', 'Departamento') !!}                                
								{!! Form::select('departamentos[]', \App\Models\Departamento::all()->pluck('nome','id'), old('departamentos'), array('class' => 'simpleSelect2 form-control', 'multiple'=>'multiple')) !!}        
							</div> 

						</div>
						<div class="submit col-md-12">
							<div class="mt-3">

								<button name="enviar" id="enviar" type="submit" class="btn btn-square btn-outline-success"><i class="fas fa-check"></i> Enviar</button>               

								<button name="cancelar" id="cancelar" type="submit" class="btn btn-square btn-outline-danger"><i class="fas fa-ban"></i> Cancelar</button>                

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
	<script>

	</script>
	@endsection