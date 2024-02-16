<?php
session_start();
if($_SESSION['user']) {
    header("Location: ../../#");
    exit();
} elseif($_SESSION['admin']) {
    $error[] = "You are already logged in as an admin";
}

@include "./config.php";

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    
    $select = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $select);

    if (!$result) {
      header("Location: connectionerror.html");
    }

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        if (password_verify($password, $row['password'])) {
            if ($row['usertype'] == "admin") {
                $_SESSION['admin'] =  $row['username'];
                header("Location: ../../#");
                exit();
            } elseif ($row['usertype'] == "user") {
                $_SESSION['user'] = $row['username'];
                header("Location: ../../#");
                exit();
            }
        } else {
            $error[] = "Incorrect password";
        }
    } else {
        $error[] = "Username does not exist";
    }
}
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name = "description" content = "This is a website for a school project."/>
    <meta name = "keywords" content = "School, Website, HAMK, HTML, CSS, Registration, Register"/>
    <meta name = "author" content = "Otto Ansaharju, Aku Ihamäki, Lauri Uusimäki"/>
    <title>Register</title>

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

    <link rel="stylesheet" href="../../styles/loginregister.css"/>
</head>

<body>

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
            <a class="nav-link active" aria-current="page" href="../../#">
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
        </ul>
      </div>
    </nav>
    <!-- End of Navbar -->

    <div class="formcontainer">
        <form action="" method="post">
            <h1>Login</h1>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="login" value="Login" class="formbtn">
            <p> Don't have an account? <a href="./register.php">Register</a></p>
            
<?php

if(isset($error)) {
foreach($error as $error) {
     echo "<span class='error'>" . $error . "</span>";
}
}
?>

    </form>
    </div>

<!-- Footer -->

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
    <!-- End of Footer -->


</body>
</html>