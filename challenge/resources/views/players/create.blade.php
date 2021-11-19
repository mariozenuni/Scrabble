@extends('layouts.layout')

@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Player</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('players.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
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
    <form action="{{ route('players.store') }}" method="POST" >
        @csrf

        <div  class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group ">
                    <strong class="float-left">Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong class="float-left">E-mail:</strong>
                    <input type="text" name="email" class="form-control" placeholder="Enter Email">
                </div>
            </div>
            
         
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong class="float-left">Address:</strong>
                    <input type="text" name="address" class="form-control" placeholder="Enter Address">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection