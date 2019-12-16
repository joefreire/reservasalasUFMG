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
					<h4 class="card-title mb-0">Informações da Unidade</h4>
				</div>
				<div class="card-body">
					{!! Form::open(['url' => route('departamentos.store.unidade'), 'class' => 'ui form','files' => false]) !!}
					{!! Form::token()!!}
					<div class="row form-linha">
						<div class="col-md-12">
							<div class="form-group">									
								<input type="hidden" name="_id" value="{{old('_id') ?? ''}}">           
								<label for="nome" class="required">Nome da Unidade</label>
								<input type="text" name="nome" id="nome" value="{{old('nome') ?? ''}}" placeholder="Digite o nome da Unidade" class="form-control">          
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