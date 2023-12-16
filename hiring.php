
<?php include("HEADER.php"); ?>
<html>
<head>
    <title>Employee Data</title>
    <style>
        /* CSS styles omitted for brevity */
        .btn-container {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-top: 15px;
            margin-right: 35px;
            margin-left: 35px;
        }

        .leftbtn button, .rightbtn button {
            color: white;
            background: #e91d62;
            height: 40px;
            border: none;
            border-radius: 7px;
            margin: 0.3rem 0rem;
            padding: 5px 10px;
        }

        .leftbtn button:hover, .rightbtn button:hover {
            background: white;
            cursor: pointer;
            border: 1px solid orange;
        }
        

        .header {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .heapic{
                    
                width: 12%;
            /*margin-right: 1rem;*/

        }
        td{
            border: 1px solid black; padding: 6px; text-align: left; font-family: bold;
        }
        .heapic img {
            width: 92%;
        }

        h5 {
            border: 1px solid black; 
            padding: 5px 10px; 
            text-align: center; 
        }
         .card{
            /*overflow-x: scroll;*/
            margin: 20px auto; 
            padding-top: 50px; 
            max-width: 81rem; 
            padding: 20px; 
            background-color: white; 
            border-radius: 5px; 
            box-shadow: 3 10px 10px rgba(0, 0, 0, 0.2);
            height: fit-content;
        }
        h5 {
            border: 1px solid black; 
            padding: 5px 10px; 
            text-align: center; 
        }
        .table-container th{
            color: #e91d62;
            font-weight: 500;
            padding: 5px;
            border: 1px solid black; 
        }
        @media screen and (max-width: 768px) {
            .leftbtn {
                justify-content: center;
                flex-wrap: wrap;
            }
            .header{
                flex-direction: column;
            }
            .heapic img {
                width: 100%;
                margin-bottom: 10px;
            }

            .heatext {
                text-align: center;
            }

            .heatext h6, .heatext h5 {
                font-size: 16px;
            }

            table {
                font-size: 14px;
            }
            .card {
                max-width: 100%;
            }
            .table-container {
                max-width: 100%;
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
    <main>
        <div class="btn-container">
        <div class="rightbtn">
            <a href="trialform.php"><button> Add</button></a>
            <a href="student_chart.php"><button> Chart</button></a>
        </div>
        <div class="leftbtn">
            <button onclick="printCardToPdf()">Print PDF</button>
            <button onclick="downloadCardToPdf()">Download PDF</button>
            <button onclick="exportDataToExcel()">Export to Excel</button>
        </div>
        </div>
        <div class="card" ">
            <div class="header">
                <!-- <div class="heapic">
                    <img src="rudraksha.png" alt="rudraksha.png">
                </div> -->
                <div class="heatext">
                    <!-- <center><h2>RUDRAKSHA WELFARE FOUNDATION</h2></center>
                    <center><h6>A Section 8 Non Profit Organisation under Ministry of Corporate Affairs, Govt. Of INDIA</h6></center> -->
                    <br> <center><h5>Employee_Master Report</h5></center>
                </div>
            </div>
            
            <br>
            <br>
            <div class="table-container">
            <table border="2" style="border-collapse: collapse; width: 100%;">
                <tr>
                    <th>Sr. No.</th>
                    <th>Employee Detail</th>
                     <th>Education Detail</th>
                   <th>Designation Detail</th>
                    <th>Extra Details</th>
                </tr>
                <?php
                $localhost = "localhost";
                $user  = "root";
                $password =  "";
                $database1 = "adarsh college";
                $conn = mysqli_connect($localhost, $user, $password, $database1);
                $sql = "SELECT * FROM employee_master";
                $result = mysqli_query($conn, $sql);
    
                if (mysqli_num_rows($result) > 0) {
                    $counter = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $counter . "</td>";
                        echo "<td>"; 
                                                echo "<b>Employee Registration code: " . $row['employeeCode'] . "</b><br>";

                        echo "<b>Name: " . $row['title'] ." ". $row['fname'] . " " . $row['mname'] . " " . $row['lname'] . "<br></b>";
                        echo "Email: " . $row['email'] . "<br>";
                        echo "Phone: " . $row['Phonenumber'] . "<br>";
                        echo "Whatsapp Number: " . $row['Whatsappnumber'] . "<br>";
                        echo "Gender: " . $row['gender'] . "<br>";
                        echo "Date Of Birth " . $row['dob'] . "<br>";
                        echo "Age: " . $row['age'] . "<br>";
                        echo "Maritial Status: " . $row['maritialStatus'] . "<br>";
                        echo "Address: " . $row['address'] . "<br>";
                        echo "Pincode: " . $row['pincode'] . "<br>";
                        echo "</td>";
                        

                        echo "<td style='border: 1px solid black; padding: 9px; text-align: left; font-family: bold;'>";
                        // echo "Education: " . $row['education'] . "<br>";
                        if (!empty($row['collegename10'])) {
                              echo "Matrix School: " . $row['collegename10'] . "<br>";
                              echo "Year of Passing: " . $row['yearofpassing10'] . "<br>";
                              echo "Marks Obtained: " . $row['marks10'] . "<br>";
                          }
  
                          // Check if Course 2 is not empty
                          if (!empty($row['collegename12'])) {
                              echo "High School Name: " . $row['collegename12'] . "<br>";
                              echo "Year of Passing: " . $row['yearofpassing12'] . "<br>";
                              echo "Marks Obtained: " . $row['marks12'] . "<br>";
                          }
  
                          // Check if Course 3 is not empty
                          if (!empty($row['ugcollegename'])) {
                              echo "Undergraduate College Name: " . $row['ugcollegename'] . "<br>";
                              echo "Year of Passing: " . $row['ugyearofpassing'] . "<br>";
                              echo "Marks Obtained: " . $row['ugmarks'] . "<br>";
                          }

                          if (!empty($row['pgcollegeName'])) {
                            echo "Post Graduate College Name: " . $row['pgcollegename'] . "<br>";
                            echo "Year of Passing: " . $row['pgyearofpassing'] . "<br>";
                            echo "Marks Obtained: " . $row['pgmarks'] . "<br>";
                        }
  
                          echo "</td>";

                         echo "<td style='border: 1px solid black; padding: 6px; text-align: left; font-family: bold;'>";
                        echo "Position: " . $row['position'] . "<br>";
                        echo "Salary Per Month: " . $row['salarypermonth'] . "<br>";
                        echo "Status: " . $row['status'] . "<br>";
                        // echo "Branch Location: " . $row['branch_loc'] . "<br>";
                        echo "</td>";
                        
                       
                        
                        echo "<td style='border: 1px solid black; padding: 6px; text-align: left; font-family: bold;'>";
                     
                        echo "Remark: " . $row['remark'] . "<br>";
                        if (isset($row['aadharimage'])) {
                            echo "AdharCard Image: <a href='" . $row['aadharimage'] . "' target='_blank'>Adhar Card</a>" . "<br>";
                        }
                        if (isset($row['panimage'])) {
                            echo "PanCard Image: <a href='" . $row['panimage'] . "' target='_blank'>Pan Card</a>";
                        }
                        echo "</td>";
                        echo "</tr>";
    
    
                        $counter++;
                    }
                } else {
                    echo "<tr><td colspan='2' style='border: 1px solid black; padding: 8px; text-align: left; font-family: bold;'>No records found.</td></tr>";
                }
    
                mysqli_close($conn);
                ?>
            </table>
            </div>
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

</body>
</html>
