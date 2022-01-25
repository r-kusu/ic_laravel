@extends('layouts.app')

@section('title','{{$category->name}}一覧')
@include('layouts.head')

@include('layouts.topbar')

@section('content')
<div>
    <!-- @foreach -->
    <div class="card mb-3" style="max-width: 400px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="./20200501_noimage.png" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">歯ブラシ</h5>
                    <div class="card-text">残り 個</div>
                    <a class="btn btn-danger" href="#" role="button">変更</a>
                </div>
            </div>
        </div>
    </div>
    <!-- @endforeach -->
</div>
@endsection


<!-- @extends('layouts.app')

@section('title','一覧')

@include('layouts.head')

@include('layouts.topbar')

@section('content')
<section id="item">
            <div>
                <img src="./20200501_noimage.png" alt="商品画像" class="item-img">
                <p class="item-name">商品名</p>
                <p>残り 〇 個</p> 
                <a class="btn btn-danger" href="#" role="button">変更</a>
            <div>
        </section>

@endsection
-->