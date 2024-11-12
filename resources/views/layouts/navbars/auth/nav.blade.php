<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg shadow-none border-radius-xl w-100" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3" style="display: flex; align-items: center; gap: 1rem;">
        <!-- Breadcrumb and Page Title -->
        <nav aria-label="breadcrumb" class="flex-grow-1" style="margin-bottom: 0;">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0" style="margin-bottom: 0; padding-top: 0.25rem;">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active text-capitalize" aria-current="page">{{ str_replace('-', ' ', Request::path()) }}</li>
            </ol>
            <h6 class="font-weight-bolder mb-0 text-capitalize" style="margin-top: 0.25rem;">{{ str_replace('-', ' ', Request::path()) }}</h6>
        </nav>

        <!-- Cards Row - Flex Container -->
        <div class="row mx-0 flex-grow-1 gx-2" style="display: flex; flex-wrap: wrap; gap: 1rem; margin-top: 0;">
            <!-- Card: Resident -->
            <div class="col-lg-3 col-md-4 col-sm-6" style="flex: 1 1 calc(25% - 1rem); min-width: 200px;">
                <div class="card h-100" style="height: 100%;">
                    <div class="card-body p-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-sm mb-1 text-capitalize font-weight-bold">Resident</p>
                                <h5 class="font-weight-bolder mb-0" id="resident-count"></h5>
                            </div>
                            <div>
                                <button class="btn btn-outline-success btn-sm" style="padding: 6px 12px; font-size: 1.1rem;" onclick="decrement('resident-count')">-</button>
                                <button class="btn btn-outline-success btn-sm" style="padding: 6px 12px; font-size: 1.1rem;" onclick="increment('resident-count')">+</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card: Number of Trees -->
            <div class="col-lg-3 col-md-4 col-sm-6" style="flex: 1 1 calc(25% - 1rem); min-width: 200px;">
                <div class="card h-100" style="height: 100%;">
                    <div class="card-body p-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-sm mb-1 text-capitalize font-weight-bold">Trees</p>
                                <h5 class="font-weight-bolder mb-0" id="tree-count"></h5>
                            </div>
                            <div>
                                <button class="btn btn-outline-success btn-sm" style="padding: 6px 12px; font-size: 1.1rem;" onclick="decrement('tree-count')">-</button>
                                <button class="btn btn-outline-success btn-sm" style="padding: 6px 12px; font-size: 1.1rem;" onclick="increment('tree-count')">+</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card: Administrator -->
            <div class="col-lg-3 col-md-4 col-sm-6" style="flex: 1 1 calc(25% - 1rem); min-width: 200px;">
                <div class="card h-100" style="height: 100%;">
                    <div class="card-body p-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-sm mb-1 text-capitalize font-weight-bold">Administrator</p>
                                <h5 class="font-weight-bolder mb-0" id="admin-count"></h5>
                            </div>
                            <div>
                                <button class="btn btn-outline-success btn-sm" style="padding: 6px 12px; font-size: 1.1rem;" onclick="decrement('admin-count')">-</button>
                                <button class="btn btn-outline-success btn-sm" style="padding: 6px 12px; font-size: 1.1rem;" onclick="increment('admin-count')">+</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card: Add Data Button -->
            <div class="col-lg-3 col-md-4 col-sm-6" style="flex: 1 1 calc(25% - 1rem); min-width: 200px;">
                <div class="card h-100" style="height: 100%;">
                    <div class="card-body p-3 text-center">
                        <button class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#addDataModal">Add Data</button>
                    </div>
                </div>
            </div>
        </div>

      <!-- Modal to Add/Update Data -->
<div class="modal fade" id="addDataModal" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Add or Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="dataForm">
                    <div class="mb-3">
                        <label for="resident" class="form-label">Residents</label>
                        <input type="number" class="form-control" id="resident" placeholder="Resident Count" required>
                    </div>
                    <div class="mb-3">
                        <label for="trees" class="form-label">Number of Trees</label>
                        <input type="number" class="form-control" id="trees" placeholder="Tree Count" required>
                    </div>
                    <div class="mb-3">
                        <label for="admin" class="form-label">Administrators</label>
                        <input type="number" class="form-control" id="admin" placeholder="Admin Count" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Save Data</button>
                </form>
            </div>
        </div>
    </div>
</div>

        <!-- Sign Out Button -->
        <ul class="navbar-nav ms-auto align-items-center" style="position: relative; top: -5px;">
            <li class="nav-item">
                <a href="{{ url('/logout') }}" class="nav-link text-body font-weight-bold px-0">
                    <i class="fa fa-user me-sm-1"></i>
                    <span class="d-sm-inline d-none">Sign Out</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

<!-- JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Fetch data from the server on page load to populate navbar counts
        fetch('/get-data')
            .then(response => response.json())
            .then(data => {
                // Populate the initial counts from the database
                document.getElementById('resident-count').textContent = data.resident_count;
                document.getElementById('tree-count').textContent = data.tree_count;
                document.getElementById('admin-count').textContent = data.admin_count;
            });

        // When modal opens, fetch the data for editing and pre-fill the fields
        $('#addDataModal').on('show.bs.modal', function () {
            fetch('/get-data')  // This fetches the current data from the server
                .then(response => response.json())
                .then(data => {
                    document.getElementById('resident').value = data.resident_count;
                    document.getElementById('trees').value = data.tree_count;
                    document.getElementById('admin').value = data.admin_count;
                });
        });
    });

    // Increment function for navbar counts
    function increment(id) {
        let count = document.getElementById(id);
        count.textContent = parseInt(count.textContent) + 1;
        saveData(); // Save updated data
    }

    // Decrement function for navbar counts
    function decrement(id) {
        let count = document.getElementById(id);
        count.textContent = Math.max(0, parseInt(count.textContent) - 1);
        saveData(); // Save updated data
    }

    // Save data to the server
    function saveData() {
        let residentValue = document.getElementById("resident-count").textContent;
        let treesValue = document.getElementById("tree-count").textContent;
        let adminValue = document.getElementById("admin-count").textContent;

        // Send the updated data to the server
        fetch('/update-data', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                resident_count: residentValue,
                tree_count: treesValue,
                admin_count: adminValue
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data.message);
        });
    }

    // Save data when the modal form is submitted
    document.getElementById("dataForm").addEventListener('submit', function(event) {
        event.preventDefault();

        let residentValue = document.getElementById("resident").value;
        let treesValue = document.getElementById("trees").value;
        let adminValue = document.getElementById("admin").value;

        // Update the navbar with the new values from the modal
        if (residentValue) document.getElementById("resident-count").textContent = residentValue;
        if (treesValue) document.getElementById("tree-count").textContent = treesValue;
        if (adminValue) document.getElementById("admin-count").textContent = adminValue;

        // Send the updated data to the server
        fetch('/update-data', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                resident_count: residentValue,
                tree_count: treesValue,
                admin_count: adminValue
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data.message);
            // Close the modal after saving
            document.querySelector("#addDataModal .btn-close").click();
        });
    });
</script>

