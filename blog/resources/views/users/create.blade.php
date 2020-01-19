@extends('layouts.app')

@section('content')
    <section class="hero is-fullwidth">
        <div class="hero-body">
            <div class="container">
                @if ($errors->any())
                    <div class="notification is-primary is-light">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h1 class="title has-text-centered is-fullwidth">New User</h1>
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="field">
                        <label class="label">{{ __('Name') }}</label>
                        <div class="control">
                            <input class="input @error('name') is-danger @enderror" value="{{ old('name') }}" name="name" type="text">
                        </div>
                        @error('name')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="label">{{ __('Email') }}</label>
                        <div class="control">
                            <input class="input @error('email') is-danger @enderror" value="{{ old('email') }}" name="email" type="text">
                        </div>
                        @error('email')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="label">{{ __('Password') }}</label>
                        <div class="control">
                            <input class="input @error('password') is-danger @enderror" value="{{ old('password') }}" name="password" type="password">
                        </div>
                        @error('password')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <h2 class="title">Tags</h2>

                    @foreach ($tags as $tag)
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
                                {{ $tag->name }}
                            </label>
                        </div>
                    @endforeach

                    <div class="has-text-centered is-grouped">
                        <button class="button is-link" type="submit">{{ __('Save') }}</button>
                        <a class="button is-light" href="{{ route('tags.index') }}">{{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
