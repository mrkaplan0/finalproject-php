<?php
include 'db.php';   
if (isset($_POST['submit'])) {
   
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $userQuery = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $userQuery);
    $row = mysqli_num_rows($result);
    if ($row > 0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $username;
header("Location: management.php");
            exit();
        } else {
            echo "Password is incorrect";
        }
    }
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
    <title>Fazit - Login</title>
    <link rel="stylesheet" href="style/login.css" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />

</head>

<body>
    <main>
        <div class="login ">
            <img src="https://img.freepik.com/vektoren-kostenlos/vogel-bunter-logo-gradientenvektor_343694-1365.jpg" alt="" class="logo">

            <div class="login-form">
                <h1>Anmelden</h1>
                <form action="login.php" method="post">
                    <div class="input-box">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" name="email" placeholder="E-Mail" required>
                    </div>
                    <div class="input-box">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <input type="submit" name="submit" value="Login"></input>
                </form>
                
            </div>
           <a href="register.php"> Haben Sie noch kein Konto?</a>
        </div> 
    </main>

</body>

</html>