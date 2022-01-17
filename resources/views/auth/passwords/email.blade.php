@extends('layouts.app')

<link href="{{asset('css/signstyle.css')}}" rel="stylesheet">

@section('content')
<div class="container-k">
    <div class="row-k justify-content-center">
        <div class="col-md-8-k">
            <div class="card-k">
                <div class="card-header-k">{{ __('パスワード変更') }}</div>

                <div class="card-body-k">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row-k mb-3-k">
                            <label for="email" class="col-md-4-k col-form-label-k text-md-right">{{ __('メールアドレス') }}</label>

                            <div class="col-md-6-k">
                                <input id="email" type="email" class="form-control-k @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback-k" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row-k mb-0-k">
                            <div class="col-md-6-k offset-md-4-k">
                                <button type="submit" class="btn-k btn-primary-k">
                                    {{ __('送信') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="first-k register-k"><a class="btn-k first-k register-k"  href="/login">ログイン画面に戻る</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
