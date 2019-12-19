@extends('layouts.default')
@section('style')
<style type="text/css">
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />


@endsection
@section('content')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
		<li class="breadcrumb-item"><a href="{{route('reservas.index')}}">Reservas</a></li>
		<li class="breadcrumb-item active">{{ucfirst(basename(request()->path()))}}</li>
	</ol>
</nav>
<div id="page-wrapper">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title mb-0">Cadastrar reserva</h4>
				</div>
				<div class="card-body">
					{!! Form::open(['url' => route('reservas.store'), 'class' => 'ui form','files' => false, 'id'=>"app"]) !!}
					{!! Form::token()!!}
					<div class="row">
						<div class="form-group col-md-3">
							{!! Form::label('tipo_reserva', 'Tipo de Reserva') !!}                                
							{!! Form::select('tipo_reserva', ['Evento'=>'Evento','Aula'=>'Aula','Prova'=>'Prova'], old('tipo_reserva'), array('placeholder' => '','class' => 'form-control')) !!}        
						</div> 
						<div class="form-group col-md-3">
							{!! Form::label('tipo_reserva', 'Tipo de Reserva') !!}                                
							{!! Form::select('tipo_reserva', ['Evento'=>'Evento','Aula'=>'Aula','Prova'=>'Prova'], old('tipo_reserva'), array('placeholder' => '','class' => 'form-control')) !!}        
						</div> 
						<div class="form-group col-md-3">
							{!! Form::label('responsavel', 'Resposável pela Reserva') !!}                                
							<div class="input-group-append">
								{!! Form::select('responsavel', \App\Models\User::all()->pluck('login','_id'), old('responsavel'), array('placeholder' => '','class' => 'simpleSelect2 form-control')) !!}     
								<button id="novo_usuario" class="btn btn-square btn-outline-success"><i class="align-middle fa fa-plus"></i></button>  
							</div> 
						</div> 
					</div> 
					<div class="row">
						<div class="form-group col-md-3">
							<label for="data_inicial" id="label_data" class="required">Data Inicial</label>
							<input type="text" name="data_inicial" id="data_inicial" value="{{(old('data_inicial'))}}" class="form-control">     
						</div>
						<div class="form-group col-md-3">
							{!! Form::label('recorrencia', 'Recorrência') !!}                                
							{!! Form::select('recorrencia', ['Unica'=>'Única','Diaria'=>'Diária','Semanal'=>'Semanal','Mensal'=>'Mensal'], old('recorrencia'), array('placeholder' => '','class' => 'form-control')) !!}        
						</div> 						
						<div class="form-group col-md-3">
							<label for="data_final" id="label_data" class="required">Data Final</label>
							<input type="text" name="data_final" id="data_final" value="{{(old('data_final'))}}" class="form-control">     
						</div>					
						<div class="form-group col-md-3">
							<label for="dias_recorrencia[]" id="label_dias">Dias de Recorrência</label>
							{!! Form::select('dias_recorrencia[]', ['Segunda'=>'Segunda','Terca'=>'Terca','Quarta'=>'Quarta','Quinta'=>'Quinta','Sexta'=>'Sexta','Sabado'=>'Sábado','Domingo'=>'Domingo'], old('dias_recorrencia[]'), array('multiple' => '','id' => 'dias_recorrencia','class' => 'simpleSelect2 form-control')) !!}       
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
<div class="modal fade" id="adiciona_usuario" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Cadastrar novo usuario</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body m-3">
				<div id="errors_form"></div>
				@include('users.form')
			</div>

		</div>
	</div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.pt.min.js"></script>

<script>
	$( document ).ready(function() {
		$('#data_inicial').datepicker({ 
			autoclose: true, 
			weekStart: 1,
			format: 'dd/mm/yyyy',
			language: "pt-BR",
			startDate: 'today',
		}).on('changeDate', function (e) {
			$('#data_final').datepicker('setStartDate', $("#data_inicial").val());
		});
		$('#data_final').datepicker({ 
			autoclose: true, 
			weekStart: 1,
			format: 'dd/mm/yyyy',
			language: "pt-BR",
			startDate: 'today',
		}).on('changeDate', function (e) {
			$('#data_inicial').datepicker('setEndDate', $("#data_final").val());
		});

	});


	$(document).on('change', '#recorrencia', function(e){
		if($(this).val()== 'Unica'){
			$("#data_final").datepicker("update", $('#data_inicial').val());
			$("#data_final").parent().hide()
			$("#dias_recorrencia").parent().hide()
		}else{
			$("#data_final").parent().show()
			$("#dias_recorrencia").parent().show()
		}
		

	});

	$(document).on('click', '#novo_usuario', function(e){
		e.preventDefault();
		$('#adiciona_usuario').modal('toggle');
	});
	$(document).on( 'submit', '#form_usuario', function(e){
		e.preventDefault();
		$("#errors_form").html('');
		$.ajax({
			url     : $(this).attr('action'),
			type    : $(this).attr('method'),
			dataType: 'json',
			data    : $(this).serialize(),
			success : function( data ) {
				$('#responsavel').append(
					'<option value="' + data.id + '">' + data.login + '</option>'
					);
				var newOption = new Option(data.login, data.id, false, false);
				$('#responsavel').append(newOption).trigger('change');
				$('#responsavel').val(data.id).trigger('change');
				$('#adiciona_usuario').modal('toggle');
			},
			error   : function( reject ) {
				if( reject.status === 422 ) {
					var errors = $.parseJSON(reject.responseText);
					$.each(errors.errors, function (key, val) {
						var alerta = '<div class="alert alert-danger alert-dismissible" role="alert">'+
						'<div class="alert-message">'+
						key+': '+ val[0]+
						'</div>'+
						'</div>';
						$("#errors_form").append(alerta);
						console.log(key,val)
					});
				}else{
					var alerta = '<div class="alert alert-danger alert-dismissible" role="alert">'+
					'<div class="alert-message">'+
					'<strong>Atenção!</strong><br>'+
					'Erro ao salvar novo usuario tente fazer link <a href="{{route('users.create')}}">{{route('users.create')}}</a>'
					'</div>'+
					'</div>';
					$("#errors_form").append('');
				}    
			}
		});  
	});
</script>


@endsection