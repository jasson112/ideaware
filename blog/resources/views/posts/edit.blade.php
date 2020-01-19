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
                <h1 class="title has-text-centered is-fullwidth">Edit Post {{ $posts->id }}</h1>
                <form action="{{ route('posts.update', $posts->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="field">
                        <label class="label">{{ __('Title') }}</label>
                        <div class="control">
                            <input class="input @error('title') is-danger @enderror" value="{{ $posts->title }}" name="title" type="text">
                        </div>
                        @error('title')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <h2 class="title">Tags</h2>
                    {{ $posts->taggables->lists('taggable_id') }}
                    @foreach ($tags as $tag)
                        @foreach ($posts->taggables as $gabble)
                            
                            <div class="field">
                                <label class="checkbox">
                                    @if(array_key_exists($tag->name , $posts->taggables))
                                        yes
                                    @endif
                                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
                                    {{ $tag->name }}
                                </label>
                            </div>
                        @endforeach
                    @endforeach


                    <div class="has-text-centered is-grouped">
                        <button class="button is-link" type="submit">{{ __('Update') }}</button>
                        <a class="button is-light" href="{{ route('posts.index') }}">{{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
