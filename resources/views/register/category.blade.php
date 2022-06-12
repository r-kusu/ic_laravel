@extends("layouts.app")

@section('title','カテゴリ登録')

@include("layouts.topbar",['categories' => $categories])


@section("content")
@foreach($categories as $category)
<form action="/category/create" method="post" enctype="multipart/form-data">
@endforeach
@csrf
<div class="container">
<th scope="row">カテゴリー名</th>
    <td><input class="form-control" type="text" maxlength="50" name="name"></td>
<th><button class="btn btn-primary" type="submit">保存</button></th>
</div>
</form>


@endsection