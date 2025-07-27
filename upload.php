<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = "uploads/";
        $filename = basename($_FILES['photo']['name']);
        $targetPath = $uploadDir . $filename;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetPath)) {
            header("Location: gallery.html");
            exit;
        } else {
            echo "❌ Error uploading file.";
        }
    } else {
        echo "❌ No file selected.";
    }
} else {
    echo "❌ Invalid request.";
}
?>