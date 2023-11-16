<?php
require 'koneksi.php';

$result = mysqli_query($conn, "SELECT * FROM product WHERE jenis = 'cPet'");

$product = [];

while ($row = mysqli_fetch_assoc($result)) {
     $product[] = $row;
}

if (isset($_POST["tambah"])) {
     $id = $_POST["id"];
     $proID = $_POST["productID"];
     $userID = $_POST["userID"];


     $result = mysqli_query($conn, "INSERT INTO keranjang (ID, productID, userID)
            VALUES (NULL, '$proID', '$userID')");

     if ($result) {
          echo "
            <script>
            alert('data berhasil ditambahkan !');
            document.location.href = 'Cpet.php'
            </script>";
     } else {
          echo "
            <script>
            alert('data berhasil ditambahkan !');
            document.location.href = 'tambah.php'
            </script>";
     }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Home - Connect</title>
     <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="style3.css">
</head>

<body>
     <?php session_start(); ?>
     <header class="gambarheader">
          <img id="header" src="Aset/header.png" alt="#">
     </header>
     <nav>
          <img id="logo" src="Aset/connect - tulisan.png" alt="#">
          <div class="items">
               <?php if (isset($_SESSION) && isset($_SESSION["login"])) { ?>
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
               <?php } else { ?>
                    <table>
                         <a href="index.php">Home</a>
                         <a href="about us.php">About Us</a>
                         <a href="index.php">Product</a>
                         <a href="#footer">Contact Us</a>
                    </table>
               <?php } ?>
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
          <div id="product" class="product">
               <div class="atas">
                    <p>cPET</p>
               </div>
               <div class="bawah">
                    <?php $i = 1;
                    foreach ($product as $pro) : ?>
                         <div class="container">
                              <img src="Aset/foto_product/<?= $pro["picture"] ?>" alt="Product"><br>
                              <p class="namaproduct"><?php echo $pro["nama"] ?></p><br>
                              <p> type: <?php echo $pro["jenis"] ?></p><br>
                              <p> version: <?php echo $pro["versi"] ?></p><br>
                              <?php if(isset($_SESSION) && isset($_SESSION["login"])) { ?>
                              <?php if($_SESSION['type']=='0') {?>
                              <form action="" method="post">
                                   <input type="text" name="productID" id="" hidden value="<?php echo $pro['id'];?>">
                                   <input type="text" name="userID" id="" hidden value= <?php echo $_SESSION['id']?>>
                                   <button type="submit" name="tambah"><img class="shoppingcart" src="Aset/shopping_cart_FILL0_wght400_GRAD0_opsz24.svg" alt=""></button></form>
                                   <?php }?>
                                   <?php } else { ?> 
                                   <a href="login.php"><button type="submit"><img class="shoppingcart" src="Aset/shopping_cart_FILL0_wght400_GRAD0_opsz24.svg" alt=""></button></a>
                                   <?php } ?>
                         </div>
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
               <a id="linkcomingsoon" href=""><img id="instagram" src="Aset/instagram.png" alt=""></a>
               <a id="linkcomingsoon2"><img id="linkedin" src="Aset/Linkedin.png" alt=""></a>
               <a id="linkcomingsoon3"><img src="Aset/tiktok.png" alt=""></a>
               <a id="linkcomingsoon4"><img id="gmail" src="Aset/gmail.png" alt=""></a>
          </div>
          <div class="copyright">
               <p>©2023 connect | connect is a trademark of ga.worskspace</p>
          </div>
     </footer>
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