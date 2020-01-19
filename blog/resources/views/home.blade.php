@extends('layouts.app')

@section('content')
    <section class="hero is-fullwidth">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">Welcome to the admin</h1>
                <ul>
                    <li>
                        <a href="{{ route('posts.index') }}">
                            <h2 class="subtitle">Click to see Posts list</h2>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tags.index') }}">
                            <h2 class="subtitle">Click to see Tags list</h2>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users.index') }}">
                            <h2 class="subtitle">Click to see Users list</h2>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection
