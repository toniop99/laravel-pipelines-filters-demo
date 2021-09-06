<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pipelines Demo</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
          integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
<div class="d-flex justify-content-center m-4">
    <div class="content">
        @if(!$users->isEmpty())
            <table>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Activo</th>
                    <th scope="col">email</th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td class="{{$user->active ? 'text-success' : 'text-danger'}}">{{ $user->active ? 'Activo' : 'Inactivo' }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>

                @endforeach
            </table>
        @else
            <p>No se ha encontrado ningún usuario con esos filtros</p>
        @endif
        <div class="links mt-4">
            {{ $users->appends(request()->input())->links("pagination::bootstrap-4") }}
        </div>
    </div>
</div>
</body>
</html>
