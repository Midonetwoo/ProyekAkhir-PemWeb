<?php
require "koneksi.php";
$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM product where id=$id");

$product = [];

while ($row = mysqli_fetch_assoc($result)){
    $product[] = $row;
}

$product = $product[0];


if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $versi = $_POST['versi'];

    $result = mysqli_query($conn, "UPDATE product SET nama = '$nama', jenis ='$jenis', versi = '$versi' WHERE id = '$id' ");

    if ($result) {
        echo "
        <script>
            alert('Data berhasil Diubah!');
            document.location.href = 'dashboard.php'
        </script>";
    } else {
        echo "
        <script>
            alert('Data Gagal Diubah!');
            document.location.href = 'edit.php'
        </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <section class="add-data">
        <div class="add-form-container">
            <h1>Edit Data</h1><br>
            <form action="" method="post" class="formtambah" enctype = "multipart/form-data">
                <label for="nama">Product</label>
                <input type="text" name="nama" value="<?php echo $product['nama']?>" require>
                <select name="jenis" id="" value="<?php echo $product['jenis']?>" require>
                    <option value="cPet">cPet</option>
                    <option value="cHome">cHome</option>
                    <option value="cHealth">cHealth</option>
                </select>
                <label for="versi">Version</label>
                <input type="text" name="versi" value="<?php echo $product['versi']?>"  pattern="[0-9]{1}.[0-9]{1}.[0-9]{1}">
                <input type="submit" name="edit" value="Edit Data" class="login-btn">
            </form>
            <a class="kembali" href="dashboard.php"><img src="Aset/arrow_back_FILL0_wght400_GRAD0_opsz24.svg" alt=""></a>
        </div>
    </section>
</body>
</html>