@extends('layouts.layout')
@section('content')
{{-- !-- Delete Warning Modal -->  --}}
<form action="{{ route('players.destroy', $player->id) }}" method="post">
    <div class="modal-body">
        @csrf
        @method('DELETE')
        <h5 class="text-center">Are you sure you want to delete {{ $player->name }} ?</h5>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger">Yes, Delete Player</button>
    </div>
</form>
@endsection