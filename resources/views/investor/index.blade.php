@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @foreach ($investor as $inv)
            <div class="container row p-3">
                <div class="col-3">
                <div class="profile-header-container">
                    <div class="profile-header-img mx-auto">
                        {{ Html::image('image/profile/'.$inv->profile_picture, 'Profile',
                        ['class' => 'img-circle'])}}
                    </div>
                </div>
                </div>
                <div class="col-6">
                    <div class="h3">{{$inv->name}}</div>
                    <div>Id : {{ $inv->id }}</div>
                    <div>Age : {{ $inv->age }}</div>
                </div>
                <div class="col-3">
                    <a href="{{ route('investor.show',$inv->id)}}" class="btn btn-outline-primary">Detail</a>
                    <a href="/entrepreneur/{{ $inv->id}}" class="btn btn-outline-danger">Delete</a>
                </div>
            </div>
            <hr>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
