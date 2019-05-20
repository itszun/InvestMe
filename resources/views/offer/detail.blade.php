@extends('layouts.app')
@section('content')

<div class="col-12">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
        <div id="accordion">
            <div class="card">
                <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <div id="MyOffer">
                        <button class="btn form-control" data-toggle="collapse" data-target="#OfferData"
                        aria-expanded = "true" aria-controls="OfferData">
                        My Offer
                        </button>
                        </div>
                    </div>
                    <div class="col-6">
                        <span id="MyRequest">
                        <button class="btn form-control" data-toggle="collapse" data-target="#RequestData"
                        aria-expanded = "true" aria-controls="RequestData">
                        Request
                        </button>
                        </span>
                    </div>
                </div>
                </div>
<!--                 
                <div class="card-header" id="MyRequest">
                </div> -->

                <div id="OfferData" class="collapse show" aria-labelledby="MyOffer" data-parent="#accordion">
                <div class="card-body">
                        <div class="text-center h3">My Offer</div>
                        <table class="responsive table my-4">
                            <tr>
                                <th>To</th>
                                <th>Fund</th>
                                <th>Share</th>
                                <th></th>
                            </tr>
                    @foreach ($offers as $offer)
                            <tr id="row{{$offer['id']}}">
                                <td>{{$offer['targets']}}</td>
                                <td>{{$offer['fund']}}</td>
                                <td>{{$offer['share']}}</td>
                                <td> <a href="#" id="{{$offer['id']}}" class="cancel btn btn-outline-danger">Cancel</a> </td>
                            </tr>
                    @endforeach
                        </table>
                </div>
                </div>
            <!-- </div>
            <div class="card"> -->
                
                <div id="RequestData" class="collapse" aria-labelledby="MyRequest" data-parent="#accordion">
                <div class="card-body">
                        <div class="text-center h3">Offer Request</div>
                        <table class="responsive table my-4">
                            <tr>
                                <th>From</th>
                                <th>Fund</th>
                                <th>Share</th>
                                <th>Action</th>
                            </tr>
                    @foreach ($request as $r)
                            <tr id="row{{$r['id']}}">
                                <td>{{$r['targets']}}</td>
                                <td>{{$r['fund']}}</td>
                                <td>{{$r['share']}}</td>
                                <td> <a href="#" id="{{$r['id']}}" class="approve btn btn-outline-primary">Approve</a> 
                                    <a href="#" id="{{$r['id']}}" class="reject btn btn-outline-danger">Reject</a>
                                </td>
                            </tr>
                            <form action="#" class="reject"></form>
                    @endforeach
                        </table>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection