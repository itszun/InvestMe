@extends('layouts.app')
@section('content')

<div class="col-12">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">My Offer</div>
                <div class="card-body">
                
                        <table class="responsive table">
                            <tr>
                                <th>To</th>
                                <th>Fund</th>
                                <th>Share</th>
                                <th>Approval 1</th>
                                <th>Approval 2</th>
                                <th>Action</th>
                            </tr>
                    @foreach ($offers as $offer)
                            <tr>
                                <td>{{$offer->targets}}</td>
                                <td>{{$offer->fund}}</td>
                                <td>{{$offer->share}}</td>
                                <td>{{$offer->party_approval1}}</td>
                                <td>{{$offer->party_approval2}}</td>
                                <td> <a href="btn btn-outline-primary">Approve</a> </td>
                            </tr>
                    @endforeach
                        </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Offer Request</div>
                <div class="card-body">
                
                        <table class="responsive table">
                            <tr>
                                <th>From</th>
                                <th>Fund</th>
                                <th>Share</th>
                                <th>Action</th>
                            </tr>
                    @foreach ($request as $r)
                            <tr>
                                <td>{{$r->targets}}</td>
                                <td>{{$r->fund}}</td>
                                <td>{{$r->share}}</td>
                                <td>{{$r->party_approval2}}</td>
                                <td> <a href="#" id="offer{{$r->id}}" class="btn btn-outline-primary" 
                                       onclick="event.preventDefault();
                                                     document.getElementById('approve').submit();">
                                                     Approve</a> 
                                </td>
                                <form id="approve" action="{{ route('approve') }}" method="POST" style="display: none;">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$r->id}}">
                                    </form>
                            </tr>
                    @endforeach
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection