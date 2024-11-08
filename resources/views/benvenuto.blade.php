<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portfolio</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="container">
    <div class="">
        @if (Route::has('login'))
            <div class="">
                @auth
                    <a href="{{ url('/admin/projects') }}" class="btn btn-primary m-2">Projects
                    </a>
                    <a href="{{ url('/home') }}" class="btn btn-primary m-2">Home</a>
                @else
                    <a href="{{ route('login') }}" class="">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="">
            <div class="flex justify-center text-center mt-6">
                <div>
                    <h1 class="fw-bold">Portfolio</h1>
                    <h2>Giovanni D'Amico</h2>
                </div>
            </div>

            <div class="row">
                @forelse ($projects as $project)
                    <div class=" card col-md-5 m-4 d-flex align-items-stretch">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Nome del progetto: <strong>{{ $project->name }}</strong>
                            </h5>
                            <h4 class="card-subtitle mb-3 text-muted">Tipo di progetto:
                                <strong>{{ $project->type->name }}</strong>
                            </h4>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Iniziato in data: <strong>{{ $project->date }}</strong></h6>
                            <p class="card-text">
                                Linguaggio utilizzato: <strong>{{ $project->languages }}</strong>
                            </p>
                            <p class="card-text">
                                {{ $project->description }}
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.projects.show', ['id' => $project->id]) }}"
                                class="btn btn-primary w-100 ">Show
                                more</a>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <h2 class="text-center">Non è presente alcun progetto!</h2>
                    </div>
                @endforelse
            </div>

            <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                    <div class="flex items-center gap-4">
                        <a href="https://github.com/sponsors/taylorotwell"
                            class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5"
                                class="-mt-px mr-1 w-5 h-5 stroke-gray-400 dark:stroke-gray-600 group-hover:stroke-gray-600 dark:group-hover:stroke-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                            Sponsor
                        </a>
                    </div>
                </div>

                <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </div>
            </div>
        </div>
    </div>
</body>

</html>
