@extends('layout')

@section('main')
    <div class="categories-list">
        <h1>My Posts List</h1>
        @include('includes.flash-message')

        @foreach ($posts as $post)
            <div class="item">
                <p>{{ $post->title }}</p>
                <div>
                    <a href="{{ route('blog.edit', $post) }}">Edit</a>
                </div>
                <form action="{{route('blog.destroy', $post)}}" method="post">
                    @method('delete')
                    @csrf
                    <input type="submit" value="Delete">
                </form>
                <div class="index-categories">
                    <a href="{{ route('blog.show', $post) }}">Read post<span>&#8594;</span></a>
                </div>
            </div>
        @endforeach
    </div>
@endsection

