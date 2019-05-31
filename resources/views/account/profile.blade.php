@extends('layouts.app')

@section('content')

<div class="col-12">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Profile</div>
                <div class="card-body">
                    {{$acc->username}}
                    <br/>
                    {{$acc->email}}
                    <br/>
                </div>
            </div>
            
            <div class="card my-2">
                    <div class="card-header">
                    Personal Information
                    <a href="{{route('profile.edit')}}" class="btn btn-outline-primary float-right">Edit Information</a>
                    </div>
                    <div class="card-body">
                    <table class="responsive-table ">
                        <tr>
                            <td>Name</td>
                            <td>{{$data->name}}</td>
                        </tr>
                        <tr>
                            <td>Birthdate</td>
                            <td>{{$data->birthdate}}</td>
                        </tr>
                        <tr>
                            <td>Contact</td>
                            <td>
                            @foreach ($contact as $c)
                                {{$c->number}}, 
                            @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td>Occupation</td>
                            <td>{{$data->occupation}}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>{{$data->gender}}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{$data->address}}</td>
                        </tr>
                    </table>
                    </div>
                    </div>
        </div>
    </div>
</div>

@endsection