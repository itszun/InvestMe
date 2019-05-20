@extends('layouts.app')
@section('content')

<div class="col-12">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$bs->name}}
                    <a href="{{URL::previous()}}" class="btn btn-danger float-right">Back</a>
                </div>
                <div class="card-body">
                    <div class="container">
                    <table class="responsive-table ">
                        <tr>
                            <td>Founded</td>
                            <td>:</td>
                            <td>{{$bs->founded}}</td>
                        </tr>
                        <tr>
                            <td>Sector</td>
                            <td>:</td>
                            <td>{{$bs->getRelation('sector')->name}}</td>
                        </tr>
                        <tr>
                            <td>Business Contact</td>
                            <td>:</td>
                            <td>{{$bs->contact}}</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>:</td>
                            <td>{{$bs->description}}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td>{{$bs->address}}</td>
                        </tr>
                    </table>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-12">
                        <div class="card">
                        <?php $own = $bs->getRelation('owner') ?>
                            <div class="card-body">
                                <div class="container row p-3">
                                    <div class="col-3">
                                    <div class="profile-header-container">
                                        <div class="profile-header-img mx-auto">
                                            {{ Html::image('image/profile/'.$own->profile_picture, 'Profile',
                                            ['class' => 'img-circle'])}}
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="h3">{{$own->name}}</div>
                                        <div>Id : {{ $own->id }}</div>
                                        <div>Age : {{ $own->age }}</div>
                                    </div>
                                    <div class="col-3">
                                        <a href="/offer/{{$own->id}}/entrepreneur" class="btn btn-outline-primary">Offer</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header">Owner</div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection