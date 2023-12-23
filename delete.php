<?php
include "koneksi.php";

$stmt = $conn->prepare("DELETE FROM tbmahasiswa WHERE nim = ?");
$stmt->bind_param("s", $nim);

$nim = $_POST['nim'];
$stmt->execute();

$stmt->close();
$conn->close();
?>