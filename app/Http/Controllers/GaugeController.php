<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GaugeController extends Controller
{
    public function index()
    {
        // Ambil data terbaru dari tabel sensor_data untuk dashboard
        $latestSensorData = DB::table('sensor_data')->latest('timestamp')->first();
        
        return view('dashboard', compact('latestSensorData'));
    }

    public function sensorPage()
    {
        // Ambil data terbaru dari tabel sensor_data untuk halaman sensor
        $latestSensorData = DB::table('sensor_data')->latest('timestamp')->first();
        
        return view('sensor', compact('latestSensorData'));
    }
}
