@extends('layouts.dasboard')

<head>
    <title>PERPUSTAKAAN | WEB | PEMINJAMAN</title>
</head>
@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
                <li class="breadcrumb-item">
                    <!-- if breadcrumb is single-->
                </li>
                <span class="text-uppercase fs-5 fw-bold"> DATA PEMINJAMAN BUKU</span>
            </ol>
        </nav>
    </div>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">List Buku Dipinjam</div> --}}
                    <div class="card-body">
                        <div class="mb-4">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="mb-4 d-flex justify-content-between">
                                <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">
                                    + Tambah Data Peminjaman
                                </a>
                                <a href="{{ route('print') }}" class="btn btn-primary">
                                    <i class="fa  fa-download" style="font-size: 1pt">Ekspor PDF</i></a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="bg-secondary" style="color: white">
                                        <tr>
                                            <th class="px-2 py-2 text-center">NAMA PEMINJAM</th>
                                            <th class="px-2 py-2 text-center">BUKU DIPINJAM</th>
                                            <th class="px-2 py-2 text-center">TANGGAL PINJAM</th>
                                            <th class="px-2 py-2 text-center">TANGGAL KEMBALI</th>
                                            <th class="px-2 py-2 text-center">TANGGAL SEKARANG</th>
                                            <th class="px-2 py-2 text-center">STATUS</th>
                                            <th class="px-2 py-2 text-center">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($peminjaman as $p)
                                            <tr>
                                                <td class="px-4 py-2">{{ $p->user->name }}</td>
                                                <td class="px-4 py-2">{{ $p->buku->judul }}</td>
                                                <td class="px-4 py-2">
                                                    {{ \Carbon\Carbon::parse($p->tanggal_peminjaman)->format('d-M-Y') }}
                                                </td>
                                                <td class="px-4 py-2">
                                                    {{ $p->tanggal_pengembalian ? \Carbon\Carbon::parse($p->tanggal_pengembalian)->format('d-M-Y') : 'Belum Dikembalikan' }}
                                                </td>
                                                <td class="px-4 py-2">
                                                    {{ $p->tanggal_sekarang ? \Carbon\Carbon::parse($p->tanggal_sekarang)->format('d-M-Y') : '' }}
                                                </td>
                                                <td class="px-1 py-2 text-center">
                                                    @if ($p->status == 'Dipinjam')
                                                        <span class="badge bg-warning">{{ $p->status }}</span>
                                                    @elseif ($p->status == 'Dikembalikan')
                                                        <span class="badge bg-primary">{{ $p->status }}</span>
                                                    @elseif ($p->status == 'Denda')
                                                        <span class="badge bg-danger">Terlambat</span>
                                                    @endif
                                                </td>
                                                <td class="px-1 py-2">
                                                    @if ($p->status === 'Dipinjam')
                                                        <form action="{{ route('peminjaman.kembalikan', $p->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-primary">Kembalikan</button>
                                                        </form>
                                                    @elseif ($p->status === 'Denda')
                                                        <a href="{{ route('peminjaman.denda', $p->id) }}"
                                                            class="btn btn-danger">
                                                            Bayar Denda
                                                        </a>
                                                    @else
                                                        <p class="px-1 py-2 text-center"> - </p>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="px-4 py-2 text-center">Tidak ada data buku.</td>
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
    </div>
@endsection