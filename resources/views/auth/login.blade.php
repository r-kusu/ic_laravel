@extends('layouts.app')

<link href="{{asset('css/signstyle.css')}}" rel="stylesheet">

@section('content')
<div class="body-k">
    <div class="container-k">
        <div class="row-k justify-content-center">
            <div class="col-md-8-k">
                <div class="card-k">
                    <div class="card-header-k">{{ __('在庫管理システム') }}</div>

                    <div class="card-body-k">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            @error('email')
                                <span class="invalid-feedback-k" role="alert">
                                    <strong class="invalid-feedback-email-k">{{ ('ログインに失敗しました。メールアドレス、パスワードが正しいかご確認ください。') }}</strong>
                                </span>
                            @enderror

                            
                            <div class="row-k mb-3-k">
                                <label for="email" class="col-md-4-k col-form-label-k text-md-right" >{{ __('メールアドレス') }}</label>

                                <div class="col-md-6-k">
                                    <input id="email" type="email" class="form-control-k @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus required>
                                </div>
                            </div>

                            <div class="row-k mb-3-k">
                                <label for="password" class="col-md-4-k col-form-label-k text-md-right"required>{{ __('パスワード') }}</label>

                                <div class="col-md-6-k">
                                    <input id="password" type="password" class="form-control-k @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"  minlength="6" maxlength="32" >

                                    @error('password')
                                        <span class="invalid-feedback-k" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row-k mb-3-k">
                                <div class="col-md-6-k offset-md-4-k">
                                    <div class="form-check-k">
                                        <input class="form-check-input-k" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label-k" for="remember">
                                            {{ __('パスワードを保存') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row-k mb-0-k">
                                <div class="col-md-8-k offset-md-4-k">
                                    <button type="submit" class="btn-k btn-primary-k">
                                        {{ __('ログイン') }}
                                    </button>
                            </div>
                            <div class="row-k mb-1-k">
                                @if (Route::has('password.request'))
                                    <a class="btn-k btn-link-k" href="{{ route('password.request') }}">
                                        {{ __('パスワードを忘れた方はこちら') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                        <div class="first-k register-k"><a class="btn-k first-k register-k"  href="/register">会員登録する</a></div>
                    </div>
                    <div class="his-k text-muted">©2022</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
