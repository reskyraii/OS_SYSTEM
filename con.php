<?php

$conn = mysqli_connect("localhost", "root", "", "os_db");

// Check connection
if (mysqli_connect_error()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>