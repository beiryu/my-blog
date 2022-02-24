@extends('layout')

@section('head')
<script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
    
@endsection

@section('main')
    <main class="container" style="background-color: #fff;">
        <section id="contact-us">
            <h1 style="padding-top: 5px; ">
                Create New Category
            </h1>
            @if (session('status'))
                <p style="color: #fff; width: 100%; font-size: 18px; font-weight: 600; text-align: center; background-color: #5cb85c; padding: 17px 0; margin-bottom: 6px">
                  {{ session('status') }}
                </p>
            @endif
            <div class="contact-form">
                <form action="{{ route('categories.store') }}" method="post">
                  @csrf
                  <!-- Name -->
                  <label for="name"><span>Name</span></label>
                  <input type="text" id="name" name="name" value="{{ old('name') }}"/>
                  @error('name')
                    <p style="color: red; margin-bottom: 25px; ">{{ $message }}</p>
                  @enderror
                  
                   <!-- Button -->
                  <input type="submit" value="Submit" />
                </form>
              </div>
              <div class="create-categories">
                <a href="{{ route('categories.index') }}">Categories list <span>&#8594;</span></a>
              </div>
        </section>

    </main>
@endsection

@section('scripts')
<script>
  CKEDITOR.replace( 'content' );
</script>
@endsection