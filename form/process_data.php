<?php
require 'db_connection.php';


if (isset($_GET['page']) && $_GET['page'] == 'contact' && isset($_POST['send_msg'])) {
    $name = $_POST['name'];
    $messages = $_POST['mssg'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    $sql ="INSERT INTO contact_messages_db (name,messages,email, contact_number) VALUES (?,?,?,?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssss",$name,$messages, $email,$contact   );



    header("Location: contact.php");
    exit();
}

if (isset($_POST['updateDestination'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $moreLink = $_POST['moreLink'];
    
    // Handle image update
    $imageLink = $_POST['changeImageLink'];
    $uploadImage = $_FILES['changeImage'];

    if (!empty($uploadImage['name'])) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($uploadImage["name"]);
        move_uploaded_file($uploadImage["tmp_name"], $target_file);
        $imageLink = $target_file;
    }

    // Update query
    $sql = "UPDATE featured_carousel SET 
            name =  $name,
            description = $desc, 
            image_link = $imageLink, 
            more_link = $moreLink, 
            WHERE id = $id";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $name, $desc, $imageLink, $moreLink, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Update successful'); window.location.href='../pages/home.php?page=home.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

