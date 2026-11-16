@extends('adminlte::page')

@section('title', 'Detail Jurusan')

@section('content_header')
    <h1>Detail Jurusan</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                {{-- KOLOM KIRI: FOTO --}}
                <div class="col-md-4 d-flex justify-content-center align-items-start">
                    @if($jurusan->foto)
                        {{-- Menampilkan foto jika ada --}}
                        <img src="{{ asset('storage/' . $jurusan->foto) }}" 
                             alt="Foto {{ $jurusan->nama_jurusan }}" 
                             class="img-fluid rounded shadow-sm" 
                             style="max-width: 100%; max-height: 400px;">
                    @else
                        {{-- Placeholder jika tidak ada foto --}}
                        <div class="text-center">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($jurusan->nama_jurusan) }}&background=random" 
                                 class="img-fluid rounded-circle mb-3" 
                                 style="width: 150px;">
                            <p class="text-muted">Tidak ada foto</p>
                        </div>
                    @endif
                </div>

                {{-- KOLOM KANAN: DATA --}}
                <div class="col-md-8">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th style="width: 200px">Nama Jurusan</th>
                            <td>{{ $jurusan->nama_jurusan }}</td>
                        </tr>
                        <tr>
                            <th>Kode Jurusan</th>
                            <td>{{ $jurusan->kode_jurusan }}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>{{ $jurusan->keterangan }}</td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <td>{{ $jurusan->kelas }}</td>
                        </tr>
                        <tr>
                            <th>Terdaftar Pada</th>
                            <td>{{ $jurusan->created_at->format('d F Y') }}</td>
                        </tr>
                    </table>

                    <div class="mt-4">
                        <a href="{{ route('jurusan.edit', $jurusan->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop