@extends('layouts.app')

@section('content')
<div class="col-12">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    Hi, {{Auth::user()->username}}
                </div>  
                
            </div>
        </div>
    </div>
</div>

@include('inc.ent_action')
@endsection
