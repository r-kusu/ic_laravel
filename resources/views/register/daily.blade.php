@extends("layouts.app")

@section('title', '登録')

@include("layouts.topbar", ['tags' => $tags, 'items' => $items])

@section("content")

<form action="/daily/create" method="post" enctype="multipart/form-data">
@csrf
<div class="form-group">
<table class="table table-striped">
<tr class = "image_name">  
<th>商品画像</th>
    <td>
        <p><input class="form-control" type ="file"  name="image_name"></p>
    </td>    
</tr>

<tr class = "name">
    <th scope="row">商品名</th>
    <td><p><input class="form-control" type="text" maxlength="50" name="name"></p></td>
</tr>

<tr class = "category">
    <th scope="row">ジャンル<br><a class="btn btn-outline-primary btn-sm" href="{{ route('category') }}">ジャンル新規登録</a></th>
    <div class="container"><div class="form-group">
    <td><p><select class="form-control" name="category_id">
        @foreach($categories as $category)
        <option value={{$category->id}}>
            {{$category->name}}
        </option>
        @endforeach
        </select></p>
        
    </td> 

</tr>    

<tr class= "">
    <th scope="row">残り個数</th>
    <td><p><input class="form-control" type="text" maxlength="3" name="stock"></p></td>
</tr>

<tr>
    <th scope="row">規定数</th>
    <td><p><input class="form-control" type="text" maxlength="3" name="threshold"></p></td>
</tr>

<tr>
    <th scope="row">保管場所</th>
    <td><p><input class="form-control" type="text" maxlength="50" name="place"></p></td>
</tr>

<!-- 
    <tr class = "tag">
    <th scope="row">タグ</th>
    <td><div class="form-group">
        <input class="form-control" name="tag_name">
        <small class="form-text text-muted">ハッシュ”＃”で区切って入力してください</small>
    </div>
</tr> 
-->
<tr class = "tag">
    <th scope="row">タグ</th>
    <td><div class="container"><div class="form-group">
        <input class="form-control" name="tag_name" value="" id="tagarray">
        <small class="form-text text-muted">ハッシュ”＃”で区切って入力してください</small>   
    </div></div>
</tr>
<script>
    /**
     * These scripts were added for tag suggest functionality Jan. 28 2022 by K
     */
    var jstags = [
        @foreach ($tags as $tag)
            {tagid: '{{ $tag->id }}', tagname: '{{ $tag->tag_name }}'},
        @endforeach
    ];
    $('#tagarray').suggest('#', {
        data: jstags,
        map: function(jstag) {
            return {
                value: jstag.tagname,
                text: '<strong>' + jstag.tagid + '</strong> <small>' + jstag.tagname + '</small>'
            }
        }
    })
</script>

<th><button class="btn btn-primary" type="submit">保存</button></th>
</div>
</table>
</form>
@endsection