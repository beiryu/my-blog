@extends('layout')

@section('header')
    <!-- header -->
    <header class="header" style="  background-image: url({{ asset('images/photography.jpg') }});">
      <div class="header-text">
        <h1>Beiryu Blog</h1>
        
        <h4>
          <a href="http://beiryu.me">Blog</a> của 
          <a href="https://www.facebook.com/khanhjj.dinh/">Khánh</a>. Học 
          <a href="https://en.wikipedia.org/wiki/Computer_science">Computer Science</a> tại 
          <a href="https://www.hcmus.edu.vn/">Khoa học Tự Nhiên</a>
        </h4>
      </div>
      <div class="overlay"></div>
    </header>
@endsection

@section('main')
    <!-- main -->
    <main class="container">
      <h2 class="header-title">Latest Blog Posts</h2>
      <section class="cards-blog latest-blog">
        

        @foreach ($posts as $post)
        <div class="card-blog-content">
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
          <h4 style="font-weight: bolder">
            <a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a>
          </h4>
        </div>
        @endforeach
      </section>
    </main>
@endsection