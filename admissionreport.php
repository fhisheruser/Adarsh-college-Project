<?php include("HEADER.php"); ?>

<html>
  <head>
     <title>Admission Form Report</title>
     <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            overflow-y: auto;
            width: 100%;
        }


        .report-container {
            margin: 50px;
            padding: 10px;
            text-align: center;
        }

        .table-container {
            height:100%; /* Set the desired height */
            overflow: auto;
            margin-top: 20px;
        }

        table {
            width: 100%;
            margin: 0 auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: white;
        }

        .action-buttons {
            text-align: center;
        }

        .action-buttons button {
            background-color: #4caf50;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin-right: 5px;
        }

        .action-buttons button:hover {
            background-color: #45a049;
        }
     </style>
  </head>
  <body>
     <center><h1>ADMISSION FORM REPORT</h1></center>
     <div class="report-container">
        <div class="table-container" id="tableContainer">
            <table>
                <tr>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Mother's Name</th>
                    <th>Father's Name</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Contact Number</th>
                    <th>Email ID</th>
                    <th>Address</th>
                    <th>Country</th>
                    <th>10th Class Marks</th>
                    <th>Board (10th)</th>
                    <th>School Name (10th)</th>
                    <th>12th Class Marks</th>
                    <th>Board (12th)</th>
                    <th>School Name (12th)</th>
                    <th>Course Enrolled</th>
                    <th>Passport Image</th>
                    <th>10th Marksheet</th>
                    <th>Aadhar Card</th>
                </tr>
                
                <?php
                // Fetch data from the admissionform table
                $server = "localhost";
                $username = "root";
                $password = "";
                $database = "adarsh college";

                // Create connection
                $conn = new mysqli($server, $username, $password, $database);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM admissionform";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['mname'] . "</td>";
                    echo "<td>" . $row['fname'] . "</td>";
                    echo "<td>" . $row['dob'] . "</td>";
                    echo "<td>" . $row['gender'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                    echo "<td>" . $row['country'] . "</td>";
                    echo "<td>" . $row['marks'] . "</td>";
                    echo "<td>" . $row['board'] . "</td>";
                    echo "<td>" . $row['sname'] . "</td>";
                    echo "<td>" . $row['marks12'] . "</td>";
                    echo "<td>" . $row['board12'] . "</td>";
                    echo "<td>" . $row['sname12'] . "</td>";
                    echo "<td>" . $row['course'] . "</td>";
                    echo "<td>";
    if (isset($row['passport_image'])) {
        echo "Passport Image: <a href='" . $row['passport_image'] . "' target='_blank'>View</a>";
    }
    echo "</td>";

    echo "<td>";
    if (isset($row['10th_marksheet'])) {
        echo "10th Marksheet: <a href='" . $row['10th_marksheet'] . "' target='_blank'>View</a>";
    }
    echo "</td>";

    echo "<td>";
    if (isset($row['aadhar_card'])) {
        echo "Aadhar Card: <a href='" . $row['aadhar_card'] . "' target='_blank'>View</a>";
    }
    echo "</td>";

                    echo "<td class='action-buttons'>";
                    echo "<button onclick='acceptApplication(" . $row['id'] . ")'>Accept</button>";
                    echo "<button onclick='rejectApplication(" . $row['id'] . ")'>Reject</button>";
                    echo "</td>";
                    echo "</tr>";
                }
                } else {
                    echo "<tr><td colspan='4'>No records found.</td></tr>";
                }

               
                ?>
                
            </table>
        </div>
     </div>
     <script>
        // Keep the scrollbar at the bottom
        var tableContainer = document.getElementById('tableContainer');
        tableContainer.scrollTop = tableContainer.scrollHeight;
     
        function acceptApplication(id) {
            alert('Accept Application for ID: ' + id);
            updateStatus(id, 'accepted');
            window.location.href = 'acceptpage.php';
        }

        function rejectApplication(id) {
            alert('Reject Application for ID: ' + id);
            updateStatus(id, 'rejected');
    
    window.location.href = 'rejectpage.php';        }

    function updateStatus(id, status) {
    // You can use AJAX or another method to update the status in the database
    // For simplicity, I'll use a simple URL parameter in this example
    var updateUrl = 'update-status.php?id=' + id + '&status=' + status;
    
    // Perform the update
    // You may want to handle success/error cases here
    fetch(updateUrl)
        .then(response => response.json())
        .then(data => console.log(data))
        .catch(error => console.error('Error:', error));
}
     </script>
  </body>
</html>

<?php
// Close the database connection
$conn->close();
?>
