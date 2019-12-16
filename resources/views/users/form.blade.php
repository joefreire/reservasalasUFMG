
					{!! Form::open(['url' => route('users.store'), 'class' => 'ui form','id' => 'form_usuario']) !!}
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
						@if(old('_id') === null)
						<div class="form-group col-md-4">
							{!! Form::label('login', 'Login UFMG') !!}                                
							{!! Form::text('login', old('login'), array('placeholder' => '', 'class' => 'form-control')) !!}
						</div>  
						@endif 
						<div class="form-group col-md-3">
							{!! Form::label('departamento', 'Departamento') !!}                                
							{!! Form::select('departamento', \App\Models\Departamento::all()->pluck('nome','id'), old('departamento'), array('placeholder' => 'Selecione um departamento','class' => 'form-control')) !!}        
						</div> 
						<div class="form-group col-md-3">
							{!! Form::label('tipo', 'Tipo') !!}                                
							{!! Form::select('tipo', ['usuario'=>'usuario','admin'=>'admin',], old('tipo'), array('class' => 'form-control')) !!}        
						</div>
					</div>
					<div class="form-group row col-md-4">
						{!! Form::label('preferencia_quadro', 'Preferência Quadro') !!}                                
						{!! Form::select('preferencia_quadro', ['Verde'=>'Verde','Branco'=>'Branco'], old('preferencia_quadro'), array('placeholder' => '','class' => 'form-control')) !!}        
					</div> 



					<div class="row submit col-md-12">
						<div class="mt-3">

							<button name="enviar" id="enviar" type="submit" class="btn btn-square btn-outline-success"><i class="fas fa-check"></i> Enviar</button>               

							<button name="cancelar" id="cancelar" type="submit" class="btn btn-square btn-outline-danger"><i class="fas fa-ban"></i> Cancelar</button>                

						</div>
					</div>
					
					{!! Form::close() !!} 