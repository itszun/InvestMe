@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card py-3">
                    <div class="profile-big-img mx-auto">
                        {{ Html::image('image/profile/'.$x->profile_picture, 'Profile',
                        ['class' => 'img-circle card-img-top'])}}
                        </div>
                    <div class="card-body">
                        <h4 class="card-title text-center">{{ $x->name }}</h4>
                        <div class="card-text">
                            <table class="table ">
                                <tr>
                                    <td scope="row">User ID </td>
                                    <td>{{ $x->id }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">Address</td>
                                    <td>{{ $x->address }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">Birthdate</td>
                                    <td>{{ $x->birthdate }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <a href="{{ route('investor.edit',$x->id)}}">Edit</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
