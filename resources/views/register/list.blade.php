@extends('layouts.app')

@section('title','カテゴリーアイテム一覧')

@include('layouts.head')

@include('layouts.topbar')

@section('content')
<div>
    @foreach($listitem as $listitem)
    <div class="card mb-3" style="max-width: 400px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{$listitem->image_name}}" alt="アイテム画像">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$listitem->name}}</h5>
                    <div class="card-text">残り{{$listitem->stock}}個</div>
                    <a class="btn btn-danger" href="{{ url('/editdaily/{item_id}') }}" role="button">変更</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection