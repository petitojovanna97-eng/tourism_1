<?php
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $database   = "tourismdestination_db";
    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("❌ Connection failed: " . $conn->connect_error);
    }
    $carousel_result = $conn->query("SELECT * FROM carousel_ft_tb ORDER BY cft_id ASC");
    $hero_result = $conn->query("SELECT * FROM hero_ft_tb ORDER BY hft_id ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Leyte/OTHERcountriesTD | Admin</title>
    <link rel="icon" type="image/x-icon" href="" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
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

        .sidebar h4 { 
            text-align: center; margin-bottom: 1rem; 
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

        .sidebar a.active, .sidebar a:hover {
            background-color: #495057;
            color: white;
            font-weight: bold;
        }

        .auto-resize {
            min-height: 100px;
            overflow-y: hidden;
            resize: none;
            text-align: justify;
        }

        .sidebar a.active {
        color: red;            /* Font color for active link */
        background-color: #495057; /* Optional: highlight background */
        font-weight: bold;         /* Optional: bold text */
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4>LeyteOTHERcountriesTD</h4>
        <hr>
        <strong>MAIN</strong>
        <a href="admin_dashboard.php?page=admin_dashbord"><i class="fa-solid fa-house"></i> Dashboard</a>
        <a href="admin_inquiry.php?page=admin_dashboard"><i class="fa-solid fa-message"></i> Inquiry</a>
        <hr>
        <strong>PAGES</strong>
        <a class="active" href="homepage.php?page=homepage"><i class="fa-solid fa-file"></i> Home</a>
        <a href="#"><i class="fa-solid fa-file"></i> Services</a>
        <a href="#"><i class="fa-solid fa-file"></i> Contact</a>
        <a href="#"><i class="fa-solid fa-file"></i> Search</a>
        <a class="nav-link" href="login.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Sign out</a>
    </div>

    <main class="flex-fill p-4">
        <div class="container-fluid">
            <h2 class="mb-4">Carousel Featured Destinations</h2>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($carousel_result->num_rows > 0): ?>
                            <?php while ($row = $carousel_result->fetch_assoc()): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['cft_id']) ?></td>
                                    <td>
                                        <div class="container-image">
                                        <img src="<?= htmlspecialchars($row['cft_imgLink']) ?>" alt="Image" style="width:100px; height:auto; border-radius:6px;">
                                        <div class="mt-1 fw-bold"><?= htmlspecialchars($row['cft_name']) ?></div>
                                        </div>
                                    </td>
                                    <td><?= nl2br(htmlspecialchars($row['cft_desc'])) ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#update<?= $row['cft_id'] ?>"><i class="fa-solid fa-pen-nib"></i>Update</button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="update<?= $row['cft_id'] ?>" tabindex="-1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form action="../form/process_data.php?page=home" method="post" enctype="multipart/form-data">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Update Carousel Featured</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="<?= htmlspecialchars($row['cft_imgLink']) ?>" width="100%" class="mb-3">
                                                    <div class="mb-3">
                                                        <label>Name:</label>
                                                        <input class="form-control" type="text" name="name" value="<?= htmlspecialchars($row['cft_name']) ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Description:</label>
                                                        <textarea class="form-control auto-resize" name="desc" required><?= htmlspecialchars($row['cft_desc']) ?></textarea>
                                                    </div>
                                                    </div>
                                    <CENTER><label><small style="color:red;">Note:</small> Fill-in the form below to change/update the Image and/or link for "More" button.</label></CENTER>
                                                    <div class="mb-3">
                                                        <label>Online Image Link:</label>
                                                        <input class="form-control" type="text" name="changeImageLink">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Upload Local Image:</label>
                                                        <input class="form-control" type="file" name="changeImage">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>More Button Link:</label>
                                                        <input class="form-control" type="text" name="moreLink">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" name="id" value="<?= htmlspecialchars($row['cft_id']) ?>">
                                                    <button type="submit" class="btn btn-success btn-sm" name="updateDestination">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr><td colspan="4" class="text-center">No records found.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <h2 class="mt-5 mb-4">Hero Featured Destinations</h2>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>No.</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($hero_result->num_rows > 0): ?>
                            <?php while ($row = $hero_result->fetch_assoc()): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['hft_id']) ?></td>
                                    <td>
                                        <div class="container-image">
                                        <img src="<?= htmlspecialchars($row['hft_img']) ?>" alt="Image" style="width:100px; height:auto; border-radius:6px;">
                                        <div class="mt-1 fw-bold"><?= htmlspecialchars($row['hft_title']) ?></div>
                                        </div>
                                    </td>
                                    <td><?= nl2br(htmlspecialchars($row['hft_desc'])) ?></td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateHero<?= $row['hft_id'] ?>"><i class="fa-solid fa-pen-nib"></i>Update</button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="updateHero<?= $row['hft_id'] ?>" tabindex="-1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form action="process_data.php?page=home" method="post" enctype="multipart/form-data">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Update Hero Featured</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="<?= htmlspecialchars($row['hft_img']) ?>" width="100%" class="mb-3">
                                                    <div class="mb-3">
                                                        <label>Name:</label>
                                                        <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($row['hft_title']) ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Description:</label>
                                                        <textarea class="form-control auto-resize" name="desc" required><?= htmlspecialchars($row['hft_desc']) ?></textarea>
                                                    </div>
                                                    </div>
                                                    <CENTER><label><small style="color:red;">Note:</small> Fill-in the form below to change/update the Image and/or link for "More" button.</label></CENTER>
                                                    <div class="mb-3">
                                                        <label>Online Image Link:</label>
                                                        <input type="url" name="changeImageLink" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Upload Local Image:</label>
                                                        <input type="file" name="changeImage" class="form-control-file">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>More Button Link:</label>
                                                        <input type="url" name="moreLink" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" name="id" value="<?= htmlspecialchars($row['hft_id']) ?>">
                                                    <button type="submit" name="updateDestination" class="btn btn-success btn-sm">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr><td colspan="4" class="text-center">No hero records found.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap4.js"></script>
    <script>
        $(document).ready(function () {
            $('table').DataTable();
        });
        function autoResizeTextarea(textarea) {
            textarea.style.height = 'auto';
            textarea.style.height = (textarea.scrollHeight) + 'px';
        }
    </script>
</body>
</html>
<?php $conn->close(); ?>