@extends('template.sidebar')

@section('isidbs')
    <div class="container">
        <section class="py-4 py-xl-5">
            <div class="container">
                <div class="mb-3">
                    <h2 class="fw-bold mb-2"><strong>{{ $post->title }}</strong></h2>

                    {{-- tambah gambar --}}
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="" class="img-fluid">
                        <!-- Menambahkan class img-fluid untuk membuat gambar responsif -->
                    @else
                        <img src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}" alt=""
                            class="img-fluid"> <!-- Menambahkan class img-fluid untuk membuat gambar responsif -->
                    @endif

                    {{-- button --}}
                    <td>
                        <a href="/dashboard/posts" class="badge bg-success icon-link icon-link-hover"
                            style="--bs-link-transform: translate3d(0, -.125rem, 0);" data-toggle="tooltip"
                            data-placement="bottom" title="Kembali ke postingan"><i class="bi bi-arrow-left"></i> Kembali
                        </a>
                        <a href="/dashboard/posts/{{ $post->slug }}/edit"
                            class="badge bg-warning icon-link icon-link-hover"
                            style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" data-toggle="tooltip"
                            data-placement="bottom" title="Edit Postingan"><i class="bi bi-pencil-square"></i> Edit
                            Postingan
                        </a>
                        <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button
                                class="badge bg-danger border-0 icon-link icon-link-hover"style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);"
                                data-toggle="tooltip" data-placement="bottom" title="Hapus Postingan"
                                onclick="return confirm('yakin untuk hapus data??')"><i class="bi bi-x-circle"></i> Hapus
                                postingan
                            </button>
                        </form>
                    </td>
                    <p>Author: {{ $post->user->name }}</p>
                    <p>Category: <a href="{{ route('detail', $post->category->slug) }}">{{ $post->category->name }}</a></p>
                    {!! $post->body !!}
                </div>
        </section>
    </div>
@endsection
