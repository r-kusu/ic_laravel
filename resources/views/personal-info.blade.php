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
        <th class="table-text">{{ $user->name }}</th>
    </tr>
    <tr class = "image_name">
        <th scope="row">メールアドレス：</th>
        <th class="table-text">{{ $user->email }}</th>    
    </tr>
</table>
    <!-- <th><button class="btn btn-primary" type="submit">編集</button></th> -->
    <th><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal1" data-bs-whatever="@mdo">ユーザー名、メールアドレス編集</button></th>
    <th><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal2" data-bs-whatever="@mdo">パスワード編集</button></th>
</tr>
<!-- 削除ボタン -->
<form class="class-form-destroy" method="get" onSubmit="return window.confirm('本当に削除しますか？')"
    action="{{ route('personal-delete', ['id' => $user->id]); }}">
    <button class="btn btn-danger class-button-destroy" type="submit">アカウント削除</button>
</form>

<div class="modal fade" id="Modal1" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ asset('/personal-info/update/') . '/' . $user->id }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">

                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">ユーザー名、メールアドレスの編集</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="col-form-label">ユーザー名</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" maxlength="50" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-form-label">メールアドレス</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}"  minlength="4" maxlength="128" required>
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

<div class="modal fade" id="Modal2" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/personal-info/update-pass/{{ $user->id }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">

                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel1">パスワード編集</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal-1" aria-label="Close"></button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="current_password" class="col-form-label">現在のパスワード</label>
                        <input type="password" class="form-control {{ $errors->has('current_password') ? ' is-invalid' : '' }}" name="current_password"  id="current_password" minlength="4" maxlength="128" required>
                        @if ($errors->has('current_password'))
                            <span class="invalid-feedback" role="alert">
                                {{ $errors->first('current_password') }}
                            </span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="new-password" class="col-form-label">新規パスワード</label></label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="new_password" id="new_password"  minlength="4" maxlength="128" required>
                        @if ($errors->has('user_password'))
                            <span class="invalid-feedback" role="alert">
                                {{ $errors->first('user_password') }}
                            </span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="password-confirm" class="col-form-label">新規パスワード（確認用）</label>
                        <input type="password" class="form-control {{ $errors->has('password-confirm') ? ' is-invalid' : '' }}" name="password-confirm" id="password-confirm"  minlength="4" maxlength="128" required>
                        @if ($errors->has('password-confirm'))
                            <span class="invalid-feedback" role="alert">
                                {{ $errors->first('password-confirm') }}
                            </span>
                        @endif
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