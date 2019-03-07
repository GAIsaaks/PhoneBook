@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/contacts" class="col-md-6 col-sm-6">Manage contacts </a>
                    <a href="/import" class="col-md-6 col-sm-6">upload contacts file</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
