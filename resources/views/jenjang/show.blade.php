@extends('adminlte::page')

@section('title', 'Detail Jenjang')

@section('content_header')
    <h1>Detail Jenjang</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                {{-- KOLOM KIRI: FOTO --}}
                <div class="col-md-4 d-flex justify-content-center align-items-start">
                    @if($jenjang->foto)
                        {{-- Menampilkan foto jika ada --}}
                        <img src="{{ asset('storage/' . $jenjang->foto) }}" 
                             alt="Foto {{ $jenjang->nama_jenjang }}" 
                             class="img-fluid rounded shadow-sm" 
                             style="max-width: 100%; max-height: 400px;">
                    @else
                        {{-- Placeholder jika tidak ada foto --}}
                        <div class="text-center">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($jenjang->nama_jenjang) }}&background=random" 
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
                            <th style="width: 200px">Nama Jenjang</th>
                            <td>{{ $jenjang->nama_jenjang }}</td>
                        </tr>
                        <tr>
                            <th>Kode Jenjang</th>
                            <td>{{ $jenjang->kode_jenjang }}</td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>{{ $jenjang->keterangan }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $jenjang->status }}</td>
                        </tr>
                        <tr>
                            <th>Terdaftar Pada</th>
                            <td>{{ $jenjang->created_at->format('d F Y') }}</td>
                        </tr>
                    </table>

                    <div class="mt-4">
                        <a href="{{ route('jenjang.edit', $jenjang->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('jenjang.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop