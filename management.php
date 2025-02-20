
<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }
    else{
        $username = $_SESSION['username'];
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
        <?php echo "<h1>Hallo $username🎉😊</h1>"; ?>
       
    </header>
    <main>
        
            <a href="add-kind.php"><div class="card-button">Kind hinzufügen</div></a>
        
            <a href="kinderlist.php"><div class="card-button">Kinderlist</div></a>
            <a href="add-student.html"><div class="card-button">Erzieher:in hinzufügen</div></a>
        
    </main>
    <footer>
        <a href="logout.php">Logout</a>
    </footer>
</body>
</html>