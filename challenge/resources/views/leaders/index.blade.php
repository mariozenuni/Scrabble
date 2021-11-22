
@extends('layouts.layout')

@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
         
      
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('statistics.create') }}" title="Create a statistics">Register a Game </a>
                    
            </div>  <br><br><br><br>
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
            <th>Rival_name</th>
            <th>Place</th>
            <th>Wins</th>
            <th>Losses</th>
            <th>Player</th>
         
           
  
        </tr>
        @foreach ($playerStatistics as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{date('d M Y', strtotime($data->created_at))}}</td>
                <td>{{ $data->score }}</td>
                <td>{{ $data->rival_name }}</td>
                <td>{{ $data->place }}</td>
                <td>{{ $data->wins }}</td>
                <td>{{ $data->losses }}</td>
                <td>{{ $data->user_id }}</td>
              
                
                <td>
            
                </td>
            </tr>
        @endforeach
    </table>




@endsection