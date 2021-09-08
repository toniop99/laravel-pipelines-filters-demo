<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pipelines Demo - Videos</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
          integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
<div class="d-flex justify-content-center m-4">
    <div class="content">
        @if(isset($videos) && !$videos->isEmpty())
            <table>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Video de</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Duración</th>


                </tr>
                @foreach($videos as $video)
                    <tr>
                        <td>{{ $video->id }}</td>
                        <td>{{ $video->user->name }}</td>
                        <td>{{ $video->translations->first()->name }}</td>
                        <td>{{ $video->duration }}</td>
                    </tr>

                @endforeach
            </table>
        @elseif(isset($error) && $error === true)
            <h1 class="text-danger">Hubo un error al recuperar los videos</h1>
            <p class="error-message">{{$message}}</p>
        @else
            <p>No se ha encontrado ningún video con esos filtros</p>
        @endif

        @if(isset($videos) && method_exists($videos, 'links'))
            <div class="links mt-4">
                {{ $videos->appends(request()->input())->links("pagination::bootstrap-4") }}
            </div>
        @endif
    </div>
</div>
</body>
</html>
