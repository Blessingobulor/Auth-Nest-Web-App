<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - AuthNest</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .sidebar {
            min-height: 100vh;
        }

        .profile-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 50%;
        }

        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }

            .sidebar.active {
                display: block;
                position: absolute;
                background: white;
                z-index: 1000;
                width: 250px;
                height: 100%;
            }
        }
    </style>
</head>
<body class="bg-light">

    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom px-3">
        <div class="container-fluid">
            <button class="btn btn-outline-secondary d-md-none" id="toggleSidebar">
                <i class="bi bi-list"></i>
            </button>
            <span class="navbar-brand fw-bold text-primary">AuthNest</span>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row min-vh-100">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 bg-white border-end p-3 sidebar" id="sidebar">
                <h5 class="mb-4">Menu</h5>
                <ul class="nav nav-pills flex-column mb-4">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark">
                            <i class="bi bi-briefcase-fill me-2"></i> Jobs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark">
                            <i class="bi bi-journal-check me-2"></i> Applications
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark">
                            <i class="bi bi-people-fill me-2"></i> Response Clients
                        </a>
                    </li>
                </ul>

                <form action="{{ route('logout') }}" method="POST" class="mt-auto">
                    @csrf
                    <button class="btn btn-danger w-100">
                        <i class="bi bi-box-arrow-right me-1"></i> Logout
                    </button>
                </form>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 col-lg-10 p-4">
                <!-- Welcome & Profile -->
                <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
                    <div>
                        <h2 class="text-dark mb-1">Welcome, {{ auth()->user()->name }}!</h2>
                        <p class="text-muted">Here’s what’s happening today</p>
                    </div>
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}" alt="Profile" class="profile-img shadow">
                </div>

                <!-- Stats -->
                <div class="row g-4 mb-4">
                    <div class="col-md-4">
                        <div class="card text-bg-primary shadow">
                            <div class="card-body">
                                <h5 class="card-title">Open Jobs</h5>
                                <p class="card-text fs-4">24</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-bg-success shadow">
                            <div class="card-body">
                                <h5 class="card-title">Applications</h5>
                                <p class="card-text fs-4">13</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-bg-warning shadow">
                            <div class="card-body">
                                <h5 class="card-title">Client Responses</h5>
                                <p class="card-text fs-4">7</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activities -->
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Recent Activities</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <i class="bi bi-check-circle-fill text-success me-2"></i> You applied for <strong>UI/UX Designer</strong>
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-reply-fill text-primary me-2"></i> Client responded to your application
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-pencil-fill text-warning me-2"></i> You updated your profile
                        </li>
                    </ul>
                </div>
            </main>
        </div>
    </div>

    <script>
        // Toggle sidebar on small screens
        document.getElementById('toggleSidebar').addEventListener('click', () => {
            document.getElementById('sidebar').classList.toggle('active');
        });
    </script>

</body>
</html>
