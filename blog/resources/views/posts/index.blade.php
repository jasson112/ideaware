@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="notification is-info is-light">
            {{ $message }}
        </div>
    @endif
    <h1 class="title has-text-centered is-fullwidth">Posts</h1>
    <nav class="navbar" role="navigation" aria-label="dropdown navigation">
        <div class="navbar-menu">
            <div class="navbar-start">
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    <a class="button is-primary" href="{{ route('posts.create') }}"> Create New Post</a>
                </div>
            </div>
        </div>
    </nav>

    <section class="hero is-fullwidth">
        <div class="hero-body">
            <div class="container">
                <table class="table is-bordered is-fullheight is-fullwidth">
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>
                                <div class="buttons">
                                    <a class="button is-light" href="{{ route('posts.show',$post->id) }}">Show</a>
                                    <a class="button is-info" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                                    <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="button is-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
@endsection
