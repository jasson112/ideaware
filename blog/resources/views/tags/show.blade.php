@extends('layouts.app')
@section('content')
    <section class="hero is-fullwidth">
        <div class="hero-body">
            <div class="container">
                <h1 class="title has-text-centered is-fullwidth">Tag {{ $tags->id }}</h1>
                <div class="field">
                    <label class="label">{{ __('Name') }}</label>
                    <div class="control">
                        <input class="input @error('name') is-danger @enderror" value="{{ $tags->name }}" name="title" type="text" disabled>
                    </div>
                </div>


                <div class="has-text-centered is-grouped">
                    <form action="{{ route('tags.destroy',$tags->id) }}" method="POST">
                        <a class="button is-link" href="{{ route('tags.edit',$tags->id) }}">Edit</a>
                        <a class="button is-light" href="{{ route('tags.index') }}">Cancel</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button is-danger">Delete</button>
                    </form>
                </div>

            </div>
        </div>
    </section>

@endsection
