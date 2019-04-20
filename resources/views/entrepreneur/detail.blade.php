@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <ul>
                <li>{{ $entrepreneur->id }}</li>
                <li>{{ $entrepreneur->name }}</li>
                <li>{{ $entrepreneur->address }}</li>
                <li>{{ $entrepreneur->birthdate }}</li>
                <li><a href="/entrepreneur/{{ $entrepreneur->id}}/edit">Edit</a></li>
            </ul>
            </div>
        </div>
    </div>
</div>
@endsection
