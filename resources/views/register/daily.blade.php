@extends("layouts.app")

@section('title', '日用品登録')

@include("layouts.topbar")


@section("content")

@if( Auth::check() )
<form action="/daily/create" method="post" enctype="multipart/form-data">
    @csrf
    <table class="table table-striped">
        <tr class = "image_name">  
            <th>商品画像</th>
            <td>
                <p><input type="file" name="s_file" name="image_name"></p>
            </td>    
            </tr>

            <tr class = "name">
                <th scope="row">商品名</th>
                <td><p><input type="text" maxlength="50" name="name"></p></td>
            </tr>

            <tr class = "category">
                <th scope="row">ジャンル</th>
                <td><p><input type="text" maxlength="30" name="category_name"></p></td>
            </tr>    

            <tr class= "">
                <th scope="row">残り個数</th>
                <td><p><input type="text" maxlength="3" name="stock"></p></td>
            </tr>

            <tr>
                <th scope="row">規定数</th>
                <td><p><input type="text" maxlength="3" name="threshold"></p></td>
            </tr>

            <!-- <tr>
                <th scope="row"> 使用場所</th>
                <td><p><input type="text" maxlength="50" name=""></p></td>
            </tr> -->

            <tr>
                <th scope="row">保管場所</th>
                <td><p><input type="text" maxlength="50" name="place"></p></td>
            </tr>

            <!-- <tr>
                <th scope="row">購入場所</th>
                <td><p><input type="text" name=""></p></td>
            </tr> -->


            <th><input type = "submit" value = "保存"></th>
        </tr>
    </form>

    {{-- @foreach($members as $member)
        <tr>
            <td>{{$member->id}}</td>
            <td>{{$member->name}}</td>
            <td>{{$member->telephone}}</td>
            <td>{{$member->email}}</td>
        </tr> 
    @endforeach --}}
    </table>
</form>
@endif

@endsection