@extends('layouts.app')

@section('title','検索結果')

@include('layouts.head')

@include('layouts.topbar')

@section('content')

@foreach($items as $item)
<div class="item-card card m-2 d-inline-block">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{$item->image_name}}" alt="アイテム画像">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="item-name card-title">{{$item->name}}</h5>
                <div class="card-text">残り{{$item->stock}}個</div>
                <a class="btn btn-danger" href="{{ url('/editdaily/'.$item->id) }}" role="button">変更</a>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection