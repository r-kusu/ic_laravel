@extends("layouts.app")

@section('title', '在庫管理')

@include("layouts.topbar")

@section("content")

<table>
<tr>
<th>商品画像</th>
<th>ファイルを選択</th>
<th>商品名</th>
<th>ジャンル</th>
<th>残り個数</th>
<th>規定数</th>
<th>使用場所</th>
<th>保管場所</th>
<th>購入場所</th>
<th>保存</th>
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