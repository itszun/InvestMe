@extends('layouts.app')
@section('content')

<div class="col-12">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Business 
                    <a href="{{URL::previous()}}" class="btn btn-danger float-right">Back</a>
                </div>
                <div class="card-body">
                {{Form::model($business, ['route' => ['business.store'], 'class' => 'form-group container'])}}
                    {{Form::token()}}
                    <div class="form-group">
                    {{Form::label('name', 'Name')}}
                    {{Form::text('name', '', ['class'=>'form-control','placeholder'=>'Name Your Business'])}}
                    </div>
                    <div class="form-group">
                    {{Form::label('founded', 'Founded')}}
                    {{Form::date('founded', '',  ['class'=>'form-control'])}}
                    </div>
                    <div class="form-group">
                    {{Form::label('address','Address')}}
                    {{Form::text('address', '', ['class'=>'form-control', 'placeholder'=>'Address'])}}
                    </div>
                    <div class="form-group">
                    {{Form::label('description', 'Description')}}
                    {{Form::text('description', '', ['class'=>'form-control', 'placeholder'=>'About your Business'])}}
                    </div>
                    <div class="form-group">
                    {{Form::label('sector', 'Sector')}}
                    <select name="sector" id="sector" class="form-control">
                    @foreach($sector as $s)
                        <option value="{{$s->id}}">{{$s->name}}</option>
                    @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                    {{Form::label('contact', 'Business Contact')}}
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