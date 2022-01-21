@extends("layouts.app")

@section('title', '日用品登録')

@include("layouts.topbar")


@section("content")

<form action="/daily/create" method="post" enctype="multipart/form-data">
@csrf
<div class="form-group">
<table class="table table-striped">
<tr class = "image_name">  
<th>商品画像</th>
    <td>
        <p><input class="form-control" type ="file" name="s_file" name="image_name"></p>
    </td>    
</tr>

<tr class = "name">
    <th scope="row">商品名</th>
    <td><p><input class="form-control" type="text" maxlength="50" name="name"></p></td>
</tr>

<tr class = "category">
    <th scope="row">ジャンル</th>
    <td><p><select class="form-control" name="category_name">
        @foreach($names as $name)
        <option value={{$name}}>{{$name}}</option>
        @endforeach
    </select></p></td>
    
</tr>    

<tr class= "">
    <th scope="row">残り個数</th>
    <td><p><input class="form-control" type="text" maxlength="3" name="stock"></p></td>
</tr>

<tr>
    <th scope="row">規定数</th>
    <td><p><input class="form-control" type="text" maxlength="3" name="threshold"></p></td>
</tr>

<!-- <tr>
    <th scope="row"> 使用場所</th>
    <td><p><input type="text" maxlength="50" name=""></p></td>
</tr> -->

<tr>
    <th scope="row">保管場所</th>
    <td><p><input class="form-control" type="text" maxlength="50" name="place"></p></td>
</tr>

<!-- <tr>
    <th scope="row">購入場所</th>
    <td><p><input type="text" name=""></p></td>
</tr> -->


<th><button class="btn btn-primary" type="submit">保存</button></th>
</tr>
</div>
</table>
</form>


@endsection