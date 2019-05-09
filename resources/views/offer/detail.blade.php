@extends('layouts.app')
@section('content')

<div class="col-12">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">My Offer</div>
                <div class="card-body">
                    @foreach ($offers as $offer)
                        <table>
                            <tr>
                                <td>{{$offer->from}}</td>
                                <td>{{$offer->to}}</td>
                                <td>{{$offer->fund}}</td>
                                <td>{{$offer->share}}</td>
                                <td>{{$offer->party_approval1}}</td>
                                <td>{{$offer->party_approval2}}</td>
                            </tr>
                        </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection