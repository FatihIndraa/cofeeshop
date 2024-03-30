@extends('template.style')

@section('konten')
    <section class="py-4 py-xl-5">
        <div class="container">
            <div class="mb-3">
                <h1 class="mb-5">{{ $post->title }}</h1>

                <p>Author: {{ $post->user->name }}</p>
                <p>Category: <a href="{{ route('detail', $post->category->slug) }}">{{ $post->category->name }}</a></p>


                {!! $post->body !!}

                <a href="/">Back to Home</a>
            </div>
    </section>
@endsection