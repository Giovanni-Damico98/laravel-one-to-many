@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card w-100 pt-2">
            <div class="card-body">
                <h5 class="card-title">Crea un nuovo progetto</h5>
                <form action="{{ route('admin.projects.store') }}" method="POST"
                    onsubmit="return confirm('Sei sicuro di voler creare questo progetto?');">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nome del progetto</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="date">Iniziato in data</label>
                        <input type="date" name="date" id="date" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="languages">Linguaggio utilizzato</label>
                        <input type="text" name="languages" id="languages" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Descrizione</label>
                        <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Crea il progetto</button>
                    <button type="reset" class="btn btn-warning mx-1 mt-3">Pulisci</button>
                    <a href="{{ route('admin.projects.store') }}" class="btn btn-danger mt-3">Torna alla home</a>
                </form>
            </div>
        </div>
    </div>
@endsection
