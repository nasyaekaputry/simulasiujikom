@extends('layouts.perpus')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                        <div class="mb-4">
                            <a href="{{ route('detail.buku') }}" class="btn btn-primary">
                                + Tambah Data Buku
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Penulis</th>
                                        <th scope="col">Penerbit</th>
                                        <th scope="col">Tahun</th>
                                      
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($buku as $b)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('storage/'.$b->foto) }}" alt="Foto Buku" width="100">
                                        </td>
                                        <td>{{ $b->judul }}</td>
                                        <td>{{ $b->penulis }}</td>
                                        <td>{{ $b->penerbit }}</td>
                                        <td>{{ $b->tahun_terbit }}</td>
                                            <td>
                                        <form method="post" action="{{route('buku.destroy', $b->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type ="submit" class="btn btn-danger">Hapus <i class="fa fa-trash"></i></button>
                                               
                                           

                                                <a class="btn btn-warning"href="{{route('buku.edit', $b->id)}}">
                                                    edit<i class="fa fa-file-pen"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                   @empty
                                </tr>
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
    </div>
    @endsection