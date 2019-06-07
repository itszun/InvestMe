@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card py-3">
                    <div class="profile-big-img mx-auto">
                        {{ Html::image('image/profile/'.$entrepreneur->profile_picture, 'Profile',
                        ['class' => 'img-circle card-img-top'])}}
                        </div>
                    <div class="card-body">
                        <h4 class="card-title text-center">{{ $entrepreneur->name }}</h4>
                        <div class="card-text">
                            <table class="table ">
                                <tr>
                                    <td scope="row">User ID </td>
                                    <td>{{ $entrepreneur->id }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">Address</td>
                                    <td>{{ $entrepreneur->address }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">Birthdate</td>
                                    <td>{{ $entrepreneur->birthdate }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <a href="{{route('entrepreneur.edit', $entrepreneur->id)}}">Edit</a>
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
