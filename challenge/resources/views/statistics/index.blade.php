@extends('layouts.layout')

@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Scrabble Club UK</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('players.create') }}" title="Create a project"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
        
            <th>No</th>
            <th>Name</th>
            <th>Date</th>
            <th>Score</th>
            <th>Wins</th>
            <th>Losses</th>
            
         
           
            <th width="280px">Action</th>
        </tr>
        @foreach ($playerData as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{date_format($player->date,'jS M Y') }}</td>
                <td>{{ $data->score }}</td>
                <td>{{ $data->wins }}</td>
                <td>{{ $data->losses }}</td>
              
                
                <td>
                    <form action="{{ route('statistics.destroy', $statistic->id) }}" method="POST">

                        <a href="{{ route('statistics.show', $statistic->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('statistics.edit', $statistic->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $players->links() !!}



@endsection