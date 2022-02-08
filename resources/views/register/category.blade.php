@extends("layouts.app")

@section('title','ジャンル登録')

@include("layouts.topbar")


@section("content")
<form action="/category/create" method="post" enctype="multipart/form-data">
@csrf
<div class="container">
    <div class="row bg-secondary">
        <div class="col-lg-2 text-start">ジャンル登録画面</div>
        <div class="col-lg-10">
        <input class="form-control" type="text" maxlength="50" name="name">
        </div>
    </div>
    <div class="row">
        <div class="col-sm"><button class="btn btn-primary" type="submit">保存</button></div>
    </div>
</div>
</form>


@endsection

