<?php
include 'db.php';
$kind = [];
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM kind WHERE id = $id";
    $result = $conn->query($sql);
    if($result) {
        if($result->num_rows > 0) {
            $kind = $result->fetch_assoc();
        } else {
            echo "No data found.";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kind Profile</title>
    <link rel="stylesheet" href="../style/kind-profile.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    />
  </head>
  <body>
    <div class="container">
      <div class="profile">
        <div class="profile-image">
          <img
            src="https://images.unsplash.com/photo-1520357226207-55137222c7a7?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="profile-image"
          />
        </div>
        <div class="profile-info">
          <div class="info">
            <i class="fas fa-birthday-cake"></i>
            <span><?php
            $geburtsdatum = date('d.m.Y', strtotime($kind['geburtsdatum']));
            echo $geburtsdatum ?></span>
          </div>
          <div class="info">
            <i class="fa-solid fa-person-half-dress"></i>
            <span> &nbsp;<?php echo $kind["geschlecht"] ?></span>
          </div>

          <div class="info">
            <i class="fas fa-location"></i>
            <span><?php echo $kind["adresse"] ?></span>
          </div>
        </div>
      </div>
      <div class="rightpart">
        <!-- header  -->
        <header>
          <a class="back-button" href="kinderlist.php">Zurück</a>
          <h1><?php echo $kind["vorname"]." ".$kind["nachname"] ?></h1>
          <nav>
            
            <a href="management.php">Management</a>
            <a href="logout.php">Logout</a>
          </nav>
        </header>

        <!-- main content -->
        <main>
            <!--Kinder Photos-->
          <h2>Fotos</h2>
          <hr>
          <br><br>
          <div class="photo-cards">
            <div class="photo-card">
              <img
                src="https://images.unsplash.com/photo-1520357226207-55137222c7a7?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                alt="photo"/>
            </div>
            <div class="photo-card">
              <img
                src="https://images.unsplash.com/photo-1503684899082-c7432212164c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                alt="photo"/>
            </div>
            <div class="photo-card">
              <img
                src="https://images.unsplash.com/photo-1476950743170-ab77e7d4d82e?q=80&w=2111&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                alt="photo"/>
            </div>
          </div>
            <br><br>
            <h2>Aktivitäten und Hobbys</h2>
            <hr>
            <br><br>
            <div class="activity-cards">

                <div class="activity-card">
                    <h3 class="activity-name">Basteln</h3>
                    <div class="photo-card">
                        <img
                          src="https://www.wlkmndys.com/wp-content/uploads/2020/04/200401-fische-aus-klorollen-basteln-step17.jpg"
                          alt="photo"/>
                      </div>
                </div>
                <div class="activity-card">
                    <h3 class="activity-name">Malen</h3>
                    <div class="photo-card">
                        <img
                          src="https://kita-loewenburg.de/wp-content/uploads/2020/05/IMG_1299-1080x675.jpg"
                          alt="photo"/>
                      </div>
                </div>
                <div class="activity-card">
                    <h3 class="activity-name">Spielen</h3>
                    <div class="photo-card">
                        <img
                          src="https://www.drehscheibe.org/files/drehscheibe/media/news/interviews/2022-interviews/spielen-mensch-aergere-dich-nicht.jpeg"
                          alt="photo"/>
                      </div>
                </div>
              
            
            </div>
        </main>
      </div>
    </div>
  </body>
</html>
