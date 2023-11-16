<?php
require "koneksi.php";
$id = $_GET['ID'];


$result = mysqli_query($conn,"DELETE FROM keranjang WHERE ID = '$id'");

if ($result) {
    echo "
    <script>
        alert('Data berhasil Hapus!');
        document.location.href = 'keranjang.php'
    </script>";
} else {
    echo "
    <script>
        alert('Data Gagal Hapus!');
        document.location.href = 'keranjang.php'
    </script>";
}

?>