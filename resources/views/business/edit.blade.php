@extends('layouts.app')
@section('content')

<div class="col-12">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Business Information</div>
                <div class="row p-3">
                <div class="col-12">
                    <div class="justify-content-center text-center">
                        <div class="h5">
                        {{$bs->name}}
                        </div>
                    </div>
                    <hr>
                </div>
                </div>
                <div class="card-body">
                    {{Form::model($business, ['route' => ['business.update', $bs->id], 'class' => 'form-group container'])}}
                    {{Form::token()}}
                    <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Business Name" value="{{$bs->name}}">
                    </div>
                    <div class="form-group">
                    <label for="founded">Founded</label>
                    <input type="date" name="founded" id="founded" class="form-control" value="{{$bs->founded}}">
                    </div>
                    <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{$bs->address}}">
                    </div>
                    <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" class="form-control" value="{{$bs->description}}">
                    </div>
                    <div class="form-group">
                    <label for="sector">Sector</label>

                    <!-- <select class="form-control" name="sector">
                    @foreach($sector as $s)
                        <option value="$s->id">{{$s->name}}</option>
                    @endforeach
                    </select> -->
                    {{Form::select('sector', $sector, null)}}
                    </div>
                    <div class="form-group">
                    <label for="contact">Contact</label>
                    <input id="contact" name="contact" type="tel" required class="form-control"
                            pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}" placeholder="08XX-XXXX-XXXX">
                    <span class="validity"></span>
                    </div>
                    <div class="form-group">
                    {{Form::submit('Create New Business', ['class'=>'btn btn-primary form-control'])}}
                    </div>
                {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection