@extends("layouts.app")

@section('title', '日用品編集')

@include("layouts.topbar")


@section("content")

<form action="/editdaily/{{ $item_id }}/update" method="post" enctype="multipart/form-data">
@csrf
@method('PUT')
<table class="table table-striped">
<tr class = "image_name">  
<th>商品画像</th>
    <td>
        <p><input type="file" name="s_file" name="image_name" ></p>
    </td>    
</tr>

<tr class = "name">
    <th scope="row">商品名</th>
    <td><p><input type="text" maxlength="50" name="name" value="{{ $item->name }}"></p></td>
</tr>

<tr class = "category">
    <th scope="row">ジャンル</th>
    <td><p><input type="text" maxlength="30" name="category_name" value="{{ $item->category_name }}"></p></td>
</tr>    

<tr class= "">
    <th scope="row">残り個数</th>
    <td><p><input type="text" maxlength="3" name="stock" value="{{ $item->stock}}"></p></td>
</tr>

<tr>
    <th scope="row">規定数</th>
    <td><p><input type="text" maxlength="3" name="threshold" value="{{ $item->threshold}}"></p></td>
</tr>

<!-- <tr>
    <th scope="row"> 使用場所</th>
    <td><p><input type="text" maxlength="50" name=""></p></td>
</tr> -->

<tr>
    <th scope="row">保管場所</th>
    <td><p><input type="text" maxlength="50" name="place" value="{{ $item->place}}"></p></td>
</tr>

<!-- <tr>
    <th scope="row">購入場所</th>
    <td><p><input type="text" name=""></p></td>
</tr> -->


<th><input type = "submit" value = "保存"></th>
</tr>
</form>

<form
    style="display: inline-block;"
    method="POST"
    action="{{ route('delete.editdaily', $item_id ) }}"
>
@csrf
@method('DELETE')
<button class="btn btn-danger">削除する</button>
</form>



</table>
@endsection