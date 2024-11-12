@extends('layouts.user_type.auth')

@section('content')

<!-- Camera List Table -->
<div class="container mt-4">
        <button class="btn btn-primary" onclick="showAddCameraModal()">Add Camera</button>
        <div class="table-responsive mt-3">
            <table class="table align-items-center mb-0" id="cameraTable">
                <thead>
                    <tr>
                        <th>Camera Name</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cameras as $camera)
                    <tr id="camera-{{ $camera->id }}">
                        <td>{{ $camera->name }}</td>
                        <td>{{ $camera->location }}</td>
                        <td>
                            <span class="badge {{ $camera->status == 'active' ? 'badge-success' : 'badge-danger' }}">
                                {{ ucfirst($camera->status) }}
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-warning" onclick="showEditCameraModal({{ $camera->id }}, '{{ $camera->name }}', '{{ $camera->location }}', '{{ $camera->status }}')">Edit</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add/Edit Camera Modal -->
    <div class="modal fade" id="cameraModal" tabindex="-1" aria-labelledby="cameraModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="cameraForm" onsubmit="saveCamera(event)">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cameraModalLabel">Add Camera</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="cameraId">
                        <div class="form-group">
                            <label for="cameraName">Camera Name</label>
                            <input type="text" class="form-control" id="cameraName" required>
                        </div>
                        <div class="form-group">
                            <label for="cameraLocation">Location</label>
                            <input type="text" class="form-control" id="cameraLocation" required>
                        </div>
                        <div class="form-group">
                            <label for="cameraStatus">Status</label>
                            <select class="form-control" id="cameraStatus">
                                <option value="active">Active</option>
                                <option value="non-active">Non-active</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="saveButton">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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

  // Fungsi untuk memperbarui waktu
  function updateTime() {
      const now = new Date();
      const options = { 
        weekday: 'long', year: 'numeric', month: 'long', 
        day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit', 
        hour12: false, timeZone: 'Asia/Jakarta'
      };
      document.getElementById('currentTime').textContent = now.toLocaleString('id-ID', options);
  }

  // Perbarui waktu setiap detik
  setInterval(updateTime, 1000);
  updateTime();

  function showAddCameraModal() {
      document.getElementById("cameraId").value = "";
      document.getElementById("cameraName").value = "";
      document.getElementById("cameraLocation").value = "";
      document.getElementById("cameraStatus").value = "non-active";
      document.getElementById("cameraModalLabel").innerText = "Add Camera";
      $('#cameraModal').modal('show');
  }

  function showEditCameraModal(id, name, location, status) {
      document.getElementById("cameraId").value = id;
      document.getElementById("cameraName").value = name;
      document.getElementById("cameraLocation").value = location;
      document.getElementById("cameraStatus").value = status;
      document.getElementById("cameraModalLabel").innerText = "Edit Camera";
      $('#cameraModal').modal('show');
  }

  function saveCamera(event) {
      event.preventDefault();
      
      const cameraId = document.getElementById("cameraId").value;
      const cameraName = document.getElementById("cameraName").value;
      const cameraLocation = document.getElementById("cameraLocation").value;
      const cameraStatus = document.getElementById("cameraStatus").value;

      const url = cameraId ? `/cameras/${cameraId}` : `/cameras`;
      const method = cameraId ? 'PUT' : 'POST';

      $.ajax({
          url: url,
          method: method,
          data: {
              _token: "{{ csrf_token() }}",
              name: cameraName,
              location: cameraLocation,
              status: cameraStatus
          },
          success: function(response) {
              $('#cameraModal').modal('hide');
              if (cameraId) {
                  $(`#camera-${cameraId}`).html(`
                      <td>${cameraName}</td>
                      <td>${cameraLocation}</td>
                      <td><span class="badge ${cameraStatus == 'active' ? 'badge-success' : 'badge-danger'}">${cameraStatus.charAt(0).toUpperCase() + cameraStatus.slice(1)}</span></td>
                      <td><button class="btn btn-sm btn-warning" onclick="showEditCameraModal(${cameraId}, '${cameraName}', '${cameraLocation}', '${cameraStatus}')">Edit</button></td>
                  `);
              } else {
                  $('#cameraTable tbody').append(`
                      <tr id="camera-${response.id}">
                          <td>${cameraName}</td>
                          <td>${cameraLocation}</td>
                          <td><span class="badge ${cameraStatus == 'active' ? 'badge-success' : 'badge-danger'}">${cameraStatus.charAt(0).toUpperCase() + cameraStatus.slice(1)}</span></td>
                          <td><button class="btn btn-sm btn-warning" onclick="showEditCameraModal(${response.id}, '${cameraName}', '${cameraLocation}', '${cameraStatus}')">Edit</button></td>
                      </tr>
                  `);
              }
          },
          error: function(xhr) {
              console.log(xhr.responseText);
          }
      });
  }
</script>

<!-- Bootstrap Bundle with Popper.js -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
@endpush







