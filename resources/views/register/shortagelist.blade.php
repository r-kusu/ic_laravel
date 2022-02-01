@extends('layouts.app')

@section('title','買い物リスト')

@include('layouts.head')

@include('layouts.topbar')

@section('content')
<div>
    @foreach($shortageitems as $shortageitem)
    <div class="card mb-3" style="max-width: 400px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{$shortageitem->img_name}}" alt="...">
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
</div>
@endsection