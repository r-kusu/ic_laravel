@extends("layouts.app")

@section('title','カテゴリ登録')

@include("layouts.topbar",['categories' => $categories])


@section("content")
<form action="/category/create" method="post" enctype="multipart/form-data">
@csrf
<div class="container">
    <table class="table table-striped">
        <tr>
            <th scope="row">カテゴリー名</th>
            <td><input class="form-control" type="text" maxlength="50" name="name"></td>
        </tr>
        <tr>
            <th><button class="btn btn-primary" type="submit">保存</button></th>
            <td></td>
        </tr>
    </table>
</div>
</form>

@endsection