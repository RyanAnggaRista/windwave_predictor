<?php
require '../koneksi.php';
$id = $_GET['id'];
$sql = 'DELETE FROM waypoint WHERE id=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
    header("location: lokasi.php");
}
