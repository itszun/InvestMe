@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{ Form::model($x, ['route' => ['investor.update', $x->id],
                'class' => 'form-group container p-5', 'method' => 'put']) }}
                    {{Form::token()}}
                    <div class="form-group">
                        {{Form::label('name', "Name")}}
                        {{Form::text('name', $x->name, ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('address', "Address")}}
                        {{Form::text('address', $x->address, ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('birthdate', "Birthdate")}}
                        {{Form::date('birthdate', $x->birthdate, ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::submit('Edit', [ 'class' => "btn btn-outline-primary"])}}
                    </div>
                {{ Form::close()}}
            </div>
        </div>
    </div>
</div>
@endsection
