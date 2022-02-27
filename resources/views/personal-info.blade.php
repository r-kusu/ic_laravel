@extends('layouts.app')

@section('title','会員情報')

@include('layouts.head')

@include('layouts.topbar')

@section('content')

<h2>会員情報</h2>
<br>
<table class="table table-striped">
<tr class = "image_name">  
    <th>ユーザー名：</th>
    <th class="table-text">{{ $user->name }}</tr>    
    <th scope="row">メールアドレス：</th>
    <th class="table-text">{{ $user->email }}</tr>
</table>
    <!-- <th><button class="btn btn-primary" type="submit">編集</button></th> -->
    <th><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">編集</button></th>
    <th>※パスワード変更も可能です</th>
</tr>
<!-- 削除ボタン -->
<th>
    <form class="class-form-destroy" method="get" onSubmit="return window.confirm('本当に削除しますか？')"
        action="/delete/{{ $user->id }}">
        <button class="btn btn-danger class-button-destroy" type="submit">アカウント削除</button>
    </form>
</th>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/personal-info/update/{{ $user->id }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">編集</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">ユーザー名</label>
                        <input type="text" class="form-control" name="name" id="recipient-name" value="{{ $user->name }}" maxlength="50" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">メールアドレス</label>
                        <input type="email" class="form-control" name="email" id="recipient-name" value="{{ $user->email }}"  minlength="4" maxlength="128" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
                    <button class="btn btn-primary" type="submit">保存</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection