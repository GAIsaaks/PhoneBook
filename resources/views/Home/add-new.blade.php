@extends('layouts.app')

@section('content')
<h1>Add New Contact</h1>
    {!! Form::open(['action' => 'ContactsController@store', 'method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
            {{Form::label('Name', 'Name')}}
            {{Form::Text('Name','',['class'=>'form-control','placeholder'=>'Contact name'])}}
    </div>
    <div class="form-group">
            {{Form::label('Number', 'Number')}}
            {{Form::Text('Number','',['class'=>'form-control','placeholder'=>'Contact number'])}}
    </div>
    <div class="form-group">
            {{Form::label('Email', 'Email')}}
            {{Form::Text('Email','',['class'=>'form-control','placeholder'=>'Contact Email'])}}
    </div>
    <div class="form-group">
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}} 
    </div>
    {!! Form::close() !!}
@endsection