<div id="footer"></div>
<script src="footer.js"></script> 
<body>

document.getElementById("footer").innerHTML = ` 
<footer> 
    <p>© 2025 LeyteOTHERcountries Tourism Destination</p> 
</footer> `;

<?php
$result = mysqli_query($conn, "SELECT * FROM contact_messages_db ORDER BY id DESC");
$counter = 1;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $counter++ . "</td>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['message']) . "</td>";
        echo "<td>
                <a class='btn btn-warning btn-sm' href='./pages/home.php?id=" . $row['id'] . "'>
                    <i class='fa-solid fa-pen-to-square'></i>
                </a>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No records found.</td></tr>";
}
?>

</body>