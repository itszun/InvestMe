@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{ Form::model($entrepreneur, ['route' => ['entrepreneur.store'],
                'class' => 'form-group container p-5']) }}
                    {{Form::token()}}
                    {{Form::hidden('id_user', Auth::user()->id)}}
                    <div class="form-group">
                        {{Form::label('name', "Name")}}
                        {{Form::text('name', $entrepreneur->name, ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('address', "Address")}}
                        {{Form::text('address', $entrepreneur->address, ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('birthdate', "Birthdate")}}
                        {{Form::date('birthdate', $entrepreneur->birthdate, ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::submit('Next', [ 'class' => "btn btn-outline-primary"])}}
                    </div>
                {{ Form::close()}}
            </div>
        </div>
    </div>
</div>
@endsection
