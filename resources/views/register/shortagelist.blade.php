@extends('layouts.app')

@section('title','買い物リスト')

@include('layouts.head')

@include('layouts.topbar')

@section('content')

@foreach($shortageitems as $shortageitem)
<div class="card mb-3" style="max-width: 400px;">
    <div class="row g-0">
        <div class="col-md-4">
            @if($shortageitem->image_name === null)
            <img src="{{ asset('img/no_image_logo.png')}}"alt="アイテム画像" width="80px">
            @else
                <img src="{{$shortageitem->image_name}}" alt="アイテム画像" width="80px">
            @endif
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{$shortageitem->name}}</h5>
                <div class="card-text">残り{{$shortageitem->stock}}個</div>
                <a class="btn btn-danger" href="{{ url('/editdaily/{item_id}') }}" role="button">変更</a>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection