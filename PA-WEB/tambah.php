<?php
require "koneksi.php";

if (isset($_POST["tambah"])) {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $jenis = $_POST["jenis"];
    $versi = $_POST["versi"];
    $date = date("Y-m-d"); 

    $img = $_FILES["picture"]["name"];
    $explode = explode('.', $img);
    $ekstensi = strtolower(end($explode));
    $newpicture = "$date.$nama.$ekstensi";
    $tmp = $_FILES ["picture"]["tmp_name"];

    if (move_uploaded_file($tmp, 'Aset/foto_product/'. $newpicture)) {
       $result = mysqli_query($conn, "INSERT INTO product (id, picture, nama, jenis, versi)
           VALUES (NULL, '$newpicture', '$nama', '$jenis', '$versi')");

       if ($result) {
           echo "
           <script>
           alert('data berhasil ditambahkan !');
           document.location.href = 'dashboard.php'
           </script>";        
       }else {
           echo "
           <script>
           alert('data berhasil ditambahkan !');
           document.location.href = 'tambah.php'
           </script>";
       }
   }else {
       echo "Gambar Tidak terUpload";
   }
}
//     $result = mysqli_query($conn, "insert into product 
//         (id, nama, jenis, versi) 
//         values ('$id', '$nama', '$jenis', '$versi')");

//     if ($result) {
//         echo "
//                 <script>
//                 alert('Data Berhasil Ditambahkan!');
//                 document.location.href = 'dashboard.php';
//                 </script>
//             ";
//     } else {
//         echo "
//             <script>
//             alert('Data Gagal Ditambahkan!');
//             document.location.href = 'tambah.php';
//             </script>
//         ";
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="style2.css">
</head>

<body>
     <section>
          <p>Add Data</p>
          <form action="" method="post" class="formtambah" enctype = "multipart/form-data">
                <label for="nama">Product : </label>
                <input type="text" name="nama" id="" require>
                <label for="jenis">Jenis:</label>
                <select name="jenis" id="" require>
                    <option value="cPet">cPet</option>
                    <option value="cHome">cHome</option>
                    <option value="cHealth">cHealth</option>
                </select>
                <label for="versi">Version : </label>
                <input type="text" name="versi" id="" pattern="[0-9]{1}.[0-9]{1}.[0-9]{1}"><br>
                <label for="picture">Gambar</label>
                <input type="file" name="picture" id="" accept="image/*"> <br>
               <button type="submit" name="tambah">Add</button>
          </form>
          <a class="kembali" href="dashboard.php"><img src="Aset/arrow_back_FILL0_wght400_GRAD0_opsz24.svg" alt=""></a>
     </section>
</body>

</html>