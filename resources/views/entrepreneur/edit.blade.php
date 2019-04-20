@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            {{Form::model($entrepreneur)}}
                <form method="post" action="/entrepreneur/{{ $entrepreneur->id }}" class="form-group">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ $entrepreneur->name }}">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                    <input type="text" name="address" id="address" value="{{ $entrepreneur->address }}">
                    </div>
                    <div class="form-group">
                        <label for="Birthdate">Birthdate</label>
                    <input type="date" name="birthdate" id="birthdate" value="{{ $entrepreneur->birthdate }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
