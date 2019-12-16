@extends('layouts.default')
@section('style')
@endsection
@section('content')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
		<li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuarios</a></li>
		<li class="breadcrumb-item active">{{ucfirst(basename(request()->path()))}}</li>
	</ol>
</nav>
<div id="page-wrapper">

	<div class="row">

		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title mb-0">Informações do Usuario</h4>
				</div>
				<div class="card-body">
					@include('users.form')
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection
@section('scripts')
@endsection