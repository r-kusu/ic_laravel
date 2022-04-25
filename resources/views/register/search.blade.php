@extends('layouts.app')

@section('title',$title)

@include('layouts.head')

@include('layouts.topbar')

@section('content')
<div  class="message">
    @if(!empty($w_message))
    <div>{{$w_message}}</div>
    @endif
    @if(!empty($c_message))
    <div>{{$c_message}}</div>
    @endif
    @if(!empty($t_message))
    <div>{{$t_message}}</div>
    @endif
    @if(!empty($p_message))
    <div>{{$p_message}}</div>
    @endif
</div>

@foreach($s_result as $item)
<div class="item-card card m-2 d-inline-block">
    <div class="row g-0">
        <div class="col-md-4">
            @if($item->img_name === null)
            <img src="{{ asset('img/no_image_logo.png')}}" alt="アイテム画像" width="80px">
            @else
            <img src="{{$item->image_name}}" alt="アイテム画像" width="80px">
            @endif
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

@if($s_result->isEmpty())
<div>該当のアイテムはありません</div>
@endif
@endsection