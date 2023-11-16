<?php
require 'koneksi.php';
session_start();
$id = $_SESSION['id'];


$result = mysqli_query($conn, "SELECT * FROM keranjang JOIN product ON keranjang.productID = product.id  WHERE userID = $id");


$keranjang = [];

while ($row = mysqli_fetch_assoc($result)) {
     $keranjang[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Home - Connect</title>
     <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="style4.css">
</head>

<body>
     <header class="gambarheader">
          <img id="header" src="Aset/header.png" alt="#">
     </header>
     <nav>
          <img id="logo" src="Aset/connect - tulisan.png" alt="#">
          <div class="items">
               <table>
                    <a href="index.php">Home</a>
                    <a href="about us.php">About Us</a>
                    <a href="index.php">Product</a>
                    <?php if ($_SESSION['type'] == '0') { ?>
                         <a href="keranjang.php">Keranjang</a>
                    <?php } elseif ($_SESSION['type'] == '1') { ?>
                         <a href="dashboard.php">Dashboard</a>
                    <?php } ?>
                    <a href="#footer">Contact Us</a>
               </table>
          </div>

          <?php if (isset($_SESSION) && isset($_SESSION["login"])) { ?>
               <div class="daftar">
                    <a href="logout.php"> Log out</a>
               </div>
          <?php } else { ?>
               <div class="daftar">
                    <a href="login.php">Log in</a>
               </div>
          <?php } ?>
     </nav>
     <section>
          <!-- <div class="welcome">
               WELCOME TO CONNECT. <br>
               IOT REVOLUTIONIZE CONNECTION
          </div>
          <div class="weAre">
               <p>We are an innovative startup to present innovative solutions based on the Internet of Things (IoT) to make your daily life easier. With our advanced technology, we strive to improve efficiency, security and comfort in various sectors, from smart homes to industry.  </p>
          </div>
          <div class="why">
               <div id="nothidden" class="atas">
                    WHY CHOOSE CONNECT?
               </div> -->
          <div id="hidden" class="bawah">
               <Ul>
                    <li>
                         <p><b>High Efficiency: </b>IoT enables automation of daily tasks, saving time and resources.</p>
                    </li>
                    <li>
                         <p><b>Ease of Monitoring:</b> With IoT, you can monitor your devices and systems remotely, giving you complete control.</p>
                    </li>
                    <li>
                         <p><b>Security and Availability:</b> Our IoT solutions are designed with top-notch security in mind, providing peace of mind.</p>
                    </li>
               </Ul>
          </div>
          </div>
          <div id="product" class="productkeranjang">
               <div class="atas">
                    <p>KERANJANG</p>
               </div>
               <div class="bawah">
                    <?php $i = 1;
                    foreach ($keranjang as $kr) : ?>
                         <tr>
                              <div class="container">
                                   <div class="gambar">
                                        <td><img src="Aset/foto_product/<?= $kr["picture"] ?>" alt="Product"></td>
                                   </div>
                                   <div class="desk">
                                        <p> no: <?php echo $kr["ID"];
                                                  echo " ";
                                                  echo $kr["productID"]  ?></p>
                                        <p class="namaproduct"><?php echo $kr["nama"] ?></p>
                                        <p>type: <?php echo $kr["jenis"] ?></p>
                                        <p>version: <?php echo $kr["versi"] ?></p>
                                        <a href="hapuskeranjang.php?ID=<?php echo $kr["ID"] ?>"><button name="hapus"><img class="iconhapus" src="Aset/delete_FILL0_wght400_GRAD0_opsz24.svg" alt=""></button></a>
                                   </div>
                              </div>
                         </tr>
                    <?php $i++;
                    endforeach; ?>
                    <!-- <a href=""><img id = "cpet" src="Aset/1.png" alt="#"></a>
                    <a href="chome.php"><img id = "chome" src="Aset/2.png" alt="#"></a>
                    <a href=""><img id = "chealth" src="Aset/3.png" alt="#"></a> -->
               </div>
          </div>
     </section>
     <footer id="footer">
          <div class="logo">
               <img id="logo2" src="Aset/connect - tulisan.png" alt="Connect">
          </div>
          <div class="contactus">
               <div class="atas">
                    <p>Contact Us</p>
               </div>
               <div class="bawah">
                    <p>If you're interested in talking more about how connect can help you, don't hesitate to contact us. We're ready to answer your questions and start a conversation about the IoT solution that's right for you.</p>
               </div>
          </div>
          <div class="sosmed">
               <a id="linkcomingsoon"><img id="instagram" src="Aset/instagram.png" alt=""></a>
               <a id="linkcomingsoon2"><img id="linkedin" src="Aset/Linkedin.png" alt=""></a>
               <a id="linkcomingsoon3"><img src="Aset/tiktok.png" alt=""></a>
               <a id="linkcomingsoon4"><img id="gmail" src="Aset/gmail.png" alt=""></a>
          </div>
          <div class="copyright">
               <p>©2023 connect | connect is a trademark of ga.worskspace</p>
          </div>
     </footer>
     <!-- <script src="scripts.js">

     </script> -->
     <script>
          const gambarheader = document.querySelector('.gambarheader');

          window.addEventListener('scroll', () => {
               const scrollPos = window.scrollY;
               gambarheader.style.transform = `translateY(${scrollPos * 0.6}px)`;
          });

          const linkcomingsoon = document.getElementById('linkcomingsoon');
          const linkcomingsoon2 = document.getElementById('linkcomingsoon2');
          const linkcomingsoon3 = document.getElementById('linkcomingsoon3');
          const linkcomingsoon4 = document.getElementById('linkcomingsoon4');

          linkcomingsoon.addEventListener('click', function(event) {
               event.preventDefault();
               alert('COMING SOON');
          });

          linkcomingsoon2.addEventListener('click', function(event) {
               event.preventDefault();
               alert('COMING SOON');
          });
          linkcomingsoon3.addEventListener('click', function(event) {
               event.preventDefault();
               alert('COMING SOON');
          });
          linkcomingsoon4.addEventListener('click', function(event) {
               event.preventDefault();
               alert('COMING SOON');
          });
     </script>
</body>

</html>