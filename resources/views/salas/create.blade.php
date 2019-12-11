@extends('layouts.default')
@section('style')
@endsection
@section('content')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
		<li class="breadcrumb-item"><a href="{{route('salas.index')}}">Salas</a></li>
		<li class="breadcrumb-item active">{{ucfirst(basename(request()->path()))}}</li>
	</ol>
</nav>
<div id="page-wrapper">
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title mb-0">Informações da Sala</h4>
				</div>
				<div class="card-body">
					{!! Form::open(['url' => route('salas.store'), 'class' => 'ui form','files' => false]) !!}
					{!! Form::token()!!}
					<div class="form-group form-linha">
						<input type="hidden" name="_id" value="{{(old('_id'))}}" id="_id">
						<label for="nome" class="required">Nome da sala</label>
						<input type="text" name="nome" id="nome" value="{{(old('nome'))}}" class="form-control">          
					</div>
					<div class="form-group">
						{!! Form::label('departamentos', 'Departamento') !!}                                
						{!! Form::select('departamentos[]', \App\Models\Departamento::all()->pluck('nome','id'), old('departamentos'), array('class' => 'simpleSelect2 form-control', 'multiple'=>'multiple')) !!}        
					</div> 
					<div class="form-group form-linha">
						<label for="capacidade" class="required">Capacidade</label>
						<input type="number" min="0" step="1" name="capacidade" id="capacidade" value="{{(old('capacidade'))}}" class="form-control">           
					</div>


					<div class="form-group">
						{!! Form::label('tipo_quadro', 'Tipo de Quadro') !!}                                
						{!! Form::select('tipo_quadro', ['Verde'=>'Verde','Branco'=>'Branco','Verde/Branco'=>'Verde/Branco'], old('tipo_quadro'), array('placeholder' => 'Selecione o Tipo de Quadro','class' => 'form-control')) !!}        
					</div> 

					<div class="form-group">
						{!! Form::label('tipo_assento', 'Tipo de Assento') !!}                                
						{!! Form::select('tipo_assento', ['Escolar'=>'Escolar','Universitária'=>'Universitária'], old('tipo_assento'), array('placeholder' => 'Selecione o Tipo de Assento','class' => 'form-control')) !!}        
					</div> 

					<h4>Disponibilidade para Reservas</h4>
					<div class="checkbox form-linha">
						<label for="disponivel" class="optional">Disponível para Reservas</label>
						<input type="hidden" name="disponivel" value="0"><input type="checkbox" name="disponivel" id="disponivel" value="1">            
					</div>
					<div class="checkbox form-linha">
						<label for="disponivel_professor" class="optional">Disponível para Pedidos de Professores</label>
						<input type="hidden" name="disponivel_professor" value="0"><input type="checkbox" name="disponivel_professor" id="disponivel_professor" value="1">          
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