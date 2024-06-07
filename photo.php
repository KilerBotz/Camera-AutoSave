<?php
$photosDir = 'photos/';
$photos = array_diff(scandir($photosDir), array('..', '.'));

if (isset($_POST['delete'])) {
    $fileToDelete = $photosDir . $_POST['delete'];
    if (file_exists($fileToDelete)) {
        unlink($fileToDelete);
        header("Location: photo.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Photos</title>
    <style>
        .photo {
            display: inline-block;
            margin: 10px;
            text-align: center;
        }
        .photo img {
            max-width: 200px;
            max-height: 200px;
        }
    </style>
</head>
<body>
    <h1>Manage Photos</h1>
    <div>
        <?php foreach ($photos as $photo): ?>
            <div class="photo">
                <img src="<?= $photosDir . $photo ?>" alt="Photo">
                <form method="POST" style="margin-top: 10px;">
                    <input type="hidden" name="delete" value="<?= $photo ?>">
                    <button type="submit">Delete</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
