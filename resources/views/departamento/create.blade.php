@extends('layouts.default')
@section('style')
@endsection
@section('content')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
		<li class="breadcrumb-item"><a href="{{route('departamentos.index')}}">Departamentos</a></li>
		<li class="breadcrumb-item active">Novo</li>
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
						<div class="row form-linha">
							<div class="col-md-12">
								<div class="form-group">									
									<input type="hidden" name="id_departamento" value="" id="id_departamento">           
									<label for="nome_departamento" class="required">Nome do Departamento</label>
									<input type="text" name="nome_departamento" id="nome_departamento" value="" placeholder="Digite o nome do departamento" class="form-control">          
								</div>
							</div>
						</div>
						<div class="row form-linha">
							<div class="col-md-12">
								<div class="form-group">
									<label for="codigo_departamento" class="required">Código do Departamento</label>
									<input type="text" name="codigo_departamento" id="codigo_departamento" value="" placeholder="Indique o código do departamento. Ex: DCC" class="form-control">           
								</div>
							</div>
						</div>
						<div class="row form-linha">
							<div class="col-md-12">
								<div class="form-group">
									<label for="descricao_departamento" class="optional">Descrição do Departamento</label>
									<textarea name="descricao_departamento" id="descricao_departamento" rows="7" class="form-control" placeholder="Dê a descrição do departamento. Esse campo não é obrigatório." cols="80"></textarea>            </div>
								</div>
							</div>


							<div class="row submit col-md-12">
								<div class="mb-3 aligt">

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