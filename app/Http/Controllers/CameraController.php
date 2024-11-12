<?php

namespace App\Http\Controllers;

use App\Models\Camera;
use Illuminate\Http\Request;

class CameraController extends Controller
{
    public function index()
    {
        // Ambil semua data kamera dari database
        $cameras = Camera::all();

        // Kirimkan data kamera ke tampilan dashboard
        return view('dashboard', compact('cameras'));
    }

    public function store(Request $request)
    {
        // Validasi dan buat data kamera baru
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'status' => 'required|in:active,non-active',
        ]);

        Camera::create($request->only('name', 'location', 'status'));

        return redirect()->back()->with('success', 'Camera added successfully!');
    }

    public function update(Request $request, $id)
    {
        // Validasi dan update data kamera yang ada
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'status' => 'required|in:active,non-active',
        ]);

        $camera = Camera::findOrFail($id);
        $camera->update($request->only('name', 'location', 'status'));

        return redirect()->back()->with('success', 'Camera updated successfully!');
    }
}
