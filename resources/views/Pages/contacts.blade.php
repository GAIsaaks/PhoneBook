@extends('layouts.app')

@section('content')
<h1>Contacts</h1>
@if (count($contacts) > 0)

@foreach ($contacts as $contact)
    <div class="well">
<div class="list-contacts row">

    <div class="col-md-9">
    <div class="col-md-6 col-sm-6"><a href="/contacts/{{$contact->id}}/edit">{{ $contact->name }} </a></div><div class="col-md-6 col-sm-6"> {{$contact->number}}</div>
    </div> 
    <div class="col-md-3">
    {!!Form::open(['action'=>['ContactsController@destroy',$contact->id],'method'=>'POST','class'=>'float-right'])!!}
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
    {!!Form::close()!!}    
    &nbsp; <a href="/contacts/{{$contact->id}}/edit" class="btn btn-success float-right">Edit</a></div>
</div>
    
    </div>
@endforeach        
{{ $contacts->links() }}    
@else
 <h3>No contacts found</h3>
@endif
<div class="actions">
    <a href="/contacts/create" class="createNew btn btn-primary">New</a>
</div>
@endsection

<style>
.list-contacts { margin: 1% 0 }
</style>


