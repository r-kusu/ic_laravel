@extends('layouts.app')

@section('title','カテゴリーアイテム一覧')

@include('layouts.head')

@include('layouts.topbar')

@section('content')

@foreach($listitem as $li)
<div class="card mb-3" style="max-width: 400px;">
    <div class="row g-0">
        <div class="col-md-4">
            @if($li->image_name === null)
            <img src="{{ asset('img/no_image_logo.png')}}"alt="アイテム画像" width="80px">
            
            @else
                <img src="{{$li->image_name}}" alt="アイテム画像" width="80px">
            @endif
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{$li->name}}</h5>
                <div class="card-text">残り{{$li->stock}}個</div>
                <a class="btn btn-danger" href="{{ url('/editdaily/' . $li->id) }}" role="button">変更</a>
        </div>
    </div>
</div>
@endforeach

@endsection