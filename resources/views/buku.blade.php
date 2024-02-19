@extends('layouts.perpus')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List Buku</div>

                <div class="card-body">
                    <div class="mb-4">
                        <a href="{{ route('buku.create') }}" class="btn btn-primary">
                            + Tambah Data Buku
                        </a>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Judul Buku</th>
                                <th>Pengarang</th>
                                <th>Penerbit</th>
                                <th>Tahun Terbit</th>
                                <th>Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($buku as $b)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/'.$b->foto_buku) }}" alt="Foto Buku" width="100">
                                    </td>
                                    <td>{{ $b->judul }}</td>
                                    <td>{{ $b->pengarang }}</td>
                                    <td>{{ $b->penerbit }}</td>
                                    <td>{{ $b->tahun_terbit }}</td>
                                    <td>{{ $b->deskripsi }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data buku.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection