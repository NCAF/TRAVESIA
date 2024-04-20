<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DestinasiController extends Controller
{

    public function index()
    {
        $destinations = Destinasi::all();
        return view('page.destinasi', compact('destinations'));
    }
    public function store(Request $request)
    {

        $request->validate([
            'destinasi_awal' => 'required|string|max:255',
            'destinasi_akhir' => 'required|string|max:255',
            'jenis_kendaraan' => 'required|string|max:255',
            'no_plat' => 'required|string|max:255',
            'hari_berangkat' => 'required|date',
            'jumlah_kursi' => 'required|integer',
            'jumlah_bagasi' => 'required|integer',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required|string'
        ]);


        $destinasi = new Destinasi();
        $destinasi->destinasi_awal = $request->destinasi_awal;
        $destinasi->destinasi_akhir = $request->destinasi_akhir;
        $destinasi->jenis_kendaraan = $request->jenis_kendaraan;
        $destinasi->no_plat = $request->no_plat;
        $destinasi->hari_berangkat = $request->hari_berangkat;
        $destinasi->jumlah_kursi = $request->jumlah_kursi;
        $destinasi->jumlah_bagasi = $request->jumlah_bagasi;
        $destinasi->deskripsi = $request->deskripsi;


        if ($request->hasFile('foto')) {
            $fotoName = time() . '_' . $request->foto->getClientOriginalName();
            $request->foto->move(public_path('foto_destinasi'), $fotoName);
            $destinasi->foto = $fotoName;
        }


        $destinasi->save();


        return redirect()->route('destinasi.index')->with('notification', [
            'title' => 'Sukses!',
            'text' => 'Destinasi berhasil ditambahkan.',
            'type' => 'success'
        ]);
    }
    public function update(Request $request, $id)
    {
        try {
            // Validasi input
            $request->validate([
                'destinasi_awal' => 'required|string|max:255',
                'destinasi_akhir' => 'required|string|max:255',
                'jenis_kendaraan' => 'required|string|max:255',
                'no_plat' => 'required|string|max:255',
                'hari_berangkat' => 'required|date',
                'jumlah_kursi' => 'required|integer',
                'jumlah_bagasi' => 'required|integer',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'deskripsi' => 'required|string'
            ]);

            // Temukan destinasi berdasarkan ID
            $destinasi = Destinasi::findOrFail($id);

            // Atur nilai atribut destinasi berdasarkan input
            $destinasi->destinasi_awal = $request->destinasi_awal;
            $destinasi->destinasi_akhir = $request->destinasi_akhir;
            $destinasi->jenis_kendaraan = $request->jenis_kendaraan;
            $destinasi->no_plat = $request->no_plat;
            $destinasi->hari_berangkat = $request->hari_berangkat;
            $destinasi->jumlah_kursi = $request->jumlah_kursi;
            $destinasi->jumlah_bagasi = $request->jumlah_bagasi;
            $destinasi->deskripsi = $request->deskripsi;

            // Jika ada file foto yang diunggah, proses dan simpan
            if ($request->hasFile('foto')) {
                // Hapus foto lama jika ada
                if ($destinasi->foto) {
                    $oldImagePath = public_path('foto_destinasi/' . $destinasi->foto);
                    if (File::exists($oldImagePath)) {
                        File::delete($oldImagePath);
                    }
                }

                // Simpan foto baru
                $fotoName = time() . '_' . $request->foto->getClientOriginalName();
                $request->foto->move(public_path('foto_destinasi'), $fotoName);
                $destinasi->foto = $fotoName;
            }

            // Simpan perubahan
            $destinasi->save();

            // Redirect dengan notifikasi sukses
            return redirect()->route('destinasi.index')->with('notification', [
                'title' => 'Sukses!',
                'text' => 'Destinasi berhasil diperbarui.',
                'type' => 'success'
            ]);
        } catch (\Exception $e) {
            // Tangani jika terjadi kesalahan
            return redirect()->route('destinasi.index')->with('notification', [
                'title' => 'Error!',
                'text' => 'Gagal memperbarui destinasi. Silakan coba lagi.',
                'type' => 'error'
            ]);
        }
    }
    public function destroy($id)
    {
        try {
            $destinasi = Destinasi::findOrFail($id);

            // Hapus foto dari direktori
            $fotoPath = public_path('foto_destinasi/' . $destinasi->foto);
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }

            $destinasi->delete();

            return redirect()->route('destinasi.index')->with('notification', [
                'title' => 'Sukses!',
                'text' => 'Destinasi berhasil dihapus.',
                'type' => 'success'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('destinasi.index')->with('notification', [
                'title' => 'Error!',
                'text' => 'Gagal menghapus destinasi. Silakan coba lagi.',
                'type' => 'error'
            ]);
        }
    }


}
