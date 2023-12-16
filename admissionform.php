<?php

// Database connection parameters
$server = "localhost";
$username = "root";
$password = "";
$database = "adarsh college";
// Create connection
$conn = new mysqli($server, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
  // echo"connected";
}

// Assuming you have form data to insert into the table
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $mname=$_POST["mname"];
    $fname=$_POST["fname"];
    $dob=$_POST["dob"];
    $gender=$_POST["gender"];
    $phone=$_POST["phone"];
    $email=$_POST["email"];
    $address=$_POST["address"];
    $country=$_POST["country"];
    $marks=$_POST["marks"];
    $board=$_POST["board"];
    $sname=$_POST["sname"];
    $marks12=$_POST["marks12"];
    $board12=$_POST["board12"];
    $sname12=$_POST["sname12"];
$course=$_POST["course"];
$target_dir = "uploads/";
$passport_image = $target_dir . basename($_FILES["passport_image"]["name"]);
$tenth_marksheet = $target_dir . basename($_FILES["10th_marksheet"]["name"]);
$aadhar_card = $target_dir . basename($_FILES["aadhar_card"]["name"]);

// Add these lines before the move_uploaded_file statements
// echo "Target Dir: $target_dir <br>";
// echo "Passport Image Path: $passport_image <br>";


move_uploaded_file($_FILES["passport_image"]["tmp_name"], $passport_image);
move_uploaded_file($_FILES["10th_marksheet"]["tmp_name"], $tenth_marksheet);
move_uploaded_file($_FILES["aadhar_card"]["tmp_name"], $aadhar_card);
    // SQL query to insert data into the admissionform table
    $sql = "INSERT INTO `adarsh college`.`admissionform` (`username`, `password`, `name`, `mname`, `fname`, `dob`,
    `gender`, `phone`, `email`, `address`, `country`, `marks`, `board`,
    `sname`, `marks12`, `board12`, `sname12`, `course`, `passport_image`, `10th_marksheet`, `aadhar_card`) 
    VALUES ('$username', '$password', '$name','$mname' ,'$fname','$dob',
    '$gender','$phone','$email','$address','$country','$marks','$board',
    '$sname','$marks12','$board12','$sname12','$course', '$passport_image', '$tenth_marksheet', '$aadhar_card')";
    
    if ($conn->query($sql) === TRUE) {
        // echo "Form submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();

?>

<html>
  <head>
     <title>Admission Form</title>
  </head>
  <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            overflow-y: auto; /* Enable vertical scrollbar for the entire page */
        }

        center {
            background-color: chartreuse;
            color: #fff;
            padding: 10px;
            font-size: 20px;
        }

        form {
            background-color: #fff;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
            width: 100%;
            max-width: 1300px; /* Set the maximum width for better readability */
        }

        fieldset {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        table {
            width: 100%;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 21px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
  <body>
     <center><h1>ADMISSION FORM</h1></center>
     <div style="margin: 50px;padding: 10px; text-align: center;">
     <form method="POST" action="admissionform.php" enctype="multipart/form-data">
       <fieldset>
         <legend>Login Details</legend>
         <table>
             <tr>
                <td>Username: </td>
                <td><input type="text" name="username"/></td>
             </tr>
             <tr>
                <td>Password: </td>
                <td><input type="password" name="password"/></td>
             </tr>  
         </table>
       </fieldset>
       <fieldset>
         <legend>Personal Details</legend>
         <table>
            <tr>
		<td>Name: </td>
		<td><input type="text" name="name"/></td>
            </tr>
            <tr>
		<td>Mother's Name</td>
		<td><input type="text" name="mname"/></td>
	    </tr>
            <tr>
		<td>Father's Name</td>
		<td><input type="text" name="fname"/></td>
	    </tr>
            <tr>
		<td>Date of Birth</td>
		<td><input type="date" name="dob"/></td>
	    </tr>
            <tr>
		<td>Gender</td>
		<td>
		    <input type="radio" name="gender" value="male">Male</input>
		    <input type="radio" name="gender" vale="female">Female</input>
                </td>
	    </tr>
         </table> 
       </fieldset>
        <fieldset>
         <legend>Contact Details</legend>
          <table>
            <tr>
		<td>Contact Number: </td>
		<td><input type="tel" name="phone"/></td>
            </tr>
            <tr>
		<td>Email ID: </td>
		<td><input type="email" name="email"/></td>
            </tr>
            <tr>
		<td>Address</td>
		<td><textarea rows="5" cols="30" name="address">Enter Address...</textarea></td>
            </tr>
            <tr>
		<td>Country: </td>
		<td>
                   <select name="country">
			<option>India</option>
		
                   </select>
                </td>
            </tr>
          </table>

       </fieldset> 
       <fieldset>
         <legend>Academic Details</legend>
         <table>
           <tr>
             <td>10<sup>th</sup> Class Marks:</td>
             <td><input type="number" name="marks"/></td>
             <td>Board: </td>
             <td><input type="text" name="board"/></td>
             <td>School Name: </td>
             <td><input type="text" name="sname"/></td>
           </tr>
           <tr>
           <tr>
             <td>12<sup>th</sup> Class Marks:</td>
             <td><input type="number" name="marks12"/></td>
             <td>Board: </td>
             <td><input type="text" name="board12"/></td>
             <td>School Name: </td>
             <td><input type="text" name="sname12"/></td>
           </tr>
           </tr>
         </table>
       </fieldset> 
       <fieldset>
        <legend>File Upload</legend>
        <table>
            <tr>
                <td>Passport Size Image:</td>
                <td><input type="file" name="passport_image" accept="image/*" /></td>
            </tr>
            <tr>
                <td>10th Mark Sheet:</td>
                <td><input type="file" name="10th_marksheet" accept=".pdf, .doc, .docx" /></td>
            </tr>
            <tr>
                <td>Aadhar Card:</td>
                <td><input type="file" name="aadhar_card" accept="image/*, .pdf" /></td>
            </tr>
        </table>
    </fieldset> 
       <fieldset>
         <legend>Course You Want to Enroll in</legend>
         <table>
         <select id="courses" name="course">
            <option value="Prak Shastri">Prak Shastri</option>
            <option value="Shastri (B.A) IN VYAKARANA">Shastri (B.A) IN VYAKARANA</option>
            <option value="Shastri (B.A) IN PHALIT JYOTISH">Shastri (B.A) IN PHALIT JYOTISH</option>
            <option value="Shastri (B.A) IN SAHITYA">Shastri (B.A) IN SAHITYA</option>
            <option value="ACHARYA (M.A) IN VYAKARANA">ACHARYA (M.A) IN VYAKARANA</option>
            <option value="ACHARYA (M.A.) IN PHALIT JYOTISH">ACHARYA (M.A.) IN PHALIT JYOTISH</option>
            <option value="ACHARYA (M.A.) IN SAHITYA">ACHARYA (M.A.) IN SAHITYAA</option>

            <option value="P.G. Diploma in Karamkaand">P.G. Diploma in Karamkaand</option>

            <option value="P.G. Diploma in Yogic Science">P.G. Diploma in Yogic Science</option>

            <option value="Ph.D. In Vyakaran">Ph.D. In Vyakaran</option>

            <option value="Ph.D. In Jyotish">Ph.D. In Jyotish</option>


        </select>
         </table>
       </fieldset>
       <div style="margin-top: 20px; padding: 10px;text-align: center;">
           <Button onclick="alert('Form Submitted');">Submit</button>
       </div>  
     </form>
     </div>
  </body>
</html>