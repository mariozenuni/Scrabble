@extends('layouts.layout')

@section('content')

<!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Players List</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container mt-5">
            <table class="table table-bordered mb-5">
                <thead>
                    <tr class="table-success">
                        <th scope="col">#</th>
                        <th scope="col">Nick Name</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Address</th>
                        <th scope="col">Score</th>
                        <th scope="col">Membership</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($playersData as $player)
                    <tr>
                        <th scope="row">{{ $player->id }}</th>
                        <td>{{ $player->name }}</td>
                        <td>{{ $player->address }}</td>
                        <td>{{ $player->contact }}</td>
                        <td>{{ $player->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>

@endsection