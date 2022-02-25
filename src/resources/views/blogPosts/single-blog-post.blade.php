@extends('layout')

@section('main')

<!-- main -->
<main class="container">
  <section class="single-blog-post">
    <h1>{{ $post->title }}</h1>

    <p class="time-and-author">
      <span>
        <i class="fas fa-clock"></i>
        {{ $post->created_at->diffForHumans() }}
      </span>
      <span>
        <i class="fas fa-user"></i>

        Written By {{ $post->user->name }}
      </span>
      
    </p>

    <div class="single-blog-post-ContentImage" data-aos="fade-left">
      <img src="{{ asset($post->imgPath) }}" alt="" />
    </div>

    <div class="about-text">
      {!! $post->content !!}
    </div>
  </section>
  @if ($relatedPosts !== null)
  <section class="recommended">
    <p>Related</p>
    <div class="recommended-cards">
     
      @foreach ($relatedPosts as $post)
      <a href="{{ route('blog.show', $post) }}">
        <div class="recommended-card">
          <img src="{{ asset($post->imgPath) }}" alt="" loading="lazy" />
          <h4>
            {{ $post->title }}
          </h4>
        </div>
      </a>   
      @endforeach
      
      
    </div>
  </section>
  @endif

</main>
    
@endsection