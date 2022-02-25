@extends('layout')

@section('main')
    <div class="categories-list">
        <h1>Users List</h1>
        @include('includes.flash-message')

        @foreach ($users as $user)
            <div class="item">
                <p>{{ $user->name }}</p>
                <p>{{ $user->role }}</p>
                <div>
                    <a href="{{ route('users.edit', $user) }}">Edit</a>
                </div>
                {{-- <form action="{{route('users.destroy', $user)}}" method="post">
                    @method('delete')
                    @csrf
                    <input type="submit" value="Delete">
                </form> --}}
            </div>
        @endforeach
    </div>
@endsection