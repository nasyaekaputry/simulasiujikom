@extends('layouts.perpus')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="mb-4">
                        <a href="{{ route('kategori.create') }}" class="btn btn-primary">
                            + Tambah Data Kategori
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Nama Kategori</th>
                                <th class="col-3 px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kategori as $k)
                            <tr>
                                <td class="px-4 py-2">{{ $k->nama_kategori }}</td>
                                <td class="px-4 py-2">
                                    <form method="post" action="{{route('kategori.delete', $k->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-trash"></i>    
                                        Hapus</button>
                                    
                                    <a class="btn btn-warning" href="{{route('kategori.edit', $k->id)}}">Edit</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-4 py-2 text-center">Tidak ada data kategori.</td>
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