@extends('layouts.app')

@section('content')
<div class="col-12">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    Hi, {{Auth::user()->username}}
                </div>  
                
            </div>
        </div>
    </div>
</div>

<div class="col-12 my-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Offer</div>
                <div class="card-body">
                    @foreach ($investors as $inv)
                    
            <div class="row p-3">
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
                    <a href="/offer/{{ $inv->id_user}}/investor" class="btn btn-outline-primary">Offer</a>
                </div>
            </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
