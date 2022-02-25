@extends('layout')

@section('main')
<!-- main -->
<main class="container">
  <h2 class="header-title">All Pending Posts</h2>
  
  @include('includes.flash-message')
  
  <section class="cards-blog latest-blog">
    @forelse ($pendingPosts as $post)
    <div class="card-blog-content">
      @auth
      <div class="post-buttons">
        <a href="{{ route('blog.approve', $post->id) }}">Approve</a>
      </div>
      @endauth
      <img src="{{ asset($post->imgPath) }}" alt="" />
      <p>
        <span>
          <i class="fas fa-clock"></i>
          {{ $post->created_at->diffForHumans() }}
        </span>
        

        <span>
          <i class="fas fa-user"></i>
          Written By {{ $post->user->name }}
        </span>

      </p>
      <h4>
        <a href="{{ route('blog.show-pending-post', $post) }}">{{ $post->title }}</a>
      </h4>
    </div>
    @empty
        <p>Sorry, currently there is no blog pending post!</p>
    @endforelse

  </section>
  
</main>

@endsection