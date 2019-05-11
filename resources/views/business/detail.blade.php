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
                            <td>Owner</td>
                            <td>:</td>
                            <td>{{$bs->owner}}</td>
                        </tr>
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
                </div>
            </div>
        </div>
    </div>
</div>

@endsection