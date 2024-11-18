@extends('layouts.user_type.auth')

@section('content')

<div class="row mt-4">
    <!-- Camera Monitoring Section -->
    <div class="col-lg-12 col-md-12 mb-lg-4 mb-4">
        <div class="card h-100">
            <div class="card-body p-0 h-100">
                <!-- Camera Image -->
                <div class="row">
                    <div class="col-12 text-center">
                        <img id="cameraImage" class="img-fluid rounded" style="object-fit: cover; height: 400px; width: 100%;" src="../assets/img/1080p_HBK_autumn-morning_GI.jpg" alt="camera">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Camera Details Section -->
    <div class="col-lg-12 col-md-12 mb-lg-4 mb-4">
        <div class="card">
            <div class="card-body">
                <!-- Dynamic Camera Name and Location -->
                <h5 id="cameraNameText" class="font-weight-bolder"></h5>
                <h6 id="cameraLocationText" class="font-weight-bolder"></h6>
                <p class="mb-3">Updated At: <span id="currentTime"></span></p>

                <!-- Edit Camera Details Button -->
                <button class="btn btn-success text-black" data-bs-toggle="modal" data-bs-target="#editCameraModal">
                    Edit Camera Detail
                </button>
            </div>
        </div>
    </div>

    <!-- Modal for Editing Camera Details -->
    <div class="modal fade" id="editCameraModal" tabindex="-1" aria-labelledby="editCameraModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCameraModalLabel">Edit Camera Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="cameraDetailsForm">
                        <div class="form-group">
                            <label for="cameraName">Camera Name</label>
                            <input type="text" class="form-control" id="cameraName" placeholder="Enter camera name">
                        </div>
                        <div class="form-group">
                            <label for="cameraLocation">Location</label>
                            <input type="text" class="form-control" id="cameraLocation" placeholder="Enter camera location">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="saveChangesBtn">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('dashboard')

<!-- Bootstrap Bundle with Popper.js (tanpa jQuery) -->
<script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
<!-- SweetAlert2 local script -->
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>

<script>
    // Array of camera image URLs to cycle through
    const cameraImages = [
        '../assets/img/1080p_HBK_autumn-morning_GI.jpg',
        '../assets/img/1080p_HBK_birch-woods_GI.jpg', // Replace with actual paths
        '../assets/img/1080p_HBK_entrance_GI.jpg', // Replace with actual paths
        '../assets/img/1080p_HBK_pine-mountain_GI.jpg' // Replace with actual paths
    ];

    let currentImageIndex = 0; // Start with the first image

    // Function to update the camera image
    function updateCameraImage() {
        const cameraImageElement = document.getElementById('cameraImage');
        cameraImageElement.src = cameraImages[currentImageIndex];
        
        // Update index to point to the next image in the array, looping back after the last image
        currentImageIndex = (currentImageIndex + 1) % cameraImages.length;
    }

    // Update image every 2 seconds
    setInterval(updateCameraImage, 2000); // 5000 milliseconds = 5 seconds

    // Initial call to set the first image immediately
    updateCameraImage();

    // Update current time every second
    function updateTime() {
        const now = new Date();
        const options = { 
            weekday: 'long', year: 'numeric', month: 'long', 
            day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit', 
            hour12: false, timeZone: 'Asia/Jakarta'
        };
        document.getElementById('currentTime').textContent = now.toLocaleString('id-ID', options);
    }

    setInterval(updateTime, 1000);
    updateTime();

    // Function to load saved camera details from localStorage
    function loadCameraDetails() {
        const savedName = localStorage.getItem('cameraName');
        const savedLocation = localStorage.getItem('cameraLocation');

        if (savedName) {
            document.getElementById('cameraNameText').textContent = savedName;
            document.getElementById('cameraName').value = savedName;
        }

        if (savedLocation) {
            document.getElementById('cameraLocationText').textContent = 'Location: ' + savedLocation;
            document.getElementById('cameraLocation').value = savedLocation;
        }
    }

    // Load camera details from localStorage when the page loads
    loadCameraDetails();

    // Handle opening and closing the modal
    const saveChangesBtn = document.getElementById('saveChangesBtn');
    const editCameraModal = new bootstrap.Modal(document.getElementById('editCameraModal'));

    // When the Save Changes button is clicked, save the new values to localStorage and close the modal
    saveChangesBtn.addEventListener('click', () => {
        const cameraName = document.getElementById('cameraName').value;
        const cameraLocation = document.getElementById('cameraLocation').value;

        // Update the camera details displayed on the page
        document.getElementById('cameraNameText').textContent = cameraName || 'Monitoring Camera 1';
        document.getElementById('cameraLocationText').textContent = 'Location: ' + (cameraLocation || 'Pinus Forest Koordinat 2455');

        // Save changes to localStorage
        localStorage.setItem('cameraName', cameraName);
        localStorage.setItem('cameraLocation', cameraLocation);

        // Close the modal
        editCameraModal.hide();
    });
</script>

@endpush
