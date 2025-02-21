<?php
include 'db.php';   
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
header("Location: management.php");
exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../style/login.css" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />

</head>

<body>
    <main>
        <div class="login ">
            <img src="https://img.freepik.com/vektoren-kostenlos/vogel-bunter-logo-gradientenvektor_343694-1365.jpg" alt="" class="logo">

            <div class="login-form">
                <h1>Register</h1>
                <form action="register.php" method="post">

                <div class="input-box">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="username" placeholder="Username" required>
                    </div>

                    <div class="input-box">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" name="email" placeholder="E-Mail" required>
                    </div>

           
                    <div class="input-box">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <input class="submit-button" type="submit" name="submit" value="Register"></input>
                </form>
                
            </div>
        </div>
    </main>

</body>

</html>