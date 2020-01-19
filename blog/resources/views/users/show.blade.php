@extends('layouts.app')
@section('content')
    <section class="hero is-fullwidth">
        <div class="hero-body">
            <div class="container">
                <h1 class="title has-text-centered is-fullwidth">User {{ $user->id }}</h1>
                <div class="field">
                    <label class="label">{{ __('Name') }}</label>
                    <div class="control">
                        <input class="input @error('name') is-danger @enderror" value="{{ $user->name }}" name="title" type="text" disabled>
                    </div>
                </div>

                <div class="field">
                    <label class="label">{{ __('Email') }}</label>
                    <div class="control">
                        <input class="input @error('email') is-danger @enderror" value="{{ $user->email }}" name="title" type="text" disabled>
                    </div>
                </div>

                <div class="field">
                    <label class="label">{{ __('Tags') }}</label>

                    <div class="control">
                        @forelse ($user->tags as $tag)
                            <span class="tag is-info">
                              {{ $tag->name }}
                            </span>
                        @empty
                            None
                        @endforelse
                    </div>
                </div>

                <div class="has-text-centered is-grouped">
                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                        <a class="button is-link" href="{{ route('users.edit',$user->id) }}">Edit</a>
                        <a class="button is-light" href="{{ route('users.index') }}">Cancel</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button is-danger">Delete</button>
                    </form>
                </div>

            </div>
        </div>
    </section>

@endsection
