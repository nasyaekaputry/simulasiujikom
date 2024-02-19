@extends('layouts.perpus')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="h3 text-2xl font-semibold mb-4">Formulir Input Buku</h1>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <p class="text-success">{{ session('success') }}</p>
                    @endif

                    <form action="{{ route('buku.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="judul" class="form-label">Judul:</label>
                            <input type="text" name="judul" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label for="pengarang" class="form-label">Pengarang:</label>
                            <input type="text" name="pengarang" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label for="penerbit" class="form-label">Penerbit:</label>
                            <input type="text" name="penerbit" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label for="tahun_terbit" class="form-label">Tahun Terbit:</label>
                            <input type="number" name="tahun_terbit" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label for="kategori_id" class="form-label">Kategori:</label>
                            <select name="kategori_id" class="form-control" required>
                                @foreach($kategori as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="deskripsi" class="form-label">Deskripsi:</label>
                            <textarea name="deskripsi" class="form-control" required></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="foto_buku" class="form-label">Foto Buku:</label>
                            <input type="file" name="foto_buku" accept="image/*" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection