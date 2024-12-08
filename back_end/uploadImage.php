<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profileImage'])) {
    $uploadDirectory = 'uploads/'; 
    $file = $_FILES['profileImage'];

    $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $fileMimeType = mime_content_type($file['tmp_name']);

    if (in_array($fileMimeType, $allowedMimeTypes)) {
        $fileName = uniqid('profile_', true) . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
        $filePath = $uploadDirectory . $fileName;

        // Attempt to move the uploaded file to the server directory
        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            echo json_encode([
                'success' => true,
                'message' => 'Image uploaded successfully.',
                'filePath' => $filePath,
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Failed to move the uploaded file.',
            ]);
        }
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Invalid file type. Only JPG, PNG, and GIF files are allowed.',
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'No file uploaded.',
    ]);
}
?>
