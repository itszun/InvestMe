@extends('layouts.app')

@section('content')
<div class="col-12">
    <div class="row justify-content-center">
    <div class="col-md-10">
    <div class="card">
        <div class="card-header">Offer</div>
        <div class="card-body">
        <div class="row">
        <div class="col-6">
            <div class="row justify-content-center">
                <div class="container">
                    <p>
                    Send a future investment cooperation offer to <span class="text-white bg-primary px-1">{{$party2['name']}}</span>
                     as an <span class="text-white bg-primary px-1"> {{Auth::user()->hasLevel()}}</span>.
                    <br/>
                    Define Capital <span class="text-white bg-primary px-1">Shares</span> to Offer with.
                    </p>
                </div>
                {{Form::model($offer, ['route' => ['offer.store'], 'class' => 'form-group container'])}}
                    {{Form::token()}}
                <div class="form-group">
                <label for="Form" id="form">Form</label>
                {{Form::text('from', Auth::user()->account()->name, ['class' => 'form-control', 'disabled' => 'disabled'])}}
                </div>
                <div class="form-group">
                <label for="to">To</label>
                {{Form::text('to', $party2['name'], ['class' => 'form-control', 'disabled' => 'disabled'])}}
                </div>
                {{Form::hidden('toId', $party2['id_user'])}}
                @if($business != null)
                <div class="form-group">
                    <label for="business">Business</label>
                    <select name="business" id="business" class="form-control">
                        @foreach($business as $idb=>$b)
                            <option value="{{$idb}}">{{$b}}</option>
                        @endforeach
                    </select>
                </div>
                @endif
                <div class="form-group">
                {{Form::label('fund', 'Fund (Rp)')}}
                {{Form::number('fund', '200000',['class' => 'form-control', "min" => "50000", "step" => "50000"])}}
                </div>
                <div class="form-group">
                {{Form::label('sharing', 'Sharing (%)')}}
                {{Form::number('sharing', '50',['class' => 'form-control col-4 mx-1', 'id' => 'share', 'max'=>'90'])}}
                </div>
                {{Form::submit('Send Offer', ['class' => 'btn btn-primary form-control'])}}
                {{Form::close()}}
            </div>
        </div>
        <div class="col-6">
        <div class="card">
        <div class="card-header bg-primary text-white">
        <div class="h4">
                {{$party2['name']}}
        </div>
        </div>
        <div class="card-body">
        <div class="profile-smol-img mx-auto mb-3">
            {{ Html::image('image/profile/'.$party2['profile_picture'], 'Profile',
            ['class' => 'img-circle card-img-top'])}}
        </div>
            <div class="h6">
                @if($target['level'] == 1)
                Business : 
                @foreach($target['business'] as $x)
                    {{$x['name']}},
                @endforeach
                @elseif($target['level'] == 2)
                Occupation : {{$party2['occupation']}}
                @endif
                <hr/>
                Balance : {{$party2['balance']}}
                <hr/>
                <a href="#" class="btn btn-primary form-control">Detail</a>
            </div></div>
        </div>
        </div>
        </div>
        </div>
    </div>
    </div>
    </div>
</div>
@endsection