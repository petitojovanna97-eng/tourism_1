<?php
session_start();

$conn = new mysqli("localhost", "root", "", "tourismdestination_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle inquiry deletion
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $conn->query("DELETE FROM contact_messages_db WHERE id = $delete_id");
    header("Location: admin_dashboard.php?deleted=1");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Leyte/OTHERcountriesTD | Admin</title>
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/9638/9638452.png" />
    
    <!-- Bootstrap & DataTables CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap4.css" rel="stylesheet" />
    
    <style>
        body {
            height: 100vh;
            overflow: hidden;
            margin: 0;
            display: flex;
        }
        main {
            margin-left: 320px;
            padding: 1rem;
            height: 100vh;
            overflow-y: auto;
            flex-grow: 1;
        }
        .sidebar {
            min-width: 320px;
            max-width: 320px;
            background-color: #0a1128;
            color: white;
            padding: 1rem;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
        }
        .sidebar a.active {
            color: red;
            background-color: #495057;
            font-weight: bold;
        }
        .sidebar h4 {
            text-align: center;
            margin-bottom: 1rem;
        }
        .sidebar hr {
            border-color: grey;
        }
        .sidebar strong {
            color: #495057;
            display: block;
            margin: 1rem 0 0.5rem;
        }
        .sidebar a {
            color: #7c807f;
            text-decoration: none;
            border-radius: 4px;
            display: block;
            margin-bottom: 0.25rem;
            padding: 0.5rem;
        }
        .sidebar a:hover {
            background-color: #495057;
            color: white;
        }
        .auto-resize {
            min-height: 100px;
            overflow-y: hidden;
            resize: none;
            text-align: justify;
        }
    </style>
</head>
<body>
<div class="sidebar">
    <h4>LeyteOTHERcountriesTD</h4>
    <hr>
    <strong>MAIN</strong>
        <a class="active" href="admin_dashboard.php?page=admin_dashbord"><i class="fa-solid fa-house"></i> Dashboard</a>
        <a href="admin_inquiry.php?page=admin_dashboard"><i class="fa-solid fa-message"></i> Inquiry</a>
    <hr>
    <strong>PAGES</strong>
        <a href="homepage.php?page=homepage"><i class="fa-solid fa-file"></i> Home</a>
        <a href="#"><i class="fa-solid fa-file"></i> Services</a>
        <a href="#"><i class="fa-solid fa-file"></i> Contact</a>
        <a href="#"><i class="fa-solid fa-file"></i> Search</a>
    <li class="nav-item text-nowrap">
        <a class="nav-link" href="login.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Sign out</a>
</div>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">DASHBOARD</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <i class="fa fa-calendar"></i> This week
            </button>
        </div>
    </div>

    <h2>Welcome <?= isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Admin'; ?>!</h2>

    <?php if (isset($_GET['deleted'])): ?>
        <div class="alert alert-success">Inquiry deleted successfully.</div>
    <?php endif; ?>

    <div class="mt-4 mb-3"><h3>List of Inquiries</h3></div>

    <div class="d-flex flex-wrap gap-3">
        <div style="flex: 1; min-width: 300px;">
            <table id="inquiryTable" class="table table-striped table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sql = "SELECT * FROM contact_messages_db ORDER BY id DESC";
                    $result = $conn->query($sql);
                    $counter = 1;

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr class='text-center'>";
                            echo "<td>" . $counter++ . "</td>";
                            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                            echo "<td>
                                    <a href='admin_inquiry.php?msg_id=" . urlencode($row['id']) . "' class='btn btn-info btn-sm'>
                                        <i class='bi bi-eye'></i>
                                    </a>
                                    <a href='admin_dashboard.php?delete_id=" . urlencode($row['id']) . "' 
                                       class='btn btn-danger btn-sm' 
                                       onclick=\"return confirm('Are you sure you want to delete this inquiry?');\">
                                        <i class='fa-solid fa-trash'></i>
                                    </a>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4' class='text-center'>No inquiries found.</td></tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function () {
    $('#inquiryTable').DataTable({
        pagingType: 'simple_numbers',
        lengthChange: false,
        pageLength: 10,
        info: false,
        searching: true,
        order: [[0, 'asc']]
    });
});
</script>
</body>
</html>
