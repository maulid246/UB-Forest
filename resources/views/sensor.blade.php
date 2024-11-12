@extends('layouts.user_type.auth')

@section('content')

<div class="row">
  <!-- Gauge Sensor Suhu -->
  <div class="col-lg-6 col-md-6 mb-lg-4 mb-4">
    <div class="card h-100">
      <div class="card-header pb-0">
        <h6>Temperature Sensor</h6>
        <p class="text-sm">
          <i class="fa fa-thermometer-half text-danger" aria-hidden="true"></i>
          <span class="font-weight-bold">Current: <span id="gaugeValue">{{ $latestGaugeData->temperature ?? 'N/A' }}</span>°C</span>
        </p>
      </div>
      <div class="card-body d-flex flex-column align-items-center">
        <div class="gauge-container">
          <canvas id="gauge" width="400" height="200"></canvas>
        </div>
        <div class="gauge-labels" style="display: flex; justify-content: space-between; width: 70%; margin-top: 15px;">
          <span style="flex: 1; text-align: center; font-size: 20px; font-weight: bold;">0°C</span>
          <span id="gaugeCurrentValue" style="flex: 1; text-align: center; font-size: 20px; font-weight: bold;">{{ $latestGaugeData->temperature ?? 'N/A' }}°C</span>
          <span style="flex: 1; text-align: center; font-size: 20px; font-weight: bold;">100°C</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Gauge Sensor Kelembapan -->
  <div class="col-lg-6 col-md-6 mb-lg-4 mb-4">
    <div class="card h-100">
      <div class="card-header pb-0">
        <h6>Humidity Sensor</h6>
        <p class="text-sm">
          <i class="fa fa-tint text-primary" aria-hidden="true"></i>
          <span class="font-weight-bold">Current: <span id="gaugeHumidityValue">{{ $latestGaugeData->humidity ?? 'N/A' }}</span>%</span>
        </p>
      </div>
      <div class="card-body d-flex flex-column align-items-center">
        <div class="gauge-container">
          <canvas id="gaugeHumidity" width="400" height="200"></canvas>
        </div>
        <div class="gauge-labels" style="display: flex; justify-content: space-between; width: 70%; margin-top: 15px;">
          <span style="flex: 1; text-align: center; font-size: 20px; font-weight: bold;">0%</span>
          <span id="gaugeHumidityCurrentValue" style="flex: 1; text-align: center; font-size: 20px; font-weight: bold;">{{ $latestGaugeData->humidity ?? 'N/A' }}%</span>
          <span style="flex: 1; text-align: center; font-size: 20px; font-weight: bold;">100%</span>
        </div>
      </div>
    </div>
  </div>
</div>




@endsection

@push('dashboard')
<!-- Library Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
  // Konfigurasi dasar untuk gauge chart
  const gaugeOptions = (value, max, color) => ({
    type: 'doughnut',
    data: {
      datasets: [{
        data: [value, max - value],
        backgroundColor: [color, '#e9ecef'],
        borderWidth: 0,
      }],
    },
    options: {
      cutoutPercentage: 50,
      rotation: -90,
      circumference: 180,
      plugins: {
        legend: { display: false },
        tooltip: { enabled: false },
      },
    },
  });

  // Mendapatkan elemen canvas untuk gauge suhu dan kelembapan
  const gaugeCanvas = document.getElementById('gauge');
  const gaugeHumidityCanvas = document.getElementById('gaugeHumidity');

  // Mengambil data dari PHP untuk gauge
  const temperatureValue = {{ $latestGaugeData->temperature ?? 0 }};
  const humidityValue = {{ $latestGaugeData->humidity ?? 0 }};
  
  // Membuat gauge chart untuk suhu
  const gaugeTemperatureChart = new Chart(gaugeCanvas, gaugeOptions(temperatureValue, 100, '#4CE84CFF'));
  
  // Membuat gauge chart untuk kelembapan
  const gaugeHumidityChart = new Chart(gaugeHumidityCanvas, gaugeOptions(humidityValue, 100, '#4CE84CFF'));


    
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<!-- Bootstrap Bundle with Popper -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
@endpush







