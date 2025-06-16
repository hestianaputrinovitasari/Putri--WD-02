<?php

namespace App\Http\Controllers\dokter;
use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::all();

        return view('dokter.obat.index')->with([
            'obats' => $obats,
        ]);
    }

    public function create(){
        return view('dokter.obat.create');
    }

    public function edit($id)
    {
        $obat = Obat::find($id);

        return view('dokter.obat.edit')->with([
            'obat' => $obat,
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'kemasan' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
        ]);

        Obat::create([
            'nama_obat' => $request->nama_obat,
            'kemasan' => $request->kemasan,
            'harga' => $request->harga,
        ]);

        return redirect()->route('dokter.obat.index')->with('status', 'obat-created');
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'kemasan' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
        ]);

        $obat = Obat::find($id);
        $obat->update([
            'nama_obat' => $request->nama_obat,
            'kemasan' => $request->kemasan,
            'harga' => $request->harga,
        ]);

        return redirect()->route('dokter.obat.index')->with('status', 'obat-updated');
    }

    public function destroy($id)
    {
        $obat = Obat::find($id);
        $obat->delete();

        return redirect()->route('dokter.obat.index');
    }

    // Tambahan: Menampilkan obat yang sudah dihapus (soft delete)
    public function trash()
    {
        $obats = Obat::onlyTrashed()->get();

        return view('dokter.obat.trash', compact('obats'));
    }

    // Mengembalikan obat yang dihapus
public function restore($id)
{
    $obat = Obat::onlyTrashed()->findOrFail($id);
    $obat->restore();

    return redirect()->route('dokter.obat.trash')->with('status', 'obat-restored');
}

// Menghapus permanen obat dari database
public function forceDelete($id)
{
    $obat = Obat::onlyTrashed()->findOrFail($id);
    $obat->forceDelete();

    return redirect()->route('dokter.obat.trash')->with('status', 'obat-deleted-permanent');
}

// Restore semua obat dari trash
public function restoreAll()
{
    Obat::onlyTrashed()->restore();

    return redirect()->route('dokter.obat.trash')->with('status', 'Semua obat berhasil direstore.');
}

// Hapus permanen semua obat dari trash
public function forceDeleteAll()
{
    Obat::onlyTrashed()->forceDelete();

    return redirect()->route('dokter.obat.trash')->with('status', 'Semua obat berhasil dihapus permanen.');
}

}
