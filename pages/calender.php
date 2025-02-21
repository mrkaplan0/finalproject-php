<?php
include('db.php');
// load groups
$groups = [];
$sql = "SELECT * FROM groups";
$groupsresult = $conn->query($sql);
if ($groupsresult) {
    if ($groupsresult->num_rows > 0) {
        $groups = mysqli_fetch_all($groupsresult, MYSQLI_ASSOC);
    } else {
        echo "No data found.";
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
// Load existing notes
$notes = [];
$notesql = "SELECT * FROM notes";
$notesresult = $conn->query($notesql);

if ($notesresult) {
    if ($notesresult->num_rows > 0) {
        $notes = mysqli_fetch_all($notesresult, MYSQLI_ASSOC);
    } else {
        echo "No data found.";
    }
} else {
    echo "Error: " . $notesql . "<br>" . $conn->error;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kalender</title>
    <link rel="stylesheet" href="../style/index.css">
    
  </head>
  <body>
    <div class="container">
      <div class="header">
        <img src="assets/logo.png" alt="" />
        <h2>Kindergarten</h2>
        <h1>Phönix</h1>
        <p>"Mit Liebe..."</p>
      </div>
      <div class="content">
        <div class="navbar">
          <a href="../index.php" >Home</a>
          <a href="about.php">Über Uns</a>
          <a href="contact.php">Kontakt</a>
          <a href="calender.php" class="active">Kalender</a>
          <a href="login.php">Login</a>
        </div>
        <div class="main">
         
    <div class="groups">
        <ul>
            <?php foreach ($groups as $group): ?>
                <li>
                    <div class='round' <?php switch ($group['id']) {
                                            case 1:
                                                echo "style='background-color: #008000; '";
                                                break;
                                            case 2:
                                                echo "style='background-color: #FFA500;'";
                                                break;
                                            case 3:
                                                echo "style='background-color:rgb(252, 61, 39);'";
                                                break;
                                            default:
                                                echo "style='background-color: #0000;'";
                                                break;
                                        } ?>></div><?php echo $group['groupName']; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="container-table">

        <div class="nav-buttons">
            <?php

            // Get the current month and year
            if (isset($_GET['month']) && isset($_GET['year'])) {
                $month = $_GET['month'];
                $year = $_GET['year'];
            } else {
                $dateComponents = getdate();
                $month = $dateComponents['mon'];
                $year = $dateComponents['year'];
            }

            // Calculate the previous and next month
            $prevMonth = $month - 1;
            $nextMonth = $month + 1;
            $prevYear = $year;
            $nextYear = $year;

            if ($prevMonth == 0) {
                $prevMonth = 12;
                $prevYear--;
            }

            if ($nextMonth == 13) {
                $nextMonth = 1;
                $nextYear++;
            }

            echo "<a href='?month=$prevMonth&year=$prevYear'>&laquo; Vorheriger Monat</a>";
            echo "<a href='?month=$nextMonth&year=$nextYear'>Nächster Monat &raquo;</a>";
            ?>
        </div>
        <?php
        function draw_calendar($month, $year, $notes)
        {
            // Create array containing abbreviations of days of week.
            $daysOfWeek = array('So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa');

            // What is the first day of the month in question?
            $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);

            // How many days does this month contain?
            $numberDays = date('t', $firstDayOfMonth);

            // Retrieve some information about the first day of the month
            $dateComponents = getdate($firstDayOfMonth);

            // What is the name of the month in question?
            $monthName = $dateComponents['month'];

            // What is the index value (0-6) of the first day of the month?
            $dayOfWeek = $dateComponents['wday'];

            // Create the table tag opener and day headers
            $calendar = "<table>";
            $calendar .= "<caption>$monthName $year</caption>";
            $calendar .= "<tr>";

            // Create the calendar headers
            foreach ($daysOfWeek as $day) {
                $calendar .= "<th>$day</th>";
            }

            // Create the rest of the calendar
            $calendar .= "</tr><tr>";

            // The variable $dayOfWeek will make sure that there must be only 7 columns on our table
            if ($dayOfWeek > 0) {
                $calendar .= str_repeat("<td></td>", $dayOfWeek);
            }

            $currentDay = 1;

            // Get the current date
            $dateToday = date('Y-m-d');


            while ($currentDay <= $numberDays) {
                // Seventh column (Saturday) reached. Start a new row.
                if ($dayOfWeek == 7) {
                    $dayOfWeek = 0;
                    $calendar .= "</tr><tr>";
                }

                $currentDate = "$year-$month-$currentDay";
                $noteText = '';
                $round = '';
                foreach ($notes as $note) {
                    if (htmlspecialchars($note['note_date']) == $currentDate) {
                        $noteText = htmlspecialchars($note['note_text']);
                        $round = "<div class='round' ";
                        switch ($note['groupID']) {
                            case 1:
                                $round .= "style='background-color: #008000;'";
                                break;
                            case 2:
                                $round .= "style='background-color: #FFA500;'";
                                break;
                            case 3:
                                $round .= "style='background-color: rgb(252, 61, 39);'";
                                break;
                            default:
                                $round .= "style='background-color: #0000;'";
                                break;
                        }
                        $round .= "></div>";
                        break;
                    }
                }

                if ($currentDate == $dateToday) {
                    $calendar .= "<td class='today'>$currentDay<br><div class='note'>$noteText</div></td>";
                } else {
                    $calendar .= "<td >$currentDay<br><div class='note'>$noteText</div>$round</td>";
                }

                // Increment counters
                $currentDay++;
                $dayOfWeek++;
            }

            // Complete the row of the last week in month, if necessary
            if ($dayOfWeek != 7) {
                $remainingDays = 7 - $dayOfWeek;
                $calendar .= str_repeat("<td></td>", $remainingDays);
            }

            $calendar .= "</tr>";
            $calendar .= "</table>";

            return $calendar;
        }

        echo draw_calendar($month, $year, $notes);
        ?>
        
    </div>
    
         
        </div>
      </div>
    </div>
    <div class="footer">
      <p>Copyright © Ömer Kaplan 2025</p>
      <p style="font-size: 12px;">Bild❤️Cao lãnh</p>
    </div>
  </body>
</html>
