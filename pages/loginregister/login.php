<?php
session_start();

@include "./config.php";

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    
    $select = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $select);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        if (password_verify($password, $row['password'])) {
            if ($row['usertype'] == "admin") {
                $_SESSION['admin'] = $row['username'];
                header("Location: ./admin.php");
                exit();
            } elseif ($row['usertype'] == "user") {
                $_SESSION['user'] = $row['username'];
                header("Location: ../../index.html");
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
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="loginregister.css">
    <title>Login</title>
</head>

<body>
    <div class="formcontainer">
        <form action="" method="post">
            <h1>Login</h1>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="login" value="Login" class="formbtn">
            <p> Don't have an account? <a href="./register.php">Register</a></p>
        </form>
    </div>
</body>

</html>