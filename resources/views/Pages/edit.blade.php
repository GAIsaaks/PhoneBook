@extends('layouts.app')

@section('content')
<a href="/contacts" class="btn btn-secondary ">Back</a>    
    <h1>Edit Contact</h1>
    {!! Form::open(['action' => ['ContactsController@update',$contact->id], 'method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
            {{Form::label('Name', 'Name')}}
            {{Form::Text('Name',$contact->name,['class'=>'form-control','placeholder'=>'Contact name'])}}
    </div>
    <div class="form-group">
            {{Form::label('Number', 'Number')}}
            {{Form::Text('Number',$contact->number,['class'=>'form-control','placeholder'=>'Contact number'])}}
    </div>
    <div class="form-group">
            {{Form::label('Email', 'Email')}}
            {{Form::Text('Email',$contact->email,['class'=>'form-control','placeholder'=>'Contact Email'])}}
    </div>
    
    
    {{Form::hidden('_method','PUT')}}
    <div class="form-group">
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}} 
    </div>
    {!! Form::close() !!}
@endsection