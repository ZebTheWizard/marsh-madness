@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-md">
                <div class="card-header bg-green-600 border-0">Dashboard</div>

                <div class="card-body bg-green-400 flex justify-between items-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    <a href="/nova/resources/brackets" class="btn btn-primary">Manage Brackets</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
