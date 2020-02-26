{{-- @php dd($teams->getUrlRange(2, 3)) @endphp --}}

@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Teams</h1>
    <ul class="list-group mb-3">
        @foreach($teams as $team)
        <li class="list-group-item">{{ $team->name }}</li>
        @endforeach
    </ul>

    @component('components.pagination', ["items" => $teams])@endcomponent
</div>



@endsection