<?php
session_start();

if (!isset($_SESSION['old_no']) || !isset($_SESSION['new_no'])) {
    die("Phone numbers not set in session.");
}

$oldphno = $_SESSION['old_no'];
$newphno = $_SESSION['new_no'];


$con = mysqli_connect('localhost', 'root', '', 'voting');
$oldphno = mysqli_real_escape_string($con, $oldphno);
$newphno = mysqli_real_escape_string($con, $newphno);

$query = "UPDATE register SET phone='$newphno' WHERE phone='$oldphno'";
$data = mysqli_query($con, $query);

if ($data) {
    header("Location: admin-panel.php");
    exit();
} else {
    echo "Failed to update phone number: " . mysqli_error($con);
}

mysqli_close($con);
?>


