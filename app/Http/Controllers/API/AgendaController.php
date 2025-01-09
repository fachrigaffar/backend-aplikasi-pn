<?php

namespace App\Http\Controllers\API;

use App\Models\Agenda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Validator;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mendapatkan semua data agenda
        $agendas = Agenda::all();

        return response()->json([
            'success' => true,
            'data' => $agendas,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'tanggal_kegiatan' => 'required|date|date_format:Y-m-d',
            'jam' => 'required|date_format:H:i',
            'pelaksana' => 'required|string|max:255',
            'agenda' => 'required|string|max:255',
            'tempat' => 'required|string|max:50',
        ]);

        // Membuat data agenda baru
        $agenda = Agenda::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Agenda berhasil dibuat',
            'data' => $agenda,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Mencari data agenda berdasarkan ID
        $agenda = Agenda::find($id);

        if (!$agenda) {
            return response()->json([
                'success' => false,
                'message' => 'Agenda tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $agenda,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'tanggal_kegiatan' => 'sometimes|required|date|date_format:Y-m-d',
            'jam' => 'sometimes|required|date_format:H:i',
            'pelaksana' => 'sometimes|required|string|max:255',
            'agenda' => 'sometimes|required|string|max:255',
            'tempat' => 'sometimes|required|string|max:50',
        ]);

        // Mencari data agenda berdasarkan ID
        $agenda = Agenda::find($id);

        if (!$agenda) {
            return response()->json([
                'success' => false,
                'message' => 'Agenda tidak ditemukan',
            ], 404);
        }

        // Update data agenda
        $agenda->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Agenda berhasil diupdate',
            'data' => $agenda,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Mencari data agenda berdasarkan ID
        $agenda = Agenda::find($id);

        if (!$agenda) {
            return response()->json([
                'success' => false,
                'message' => 'Agenda tidak ditemukan',
            ], 404);
        }

        // Hapus data agenda
        $agenda->delete();

        return response()->json([
            'success' => true,
            'message' => 'Agenda berhasil dihapus',
        ], 200);
    }
}
