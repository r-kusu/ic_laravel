@extends("layouts.app")

@section('title', '食料品')

@include("layouts.topbar")

@section("content")
<h1>food </h1>

<table>
<tr>
<th>日用品</th>
<th>食料品</th>
<th>書籍</th>
<th>買い物リスト</th>
<th>追加アイコン</th>
<th>ハンバーガー</th>
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