@extends('layouts.default')
@section('style')
@endsection
@section('content')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
		<li class="breadcrumb-item"><a href="{{route('departamentos.index')}}">Departamentos</a></li>
		<li class="breadcrumb-item active">{{ucfirst(basename(request()->path()))}}</li>
	</ol>
</nav>
<div id="page-wrapper">

	<div class="row">

		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title mb-0">Informações do Departamento</h4>
				</div>
				<div class="card-body">
					{!! Form::open(['url' => route('departamentos.store'), 'class' => 'ui form','files' => false]) !!}
					{!! Form::token()!!}
					<div class="row form-group col-md-3">
						{!! Form::label('unidade', 'Unidade') !!}                                
						{!! Form::select('unidade', \App\Models\Unidade::all()->pluck('nome','id'), old('unidade'), array('placeholder' => 'Selecione uma Unidade','class' => 'form-control')) !!}        
					</div> 
					<div class="row form-linha">
						<div class="col-md-12">
							<div class="form-group">									
								<input type="hidden" name="_id" value="{{old('_id') ?? ''}}">           
								<label for="nome" class="required">Nome do Departamento</label>
								<input type="text" name="nome" id="nome" value="{{old('nome') ?? ''}}" placeholder="Digite o nome do departamento" class="form-control">          
							</div>
						</div>
					</div>

					<div class="row form-linha">
						<div class="col-md-12">
							<div class="form-group">
								<label for="codigo" class="required">Código do Departamento</label>
								<input type="text" name="codigo" id="codigo" value="{{old('codigo') ?? ''}}" placeholder="Indique o código do departamento. Ex: DCC" class="form-control">           
							</div>
						</div>
					</div>

					<div class="row form-linha">
						<div class="col-md-12">
							<div class="form-group">
								<label for="descricao" class="optional">Descrição do Departamento</label>
								{{ Form::textarea('content',old('descricao'),array('name' => 'descricao','class' => 'form-control', 'rows'=>'7')) }}

							</div>
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