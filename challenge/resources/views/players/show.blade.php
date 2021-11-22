@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>  {{ $player->name}}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('players.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group pull-left">
                <strong>Name:</strong>
                {{ $player->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group pull-left">
                <strong>Score:</strong>
                {{ $score }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group pull-left">
                <strong>Wins:</strong>
                {{ $wins }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group pull-left">
                <strong>Losses:</strong>
                {{ $losses }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group pull-left">
                <strong>AVG:</strong>
                {{ $av }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group pull-left">
                <strong>Highest point :</strong>
                @foreach($maxScore as $data)
                {{ $data->score }} - {{$data->rival_name}} -{{date('d M Y',strtotime($data->created_at))}} 
                @endforeach
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group pull-left">
                <strong>Lowest point :</strong>
                @foreach($minScore as $data)
                {{ $data->score }} - {{$data->rival_name}} -{{date('d M Y',strtotime($data->created_at))}} 
                @endforeach
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group pull-left">
                <strong>Membership:</strong>
                {{date_format($player->created_at,'jS M Y') }}
            </div>
        </div>
    </div>
@endsection