<?php
include 'db.php';

$id = (int) $_POST['id'];

if ($id <= 0) {
    header("Location: ../index.php?status=notfound&section=delete");
    exit();
}

$sql = "DELETE FROM students WHERE id=$id";

$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_affected_rows($conn) > 0) {
        header("Location: ../index.php?status=deleted&section=delete");
    } else {
        header("Location: ../index.php?status=error&section=delete");
    }
} else {
    header("Location: ../index.php?status=error&section=delete");
}

mysqli_close($conn);
?>
