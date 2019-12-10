@extends('layouts.default')
@section('style')
@endsection
@section('content')
<div id="page-wrapper">
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title mb-0">Informações da Sala</h4>
				</div>
				<div class="card-body">
					<div class="form-group form-linha">
						<input type="hidden" name="id_sala" value="" id="id_sala">
						<label for="nome_sala" class="required">Nome da sala</label>
						<input type="text" name="nome_sala" id="nome_sala" value="" class="form-control">          
					</div>
					<div class="form-group form-linha">
						<label for="capacidade" class="required">Capacidade</label>
						<input type="text" name="capacidade" id="capacidade" value="" class="form-control">           
					</div>
					<div class="checkbox form-linha">
						<label for="ventilador" class="optional">Ventilador</label>
						<input type="hidden" name="ventilador" value="0"><input type="checkbox" name="ventilador" id="ventilador" value="1">           
					</div>
					<div class="checkbox form-linha">
						<label for="ar_condicionado" class="optional">Ar condicionado</label>
						<input type="hidden" name="ar_condicionado" value="0"><input type="checkbox" name="ar_condicionado" id="ar_condicionado" value="1">           
					</div>
					<div class="checkbox form-linha">
						<label for="projetor" class="optional">Projetor</label>
						<input type="hidden" name="projetor" value="0"><input type="checkbox" name="projetor" id="projetor" value="1">            
					</div>
					<div class="form-group form-linha">
						<label for="tipo_quadro" class="optional">Tipo de Quadro</label>
						<select name="tipo_quadro" id="tipo_quadro" class="form-control">
							<option value="Verde">Verde</option>
							<option value="Branco">Branco</option>
							<option value="Verde/Branco">Verde/Branco</option>
						</select>            </div>
						<div class="form-group form-linha">
							<label for="tipo_assento" class="optional">Tipo de Assento</label>
							<select name="tipo_assento" id="tipo_assento" class="form-control">
								<option value="Escolar">Escolar</option>
								<option value="Universitária">Universitária</option>
							</select>           
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
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection
	@section('scripts')
	@endsection