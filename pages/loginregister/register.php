<?php

@include "./config.php";

if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $image = $_POST['image'];
    

    $select = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $select);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        $error[] = "Username already exists";
    } elseif ($_POST['password'] != $_POST['password2']) {
            $error[] = "Passwords do not match";
    }
    else {
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="loginregister.css">
    <title>Register</title>
</head>

<body>

<div class="formcontainer">

<form action="" method="post">
    <h1>Register</h1>

    <?php

    if(isset($error)) {
        foreach($error as $error) {
            echo "<span class='error'>" . $error . "</span>";
        }
    }
    ?>

    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="password2" placeholder="Confirm Password" required>
    <input type="text" name="description" placeholder="Description">
    <input type="file" name="image" accept="image/jpeg, image/png" placeholder="Profile Picture">
    <input type="checkbox" name="terms" required>
    <?php echo "I agree to the terms and conditions"; ?>
    <input type="submit" name="register" value="Register" class="formbtn">
    <p> Already have an account? <a href="login.php">Login</a></p>


</form>

</div>

</body>
</html>