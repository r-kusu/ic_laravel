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
    <td><p><select class="form-control" name="category_id">
        @foreach($categories as $category)
        <option value={{$category->id}}>
            {{$category->name}}
        </option>
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

<tr>
    <th scope="row">保管場所</th>
    <td><p><input class="form-control" type="text" maxlength="50" name="place"></p></td>
</tr>

<tr class = "tag">
    <th scope="row">タグ</th>
    <td><div class="form-group">
        <input class="form-control" name="tag_name">
        <small class="form-text text-muted">ハッシュ”＃”で区切って入力してください</small>
        <div class="container py-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="comment" class="font-weight-bold">Start typing with "#"</label>
                <input type="text" class="form-control" rows="5" id="comment"></input>
            </div>
        </div>
    </div>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="app.js"></script>
<script src="bootstrap-suggest.min.js"></script>
<script>
    var users = [
    {username: 'lodev09', fullname: 'Jovanni Lo'},
    {username: 'foo', fullname: 'Foo User'},
    {username: 'bar', fullname: 'Bar User'},
    {username: 'twbs', fullname: 'Twitter Bootstrap'},
    {username: 'john', fullname: 'John Doe'},
    {username: 'jane', fullname: 'Jane Doe'},
    ];
    $('#comment').suggest('#', {
    data: users,
    map: function(user) {
        return {
        value: user.username,
        text: '<strong>'+user.username+'</strong> <small>'+user.fullname+'</small>'
        }
    }
    })

</script> -->
   
    </div>
        




<th><button class="btn btn-primary" type="submit">保存</button></th>
</tr>
</div>
</table>
</form>


@endsection