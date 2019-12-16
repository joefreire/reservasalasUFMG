@extends('layouts.default')
@section('style')

@endsection

@section('content')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
		<li class="breadcrumb-item active">Departamentos</li>
	</ol>
</nav>
<div id="page-wrapper">   
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<a href="{{route('departamentos.create')}}" class="btn btn-outline-primary btn-square float-right">Novo</a>
				<h5 class="card-title">Departamentos</h5>

			</div>

			<div class="card-body">
				<table class="table table-bordered table-hover display nowrap dataTable" id="table" width="100%">                            
					<thead>
						<tr>
							<th>Unidade</th>
							<th>Nome</th>
							<th>Código</th>
							<th>Ação</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>


@endsection

@section('scripts')
<script type="text/javascript">
	$(function() {
		$('#table').DataTable({
			processing: true,
			serverSide: true,
			ajax: {
				url: "{{route('departamentos.data')}}",
				type: 'POST',
				dataType: "json",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			},
			language: {
				url: "{{ asset('dist/datatables/Portuguese-Brasil.json') }}"
			}, 
			columns: [
			{ data: 'unidade.nome', name: 'unidade.nome', defaultContent:'' },
			{ data: 'nome', name: 'nome' },
			{ data: 'codigo', name: 'codigo' },
			{ data: 'id', render: function ( data, type, row, meta ){
				return '<a href="departamentos/'+row._id+'/editar"><i class="align-middle mr-2 fas fa-fw fa-edit" data-feather="edit-2"></i>Editar </a><a href="departamentos/'+row._id+'/destroy"><i class="align-middle mr-2 fas fa-fw fa-trash" data-feather="trash"></i>Excluir</a>';
			}}
			]
		});
	});
</script>
</script>
@endsection 