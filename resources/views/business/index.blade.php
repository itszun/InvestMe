@extends('layouts.app')
@section('content')

<div class="col-12">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Business
                    <a href="{{route('business.create')}}" class="float-right btn btn-primary">Create New Business</a>
                </div>
                <div class="card-body">
                @foreach($business as $b)
                <div class="row bg-light my-2 py-2 px-4 ">
                    <div class="col-4">
                <table class="table responsive-table table-borderless ">
                    <tr>
                        <td>{{$b->name}}</td>
                    </tr>
                    <tr>
                        <td>{{$b->getRelation('sector')->name}}</td>
                    </tr>
                    <tr>
                        <td>{{$b->contact}}</td>
                    </tr>
                </table>
                    </div>
                    <div class="col-6">
                        <p class="py-3 px-1">{{$b->description}}</p>
                    </div>
                    <div class="col-2">
                        <div class="row">
                            <a ref="{{route('business.show',$b->id)}}" class="btn btn-primary ">Detail</a>
                        </div>
                        <div class="row my-1">
                            <a href="{{route('business.edit',$b->id)}}" class="btn btn-info text-white">Edit</a>
                        </div>
                        <div class="row my-1">
                            <a href="{{route('business.destroy',$b->id)}}" id="{{$b->id}}" class="btn btn-danger .rmv text-white"
                            onclick="
                                var result = confirm('Are you sure ?');
                                if(result){
                                    event.preventDefault();
                                    document.getElementById('delete-form').submit();
                                }
                                "
                            >Remove</a>
                        </div>
                    </div>
                    <form action="{{route('business.destroy', [$b->id])}}" method="POST"
                    style="display:none;" id="delete-form">
                        <input type="hidden" name="_method" value="delete">
                        {{csrf_field()}}
                    </form>
                </div>
                @endforeach
                
                </div>
            </div>
        </div>
    </div>
</div>

@endsection