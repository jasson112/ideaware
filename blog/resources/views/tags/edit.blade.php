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
                <h1 class="title has-text-centered is-fullwidth">Edit Post {{ $tags->id }}</h1>
                <form action="{{ route('tags.update', $tags->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="field">
                        <label class="label">{{ __('Name') }}</label>
                        <div class="control">
                            <input class="input @error('title') is-danger @enderror" value="{{ $tags->name }}" name="name" type="text">
                        </div>
                        @error('title')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>



                    <div class="has-text-centered is-grouped">
                        <button class="button is-link" type="submit">{{ __('Update') }}</button>
                        <a class="button is-light" href="{{ route('tags.index') }}">{{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
