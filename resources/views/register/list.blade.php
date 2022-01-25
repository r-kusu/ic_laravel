@extends('layouts.app')

@section('title','{{$category->name}}一覧')
@include('layouts.head')

@include('layouts.topbar')

@section('content')
<div>
    @foreach($items as $item)
    <div class="card mb-3" style="max-width: 400px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{$item->img_name}}" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$item->name}}</h5>
                    <div class="card-text">残り{{$item->stock}}個</div>
                    <a class="btn btn-danger" href="#" role="button">変更</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection