<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');

        $kategoris = Kategori::query()
            ->when($q, function ($query, $q) {
                $query->where('nama_kategori', 'like', "%{$q}%")
                    ->orWhere('keterangan', 'like', "%{$q}%")
                    ->orWhere('id', 'like', "%{$q}%");
            })
            ->orderBy('id')
            ->get();

        return view('kategori.index', compact('kategoris', 'q'));
    }

    public function create()
    {
        $nextId = (Kategori::max('id') ?? 0) + 1;
        return view('kategori.create', compact('nextId'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);

        Kategori::create($request->only('nama_kategori', 'keterangan'));

        return redirect()->route('kategori.index')->with('ok', 'Data berhasil ditambahkan.');
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);

        $kategori->update($request->only('nama_kategori', 'keterangan'));

        return redirect()->route('kategori.index', $kategori->id)
            ->with('ok', 'Data berhasil diperbarui.');
    }


    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index')->with('ok', 'Data berhasil dihapus.');
    }
}