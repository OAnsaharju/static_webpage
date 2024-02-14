<?php

@include 'config.php';
session_start();
if(isset($_SESSION['admin'])){
}
elseif (isset($_SESSION['user'])) {
}
else {
  header ("Location: ./login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="This is a website for a school project.">
   <meta name="keywords" content="School, Website, HAMK, HTML, CSS, homepage">
   <meta name="author" content="Otto Ansaharju, Aku Ihamäki, Lauri Uusimäki">
   <title>Home</title>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
   <link rel="stylesheet" href="../../styles/user.css">
</head>
<body>
   
<div class="container">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg">
      <a href="#" class="navbar-brand mb-0 h1">
        <span class="logo">
          <img
            class="d-inline-block align-top"
            src="../../images/websitelogo.png"
            alt="Logo"
            
          />
        </span>
        <span class="title">Website</span>
      </a>

      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbarfont">Menu</span>
        <span class="navbar-toggler-icon"></span>
      </button>

      <div
        class="collapse navbar-collapse justify-content-center"
        id="navbarNav"
      >
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../#">
              <span class="navbarfont">Home</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="../about.php">
              <span class="navbarfont">About</span>
            </a>
          </li>

          <li class="nav-item dropdown">
            <a
              class="nav-link active dropdown-toggle"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <span class="navbarfont">Customer service</span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="../contact.php"
                  >Contact us</a
                >
              </li>
              <li><a class="dropdown-item" href="../FAQ.php">FAQ</a></li>
            </ul>
          </li>
          
          <?php
          if(isset($_SESSION['admin'])){
            ?>
            <li class = "nav-item">
              <a class = "nav-link active" href = "./adminpage.php">
                <span class = "navbarfont">Admin page</span>
              </a>
              </li>
            
            <li class = "nav-item">
              <a class = "nav-link active" href = "./logout.php">
                <span class = "navbarfont">Logout</span>
              </a>
            </li>
      <?php
          }
          elseif(isset($_SESSION['user'])){
            ?>
            <li class = "nav-item">
              <a class = "nav-link active" href = "./userpage.php">
                <span class = "navbarfont">Userpage</span>
              </a>
              </li>
            
            <li class = "nav-item">
              <a class = "nav-link active" href = "./logout.php">
                <span class = "navbarfont">Logout</span>
              </a>
            </li>
              <?php
          } else {
                ?>
                <li class = "nav-item">
          <a class = "nav-link active" href = "./login.php">
            <span class = "navbarfont">Login</span>
          </a>
        </li>
        
        <li class = "nav-item">
          <a class = "nav-link active" href = "./register.php">
            <span class = "navbarfont">Register</span>
          </a>
        </li>
              </ul>
        <?php
      }
              ?>
      </div>
    </nav>
    <!-- End of Navbar -->


<div class='usertable'>
   <div class='usertable-header'>
  <h2>Users</h2>
   </div>
   
   <div class='usertable-body'>
      <table class='table table-bordered'>
      <thead>
         <tr>
            <th>Username</th>
            <th>Description</th>
         </tr>
      </thead>
      <tbody>
         <?php
         $query='SELECT * FROM users';
         $query_run=mysqli_query($conn,$query);

         if(mysqli_num_rows($query_run)> 0){
            foreach ($query_run as $row){
         ?>
         <tr>
            <td> <?= $row['username'] ?> </td>
            <td> <?= $row['description'] ?> </td>
         </tr>
         <?php
            }
         }
         else
         {
            ?>
            <tr>
               <td colspan="6">nothing found </td>
            </tr>
            <?php
            }
            ?>
            <tbody>
         </table>
         </div>
         </div>
         
            






   <!-- Footer from index.php -->
   <footer class="footer">
      <div class="footer-container">
         <a href="https://www.instagram.com/" target="_blank" class="fa-brands fa-instagram" alt="Instagram page"></a>
         <a href="https://www.facebook.com/" target="_blank" class="fa-brands fa-facebook-f" alt="Facebook page"></a>
         <a href="https://twitter.com/" target="_blank" class="fa-brands fa-x-twitter" alt="Twitter page"></a>
         <a href="https://discord.com/" target="_blank" class="fa-brands fa-discord" alt="Discord page"></a>
      </div>
   </footer>
   <!-- End of Footer -->

</div>

</body>
</html>
