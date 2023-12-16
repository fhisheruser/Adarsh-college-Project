<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "adarsh college";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_POST['id']) ? $_POST['id'] : null;
        $type = $_POST['type'];
        $file = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        move_uploaded_file($file_tmp, "notice/" . $file);

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO `notice` (`type`, `file`) VALUES (?, ?)");
    $stmt->bind_param("ss", $type, $file);
    
    if ($stmt->execute()) {
        // echo "Insertion successful";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch entries from the database
// Fetch entries from the database
$result = $conn->query("SELECT id, type, file FROM `notice`");
if (!$result) {
    // die("Error fetching data: " . $conn->error);
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Page</title>
    <style>
  .uploaded-file {
            max-width: 100%;
            height: auto;
        }

    body {
        font-family: Arial, sans-serif;
       
        flex-direction: column;
        align-items: center;
       
    }

  

    .card-container {
        align-items: center;
        flex-direction: column-reverse;
        display: flex;
        flex-wrap: wrap; /* Allow cards to wrap to the next line */
        justify-content: space-between;
        max-width: 100%; /* Optional: Set a maximum width for the card container */
        width: 100%;
        margin-top: 20px;
        height: 100%;
    }

    .card {
        width: 94%;
    max-width: 500px;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px; 
       margin-bottom: 20px;
        height: 700px; 
        margin-top: 30px; 


        /* position: relative;
    width: 94%;
    max-width: 500px;
    background-color: #5fcdff;
    height: 350px;
    margin: auto; */
    }

    input {
        width: 100%;
        padding: 10px;
        margin: 5px 0;
        box-sizing: border-box;
    }

    .submit-btn {
        margin-top: 10px;
        background-color: #4caf50;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .action-btns {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

    .action-btn {
        background-color: #f44336;
        color: white;
        padding: 8px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

   

    </style>
</head>
<body>
<?php include 'HEADER.php'?>

   
    <form method="post" action="admin.php" enctype="multipart/form-data">
    <div class="card-container">
    <!-- Display entries from the database in cards -->
    <?php
    while ($row = $result->fetch_assoc()) {
        echo '<div class="card" id="card_' . $row['id'] . '">';
        echo '<h2>Notice Board</h2>';
        echo '<p>Notice Topic: ' . $row['type'] . '</p>';
        if (!empty($row['file'])) {
            echo "Notice Image: <a href='" . $row['file'] . "' target='_blank'>View</a>";    
            }
     
        echo '<button class="action-btn" onclick="deleteCard(' . $row['id'] . ')">Delete</button>';
        echo '</div>';
    
    }

    // Free the result after using it in the loop
    $result->free_result();
    ?>
</div>

            <!-- Your form card -->
            <div class="card">
                <!-- Add a hidden field for 'id' -->
                <input type="hidden" name="id" value="1">
                <h2>Notice Board</h2>
                <label for="type">Notice topic</label>
                <input name="type" type="text" id="type" required>
                <br>
               
                <label for="file">Select Notice File</label>
            <input type="file" name="file" id="file">
                <div class="action-btns">
                    <button class="submit-btn">Submit</button>
                </div>
            </div>
     
    </form>

    <script>
    function logout() {
        alert("Logout button clicked");
        window.location.href = 'main.php';
    }

    function deleteCard(cardId) {
        var card = document.getElementById('card_' + cardId);
        card.remove();

        // AJAX request to delete entry from the database
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'delete_notice.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText); // Log the response for debugging
            }
        };
        xhr.send('id=' + cardId);
    }
</script>

</body>
</html>







