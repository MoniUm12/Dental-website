<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES['user_file']) && $_FILES['user_file']['error'] == 0) {
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($_FILES['user_file']['name']);
        move_uploaded_file($_FILES['user_file']['tmp_name'], $uploadFile);
    }
}
?>