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
               
                <form action="management.php" method="post">
                  
                       
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
                        <input type="tel" name="tel" placeholder="Telefonnummer" >
                        <input type="email" name="email" placeholder="Email" >
        
                        
                    
                    <input type="submit" name="submit" value="Speichern"></input>
                </form>
                
            </div>
          
        </div> 
    </main>
    
</body>
</html>