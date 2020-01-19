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
                <h1 class="title has-text-centered is-fullwidth">New Post</h1>
                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf
                    <div class="field">
                        <label class="label">{{ __('Title') }}</label>
                        <div class="control">
                            <input class="input @error('title') is-danger @enderror" value="{{ old('title') }}" name="title" type="text">
                        </div>
                        @error('title')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="has-text-centered is-grouped">
                        <button class="button is-link" type="submit">{{ __('Save') }}</button>
                        <a class="button is-light" href="{{ route('posts.index') }}">{{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
