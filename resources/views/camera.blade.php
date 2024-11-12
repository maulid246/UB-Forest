@extends('layouts.user_type.auth')

@section('content')



  


<div class="row mt-4">
    <!-- Bagian Monitoring Kamera 1 -->
    <div class="col-lg-6 col-md-6 mb-lg-4 mb-4">
        <div class="card h-100">
            <div class="card-body p-3 d-flex flex-column h-100">
                <!-- Gambar kamera -->
                <div class="col-lg-12 text-center mb-3">
                    <img id="cameraImage1" class="img-fluid rounded" style="object-fit: cover; width: 100%; height: 300px;" src="../assets/img/1080p_HBK_autumn-morning_GI.jpg" alt="camera">
                </div>

                <!-- Informasi kamera -->
                <div class="col-lg-12 d-flex flex-column justify-content-center">
                    <h5 class="font-weight-bolder" id="cameraTitle1">Monitoring Camera 1</h5>
                    <h6 class="font-weight-bolder" id="cameraLocation1">Location: Pinus Forest Koordinat 2455</h6>
                    <p class="mb-3">Updated At: <span id="currentTime"></span></p>

                    <!-- Button dropdown pilihan kamera -->
                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle text-black" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Choose Camera
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <a class="dropdown-item" href="#" onclick="changeCamera(1, 1)">Camera 1</a>
                            <a class="dropdown-item" href="#" onclick="changeCamera(1, 2)">Camera 2</a>
                            <a class="dropdown-item" href="#" onclick="changeCamera(1, 3)">Camera 3</a>
                            <a class="dropdown-item" href="#" onclick="changeCamera(1, 4)">Camera 4</a>
                            <a class="dropdown-item" href="#" onclick="changeCamera(1, 5)">Camera 5</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bagian Monitoring Kamera 2 -->
    <div class="col-lg-6 col-md-6 mb-lg-4 mb-4">
        <div class="card h-100">
            <div class="card-body p-3 d-flex flex-column h-100">
                <!-- Gambar kamera -->
                <div class="col-lg-12 text-center mb-3">
                    <img id="cameraImage2" class="img-fluid rounded" style="object-fit: cover; width: 100%; height: 300px;" src="../assets/img/1080p_HBK_oak-forest_GI.jpg" alt="camera">
                </div>

                <!-- Informasi kamera -->
                <div class="col-lg-12 d-flex flex-column justify-content-center">
                    <h5 class="font-weight-bolder" id="cameraTitle2">Monitoring Camera 2</h5>
                    <h6 class="font-weight-bolder" id="cameraLocation2">Location: Oak Forest Koordinat 3489</h6>
                    <p class="mb-3">Updated At: <span id="currentTime"></span></p>

                    <!-- Button dropdown pilihan kamera -->
                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle text-black" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Choose Camera
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                            <a class="dropdown-item" href="#" onclick="changeCamera(2, 1)">Camera 1</a>
                            <a class="dropdown-item" href="#" onclick="changeCamera(2, 2)">Camera 2</a>
                            <a class="dropdown-item" href="#" onclick="changeCamera(2, 3)">Camera 3</a>
                            <a class="dropdown-item" href="#" onclick="changeCamera(2, 4)">Camera 4</a>
                            <a class="dropdown-item" href="#" onclick="changeCamera(2, 5)">Camera 5</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <!-- Bagian Monitoring Kamera 3 -->
    <div class="col-lg-6 col-md-6 mb-lg-4 mb-4">
        <div class="card h-100">
            <div class="card-body p-3 d-flex flex-column h-100">
                <!-- Gambar kamera -->
                <div class="col-lg-12 text-center mb-3">
                    <img id="cameraImage3" class="img-fluid rounded" style="object-fit: cover; width: 100%; height: 300px;" src="../assets/img/1080p_HBK_pine-mountain_GI.jpg" alt="camera">
                </div>

                <!-- Informasi kamera -->
                <div class="col-lg-12 d-flex flex-column justify-content-center">
                    <h5 class="font-weight-bolder" id="cameraTitle3">Monitoring Camera 3</h5>
                    <h6 class="font-weight-bolder" id="cameraLocation3">Location: Pine Mountain Koordinat 1234</h6>
                    <p class="mb-3">Updated At: <span id="currentTime"></span></p>

                    <!-- Button dropdown pilihan kamera -->
                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle text-black" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Choose Camera
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                            <a class="dropdown-item" href="#" onclick="changeCamera(3, 1)">Camera 1</a>
                            <a class="dropdown-item" href="#" onclick="changeCamera(3, 2)">Camera 2</a>
                            <a class="dropdown-item" href="#" onclick="changeCamera(3, 3)">Camera 3</a>
                            <a class="dropdown-item" href="#" onclick="changeCamera(3, 4)">Camera 4</a>
                            <a class="dropdown-item" href="#" onclick="changeCamera(3, 5)">Camera 5</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bagian Monitoring Kamera 4 -->
    <div class="col-lg-6 col-md-6 mb-lg-4 mb-4">
        <div class="card h-100">
            <div class="card-body p-3 d-flex flex-column h-100">
                <!-- Gambar kamera -->
                <div class="col-lg-12 text-center mb-3">
                    <img id="cameraImage4" class="img-fluid rounded" style="object-fit: cover; width: 100%; height: 300px;" src="../assets/img/1080p_HBK_birch-woods_GI.jpg" alt="camera">
                </div>

                <!-- Informasi kamera -->
                <div class="col-lg-12 d-flex flex-column justify-content-center">
                    <h5 class="font-weight-bolder" id="cameraTitle4">Monitoring Camera 4</h5>
                    <h6 class="font-weight-bolder" id="cameraLocation4">Location: Birch Woods Koordinat 5678</h6>
                    <p class="mb-3">Updated At: <span id="currentTime"></span></p>

                    <!-- Button dropdown pilihan kamera -->
                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle text-black" type="button" id="dropdownMenuButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Choose Camera
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                            <a class="dropdown-item" href="#" onclick="changeCamera(4, 1)">Camera 1</a>
                            <a class="dropdown-item" href="#" onclick="changeCamera(4, 2)">Camera 2</a>
                            <a class="dropdown-item" href="#" onclick="changeCamera(4, 3)">Camera 3</a>
                            <a class="dropdown-item" href="#" onclick="changeCamera(4, 4)">Camera 4</a>
                            <a class="dropdown-item" href="#" onclick="changeCamera(4, 5)">Camera 5</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- Bagian List Kamera -->
    <div class="col-lg-12 col-md-6 mb-lg-4 mb-4">
        <div class="card h-100">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h6>Camera List</h6>
                        <p class="text-sm mb-0">
                            <i class="fa fa-plus text-info" aria-hidden="true"></i>
                            <span class="font-weight-bold ms-1">Add Camera</span>
                        </p>
                    </div>
                    <div class="col-lg-6 col-5 my-auto text-end">
                        <div class="dropdown float-lg-end pe-4"></div>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Camera Name</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">Camera 1</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-sm mb-0">Pinus Forest Coordinate 2455</p>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="badge badge-sm bg-gradient-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">Camera 2</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-sm mb-0">Oak Forest Coordinate 3489</p>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="badge badge-sm bg-gradient-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">Camera 3</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-sm mb-0">Pine Mountain Coordinate 1234</p>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="badge badge-sm bg-gradient-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">Camera 4</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-sm mb-0">Birch Woods Coordinate 5678</p>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="badge badge-sm bg-gradient-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">Camera 5</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-sm mb-0">Entrance Coordinate 3456</p>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="badge badge-sm bg-gradient-success">Active</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection

@push('dashboard')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Data kamera
  const cameras = [
      { title: "Monitoring Camera 1", location: "Location: Pinus Forest Coordinate 2455", image: "../assets/img/1080p_HBK_autumn-morning_GI.jpg" },
      { title: "Monitoring Camera 2", location: "Location: Oak Forest Coordinate 3489", image: "../assets/img/1080p_HBK_oak-forest_GI.jpg" },
      { title: "Monitoring Camera 3", location: "Location: Pine Mountain Coordinate 1234", image: "../assets/img/1080p_HBK_pine-mountain_GI.jpg" },
      { title: "Monitoring Camera 4", location: "Location: Birch Woods Coordinate 5678", image: "../assets/img/1080p_HBK_birch-woods_GI.jpg" },
      { title: "Monitoring Camera 5", location: "Location: Entrance Coordinate 3456", image: "../assets/img/1080p_HBK_entrance_GI.jpg" },
  ];

  function changeCamera(cameraId, cameraNum) {
      const camera = cameras[cameraNum - 1];
      document.getElementById(`cameraImage${cameraId}`).src = camera.image;
      document.getElementById(`cameraTitle${cameraId}`).innerText = camera.title;
      document.getElementById(`cameraLocation${cameraId}`).innerText = camera.location;
  }

    // Set kamera default (kamera 1)
    window.onload = function() {
        changeCamera(1);
    };

    // Fungsi untuk update waktu saat ini
    function updateTime() {
      const currentTime = new Date().toLocaleString();
      document.querySelectorAll('#currentTime').forEach(element => element.textContent = currentTime);
  }

  // Update waktu setiap detik
  setInterval(updateTime, 1000);
    
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<!-- Bootstrap Bundle with Popper -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
@endpush







