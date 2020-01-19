@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="notification is-info is-light">
            {{ $message }}
        </div>
    @endif
    <h1 class="title has-text-centered is-fullwidth">Users</h1>


    <section class="hero is-fullwidth">
        <div class="hero-body">
            <div class="container">
                <nav class="navbar" role="navigation" aria-label="dropdown navigation">
                    <div class="navbar-menu">
                        <div class="navbar-start">
                        </div>

                        <div class="navbar-end">
                            <div class="navbar-item">
                                <a class="button is-primary" href="{{ route('users.create') }}"> Create New User</a>
                            </div>
                        </div>
                    </div>
                </nav>
                <table class="table is-bordered is-fullheight is-fullwidth">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>E-Mail</th>
                        <th>Tags</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @forelse ($user->tags as $tag)
                                    <span class="tag is-info">
                                      {{ $tag->name }}
                                    </span>
                                @empty
                                    None
                                @endforelse
                            </td>
                            <td>
                                <div class="buttons">
                                    <a class="button is-light" href="{{ route('users.show',$user->id) }}">Show</a>
                                    <a class="button is-info" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">
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
