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
                        <h5 class="card-title mb-3">Nome del progetto: <strong>{{ $projects->name }}</strong>
                        </h5>
                        <h4 class="card-subtitle mb-3 text-muted">Tipo di progetto:
                            <strong>{{ $projects->type->name }}</strong>
                        </h4>
                        <h6 class="card-subtitle mb-2 text-muted">
                            Iniziato in data: <strong>{{ $projects->date }}</strong></h6>
                        <p class="card-text">
                            Linguaggio utilizzato: <strong>{{ $projects->languages }}</strong>
                        </p>
                        <p class="card-text">
                            {{ $projects->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- altri progetti dello stesso tipo -->
        <div class="row mt-5">
            @if ($relatedProjects->isNotEmpty())
                <h2 class="col-12 text-center">Progetti correlati</h2>
                @foreach ($relatedProjects as $relatedProject)
                    <div class="col-md-4 mb-4 d-flex align-items-stretch">
                        <div class="card w-100 pt-2">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Nome del progetto: <strong>{{ $relatedProject->name }}</strong>
                                </h5>
                                <h4 class="card-subtitle mb-3 text-muted">Tipo di progetto:
                                    <strong>{{ $relatedProject->type->name }}</strong>
                                </h4>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    Iniziato in data: <strong>{{ $relatedProject->date }}</strong></h6>
                                <p class="card-text">
                                    Linguaggio utilizzato: <strong>{{ $relatedProject->languages }}</strong>
                                </p>
                                <p class="card-text">
                                    {{ $relatedProject->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <p class="text-center">Non sono presenti progetti dello stesso tipo</p>
                </div>
            @endif
        </div>
    </div>

@endsection
