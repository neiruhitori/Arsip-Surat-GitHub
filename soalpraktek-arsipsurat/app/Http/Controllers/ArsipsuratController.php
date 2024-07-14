<?php

namespace App\Http\Controllers;

use App\Models\Arsipsurat;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArsipsuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $arsip = Arsipsurat::where('judul', 'LIKE', '%' . $request->search . '%')->paginate(3);
        } else {
            $arsip = Arsipsurat::orderBy('created_at', 'DESC')->paginate(5);
        }
        return view('arsip.index', compact('arsip'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arsip = Arsipsurat::all();
        $kategori = Kategori::all();
        return view('arsip.create', compact('arsip', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nomorsurat' => 'required|min:1|max:50',
            'kategoris_id' => 'required|integer',
            'judul' => 'required|min:1|max:50',
            'waktupengarsipan' => 'required|date',
            'filesurat' => 'required|mimes:pdf|max:10000',
        ]);

        if ($request->hasFile('filesurat')) {
            $file = $request->file('filesurat');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');
        }

        Arsipsurat::create([
            'nomorsurat' => $request->nomorsurat,
            'kategoris_id' => $request->kategoris_id,
            'judul' => $request->judul,
            'waktupengarsipan' => $request->waktupengarsipan,
            'filesurat' => $filePath ?? null, // Simpan path file
        ]);
        return redirect('/arsip')->with('success', 'Arsip Surat Berhasil di Tambahkan')->with('filesurat', $fileName);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $arsip = Arsipsurat::findOrFail($id);
        return view('arsip.show', compact('arsip'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        $arsip = Arsipsurat::findOrFail($id);
        $filePath = storage_path('app/public/' . $arsip->filesurat);

        if (file_exists($filePath)) {
            return response()->download($filePath, basename($filePath));
        } else {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unduh($id)
    {
        $arsip = Arsipsurat::findOrFail($id);
        $filePath = storage_path('app/public/' . $arsip->filesurat);

        if (file_exists($filePath)) {
            return response()->download($filePath, basename($filePath));
        } else {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $arsip = Arsipsurat::findOrFail($id);
        $kategori = Kategori::all();
        return view('arsip.edit', compact('arsip', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $arsip = Arsipsurat::findOrFail($id);

        $this->validate($request, [
            'nomorsurat' => 'required|min:1|max:50',
            'kategoris_id' => 'required|integer',
            'judul' => 'required|min:1|max:50',
            'waktupengarsipan' => 'required|date',
            'filesurat' => 'required|mimes:pdf|max:10000',
        ]);

        // Update data
        $arsip->nomorsurat = $request->nomorsurat;
        $arsip->kategoris_id = $request->kategoris_id;
        $arsip->judul = $request->judul;
        $arsip->waktupengarsipan = $request->waktupengarsipan;

        // Proses unggahan file
        if ($request->hasFile('filesurat')) {
            // Hapus file lama jika ada
            if ($arsip->filesurat) {
                Storage::delete('public/' . $arsip->filesurat);
            }

            // Simpan file baru
            $filePath = $request->file('filesurat')->store('uploads', 'public');
            $arsip->filesurat = $filePath;
        }

        $arsip->save();

        // dd($arsip);

        return redirect()->route('arsip.show', $arsip->id)->with('success', 'Arsip surat berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $arsip = Arsipsurat::findOrFail($id);
        $filePath = storage_path('app/public/' . $arsip->filesurat);

        if (file_exists($filePath)) {
            unlink($filePath); // Hapus file fisik
        }

        $arsip->delete();

        return redirect()->route('arsip')->with('success', 'Arsip Surat deleted successfully');
    }
}
