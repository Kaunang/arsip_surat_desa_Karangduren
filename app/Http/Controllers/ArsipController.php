<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');

        $arsips = Arsip::with('kategori')
            ->when($q, function ($query, $q) {
                $query->where('judul', 'like', "%{$q}%")
                    ->orWhere('nomor_surat', 'like', "%{$q}%");
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('arsip.index', compact('arsips', 'q'));
    }

    public function show(Arsip $arsip)
    {
        return view('arsip.show', compact('arsip'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('arsip.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'judul' => 'required|string|max:255',
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        $path = $request->file('file')->store('arsip', 'public');

        Arsip::create([
            'nomor_surat' => $request->nomor_surat,
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'file' => $path,
        ]);

        return redirect()->route('arsip.index')->with('ok', 'Data berhasil disimpan.');
    }

    public function edit(Arsip $arsip)
    {
        $kategoris = Kategori::all();
        return view('arsip.edit', compact('arsip', 'kategoris'));
    }

    public function update(Request $request, Arsip $arsip)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'file' => 'nullable|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('file')) {
            if ($arsip->file && \Storage::disk('public')->exists($arsip->file)) {
                \Storage::disk('public')->delete($arsip->file);
            }

            $validated['file'] = $request->file('file')->store('arsip', 'public');
        }

        $arsip->update($validated);

        return redirect()->route('arsip.index')->with('ok', 'Data berhasil diperbarui.');
    }


    public function destroy(Arsip $arsip)
    {
        if ($arsip->file && Storage::disk('public')->exists($arsip->file)) {
            Storage::disk('public')->delete($arsip->file);
        }

        $arsip->delete();

        return redirect()->route('arsip.index')->with('ok', 'Data berhasil dihapus.');
    }
}
