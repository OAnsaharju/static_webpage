<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About</title>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>

    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <link rel="stylesheet" href="../styles/about.css" />
  </head>
  <body>
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
      <a href="#" class="navbar-brand mb-0 h1">
        <span class="logo">
          <img
            class="d-inline-block align-top"
            src="./images/websitelogo.png"
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
            <a class="nav-link active" href="./about.php">
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
                <a class="dropdown-item" href="./contact.php"
                  >Contact us</a
                >
              </li>
              <li><a class="dropdown-item" href="./FAQ.php">FAQ</a></li>
            </ul>
          </li>
          
          <?php
          session_start();
          if(isset($_SESSION['admin'])){
            ?>
            <li class = "nav-item">
              <a class = "nav-link active" href = "./loginregister/adminpage.php">
                <span class = "navbarfontlogin">Admin page</span>
              </a>
              <a class = "nav-link active" href = "./loginregister/logout.php">
                <span class = "navbarfontlogin">Logout</span>
              </a>
            </li>
      <?php
          }
          elseif(isset($_SESSION['user'])){
            ?>
            <li class = "nav-item">
              <a class = "nav-link active" href = "./loginregister/userpage.php">
                <span class = "navbarfontlogin">User page</span>
              </a>
              <a class = "nav-link active" href = "./loginregister/logout.php">
                <span class = "navbarfontlogin">Logout</span>
              </a>
            </li>
              <?php
          } else {
                ?>
                <li class = "nav-item">
          <a class = "nav-link active" href = "./loginregister/login.php">
            <span class = "navbarfontlogin">Login</span>
          </a>
        
          <a class = "nav-link active" href = "./loginregister/register.php">
            <span class = "navbarfontlogin">Register</span>
          </a>
        </li>
              </ul>
        <?php
      }
              ?>
      </div>
    </nav>
    <!-- End of Navbar -->

    <div class="about-content-container">
      <p class="about-text">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque
        egestas ut purus sit amet condimentum. Morbi ultrices dui id dictum
        eleifend. Donec rhoncus at nisi nec malesuada. Cras vitae imperdiet
        nulla. In ut sodales mi. Quisque luctus augue metus, quis dapibus nibh
        ultrices sit amet. Ut tellus purus, lobortis ac pellentesque a, tempus
        iaculis purus.
      </p>
      <img class="about-image" src="../images/kuva1.png" alt="Toimisto" />
      <img class="about-image" src="../images/kuva2.png" alt="Tiimityöskentely" />

    </div>

    <footer class="footer">
      <div class="footer-container">
        <a
          href="https://www.instagram.com/"
          target="_blank"
          class="fa-brands fa-instagram"
          alt="Instagram page"
        ></a>
        <a
          href="https://www.facebook.com/"
          target="_blank"
          class="fa-brands fa-facebook-f"
          alt="Facebook page"
        ></a>
        <a
          href="https://twitter.com/"
          target="_blank"
          class="fa-brands fa-x-twitter"
          alt="Twitter page"
        ></a>
        <a
          href="https://discord.com/"
          target="_blank"
          class="fa-brands fa-discord"
          alt="Discord page"
        ></a>
      </div>
    </footer>
  </body>
</html>
