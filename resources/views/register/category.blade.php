@extends("layouts.app")

@section('title','ジャンル登録')

@include("layouts.topbar")


@section("content")
<form action="/category/create" method="post" enctype="multipart/form-data">
@csrf
<div class="form-group">
<table class="table table-striped">

<tr class = "name">
    <th scope="row">ジャンル登録画面</th>
    <td><p><input class="form-control" type="text" maxlength="50" name="name"></p></td>
</tr>

<th><button class="btn btn-primary" type="submit">保存</button></th>
</tr>
</div>
</table>
</form>


@endsection

