@extends('layouts.layout')

@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Log New Statistics</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('statistics.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('statistics.store') }}" method="POST" >
        @csrf

        <div  class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group ">
                    <strong class="float-left">User Id:</strong>
                    <input type="number" name="user_id" class="form-control" placeholder="Enter pleyer Id">
                </div>
            </div>
    
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong class="float-left">Score:</strong>
                    <input type="number" name="score" class="form-control" placeholder="Enter Score">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong class="float-left">Wins:</strong>
                    <input type="number" name="wins" class="form-control" placeholder="Enter Wins">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong class="float-left">Losses:</strong>
                    <input type="number" name="losses" class="form-control" placeholder="Enter losses">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection