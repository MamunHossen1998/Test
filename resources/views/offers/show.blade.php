@extends('layouts.app')
<?php use App\Models\Offer;?>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="card">
                <div class="card-header text-center">
                    <h5>Offer details</h5>
                </div>
                <div class="card-body">
                    <label class="mb-2" for="">Name: <span>{{ $offer->title }}</span></label><br>
                    <label class="mb-2" for="">Price: <span>{{ $offer->price }}</span></label><br>
                    <label class="mb-2" for="">Created by: <span>{{ $offer->author->name }}</span></label><br>
                    <label class="mb-2" for="">Image: <span><img src="{{ $offer->image_url }}" alt="" height="60" width="60"></span></label><br>
                    <label class="mb-2" for="">Description: <span>{{ $offer->description }}</span></label><br>
                    <label class="mb-2" for="">Category: <span>{{ getTitles($offer->categories) }}</span></label><br>
                    <label class="mb-2" for="">Locaton: <span>{{ getTitles($offer->locations) }}</span></label><br>
                    <label class="mb-2" for="">Status: <span>{{ ($offer->status)  }}</span></label><br>
                    <label class="mb-2" for="">Created at: <span>{{ $offer->created_at }}</span></label><br>
                    <label class="mb-2" for="">Updated at: <span>{{ $offer->updated_at }}</span></label><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection