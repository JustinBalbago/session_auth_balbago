<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SessionAuthSystem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 py-2 shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-white fs-5" href="#">
                SessionAuthSystem <span class="text-muted fw-normal fs-6 ms-2">Dashboard</span>
            </a>
            
            <div class="d-flex align-items-center">
                <div class="bg-secondary bg-opacity-25 text-white px-3 py-1 rounded-pill me-3 d-flex align-items-center">
                    <i class="bi bi-person-circle me-2"></i>
                    <span class="small fw-semibold"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
                </div>
                <!-- Logout Button -->
                <a href="logout.php" class="btn btn-danger btn-sm px-3 fw-semibold">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <div class="container py-4">
        
        <!-- Welcome Card Container -->
        <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white">
            <div class="card-body">
                <h1 class="fw-bold text-dark display-6 mb-1">
                    Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!
                </h1>
                <p class="text-muted small mb-3">This page is protected and only visible to logged-in users.</p>
                
                <button class="btn btn-primary btn-sm px-4 py-2 rounded-2 fw-semibold shadow-sm mb-4">
                    Explore Dashboard
                </button>
                
                <hr class="text-muted opacity-25 my-4">

                <div class="row g-3">
                    
                    <!-- Account Status -->
                    <div class="col-md-4">
                        <div class="p-3 bg-light rounded-3 border-0 h-100">
                            <div class="text-secondary small fw-bold mb-1">
                                <i class="bi bi-shield-check text-success me-1"></i> Account Status
                            </div>
                            <p class="small text-muted mb-0">
                                Your session is active and protected against Session Fixation using <code>session_regenerate_id(true)</code>.
                            </p>
                        </div>
                    </div>

                    <!-- User Details -->
                    <div class="col-md-4">
                        <div class="p-3 bg-light rounded-3 border-0 h-100">
                            <div class="text-secondary small fw-bold mb-1">
                                <i class="bi bi-person-badge text-primary me-1"></i> User Details
                            </div>
                            <p class="small text-muted mb-1">User ID: <strong class="text-dark"><?php echo htmlspecialchars($_SESSION['user_id']); ?></strong></p>
                            <p class="small text-muted mb-0">Username: <strong class="text-dark"><?php echo htmlspecialchars($_SESSION['username']); ?></strong></p>
                        </div>
                    </div>

                    <!-- Active Session ID -->
                    <div class="col-md-4">
                        <div class="p-3 bg-light rounded-3 border-0 h-100">
                            <div class="text-secondary small fw-bold mb-1">
                                <i class="bi bi-key text-warning me-1"></i> Active Session ID
                            </div>
                            <p class="small text-muted mb-1">Current Session ID:</p>
                            <code class="text-primary small text-break d-block bg-white p-1 rounded border"><?php echo htmlspecialchars(session_id()); ?></code>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <footer class="text-center text-muted small mt-4">
            <span>Log out and log back in to see session regeneration in action.</span>
        </footer>

    </div>

</body>
</html>