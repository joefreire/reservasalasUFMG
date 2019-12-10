

@if(\Session::has('alert'))
<div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="alert-icon">
        <i class="far fa-fw fa-bell"></i>
    </div>
    <div class="alert-message">
        {{ $message ?? \Session::get('alert')}}
    </div>
</div>
@endif

@if(\Session::has('error'))
<div class="alert alert-error alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="alert-icon">
        <i class="far fa-fw fa-bell"></i>
    </div>
    <div class="alert-message">
        {{ $message ?? \Session::get('error')}}
    </div>
</div>
@endif

@if(\Session::has('success'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="alert-icon">
        <i class="far fa-fw fa-bell"></i>
    </div>
    <div class="alert-message">
        {{ $message ?? \Session::get('success')}}
    </div>
</div>
@endif
<!--
@if($errors->any())
<div class="container" style="width: 100%">
  <div class="alert alert-danger" style="margin: 15px;"> 
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </div>
</div>
@endif
-->
@if($errors->any())
<div class="col-md-12">
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <div class="alert-icon">
            <i class="far fa-fw fa-bell"></i>
        </div>
        <div class="alert-message">
            <strong>Atenção!</strong><br>
            @foreach ($errors->all() as $error)
            {{ $error }}<br>
            @endforeach
        </div>
    </div>
</div>
@endif