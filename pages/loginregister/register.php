<?php
session_start();
if($_SESSION['user']) {
    header("Location: ../../index.html");
    exit();
} elseif($_SESSION['admin']) {
    $error[] = "You are already logged in as an admin";
}

ini_set('display_errors', 1);
error_reporting(E_ALL);


@include "./config.php";

if (isset($_POST['register'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $fileName = $_FILES['image']['name'];
  $fileTmpName = $_FILES['image']['tmp_name'];

  $upload_dir = "./loginregister";
  $upload_file = $upload_dir . basename($fileName);

    if (move_uploaded_file($fileTmpName, $upload_file)) {
        $image = $fileName;
        echo "File uploaded successfully.";
    } else {
        $error[] = "Failed to upload image. Error: " . $_FILES['image']['error'];
    }
} else {
    $error[] = "Invalid file type. Only JPEG and PNG files are allowed";
}


  if (empty($error)) { // Check if there are no errors before proceeding
    $select = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $select);

    if (!$result) {
      die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
      $error[] = "Username already exists";
    } elseif ($_POST['password'] != $_POST['password2']) {
      $error[] = "Passwords do not match";
    } else {
      $insert = "INSERT INTO users (username, password, description, image) VALUES ('$username', '$password', '$description', '$image')";
      $result = mysqli_query($conn, $insert);

      if (!$result) {
        die("Insert query failed: " . mysqli_error($conn));
      }

      header("Location: login.php");
      exit();
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
            <a class="nav-link active" href="../about.html">
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
                <a class="dropdown-item" href="../contact.html"
                  >Contact us</a
                >
              </li>
              <li><a class="dropdown-item" href="../FAQ.html">FAQ</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End of Navbar -->


<div class="formcontainer">

<form action="" method="post" enctype="multipart/form-data">
    <h1>Registration form</h1>

    <input type="text" name="username" placeholder="Enter username" required>
    <input type="password" name="password" placeholder="Enter password" required>
    <input type="password" name="password2" placeholder="Confirm Password" required>
    <input type="text" name="description" placeholder="Description of yourself">
        <h3>Upload profile picture</h3>
    <input type="file" name="image" accept="image/jpeg, image/png" placeholder="Profile picture">
    <label id="checkboxtext" class="checkbox" for="checkbox">
    <input type="checkbox" name="terms" placeholder="Terms" id="checkbox" required>
        I agree to the terms and conditions</label>
    <input type="submit" name="register" value="Register" class="formbtn">
    <p> Already have an account? <a href="login.php">Login</a></p>

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