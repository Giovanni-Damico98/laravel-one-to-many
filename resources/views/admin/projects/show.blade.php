@extends('layouts.app')
@section('page-title', 'Project Show')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="text-center">My Projects</h1>
            </div>
            <div class="col-md-4 mb-4 d-flex align-items-stretch">
                <div class="card w-100 pt-2">
                    <div class="card-body">
                        <h5 class="card-title">Project Name: {{ $projects->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Started on: {{ $projects->date }}</h6>
                        <p class="card-text">
                            <strong>Languages used:</strong> {{ $projects->languages }}
                        </p>
                        <p class="card-text">
                            {{ $projects->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
