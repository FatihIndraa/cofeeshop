@extends('template.style')

@section('konten')
    <section class="py-4 py-xl-5">
        <div class="container">
            <div class="text-white bg-dark border-0 border rounded p-4 p-md-5 mb-xxl-4">
                @auth()
                    <h2 class="fw-bold text-white mb-3">Haloooo, {{ auth()->user()->name }}</h2>
                    <p class="mb-4">hayoo, pasti lagi mau cari {{ $category->name }}</p>
                </div>
            </div>
            <div class="container py-4 py-xl-5">
                <div class="row mb-5" style="padding-bottom:0px;font-size:20px;">
                    <div class="col-md-8 col-xl-6 col-xxl-5 text-center mx-auto">
                        <h2>Menu</h2>
                        <p class="w-lg-50">Berikut adalah berbagai macam resep menu yang ada pada Resepku.</p>
                    </div>
                </div>
            @else
                <h2 class="fw-bold text-white mb-3">Selamat Datang di Resepku</h2>
                <p class="mb-4">Mau masak makanan apa hari ini? Yuk coba lihat berbagai macam resep yang ada.</p>
                <a href="/login" class="btn btn-primary text-decoration-none">Login dulu yuk</a>
            </div>
            </div>
            <div class="container py-4 py-xl-5">
                <div class="row mb-5" style="padding-bottom:0px;font-size:20px;">
                    <div class="col-md-8 col-xl-6 col-xxl-5 text-center mx-auto">
                        <h2>Menu {{ $category->name }}</h2>
                        <p class="w-lg-50">Berikut adalah berbagai macam resep menu makanan yang ada pada Resepku.</p>
                    </div>
                </div>
            @endauth

            @if ($posts->count())
                @foreach ($posts as $post)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->excerpt }}</p>
                            <p>By: {{ $post->user->name }}</p>
                            <p>Category: <a
                                    href="{{ route('detail', $post->category->slug) }}">{{ $post->category->name }}</a>
                            </p>
                            <p class="card-text"><small class="text-muted">Last updated
                                    {{ $post->updated_at->diffForHumans() }}</small></p>
                            <a href="{{ route('post', $post) }}" class="btn btn-primary">Read more</a>
                        </div>

                    </div>
                @endforeach
            @else
                <p class="text-center fs-4">No Post Found</p>
            @endif
        </div>
    </section>
@endsection
