@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>{{ $user -> username}}</h1>
                    <h2>{{ $user -> profile -> title}}</h2>
                    <p>{{ $user -> profile -> description}}</p>
                    <p>{{ $user -> profile -> url}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
