<?Php
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>About Us - Connect</title>
     <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="style5.css">
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
                    <a href="index.php">Home</a>
                    <a href="about us.php">About Us</a>
                    <a href="index.php">Product</a>
                    <a href="#footer">Contact Us</a>
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
          <div class="mode">
               <img id="theme" src="Aset/darkmode.png" alt="#">
          </div>
     </nav>
     <section>
          <div class="about">
               <div class="dio">
                    <img src="Aset/dio@2x.png" alt="foto gw">
                    <div class="biodata">
                         <div class="nama">
                              <p>DIO DHARMAESA</p>
                              <p>2209106053</p>
                         </div>
                    </div>
               </div>
               <div class="dirga">
                    <img src="Aset/dirga@2x.png" alt="foto gw">
                    <div class="biodata">
                         <div class="nama">
                              <p>MUHAMMAD DIRGA APRILIANSYAH</p>
                              <p>2209106050</p>
                         </div>
                    </div>
               </div>
               <div class="renaldi">
                    <img src="Aset/renaldi@2x.png" alt="foto gw">
                    <div class="biodata">
                         <div class="nama">
                              <p>RENALDI PRATAMA</p>
                              <p>2209106054</p>
                         </div>
                    </div>
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
     <script src="about us scripts.js">

     </script>
</body>

</html>