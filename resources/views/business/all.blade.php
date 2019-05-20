@extends('layouts.app')
@section('content')

<div class="col-12">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Business
                </div>
                <div class="card-body">
                @foreach($md as $b)
                <div class="row bg-light my-2 py-2 px-4 ">
                    <div class="col-4">
                <table class="responsive-table table-borderless ">
                    <tr>
                        <td>Name</td>
                        <td>{{$b->name}}</td>
                    </tr>
                    <tr>
                        <td>Sector</td>
                        <td>{{$b->getRelation('sector')->name}}</td>
                    </tr>
                    <tr>
                        <td>Contact</td>
                        <td>{{$b->contact}}</td>
                    </tr>
                    <tr>
                        <td>Owner</td>
                        <td>{{$b->getRelation('owner')->name}}</td>
                    </tr>
                </table>
                
                    </div>
                    <div class="col-6">
                        <p class="py-3 px-1">{{$b->description}}</p>
                    </div>
                    <div class="col-2">
                        <div class="row">
                            <a href="/business/{{$b->id}}" class="btn btn-primary ">Detail</a>
                        </div>
                        <div class="row my-1">
                            <a href="/business/{{$b->id}}/edit" class="btn btn-info text-white">Edit</a>
                        </div>
                    </div>
                </div>
                @endforeach
                
                </div>
            </div>
        </div>
    </div>
</div>

@endsection