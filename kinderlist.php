<?php
include 'db.php';
$kinderliste = [];
$sql = "SELECT * FROM kind";
$result = $conn->query($sql);
if($result) {
    if($result->num_rows > 0) {
        $kinderliste = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        echo "No data found.";
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kinder List</title>
    <link rel="stylesheet" href="style/kinderlist.css">
</head>
<body>
    <header>
        <h1>Kinder List</h1>
    </header>
    <table border="1"> 
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Geburtstag</th>
            <th> Geschlecht</th>
            <th>Adresse</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>
            <?php foreach($kinderliste as $kind) {
                $geburtsdatum = date('d.m.Y', strtotime($kind['geburtsdatum']));
echo "<tr>";
echo "<td>" . $kind['id'] . "</td>";
echo "<td>" . $kind['vorname'] . " " . $kind['nachname'] . "</td>";
echo "<td>" . $geburtsdatum . "</td>";
echo "<td>" . $kind['geschlecht'] . "</td>";
echo "<td>" . $kind['adresse'] . "</td>";
echo "<td><a href='edit-kind.php?id=" . $kind['id'] . "'>Edit</a></td>";
echo "<td><a href='delete-kind.php?id=" . $kind['id'] . "'>Delete</a></td>";
echo "</tr>";


            } ?>
        </tbody>
    </table>
</body>
</html>