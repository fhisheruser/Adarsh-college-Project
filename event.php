<?php include 'HEADER.php' ?>

<?php

// Your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adarsh college";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data
    $ecode = isset($_POST['ecode']) ? $_POST['ecode'] : '';
    // $ecode = $_POST['ecode'];
    $ename = $_POST['ename'];
    $svenue = $_POST['svenue'];
    $dvenue = $_POST['dvenue'];
    $cheifguest = $_POST['cheifguest'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $organisernumber = $_POST['organisernumber'];
    $expenditure = $_POST['expenditure'];
    $fundalloted = $_POST['fundalloted'];
    $moneysaved = $_POST['moneysaved'];
    $cpoc = $_POST['cpoc'];
    
  

    $microtime = microtime();
list($seconds, $microseconds) = explode(' ', $microtime);
$timestamp = (float)$seconds + (float)$microseconds;

$currentTime = date('Hi', $timestamp);
    $fnameInitial = strtoupper(substr($ename, 0, 1));
    $positionInitial = strtoupper(substr($svenue, 0, 1));
    $dobFormatted = date('Ymd', strtotime($date));
    $ecode = $currentTime . $fnameInitial . $positionInitial . $dobFormatted . $time;
    
   
    // Prepare the SQL query
    $sql = "INSERT INTO `adarsh college`.`event` (`ecode`, `ename`,`svenue`, `dvenue`, `cheifguest`, `date`, `time`, `organisernumber`, `expenditure`, `fundalloted`, 
        `moneysaved`, `cpoc`)
        VALUES ('$ecode','$ename','$svenue', '$dvenue', '$cheifguest', '$date', '$time', '$organisernumber', '$expenditure', 
        '$fundalloted', '$moneysaved', '$cpoc')";

    // // Attempt to prepare the SQL query
    // $stmt = $conn->prepare($sql);
    if($conn->query($sql) == true){
        // echo "Successfully inserted IN STUDENT MASTER";
    }
        else{
            echo "ERROR: $sql <br> $conn->error";
        }


}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Master</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: white !important;
            display: flex;
            justify-content: center;
            /* align-items: center;
            */
            margin-top: 50px;
           
        }

        main {
            padding: 1rem;
            width: 100%;
            max-width: 1250px; 
           
          }


        h2 {
            border-bottom: 2px solid #e91d62;
            width: fit-content;
            margin-left: 10px;
        }

        input {
            margin-top: 1rem;
            padding: 0.5rem;
            font-size: 16px;
            background-color: white;
            border: 1px solid grey;
            border-radius: 8px;
            width: 100%;
        }

        .ven-det {
            display: flex;
            gap: 20px;
            margin: 25px 0;
           
        }

        .sub-button {
            display: flex;
            justify-content: center;
        }

        .sub-button input {
            margin: 8rem 29rem;
            background-color: #e91d62;
            color: #fff;
            padding: 0.6rem 0.1rem;
            border: none;
            font-size: x-large;
            cursor: pointer;
        }

        h1 {
            border-bottom: 4px solid #e91d62;
            width: fit-content;
         margin-left: 30%;
         font-size: 50px;
        }

        .event-container {
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            align-content: center;
            text-align: center;
            padding: 2rem;
        }

        .event-details {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .btn {
            align-items: center;
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    
    <div class="forms-container">
        <i><h1 class="centered-text" style="font-size:50px;color:#e91d62;" >EVENT MASTER</h1></i>
    </div>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($ecode)) : ?>
    <div>
        <h3>Event Code:</h3>
        <p><?php echo $ecode; ?></p>
    </div>
<?php endif; ?>
  
    <main>
        <div class="form-container">
            <h2 class="Employee-Details">Event Details:</h2>
            <form action="Event.php" id="eventmaster" method="post" enctype="multipart/form-data">
                <div class="ven-det">
                    <input type="text" name="ename" placeholder="Event Name" required>
                    <input type="text" name="svenue" placeholder="Start Venue">
                    <input type="text" name="dvenue" placeholder="Destination Venue" required>
                    
                </div>
                <div class="ven-det">
                <input type="text" name="cheifguest" placeholder="Chief Guest" required>
                    <input type="text" name="organisernumber" placeholder="Organizer Number">
                    <input type="text" name="expenditure" placeholder="Expenditure" required>
                   
                </div>
                <div class="ven-det">
                <span>Event Date:-<input type="date" name="date" style="width: 390px;" required></span>
                    <input type="time" name="time" placeholder="Event Time" required>
                    <input type="text" name="fundalloted" placeholder="Fund Allotted">
                </div>
                <div class="ven-det">
                    <input type="text" name="moneysaved" placeholder="Money Saved">
                    <input type="text" name="overbudget" placeholder="Over Budget" required>
                    <input type="text" name="cpoc" placeholder="Cpoc">
                </div>

                <div class="sub-button">
                    <input type="submit" name="submit-btn">
                </div>
            </form>
        </div>
    </main>
</body>

</html>

