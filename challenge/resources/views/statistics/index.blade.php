
@extends('layouts2.layouts')

@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Hightlights Players</h2>
            </div>
      
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('statistics.create') }}" title="Create a statistics"> <i class="fas fa-plus-circle"></i>
                    </a>
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
            <th>Date</th>
            <th>Score</th>
            <th>Wins</th>
            <th>Losses</th>
            <th>Player</th>
         
           
            <th width="280px">Action</th>
        </tr>
        @foreach ($playerStatistics as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{date('d M Y', strtotime($data->created_at))}}</td>
                <td>{{ $data->score }}</td>
                <td>{{ $data->wins }}</td>
                <td>{{ $data->losses }}</td>
                <td>{{ $data->user_id }}</td>
              
                
                <td>
                    <form action="{{ route('statistics.destroy', $data->id) }}" method="POST">

                        <a href="{{ route('statistics.show', $data->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
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




@endsection