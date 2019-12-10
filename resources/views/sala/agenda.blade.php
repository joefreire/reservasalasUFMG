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
					<h4 class="card-title mb-0">Agenda</h4>
				</div>
				<div class="card-body">
					<div id='calendar'></div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')

<script type="text/javascript">

	$(function() {
		$("#calendar").fullCalendar({
			header: {
				left: "prev,next today",
				center: "title",
				right: "month,agendaWeek,agendaDay,listMonth"
			},
			monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
			monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
			dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'],
			dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
			buttonText: {
				prev: "<",
				next: ">",
				prevYear: "<<",
				nextYear: ">>",
				today: "Hoje",
				month: "Mês",
				week: "Semana",
				list: "Lista",
				day: "Dia"
			},
			noEventsMessage: "Não há eventos para mostrar",
			allDayText: "Dia inteiro",
			weekNumbers: false,
			eventLimit: true,
			editable: true,
			events: "https://fullcalendar.io/demo-events.json"
		});
	});


</script>
@endsection