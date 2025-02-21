<?php
session_start();
if (isset($_SESSION['email'])) {
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
} else {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management</title>
    <link rel="stylesheet" href="style/management.css">
</head>

<body>
    <header>
        <?php
        echo "<h1>Hallo " . htmlspecialchars($username) . "🎉</h1>";
        ?>
        <nav>
           
                <a href="index.php">Home</a>
                <a href="management.php">Management</a>
                <a href="logout.php">Logout</a>
            
    </header>
    <main>
        <a href="add-kind.php">
            <div class="card-button">Kind hinzufügen</div>
        </a>

        <a href="kinderlist.php">
            <div class="card-button">Kinderlist</div>
        </a>

        <a href="kalender.php">
            <div class="card-button">Kalender</div>



    </main>


</body>

</html>