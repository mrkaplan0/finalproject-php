<?php
include 'db.php';
$isSuccess = false;
if(isset($_POST['submit'])){
    $vorname = $_POST['vorname'];
    $nachname = $_POST['nachname'];
    $geburtsdatum = $_POST['geburtsdatum'];
    $geschlecht = $_POST['geschlecht'];
    $adresse = $_POST['adresse'];
    $sql = "INSERT INTO kind (vorname, nachname, geburtsdatum, geschlecht, adresse) VALUES ('$vorname', '$nachname', '$geburtsdatum', '$geschlecht', '$adresse')";
    if ($conn->query($sql) === TRUE) {
        $isSuccess = true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kind Hinzufügen</title>
    <link rel="stylesheet" href="style/add-kind.css">
</head>
<body>
    <header>
        <h1>Kind Hinzufügen</h1>
    </header>

    <main>
        <div class="add-kind ">
          

            <div class="kind-form">
               
                <form action="add-kind.php" method="post">
                  
                       
                        <input type="text" name="vorname" placeholder="Vorname" required>
                        <input type="text" name="nachname" placeholder="Nachname" required>
                        <input type="date" name="geburtsdatum" placeholder="Geburtsdatum" required>
                       <br><div class="geschlecht">
                        <label for="geschlecht-m">Männlich</label>
                        <input type="radio" id="geschlecht-m" name="geschlecht" value="männlich" required>
                        <label for="geschlecht-w">Weiblich</label>
                        <input type="radio" id="geschlecht-w" name="geschlecht" value="weiblich" required>
                        
                       </div>
                        <input type="text" name="adresse" placeholder="Adresse" >
          
                    
                    <input type="submit" name="submit" value="Speichern"></input>
                </form>
                
            </div>
          
        </div> 

        <?php if($isSuccess){} 
          echo  "<div class='success'>";      
                 echo   "<p>🎉🎉🎉  Kind wurde erfolgreich hinzugefügt.  🎉🎉🎉</p>
            </div> ";
        ?>
    </main>
    
</body>
</html>