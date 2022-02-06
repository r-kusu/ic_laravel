@extends('layouts.app')

@section('title','日用品管理 ホーム')
@include('layouts.head')

@include('layouts.topbar')

@section('content')
@foreach($categories as $category)
    <a class="category-index btn btn-primary rounded-3" href="{{route('list',['id'=>$category->id])}}" role="button">{{$category->name}}</a>
@endforeach
@endsection