@extends('layouts.app')

@section('content')
<div class="col-12">
    <div class="row justify-content-center">
    
    <div class="col-md-2 col-sm-12">
            <div class="card">
                <div class="card-header">My Profile</div>
                <div class="card-body">
                    {{auth()->user()->username}}
                </div>
            </div>
        </div>
        <div class="col-md-7 col-sm-12">
            <div class="card">
                <div class="card-header">Feed</div>
                <div class="card-body">
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-sm-12">
            <div class="card">
                <div class="card-header bg-primary text-white">Notify</div>
                <div class="card-body">
                    <table class="table ">
                        <tr>
                            <td>Transfer to #User</td>
                            <td><a href="#">Transfer</a></td>
                        </tr>
                        <tr>
                            <td>New Offer</td>
                            <td><a href="#">View</a></td>
                        </tr>
                        <tr>
                            <td>#User Transfer</td>
                            <td><a href="#">View</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-12 my-3">
    <div class="row justify-content-center">
    </div>
</div>

@endsection
