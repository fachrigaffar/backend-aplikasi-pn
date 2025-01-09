<?php

namespace App\Http\Controllers\API;

use App\Models\Tamu;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KunjunganController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'alamat' => 'required',
        'email' => 'required|email',
        'no_hp' => 'required',
        'jabatan_id' => 'required|integer|exists:jabatan,id',
        'tujuan_kunjungan' => 'required',
        'jenis_tamu_id' => 'required|integer|exists:jenis_tamu,id',
        'instansi' => 'required',
        'nik' => 'required',
        'foto' => 'required|image|mimes:jpeg,png,jpg,heif',
        'ulasan' => 'required',
    ]);

    // Handle the file upload
    if ($request->hasFile('foto')) {
        $path = $request->file('foto')->store('uploads', 'public');
    } else {
        // Handle the case where foto is not uploaded
        return response()->json(['error' => 'Foto is required'], 400);
    }

    // Create the tamu record
    Tamu::create([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'email' => $request->email,
        'no_hp' => $request->no_hp,
        'jabatan_id' => (int) $request->jabatan_id,
        'tujuan_kunjungan' => $request->tujuan_kunjungan,
        'jenis_tamu_id' => (int) $request->jenis_tamu_id,
        'instansi' => $request->instansi,
        'nik' => $request->nik,
        'foto' => $path, // Store the path of the uploaded file
        'ulasan' => $request->ulasan,
        'updated_at' => now(),
        'created_at' => now(),
    ]);

    return response()->json(['success' => 'Data inserted successfully']);
}
}
