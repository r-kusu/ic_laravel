@extends('layouts.app')

@section('title','カテゴリー一覧')
@include('layouts.head')

@include('layouts.topbar')

@section('content')
    <div>
        <h1>日用品管理システム</h1>
        <div>
            <div>
            <button type="button" class="category-index btn btn-primary rounded-3"><a href="#">買い物リスト</a></button>
            <button type="button" class="category-index btn btn-primary rounded-3"><a href="#">買い物リスト</a></button>
            <button type="button" class="category-index btn btn-primary rounded-3"><a href="#">買い物リスト</a></button>
            <button type="button" class="category-index btn btn-primary rounded-3"><a href="#">買い物リスト</a></button>
            </div>
        </div>
    </div>
@endsection
