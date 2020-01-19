@extends('layouts.app')
@section('content')
    <section class="hero is-fullwidth">
        <div class="hero-body">
            <div class="container">
                <h1 class="title has-text-centered is-fullwidth">Post {{ $posts->id }}</h1>
                <div class="field">
                    <label class="label">{{ __('Title') }}</label>
                    <div class="control">
                        <input class="input @error('title') is-danger @enderror" value="{{ $posts->title }}" name="title" type="text" disabled>
                    </div>
                </div>
                <div class="field">
                    <label class="label">{{ __('Tags') }}</label>

                    <div class="control">
                        @foreach ($posts->tags as $tag)
                            <span class="tag is-info">
                              {{ $tag->name }}
                            </span>
                        @endforeach
                    </div>
                </div>


                <div class="has-text-centered is-grouped">
                    <form action="{{ route('posts.destroy',$posts->id) }}" method="POST">
                        <a class="button is-link" href="{{ route('posts.edit',$posts->id) }}">Edit</a>
                        <a class="button is-light" href="{{ route('posts.index') }}">Cancel</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button is-danger">Delete</button>
                    </form>
                </div>

            </div>
        </div>
    </section>

@endsection
