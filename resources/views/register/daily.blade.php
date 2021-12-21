@extends("layouts.app")

@section('title', '在庫管理')

@include("layouts.topbar")

@section("content")

<table>
<tr>
<tr><th>商品画像</th>
    <th>
        <form action="#">
        <p><input type="file" name="s_file"></p>
        </form>
    </th>    
</tr>
<tr>
    <th>商品名</th>
    <th><p><input type="text" maxlength="50"></p></th>
</tr>
<tr>
    <th>ジャンル</th>
    <th><p><input type="text" maxlength="30"></p></th>
</tr>    
<tr>
    <th>残り個数</th>
    <th><p><input type="text" maxlength="3"></p></th>
</tr>
<tr>
    <th>規定数</th>
    <th><p><input type="text" maxlength="3"></p></th>
</tr>
<tr>
    <th>使用場所</th>
    <th><p><input type="text" maxlength="50"></p></th>
</tr>
<tr>
    <th>保管場所</th>
    <th><p><input type="text" maxlength="50"></p></th>
</tr>
<tr>
    <th>購入場所</th>
    <th><p><input type="text"></p></th>
</tr>
<th><input type = "submit" value = "保存"></th>
</tr>

{{-- @foreach($members as $member)
    <tr>
    <td>{{$member->id}}</td>
    <td>{{$member->name}}</td>
    <td>{{$member->telephone}}</td>
    <td>{{$member->email}}</td>
    </tr> 
@endforeach --}}
</table>
@endsection