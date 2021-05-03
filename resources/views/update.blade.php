@extends('layout')

@section('content')

<div class="card mt-5">
<div class="card-header">
Update
</div>
<div class="card-body">
@if($errors->any())
<div class="alert alert-danger">
<ul>
@foreach($errors->all()as $error)
<li>{{$error}}</li>
@endforeach
</ul>
</div>
@endif
<form  method="post" action=" {{route( 'empregos.update',$emprego->id )}} ">
<div class="form-group">
@csrf
@method('PATCH')
<label for="name">Nome</label>
<input type="text" class="form-control" name="name" value="{{ emprego->email }}">
</div>
<div class="form-group">
<label for="phone">Telefone</label>
<input type="tel" class="form-control" name="phone" value="{{ $emprego->phone }}">

</div>
<button type="submit" class="btn btn-block btn-danger">Update</button>

</form>

</div>


</div>
@endsection