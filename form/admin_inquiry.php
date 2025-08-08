<?php
session_start();

$conn = new mysqli("localhost", "root", "", "tourismdestination_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$messageData = null;
if (isset($_GET['msg_id'])) {
    $msg_id = intval($_GET['msg_id']);
    $stmt = $conn->prepare("SELECT * FROM contact_messages_db WHERE id = ?");
    $stmt->bind_param("i", $msg_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $messageData = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Leyte/OTHERcountriesTD | Admin</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/9638/9638452.png" />

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap4.css" rel="stylesheet" />
    <style>
        body {
            height: 100vh;           /* Full viewport height */
            overflow: hidden;        /* Prevent body scroll, only scroll inside main */
            margin: 0;
            display: flex;
        }

        main {
            margin-left: 320px;      /* Same as sidebar width */
            padding: 1rem;
            height: 100vh;
            overflow-y: auto;        /* Make content area scrollable */
            flex-grow: 1;
        }
        
        .sidebar {
            min-width: 320px;
            max-width: 320px;
            background-color: #0a1128;
            color: white;
            padding: 1rem;
            height: 100vh;
            position: fixed;         /* Make it fixed */
            top: 0;
            left: 0;
            overflow-y: auto;        /* Allow scrolling if content in sidebar overflows */
        }

        body {
            min-height: 100vh;
            margin: 0;
            display: flex;
        }
        .sidebar {
            min-width: 320px;
            background-color: #0a1128;
            color: white;
            padding: 1rem;
            height: 100vh;
        }
        .sidebar a {
            color: #7c807f;
            text-decoration: none;
            display: block;
            margin-bottom: 0.25rem;
            padding: 0.5rem;
            border-radius: 4px;
        }
        .sidebar a.active {
            color: red;
            background-color: #495057;
            font-weight: bold;
        }
        .sidebar a:hover {
            background-color: #495057;
            color: white;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h4 class="text-center">LeyteOTHERcountriesTD</h4>
    <hr>
    <strong>MAIN</strong>
    <a href="admin_dashboard.php?page=admin_dashboard"><i class="fa-solid fa-house"></i> Dashboard</a>
    <a class="active" href="admin_inquiry.php"><i class="fa-solid fa-message"></i> Inquiry</a>
    <hr>
    <strong>PAGES</strong>
    <a href="homepage.php?page=homepage"><i class="fa-solid fa-file"></i> Home</a>
    <a href="#"><i class="fa-solid fa-file"></i> Services</a>
    <a href="#"><i class="fa-solid fa-file"></i> Contact</a>
    <a href="#"><i class="fa-solid fa-file"></i> Search</a>
    <a class="nav-link" href="login.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Sign out</a>
</div>

<main class="flex-grow-1 p-4 w-100">
    <h2>Welcome <?= isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Admin'; ?>!</h2>

    <?php if (isset($_GET['deleted'])): ?>
        <div class="alert alert-success">Inquiry deleted successfully.</div>
    <?php endif; ?>

    <div class="mt-4 mb-3"><h3>Inquiries / Messages</h3></div>

    <div>
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
                        echo "<td>{$counter}</td>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>
                                <a href='admin_inquiry.php?msg_id=" . urlencode($row['id']) . "' class='btn btn-info btn-sm'>
                                    <i class='bi bi-eye'></i>
                                </a>
                                <a href='admin_inquiry.php?delete_id=" . urlencode($row['id']) . "' 
                                       class='btn btn-danger btn-sm' 
                                       onclick=\"return confirm('Are you sure you want to delete this inquiry?');\">
                                        <i class='fa-solid fa-trash'></i>
                                    </a>
                              </td>";
                        echo "</tr>";
                        $counter++;
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>No inquiries found.</td></tr>";
                }
            ?>
            </tbody>
        </table>
    </div>

    <?php if ($messageData): ?>
    <div class="modal fade show" style="display:block; background-color: rgba(0,0,0,0.6);" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-info text-white">
            <h5 class="modal-title"> From: <?= htmlspecialchars($messageData['name']) ?></h5>
            <a href="admin_inquiry.php" class="btn-close"></a>
          </div>
          <div class="modal-body">
            <p><strong>Email:</strong> <?= htmlspecialchars($messageData['email']) ?></p>
            <p><strong>Contact Number:</strong> <?= htmlspecialchars($messageData['contact_number']) ?></p>
            <p><strong>Date:</strong> <?= htmlspecialchars($messageData['user_date']) ?></p>
            <hr>
            <p style="white-space: pre-line;"><?= nl2br(htmlspecialchars($messageData['message'])) ?></p>
          </div>
          <div class="modal-footer">
            <a href="admin_inquiry.php" class="btn btn-secondary">Close</a>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>

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
