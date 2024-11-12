<?php

namespace App\Http\Controllers;

use App\Models\Gauge;
use Illuminate\Http\Request;

class GaugeController extends Controller
{
    public function index()
    {
        // Ambil data terakhir dari tabel gauges untuk dashboard
        $latestGaugeData = Gauge::latest()->first();
        return view('dashboard', compact('latestGaugeData'));
    }

    public function sensorPage()
    {
        // Ambil data terakhir dari tabel gauges untuk halaman sensor
        $latestGaugeData = Gauge::latest()->first();
        return view('sensor', compact('latestGaugeData'));
    }
}
