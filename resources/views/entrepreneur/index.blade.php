@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @foreach ($entrepreneurs as $entrepreneur)
            <div class="container row p-3">
                <div class="col-3">
                <div class="profile-header-container">
                    <div class="profile-header-img mx-auto">
                        {{ Html::image('image/profile/'.$entrepreneur->profile_picture, 'Profile',
                        ['class' => 'img-circle'])}}
                    </div>
                </div>
                </div>
                <div class="col-6">
                    <div class="h3">{{$entrepreneur->name}}</div>
                    <div>Id : {{ $entrepreneur->id }}</div>
                    <div>Age : {{ $entrepreneur->age }}</div>
                </div>
                <div class="col-3">
                    <a href="{{route('entrepreneur.show', $entrepreneur->id)}}" class="btn btn-outline-primary">Detail</a>
                    <a href="{{route('entrepreneur.destroy', $entrepreneur->id)}}" class="btn btn-outline-danger">Delete</a>
                </div>
            </div>
            <hr>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
