@extends('layouts.default')
@section('style')
<link href='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.css' rel='stylesheet' />
<style type="text/css">
	.map-canvas{
		overflow:hidden;
		padding-bottom:56.25%;
		position:relative;
		height:0;
	}
	.map-canvas iframe{
		left:0;
		top:0;
		height:100%;
		width:100%;
		position:absolute;
	}
</style>
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
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title mb-0">Informações da Sala</h4>
				</div>
				<div class="card-body">
					{!! Form::open(['url' => route('salas.store'), 'class' => 'ui form','files' => false]) !!}

					<div class="row">
						<div class="col-md-6">

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



						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">Localização</h5>
									<div class="form-group">
										<div class="form-group">
											{{ Form::label('descricao_local', 'Descrição do local', ['class' => 'control-label']) }}
											{{ Form::text('descricao_local', old('descricao_local'), array('class' => 'form-control'))}}
										</div>
										<div id="map-canvas" class="z-depth-1-half map-canvas" style="height: 300px"></div>
										<pre id="coordinates" class="coordinates"></pre>
										<div class="row">
											<div class="form-group col-md-6">
												{{ Form::label('latitude', 'Latitude', ['class' => 'control-label']) }}
												{{ Form::text('latitude', (old('localizacao')["coordinates"][1] ?? '-43.964459'), array('class' => 'form-control'))}}      
											</div> 
											<div class="form-group col-md-6">
												{{ Form::label('longitude', 'Longitude', ['class' => 'control-label']) }}
												{{ Form::text('longitude', (old('localizacao')["coordinates"][0] ?? '-19.869288'), array('class' => 'form-control'))}}      
											</div> 
										</div> 
									</div>
								</div>
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
	<script src='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.js'></script>
	<script>
		mapboxgl.accessToken = 'pk.eyJ1IjoiZ3VpZnJlaXJlIiwiYSI6ImNrMXZkaDJ2azBkaTkzbWxvY3c3OGFmbjgifQ.z1J5JM5H3q7sXvQWNL2rgg';
		var map = new mapboxgl.Map({
			container: 'map-canvas', 
			style: 'mapbox://styles/mapbox/streets-v11', 
			center: [-43.964459, -19.869288], 
			zoom: 15
		});
		var marker = new mapboxgl.Marker({
			draggable: true
		})
		.setLngLat([{{ isset(old('localizacao')["coordinates"][0]) ? old('localizacao')["coordinates"][0]: -43.964459}}, {{ isset(old('localizacao')["coordinates"][1]) ? old('localizacao')["coordinates"][1]: -43.964459}}])
		.addTo(map);
		console
		function onDragEnd() {
			var lngLat = marker.getLngLat();
			$('#latitude').val(lngLat.lat)
			$('#longitude').val(lngLat.lng)
/*			coordinates.style.display = 'block';
			coordinates.innerHTML =
			'Longitude: ' + lngLat.lng + '<br />Latitude: ' + lngLat.lat;*/
		}

		marker.on('dragend', onDragEnd);
	</script>
	@endsection