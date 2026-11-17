<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();

        return view('kelas.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kelas' => 'required|string|max:255',
            'jurusan_id'=> 'required|exists:jurusans,id', // Pastikan siswa yang dipilih ada di database
            'jenjang_id' => 'required|exists:jenjangs,id',
            'siswa_id' => 'required|exists:siswas,id',
            'keterangan'=> 'required|string|max:255',
            'status' => 'required|in:aktif,tidak-aktif' // Pastikan siswa yang dipilih ada di database
        ]);

        Kelas::create($request->all());

        return redirect()->route('kelas.index')->with('success', 'Data Kelas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {

        return view('kelas.show', compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {   
        $kelas = Kelas::all();

        return view('kelas.edit', compact('kelas', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kelas)
    {
        $request->validate([
            'kelas' => 'required|string|max:255',
            'jurusan_id' => 'required|exists:jurusans,id',
            'jenjang_id' => 'required|exists:jenjangs,id',
            'siswa_id' => 'required|exists:siswas,id',
            'keterangan' => 'required|string|max:255',
            'status' => 'required|in:aktif,tidak-aktif'
        ]);

        $kelas->update($request->all());

        return redirect()->route('kelas.index')->with('success', 'Data Kelas berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();

        return redirect()->route('kelas.index')->with('success', 'Data Kelas berhasil dihapus!');

        $kelas->delete();

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil dihapus!');
    }
}

