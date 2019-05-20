@extends('layouts.app')
@section('content')

<div class="col-12">
    <div class="row justify-content-center">
        <div class="col-md-7 ">
            <div class="card">
                <div class="card-header">Contract</div>
                <div class="card-body">
                    <table class="table responsive my-4" id="contract">
                        <tr>
                            <th>ID</th>
                            <th>Partner</th>
                            <th>Fund</th>
                            <th>Share</th>
                            <th></th>
                        </tr>
                        @foreach($contract as $c)
                        <tr id="row{{$c['id']}}">
                            <td >{{ $c['id'] }}</td>
                            <td >{{ $c['targets'] }}</td>
                            <td >{{ $c['fund']}}</td>
                            <td >{{ $c['share'] }}</td>
                            <td><button class="btn btn-sm btn-primary add" id="{{$c['id']}}">+</button></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Fund</div>
                <div class="card-body">
                    <div class="row my-2">
                        <div class="col-12" style="height:200px;overflow:auto">
                            <table class="table responsive" id="cart">

                            </table>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="row my-2">
                                <div class="col-12 text-right">
                                    Total : <span id="count"> </span>
                                </div>
                            </div>
                            <button id="transfer" class="btn btn-primary form-control">Transfer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/transfer.js') }}"></script>

@endsection