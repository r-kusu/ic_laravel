@extends('layouts.app')

<link href="{{asset('css/signstyle.css')}}" rel="stylesheet">

@section('content')
<div class="container-k">
    <div class="row-k justify-content-center">
        <div class="col-md-8-k">
            <div class="card-k">
                <div class="card-header-k">{{ __('会員登録') }}</div>

                <div class="card-body-k">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row-k mb-3-k">
                            <label for="name" class="col-md-4-k col-form-label-k text-md-right">{{ __('ユーザー名　例)テック太郎') }}</label>

                            <div class="col-md-6-k">
                                <input id="name" type="text" class="form-control-k @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback-k" role="alert">
                                        <strong style="color: red;">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row-k mb-3-k">
                            <label for="email" class="col-md-4-k col-form-label-k text-md-right">{{ __('メールアドレス') }}</label>

                            <div class="col-md-6-k">
                                <input id="email" type="email" class="form-control-k @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback-k" role="alert">
                                        <strong style="color: red;" >{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row-k mb-3-k">
                            <label for="password" class="col-md-4-k col-form-label-k text-md-right">{{ __('パスワード') }}</label>
                            <label for="password" class="col-md-5-k col-form-label-k text-md-right">{{ __('（英数字混在6～32文字）') }}</label>
                            <div class="col-md-6-k">
                                <input id="password" name="password" type="password" class="form-control-k @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback-k" role="alert">
                                        <strong style="color: red;">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row-k mb-3-k">
                            <label for="password-confirm" class="col-md-4-k col-form-label-k text-md-right">{{ __('パスワード確認') }}</label>

                            <div class="col-md-6-k">
                                <input id="password-confirm" name="password-confirm" type="password" class="form-control-k" name="password_confirmation" required autocomplete="new-password">
                                @error('password-confirm')
                                    <span class="invalid-feedback-k" role="alert">
                                        <strong style="color: red;">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row-k mb-0-k">
                            <div class="col-md-6-k offset-md-4-k">
                                <button type="submit" class="btn-k btn-primary-k">
                                    {{ __('登録する') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="first-k register-k"><a class="btn-k first-k register-k"  href="/login">ログインする</a></div>
                </div>
                <div class="his-k text-muted">©2022</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
