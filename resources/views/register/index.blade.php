@extends('layouts.app')

@section('title','カテゴリー一覧')
@include('layouts.head')

@include('layouts.topbar')

@section('content')
<div>
    <h1>日用品管理システム</h1>
    <div>
        @foreach($categories as $category)
        <div>
            <button type="button" class="category-index btn btn-primary rounded-3"><a href="{{route('list',['id'=>$category->id])}}">{{$category->name}}</a></button>
        </div>
        @endforeach
    </div>
</div>
@endsection