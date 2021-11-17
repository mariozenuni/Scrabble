@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Player</h2>
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

    <form action="{{ route('statistics.update', $statistic->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong class="float-left">Date:</strong>
                    <input type="text" name="name" value="{{ $statistic->date }}" class="form-control" placeholder="Date">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong class="float-left">Score:</strong>
                    <input type="text" name="name" value="{{ $statistic->score }}" class="form-control" placeholder="Score">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong class="float-left">Wins:</strong>
                    <input type="email" name="email" value="{{ $statistic->wins }}" class="form-control" placeholder="wins">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong class="float-left">Losses:</strong>
                    <input type="text" name="address" value="{{ $statistic->losses}}" class="form-control" placeholder="Losses">
                </div>
            </div>
           

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection