<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Models\Simpanan;
use App\Models\SimpananWajib;
use Illuminate\Support\Facades\Auth;

class SimpananWajibController extends Controller
{
    public function homewajib()
    {
        $user_id = Anggota::where('email_kantor',Auth::user()->email)->value('id');
        $simpananWajib = SimpananWajib::where('anggota_id',$user_id)->with('anggota')->get(); // Ambil data dan relasi anggota
        // dd($simpananWajib);
        return view('pages.anggota.simpanan.wajib.index', [
            'title' => 'Simpanan Wajib',
            'simpananWajib' => $simpananWajib // Kirim data ke view
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'jenis_simpanan' => 'required|in:simpanan_pokok',
            'amount' => 'required|numeric|min:10000',
            'payment_method' => 'required|string',
        ]);

        Simpanan::create([
            'nama' => Auth::user()->name,
            'email' => Auth::user()->email,
            'amount' => $validated['amount'],
            'payment_method' => $validated['payment_method'],
        ]);

        return redirect()->route('simpanan.wajib.create')
            ->with('success', 'Pengajuan simpanan wajib berhasil diajukan. Silakan lakukan pembayaran sebelum 1x24 jam.');
    }
}
