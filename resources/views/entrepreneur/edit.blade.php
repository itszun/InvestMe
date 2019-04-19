@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @foreach ($entrepreneur as $e)
                <form method="post" action="/entrepreneur/{{ $e->id }}" class="form-group">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="name"></label>
                    <input type="text" name="name" id="name" value="{{ $e->name }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
