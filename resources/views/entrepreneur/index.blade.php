@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @foreach ($entrepreneurs as $entrepreneur)
            <ul>
                <li>{{ $entrepreneur->id }}</li>
                <li>{{ $entrepreneur->name }}</li>
                <li><a href="/entrepreneur/{{ $entrepreneur->id}}">Detail</a></li>
            </ul>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
