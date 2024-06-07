<?php
if (isset($_POST['photo'])) {
    $data = $_POST['photo'];
    $data = str_replace('data:image/png;base64,', '', $data);
    $data = str_replace(' ', '+', $data);
    $fileData = base64_decode($data);
    
    $fileName = 'photo_' . time() . '.png';
    $filePath = 'photos/' . $fileName;

    if (!file_exists('photos')) {
        mkdir('photos', 0777, true);
    }

    file_put_contents($filePath, $fileData);
    echo 'Photo saved to ' . $filePath;
} else {
    echo 'No photo data received';
}
?>
