@extends('layouts.default')
@section('style')
@endsection

@section('content')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
		<li class="breadcrumb-item active">Disciplinas</li>
	</ol>
</nav>
<div id="page-wrapper">   
	<div id="app">
		<example></example>
	</div>
</div>


@endsection

@section('scripts')
<script src="{{asset('js/app.js')}}" ></script>
@endsection 