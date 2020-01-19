@extends('layouts.app')

@section('content')
    <section class="hero is-fullheight-with-navbar">
        <div class="hero-body">
            <div class="container">
                <h1 class="title is-fullwidth has-text-centered">{{ __('Login') }}</h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="field">
                        <label class="label">{{ __('E-Mail Address') }}</label>
                        <div class="control">
                            <input class="input @error('email') is-danger @enderror" value="{{ old('email') }}" name="email" type="text" placeholder="Text input">
                        </div>
                        @error('email')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="label">{{ __('Password') }}</label>
                        <div class="control">
                            <input class="input @error('password') is-danger @enderror" type="password" name="password" placeholder="Text input">
                        </div>
                        @error('password')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <div class="control">
                            <label class="checkbox">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div class="field is-grouped">
                        <div class="control">
                            <button type="submit" class="button is-link">
                                {{ __('Login') }}
                            </button>
                        </div>
                        <div class="control">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
