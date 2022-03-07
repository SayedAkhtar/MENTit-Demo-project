<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
              rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body class="antialiased">
    <main role="main">
        <div class="container">
            <section class="todo mt-5 mx-auto">
                <h1 class="text-light mb-3">Todo</h1>

                <form class="search mb-4" autocomplete="off">
                    <div class="form-group">
                        <input class="form-control m-auto text-light" type="text" name="search" placeholder="Search" />
                    </div>
                </form>

                <ul class="todos list-group text-light">
                    @forelse($todos as $todo)
                    <li class="list-group-item">{{ $todo->name }} <span class="delete material-icons float-right" data-id="{{ $todo->id }}">delete_outline</span></li>
                    @empty
                    <li class="list-group-item">No todos yet</li>
                    @endforelse
                </ul>

                <form class="add mt-4" autocomplete="off">
                    <div class="form-group">
                        @method('delete')
                        <label for="task" class="text-light mb-3">Add a task</label>
                        <input type="text" class="form-control text-light" id="task" name="task">
                        <div class="invalid-feedback">Looks empty&hellip;</div>
                    </div>
                </form>
            </section>
        </div>
        </div>
    </main>
    <script src="{{ asset('/js/app.js') }}"></script>
    </body>
</html>
