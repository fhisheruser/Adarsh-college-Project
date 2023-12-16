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
    $employeeCode = $_Post['employeeCode'];
    $title = $_POST['title'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $Phonenumber = $_POST['Phonenumber'];
    $Whatsappnumber = $_POST['Whatsappnumber'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $maritalStatus = $_POST['maritalStatus'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $education = $_POST['education'];
    $collegename10 = $_POST['collegename10'];
    $yearofpassing10 = $_POST['yearofpassing10'];
    $marks10 = $_POST['marks10'];
    $collegename12 = $_POST['collegename12'];
    $yearofpassing12 = $_POST['yearofpassing12'];
    $marks12 = $_POST['marks12'];
    $ugcollegename = $_POST['ugcollegename'];
    $ugyearofpassing = $_POST['ugyearofpassing'];
    $ugmarks = $_POST['ugmarks'];
    $pgcollegename = $_POST['pgcollegename'];
    $pgyearofpassing = $_POST['pgyearofpassing'];
    $pgmarks = $_POST['pgmarks'];
    $position = $_POST['position'];
    $salarypermonth = $_POST['salarypermonth'];
    $status = $_POST['status'];
    $remark = $_POST['remark'];

    // File upload directory
    $uploadDir = "uploads/";

    // Upload Aadhar card image
    $aadharFileName = $uploadDir . basename($_FILES["fileUploadadhar"]["name"]);
    move_uploaded_file($_FILES["fileUploadadhar"]["tmp_name"], $aadharFileName);

    // Upload Pan card image
    $panFileName = $uploadDir . basename($_FILES["fileUploadpan"]["name"]);
    move_uploaded_file($_FILES["fileUploadpan"]["tmp_name"], $panFileName);
    

    $microtime = microtime();
list($seconds, $microseconds) = explode(' ', $microtime);
$timestamp = (float)$seconds + (float)$microseconds;

$currentTime = date('Hi', $timestamp);
    $fnameInitial = strtoupper(substr($fname, 0, 1));
    $positionInitial = strtoupper(substr($position, 0, 1));
    $dobFormatted = date('Ymd', strtotime($dob));
    $employeeCode = $currentTime . $fnameInitial . $positionInitial . $dobFormatted . $age;
    
   
    // Prepare the SQL query
    $sql = "INSERT INTO `adarsh college`.`employee_master` (employeeCode,title,fname, mname, lname, email, Phonenumber, Whatsappnumber, gender, dob, 
        age, maritialStatus, address, pincode, education, collegename10, yearofpassing10, marks10, collegename12, 
        yearofpassing12, marks12, ugcollegename, ugyearofpassing, ugmarks, pgcollegename, pgyearofpassing, pgmarks, 
        position, salarypermonth, status, remark, aadharimage, panimage)
        VALUES ('$employeeCode','$title','$fname', '$mname', '$lname', '$email', '$Phonenumber', '$Whatsappnumber', '$gender', '$dob', '$age', '$maritalStatus', '$address', 
        '$pincode', '$education', '$collegename10', '$yearofpassing10', '$marks10', '$collegename12', '$yearofpassing12', '$marks12', '$ugcollegename', '$ugyearofpassing', '$ugmarks', '$pgcollegename', 
        '$pgyearofpassing', '$pgmarks', '$position', '$salarypermonth', '$status', '$remark', '$aadharFileName', '$panFileName')";

    // Attempt to prepare the SQL query
    $stmt = $conn->prepare($sql);

    // Check for errors in prepare
    if ($stmt === false) {
        die("Error in prepare: " . $conn->error);
    }

    // Execute the query
    if ($stmt->execute()) {
        // Data submitted successfully
        header("Location: your_html_page.php?success=true");
        exit();
    } else {
        // Error in the SQL query
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();

}

$conn->close();
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('HEADER.php') ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Master</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: white !important;
            display: flex;
            justify-content: center;
            align-items: center;
            /* height: 107vh; */
        }
        main {
            padding: 1rem -2rem;
            /* width: 100%; */
            max-width: 1280px;
        }
        .forms-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-right: 100px;
          
        }
        h2 {
            border-bottom: 2px solid #e91d62;
            width: fit-content;
            margin-top: 20px;
            
        }
        .form-container {
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
        }
        .ven-det {
            display: flex;
            gap: 10px;
            margin: 20px 0;
            flex-direction: row;
            align-items: flex-start;
            flex-wrap: wrap;
            align-content: stretch;
            justify-content: center;
        }
        .ven-det input,
        .ven-det select {
            flex: 1 1 10%;
            margin: 10px;
        }
        .date-selector {
            width: 80%;
        }

        .date-selector_doi {
            width: 100%;
        }

        .doe {
            margin: 0rem 0.6rem;
        }

        .today-date {
            background-color: #e91d62db;
            color: white;
            border: none;
            padding: 6px;
            border-radius: 6px;
        }

        .basic-details {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
        }

        .basic-details>* {
            flex: 1 0 20%;
        }

        .account-details {
            margin: 3rem 0rem 30px;
        }

        .account-input {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            align-items: flex-end;
            margin-top: 30px;
        }

        .account-input>* {
            flex: 1 1 30%;
        }

        select {
            padding: 0;
            height: 2.3rem;
            margin-top: 0.6rem;
            color: grey;
            border: 1px solid grey;
            border-radius: 8px;
        }

        .extra-info {
            display: flex;
            gap: 21px;
            align-items: flex-end;
            flex-wrap: wrap;
        }

        #fileUpload {
            margin-top: 20px;
        }

        .extra-info>* {
            flex: 1 0 30%;
        }

        input {
            margin-top: 0.6rem;
            padding: 0.5rem;
            font-size: 16px;
            background-color: white;
            border: 1px solid grey;
            border-radius: 8px;
            width: 100%;
        }

        .remark {
            display: flex;
            flex-direction: column;
            margin-top: 1rem;
        }

        .sub-button {
            display: flex;
            justify-content: center;
        }

        .sub-button input {
            margin: 3rem 29rem;
            background-color: #e91d62;
            color: #fff;
            padding: 0.5rem 1rem;
            border: none;
            font-size: x-large;
            cursor: pointer;
        }

        .date-selector {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

       
        @media only screen and (max-width: 600px) {
    .ven-det input,
    .ven-det select {
        flex: 1 0 100%; /* Full width on small screens */
        margin: 10px;
    }

    .sub-button input {
        margin: 3rem 1rem; /* Adjust the margin for small screens */
    }
}
    </style>
</head>
<body>
   
    <div class="forms-container">
        <h1 class="centered-text" style="margin-top:30px; margin-right:70px; font-size: 50px;color:#e91d62;" ><u><i>EMPLOYEE MASTER</i></u></h1>
    </div>

    <main>
        <div class="form-container">
            <h2 class="Employee-Details">Employee Details:</h2>
            <form action="employe.php" id="vendorForm" method="post" enctype="multipart/form-data">               
                 <div class="ven-det">
                 <select name="title"  required>
                <option value="" selected hidden>Title</option>
                <option value="Mr.">Mr.</option>
                <option value="Ms.">Ms.</option>
              </select>
                    <input type="text" name="fname" placeholder="First Name" required>
                    <input type="text" name="mname" placeholder="Middle Name">
                    <input type="text" name="lname" placeholder="Last Name" required>
                </div>
                <div class="ven-det">
                    <input type="text" name="email" placeholder="Email" required>
                    <input type="number" name="Phonenumber" placeholder="Phone Number" required>
                    <input type="number" name="Whatsappnumber" placeholder="WhatsApp Number" required>
                </div>
                <div class="ven-det">
                    <select id="gender" name="gender">
                        <option value="Gender">Gender</option>
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                        <option value="other">Other</option>
                    </select>
                   <span>Date Of Birth:-<input type="date" id="dob" name="dob" style="width: 270px;" required></span>
                    <input type="text" id="age" name="age" placeholder="Age" readonly>
                </div>
                <div class="ven-det">
                    <select id="MaritialStatus" name="maritalStatus">
                        <option value="Marital Status">Marital Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Divorced">Divorced</option>
                    </select>
                    <input type="text" name="address" placeholder="Address" required>
                    <input type="text" name="pincode" placeholder="Pincode">
                </div>
                <script>
                    document.getElementById("dob").addEventListener("change", function () {
                        var dob = new Date(this.value);
                        var today = new Date();
                        var age = today.getFullYear() - dob.getFullYear();
                        document.getElementById("age").value = age;
                    });
                </script>

                <h2 class="Education">Education:</h2>
               
                    <div class="ven-det">
                        <select name="education" id="educationSelect" required onchange="showFields()">
                            <option value="none">Select Education</option>
                            <option value="10">10th</option>
                            <option value="12">12th</option>
                            <option value="UG">underGraduation</option>
                            <option value="PG">postGraduation</option>
                        </select>

                        <!-- Input fields for 10th education -->
                        <div id="10thFields" style="display: none;">
                            <input type="text" id="collegename10" name="collegename10" placeholder="College Name" required>
                            <input type="text" id="yearofpassing10" name="yearofpassing10" placeholder="Year of Passing" required>
                            <input type="number" id="marks10" name="marks10" placeholder="Marks" required>
                        </div>

                        <!-- Input fields for 12th education -->
                        <div id="12thFields" style="display: none;">
                            <input type="text" id="collegeName12" name="collegename12" placeholder="College Name" required>
                            <input type="text" id="yearOfPassing12" name="yearofpassing12" placeholder="Year of Passing" required>
                            <input type="number" id="marks12" name="marks12" placeholder="Marks" required>
                        </div>

                        <!--Input field for UG education-->
                        <div id="UGFields" style="display: none;">
                            <input type="text" id="collegeNameUG" name="ugcollegename" placeholder="College Name" required>
                            <input type="text" id="yearOfPassingUG" name="ugyearofpassing" placeholder="Year of Passing" required>
                            <input type="number" id="marksUG" name="ugmarks" placeholder="Marks" required>
                        </div>

                        <!--Input field for UG education-->
                        <div id="PGFields" style="display: none;">
                            <input type="text" id="collegeNamePG" name="pgcollegename" placeholder="College Name" required>
                            <input type="text" id="yearOfPassingPG" name="pgyearofpassing" placeholder="Year of Passing" required>
                            <input type="number" id="marksPG" name="pgmarks" placeholder="Marks" required>
                        </div>
                    </div>

                    <h2 class="Designation">Designation:</h2>
                    <div class="ven-det">
                        <select id="Position" name="position">
                            <option value="Position">Position</option>
                            <option value="Principal">Principal</option>
                            <option value="Vice Principal">Vice Principal</option>
                            <option value="Sewak">Sewak</option>
                            <option value="Professor">Professor</option>
                            <option value="Associate Professor">Associate Professor</option>
                            <option value="Senior Clerk">Senior Clerk</option>
                            <option value="Juinor Clerk">Juinor Clerk</option>
                            <option value="Office Assistant">Office Assistant</option>
                            <option value="Computer Operator">Computer Operator</option>
                            <option value="Library Assistant">Library Assistant</option>
                            <option value="Mali cum Chowkidar">Mali cum Chowkidar</option>
                            <option value="Post Graduate Teacher">Post Graduate Teacher</option>
                            <option value="Sweeper">Sweeper</option>
                            <option value="Guard">Guard</option>
                            <option value="Peon">Peon</option>
                        </select>
                        <input type="number" id="Salary" name="salarypermonth" placeholder="Salary Per Month">
                        <select id="Status" name="status">
                            <option value="Position">Status</option>
                            <option value="New Joining">New Joining</option>
                            <option value="Transfer">Transfer</option>
                            <option value="Promotion Transfer">Promotion Transfer</option>
                            <option value="Demotion Transfer">Demotion Transfer</option>
                            <option value="Self Demotion">Self Demotion</option>
                            <option value="Suspended">Suspended</option>
                            <option value="Terminated">Terminated</option>
                        </select>
                    </div>

                    <span class="remark">
                        <label for="remark"><h2>Remarks</h2></label>
                        <textarea rows="10" cols="50" name="remark" placeholder="Remark" class="remark"> </textarea>
                    </span>

                    <h2>Adhaar Card</h2>
                    <input type="file" id="fileUpload" name="fileUploadadhar" placeholder="Documents" required>

                    <h2>Pan Card</h2>
                    <input type="file" id="fileUpload" name="fileUploadpan" placeholder="Documents" required>

                    <div class="sub-button">
                    <input type="submit" name="submit-btn" value="Submit">
                    </button>
                    </div>
                </form>
                <div style="width: 40%; height: 40%;">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </main>
<!-- Add this script to the head of your HTML document -->
<script>
    // Function to show relevant fields based on the selected education level
    function showFields() {
        var educationSelect = document.getElementById("educationSelect");
        var selectedValue = educationSelect.value;

        // Hide all education fields initially
        document.getElementById("10thFields").style.display = "none";
        document.getElementById("12thFields").style.display = "none";
        document.getElementById("UGFields").style.display = "none";
        document.getElementById("PGFields").style.display = "none";

        // Show the fields based on the selected education level
        switch (selectedValue) {
            case '10':
                document.getElementById("10thFields").style.display = "flex";
                break;
            case '12':
                document.getElementById("12thFields").style.display = "flex";
                break;
            case 'UG':
                document.getElementById("UGFields").style.display = "flex";
                break;
            case 'PG':
                document.getElementById("PGFields").style.display = "flex";
                break;
            default:
                // Handle other education levels if needed
                break;
        }
    }

    // Function to store and retrieve details for each education level
    function saveDetails(educationLevel) {
        var details = {
            collegeName: document.getElementById("collegeName" + educationLevel).value,
            yearOfPassing: document.getElementById("yearOfPassing" + educationLevel).value,
            marks: document.getElementById("marks" + educationLevel).value,
        };

        return details;
    }

    // Function to populate fields with stored details
    function populateFields(educationLevel, details) {
        document.getElementById("collegeName" + educationLevel).value = details.collegeName;
        document.getElementById("yearOfPassing" + educationLevel).value = details.yearOfPassing;
        document.getElementById("marks" + educationLevel).value = details.marks;
    }

    // Function to handle changes in the education dropdown
    document.getElementById("educationSelect").addEventListener("change", function () {
        var selectedValue = this.value;

        // Save details before hiding fields
        var details10 = saveDetails("10");
        var details12 = saveDetails("12");
        var detailsUG = saveDetails("UG");
        var detailsPG = saveDetails("PG");

        // Hide all education fields initially
        document.getElementById("10thFields").style.display = "none";
        document.getElementById("12thFields").style.display = "none";
        document.getElementById("UGFields").style.display = "none";
        document.getElementById("PGFields").style.display = "none";

        // Show the fields based on the selected education level
        switch (selectedValue) {
            case '10':
                document.getElementById("10thFields").style.display = "flex";
                // Populate with stored details
                populateFields("10", details10);
                break;
            case '12':
                document.getElementById("12thFields").style.display = "flex";
                // Populate with stored details
                populateFields("12", details12);
                break;
            case 'UG':
                document.getElementById("UGFields").style.display = "flex";
                // Populate with stored details
                populateFields("UG", detailsUG);
                break;
            case 'PG':
                document.getElementById("PGFields").style.display = "flex";
                // Populate with stored details
                populateFields("PG", detailsPG);
                break;
            default:
                // Handle other education levels if needed
                break;
        }
    });
   
    // Check if the URL contains a success parameter
    const urlParams = new URLSearchParams(window.location.search);
    const isSuccess = urlParams.get('success');

    // If the success parameter is present, show an alert
    if (isSuccess) {
        alert('Data submitted successfully!');
    }

</script>

    </body>
    </html>

