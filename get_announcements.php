<?php
header('Content-Type: application/json'); // Set the content type to JSON
$directory = 'Announcement/';
$images = array_values(array_filter(scandir($directory), function($file) {
    return preg_match('/\.(jpg|jpeg|png|gif)$/i', $file); // Adjust extensions as needed
}));

echo json_encode($images);
?>