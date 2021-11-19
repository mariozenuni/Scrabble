@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
       @foreach($memberStatistics as $memberStatistic )
            <div class="pull-left">
                <h2>Hightlights for {{$memberStatistic->name}}</h2>
            </div>
            
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('statistics.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>

            <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Score:</strong>
                {{$memberStatistic->score}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Wins:</strong>
                {{$memberStatistic->wins}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Losses:</strong>
                {{$memberStatistic->losses}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Score:</strong>
                {{$memberStatistic->score}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date:</strong>
                {{$memberStatistic->created_at}}
            </div>
        </div>
    </div>
        </div>
    </div>
    @endforeach
    </div>
@endsection