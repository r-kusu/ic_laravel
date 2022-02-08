@extends("layouts.app")

@section('title', '日用品編集')

@include("layouts.topbar")


@section("content")

<form action="/editdaily/{{ $item->id }}/update" method="post" enctype="multipart/form-data">
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
    <td><p><select class="form-control" name="category_id">
        @foreach($categories as $category)
            @if ($category->id == $selected_category->id)
                <option value="{{$category->id}}" selected>
                    {{$category->name}}
                </option>
            @else
                <option value="{{$category->id}}">
                    {{$category->name}}
                </option>
            @endif
        @endforeach
    </select></p></td>    
</tr>  

<tr class= "">
    <th scope="row">残り個数</th>
    <td><p><input type="text" maxlength="3" name="stock" value="{{ $item->stock }}"></p></td>
</tr>

<tr>
    <th scope="row">規定数</th>
    <td><p><input type="text" maxlength="3" name="threshold" value="{{ $item->threshold }}"></p></td>
</tr>

<tr>
    <th scope="row">保管場所</th>
    <td><p><input type="text" maxlength="50" name="place" value="{{ $item->place }}"></p></td>
</tr>

<tr class = "tag">
    <th scope="row">タグ</th>
    <td><div class="container"><div class="form-group">
        <?php $tmp_tags = "" ?>
        @foreach ($selected_tags as $s_tag)
            <?php $tmp_tags .= (("#" . $s_tag->tag_name) . " "); ?>
        @endforeach
        <input class="form-control" name="tag_name" value="{{ $tmp_tags }}" id="tagarray">
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




<th><input type  = "submit" class ="btn btn-primary" value = "保存"></th>
</tr>
</form>

<form
    style="display: inline-block;"
    method="POST"
    action="{{ route('delete.editdaily', $item->id ) }}"
>
@csrf
@method('DELETE')
<th><button class="btn btn-danger">削除</button></th>
</form>



</table>
@endsection