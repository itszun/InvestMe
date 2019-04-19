@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @foreach ($entrepreneur as $e)
            <ul>
                <li>{{ $e->id }}</li>
                <li>{{ $e->name }}</li>
                <li>{{ $e->address }}</li>
                <li>{{ $e->birthdate }}</li>
                <li><a href="/entrepreneur/{{ $e->id}}/edit">Edit</a></li>
            </ul>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
