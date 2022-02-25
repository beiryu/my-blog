@extends('layout')

@section('main')
    <main class="container" style="background-color: #fff;">
        <section id="contact-us">
            <h1 style="padding-top: 50px;">Edit User!</h1>
            @include('includes.flash-message')

            <!-- Contact Form -->
            <div class="contact-form">
                <form action="{{ route('users.update', $user) }}" method="post" >
                    @method('put')
                    @csrf
                    <!-- name -->
                    <label for="name"><span>Name</span></label>
                    <input type="text" id="name" name="name" value="{{ $user->name }}" />
                    @error('name')
                        {{-- The $attributeValue field is/must be $validationRule --}}
                        <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                    @enderror

                    <!-- role -->
                    
                    <!-- Drop down -->
                    <label for="role"><span>Choose a role:</span></label>
                    <select name="role" id="role">
                        <option selected disabled>Select option </option>
                        @foreach ($roles as $role)
                            <option value="{{ $role }}">{{ $role }}</option>
                        @endforeach
                    </select>

                    @error('role')
                        {{-- The $attributeValue field is/must be $validationRule --}}
                        <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                    @enderror
                    
                    <!-- Button -->
                    <input type="submit" value="Submit" />
                </form>
            </div>
        </section>
    </main>
@endsection