




@extends('layout')

@section('content')

<div class="mt-5">
@if(session()->get('success'))
<div class="alert alert-success">
  {{ session()->get('success') }}
</div>
@endif

<table class="table">
<thead>
<tr class="table-primary">
<td># ID</td>
<td>Nome</td>
<td>Email</td>
<td>Phone</td>
<td>Action</td>
</tr>
</thead>
<tbody>
@foreach($emprego as $emprego)
<tr>
<td> {{$emprego->id}} </td>
<td> {{$emprego->name}}  </td>
<td> {{$emprego->email}} </td>
<td> {{$emprego->phone}}  </td>
<td class="text-center">
 <a href=" {{route('empregos.edit',$emprego->id)}}" class="btn btn-success btn-sm">edit</a>
 <form action="{{route('empregos.destroy',$emprego->id)}}" method="post" style="display:inline-block">
 @csrf
 @method('DELETE')
 <button class="btn btn-danger btn-sm" type="submit">Delete</button>
 
 </form>

 </td>

</tr>
@endforeach
</tbody>

</table>
</div>

@endsection